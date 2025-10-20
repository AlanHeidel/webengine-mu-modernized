<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
header('Content-Type: application/json; charset=utf-8');

try {
    // Cargar las credenciales
    $credentialsPath = __DIR__ . '/../includes/secure/credentials.json';
    if (!file_exists($credentialsPath)) {
        throw new Exception('No se encontró el archivo credentials.json');
    }

    $credentials = json_decode(file_get_contents($credentialsPath), true);
    if (!$credentials) {
        throw new Exception('Error al leer las credenciales');
    }

    // Generar JWT para autenticación
    function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    function createJWT($credentials) {
        $header = json_encode(['typ' => 'JWT', 'alg' => 'RS256']);
        
        $now = time();
        $payload = json_encode([
            'iss' => $credentials['client_email'],
            'scope' => 'https://www.googleapis.com/auth/spreadsheets.readonly',
            'aud' => 'https://oauth2.googleapis.com/token',
            'iat' => $now,
            'exp' => $now + 3600
        ]);

        $headerEncoded = base64UrlEncode($header);
        $payloadEncoded = base64UrlEncode($payload);
        
        $signature = '';
        $privateKey = openssl_pkey_get_private($credentials['private_key']);
        openssl_sign($headerEncoded . '.' . $payloadEncoded, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        
        return $headerEncoded . '.' . $payloadEncoded . '.' . base64UrlEncode($signature);
    }

    // Obtener token de acceso
    function getAccessToken($credentials) {
        $jwt = createJWT($credentials);
        
        $postData = http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://oauth2.googleapis.com/token',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
            CURLOPT_TIMEOUT => 30
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception('Error obteniendo token: ' . $response);
        }

        $tokenData = json_decode($response, true);
        return $tokenData['access_token'] ?? null;
    }

    // Obtener datos de Google Sheets
    function getSheetData($accessToken, $spreadsheetId, $range) {
        $url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheetId}/values/{$range}";
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $accessToken,
                'Content-Type: application/json'
            ],
            CURLOPT_TIMEOUT => 30
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception('Error obteniendo datos: ' . $response);
        }

        return json_decode($response, true);
    }

    function generateSlug($text) {
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        $text = preg_replace('/[\s-]+/', '-', $text);
        return trim($text, '-');
    }



    // Ejecutar el proceso
    $accessToken = getAccessToken($credentials);
    if (!$accessToken) {
        throw new Exception('No se pudo obtener el token de acceso');
    }

    $spreadsheetId = "1oyQpUVLyQofFmrRwALg19vy0RwU2dXc4-bzIiutWues";
    
    // Determinar qué tipo de datos solicitar
    $type = $_GET['type'] ?? 'news';
    switch ($type) {
        case 'avisos':
            $range = "Avisos!B3:E";
            $sheetData = getSheetData($accessToken, $spreadsheetId, $range);
            $values = $sheetData['values'] ?? [];

            $avisos = [];
            if (!empty($values)) {
                foreach ($values as $index => $row) {
                    if (isset($row[1]) && !empty(trim($row[1]))) { // Título es obligatorio
                        $avisos[] = [
                            "icono" => trim($row[0] ?? '📌'),
                            "titulo" => trim($row[1] ?? ""),
                            "mensaje" => trim($row[2] ?? ""),
                            "fecha" => trim($row[3] ?? date('d/m/Y')),
                            "timestamp" => time() - ($index * 3600)
                        ];
                    }
                }
            }

            echo json_encode([
                'success' => true,
                'data' => $avisos,
                'count' => count($avisos),
                'type' => 'avisos'
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;

        case 'news':
        default:
            $range = "Noticias!B3:I";
            $sheetData = getSheetData($accessToken, $spreadsheetId, $range);
            $values = $sheetData['values'] ?? [];

            $news = [];
            if (!empty($values)) {
                foreach ($values as $index => $row) {
                    if (isset($row[0]) && !empty(trim($row[0]))) {
                        $newsId = 'news-' . md5(trim($row[0]) . trim($row[3] ?? '') . $index);
                        
                        $news[] = [
                            "id" => $newsId,
                            "titulo" => trim($row[0] ?? ""),
                            "descripcion" => trim($row[1] ?? ""),
                            "imagen" => trim($row[2] ?? ""),
                            "fecha" => trim($row[3] ?? ""),
                            "tipo" => trim($row[4] ?? "NEWS"),
                            "contenido_detallado" => trim($row[5] ?? ""),
                            "imagen_detallada" => trim($row[6] ?? ""),
                            "autor" => trim($row[7] ?? "Administrador"),
                            "slug" => generateSlug(trim($row[0] ?? "")),
                            "preview_url" => "?page=newsdetails&id=" . $newsId
                        ];
                    }
                }
            }

            // Si se solicita una noticia específica
            if (isset($_GET['id'])) {
                $requestedId = $_GET['id'];
                $foundNews = null;
                
                foreach ($news as $noticia) {
                    if ($noticia['id'] === $requestedId) {
                        $foundNews = $noticia;
                        break;
                    }
                }
                
                if ($foundNews) {
                    echo json_encode([
                        'success' => true,
                        'data' => $foundNews,
                        'type' => 'single_news'
                    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                } else {
                    http_response_code(404);
                    echo json_encode([
                        'success' => false,
                        'error' => 'Noticia no encontrada',
                        'requested_id' => $requestedId
                    ], JSON_UNESCAPED_UNICODE);
                }
                exit;
            }

            // Respuesta normal de noticias
            echo json_encode([
                'success' => true,
                'data' => $news,
                'count' => count($news),
                'type' => 'news'
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
?>