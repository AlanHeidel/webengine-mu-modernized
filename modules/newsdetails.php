<?php
// Obtener ID de la noticia
$noticiaId = $_GET['id'] ?? '';

if (empty($noticiaId)) {
    header('Location: index.php?page=noticias');
    exit;
}

// Consumir API para obtener la noticia específica
//Desarrollo
// $apiUrl = "http://localhost/liberty-mu.com/api/news.php?id=" . urlencode($noticiaId);
//Produccion
$apiUrl = "http://libertymu2.com/api/news.php?id=" . urlencode($noticiaId);

$response = file_get_contents($apiUrl);

if ($response === false) {
    echo '<h1 class="page-title">Noticias</h1>';
    echo '<div class="background-universal">';
    echo '<div class="error-message">Error al conectar con la API</div>';
    echo '</div>';
    return;
}

$data = json_decode($response, true);

if (!$data || !$data['success']) {
    echo '<h1 class="page-title">Noticias</h1>';
    echo '<div class="background-universal">';
    echo '<div class="error-message">Noticia no encontrada</div>';
    echo '</div>';
    return;
}

$noticia = $data['data'];
?>

<h1 class="page-title">Noticias</h1>
<div class="background-universal">    
    <article class="news-article">
        <header class="news-header">
            <div class="news-category"><?php echo htmlspecialchars($noticia['tipo'] ?? 'NOTICIA'); ?></div>
            
            <h1 class="news-title">
                <?php echo htmlspecialchars($noticia['titulo'] ?? 'Sin título'); ?>
            </h1>
            
            <div class="news-meta">
                <div class="meta-item">
                    <span>📅</span>
                    <span><?php echo htmlspecialchars($noticia['fecha'] ?? 'Sin fecha'); ?></span>
                </div>
                <div class="meta-item">
                    <span>✍️</span>
                    <span><?php echo htmlspecialchars($noticia['autor'] ?? 'Administrador'); ?></span>
                </div>
            </div>
        </header>

        <div class="news-content">
            <div class="news-description">
                <?php 
                $desc = $noticia['descripcion'] ?? '';
                
                if (!empty($desc)) {
                    // Convertir saltos de línea a párrafos
                    $paragraphs = explode("\n\n", $desc);
                    foreach ($paragraphs as $paragraph) {
                        if (!empty(trim($paragraph))) {
                            echo '<p>' . nl2br(htmlspecialchars(trim($paragraph))) . '</p>';
                        }
                    }
                } else {
                    echo '<p>Sin descripcion.</p>';
                }
                ?>
            </div>

            <!-- Imagen por defecto si no hay imagen -->
            <?php
            $imagenUrl = !empty($noticia['imagen']) ? 
                $noticia['imagen'] : 
                'https://i.imgur.com/sj5dSQI.jpeg';
            ?>

            <div class="news-image-container">
                <img src="<?php echo htmlspecialchars($imagenUrl); ?>" 
                    alt="<?php echo htmlspecialchars($noticia['titulo'] ?? ''); ?>" 
                    class="news-hero-image">
            </div>

            <div class="news-detailed-content">
                <?php 
                $contenidoDetallado = $noticia['contenido_detallado'] ?? '';
                
                if (!empty($contenidoDetallado)) {
                    // Convertir saltos de línea a párrafos
                    $paragraphs = explode("\n\n", $contenidoDetallado);
                    foreach ($paragraphs as $paragraph) {
                        if (!empty(trim($paragraph))) {
                            echo '<p>' . nl2br(htmlspecialchars(trim($paragraph))) . '</p>';
                        }
                    }
                } else {
                    echo '<p>Esta noticia está en desarrollo. Pronto tendremos más información detallada.</p>';
                }
                ?>
            </div>
            <div class="news-image-container">
                <?php 
                    $imagenPrincipal = $noticia['imagen_detallada'] ?? $noticia['imagen'] ?? '';
                    if (!empty($imagenPrincipal)) {
                        echo '<img src="' . htmlspecialchars($imagenPrincipal) . '" ';
                        echo 'alt="' . htmlspecialchars($noticia['titulo'] ?? '') . '" ';
                        echo 'class="news-hero-image">';
                    }
                ?>
            </div>
        </div>

        <div class="author-section">
            <div class="author-title">Publicado por</div>
            <div class="author-name"><?php echo htmlspecialchars($noticia['autor'] ?? 'Administrador'); ?></div>
        </div>

        <div class="share-section">
            <button class="share-btn" onclick="compartirNoticia()">
                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="share-icon">
                    <path
                        d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"
                    ></path>
                </svg>    
                Compartir
            </button>
            <button class="viewmore-btn" onclick=irANoticias()>
                <svg class="viewmore-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <g mask="url(#mask0_21_345)">
                        <path d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z"></path>
                    </g>
                </svg>
                Ver más noticias
            </button>
            
        </div>
    </article>
</div>

<script>
function compartirNoticia() {
    if (navigator.share) {
        navigator.share({
            title: '<?php echo addslashes($noticia["titulo"] ?? ""); ?>',
            text: '<?php echo addslashes($noticia["descripcion"] ?? ""); ?>',
            url: window.location.href
        }).catch(console.error);
    } else {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(window.location.href)
                .then(() => alert('URL copiada al portapapeles'))
                .catch(() => alert('Error al copiar URL'));
        } else {
            alert('Función no disponible en este navegador');
        }
    }
}
function irANoticias() {
    window.location.href = '<?php echo __BASE_URL__; ?>news';
}
</script>