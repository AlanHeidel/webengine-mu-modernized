    <?php
//Produccion
// $apiUrl = "http://libertymu2.com/api/news.php";

//Desarrollo
$apiUrl = "http://localhost/liberty-mu.com/api/news.php?type=news";

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

echo '<div class="page-title">Noticias</div>';
echo '<div class="background-universal">';
echo '<div class="news-container">';

    if ($data && $data['success'] && !empty($data['data'])) {
    foreach ($data['data'] as $index => $noticia) {
        // Usar el ID que viene de la API
        $noticiaId = $noticia['id'] ?? 'news-' . $index;
        
        // Imagen por defecto si no hay imagen
        $imagenUrl = !empty($noticia['imagen']) ? 
            $noticia['imagen'] : 
            'https://i.imgur.com/sj5dSQI.jpeg';
        
            echo '<div class="card-slide" data-news-id="' . $noticiaId . '">';
                echo "<div class=\"card-background\" style=\"background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 10%, rgba(0, 0, 0, 0) 30%), url('" . htmlspecialchars($imagenUrl) . "')\"></div>";
                echo '<div class="dynamic-overlay"></div>';
                echo '<div class="card-header">';
                    echo "<div class='category-badge'>". htmlspecialchars($noticia["tipo"]) ."</div>";
                    echo "<h3 class='card-title-visible'>" . htmlspecialchars($noticia["titulo"]) . "</h3>";
                echo '</div>';
                
                echo '<div class="dynamic-content">';
                    echo "<p class='card-description'>";
                        $desc = $noticia["descripcion"] ?? '';
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
                    echo "</p>";

                    


                    echo '<div class="card-meta">';
                        echo "<span class='card-date'>📅"  . htmlspecialchars($noticia["fecha"]) . "</span>";
                        echo '<button class="read-more-btn" onclick="verNoticiaCompleta(\'' . htmlspecialchars($noticiaId) . '\')">Leer Más</button>';
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No hay noticias disponibles.</p>";
        if (!$data) {
            echo '<p>Error: No se pudo decodificar JSON de la API</p>';
        } elseif (!$data['success']) {
                echo '<p>Error de API: ' . htmlspecialchars($data['error'] ?? 'Error desconocido') . '</p>';
            } elseif (empty($data['data'])) {
                    echo '<p>La API no devolvió datos. Count: ' . ($data['count'] ?? 0) . '</p>';
                }
    }
echo '</div>';
echo '</div>';
?>

<script>
function verNoticiaCompleta(noticiaId) {
    window.location.href = '?page=newsdetails&id=' + noticiaId;
}
</script>

