<?php
//CONSUMIR API DE NOTICIAS
	//Produccion:
	$apiUrl = "http://libertymu2.com/api/news.php?type=avisos";
	//Desarrollo:
	// $apiUrl = "http://localhost/liberty-mu.com/api/news.php?type=avisos";
	$response = file_get_contents($apiUrl);
	$data = json_decode($response, true);
	$totalAvisos = $data['count'] ?? 0;

if(!defined('access') or !access) die();
include('inc/template.functions.php');

$disabledSidebar = array(
	'rankings',
);

$serverInfoCache = LoadCacheData('server_info.cache');
if(is_array($serverInfoCache)) {
	$srvInfo = explode("|", $serverInfoCache[1][0]);
}

$maxOnline = config('maximum_online', true);
$onlinePlayers = check_value($srvInfo[3]) ? $srvInfo[3] : 0;
$onlinePlayersPercent = check_value($maxOnline) ? $onlinePlayers*100/$maxOnline : 0;

$ColorTemplate = config('color_template',true);
$ColorTemplateAlpha = config('color_template',true)."80";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php $handler->websiteTitle(); ?></title>
		<meta name="generator" content="WebEngine <?php echo __WEBENGINE_VERSION__; ?>"/>
		<meta name="author" content="Lautaro Angelico"/>
		<meta name="description" content="<?php config('website_meta_description'); ?>"/>
		<meta name="keywords" content="<?php config('website_meta_keywords'); ?>"/>
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?php $handler->websiteTitle(); ?>" />
		<meta property="og:description" content="<?php config('website_meta_description'); ?>" />
		<meta property="og:image" content="<?php echo __PATH_IMG__; ?>webengine.jpg" />
		<meta property="og:url" content="<?php echo __BASE_URL__; ?>" />
		<meta property="og:site_name" content="<?php $handler->websiteTitle(); ?>" />
		<link rel="shortcut icon" href="<?php echo __PATH_TEMPLATE__; ?>favicon.ico"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display&family=Uncial+Antiqua&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
		<link href="<?php echo __PATH_TEMPLATE_CSS__; ?>style.css?v=1.0.2" rel="stylesheet" media="screen">
		<link href="<?php echo __PATH_TEMPLATE_CSS__; ?>profiles.css" rel="stylesheet" media="screen">
		<link href="<?php echo __PATH_TEMPLATE_CSS__; ?>castle-siege.css" rel="stylesheet" media="screen">
		<link href="<?php echo __PATH_TEMPLATE_CSS__; ?>override.css" rel="stylesheet" media="screen">

		<script>
			var baseUrl = '<?php echo __BASE_URL__; ?>';
			var ColorTemplate = '<?php echo $ColorTemplate;?>';
			var rootElement = document.documentElement;
			rootElement.style.setProperty("--ColorTemplate", ColorTemplate);
			rootElement.style.setProperty("--ColorTemplateAlpha", ColorTemplateAlpha);
		</script>
	</head>
	<body>
	<script src="<?php echo __PATH_TEMPLATE_JS__; ?>tooltip.js"></script>
	<video autoplay muted loop playsinline preload="auto" id="bg-video">
					<source src="<?php echo __PATH_TEMPLATE_IMG__; ?>videobackground.mp4" type="video/mp4">
				</video>

	<div class="header-info-container">
		<div class="header-info">
			<div class="navbar-left">
				<div class="navbar-logo">
					<a href="<?php echo __BASE_URL__; ?>">
						<img class="webengine-mu-logo-navbar" src="<?php echo __PATH_TEMPLATE_IMG__; ?>logo.webp" title="<?php config('server_name'); ?>"/>
					</a>
				</div>
				<div class="navbar-desktop">
					<?php templateBuildNavbar(); ?>
				</div>
			</div>
			<div class="navbar-buttons-desktop">
				<?php if(isLoggedIn()) { ?>
					<a class="signin-myaccount-button" href="<?php echo __BASE_URL__; ?>usercp/"><?php echo lang('menu_txt_5'); ?></a>
					<a class="login-logout-button" href="<?php echo __BASE_URL__; ?>logout/" class="logout"><?php echo lang('menu_txt_6'); ?></a>
					<?php } else { ?>
						<a class="signin-myaccount-button" href="<?php echo __BASE_URL__; ?>register/"><?php echo lang('menu_txt_3'); ?></a>
						<a class="login-logout-button" href="<?php echo __BASE_URL__; ?>login/"><?php echo lang('menu_txt_4'); ?></a>
						<?php } ?>
			</div>
			<div class="mobile-menu">
				<button class="burger-button" onClick="toggleMobileMenu()">
            		<span class="top"></span>
            		<span class="middle"></span>
            		<span class="bottom"></span>
        		</button>
				<div class="mobile-menu-content">
					<?php templateBuildNavbar(); ?>
					<div class="navbar-buttons-mobile">
						<?php if(isLoggedIn()) { ?>
							<a class="signin-myaccount-button" href="<?php echo __BASE_URL__; ?>usercp/"><?php echo lang('menu_txt_5'); ?></a>
							<a class="login-logout-button" href="<?php echo __BASE_URL__; ?>logout/" class="logout"><?php echo lang('menu_txt_6'); ?></a>
						<?php } else { ?>
							<a class="signin-myaccount-button" href="<?php echo __BASE_URL__; ?>register/"><?php echo lang('menu_txt_3'); ?></a>
							<a class="login-logout-button" href="<?php echo __BASE_URL__; ?>login/"><?php echo lang('menu_txt_4'); ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<div id="main-content">

	<div class="blur-overlay"></div>
	<!-- Botón Toggle -->
    <div class="notices-toggle">
        <button class="toggle-btn" onclick="toggleNotices()">
            <span class="toggle-icon unicial">AVISOS</span>
			<?php
            echo '<span class="notice-count">' . htmlspecialchars($totalAvisos) . '</span>';
			?>
        </button>
    </div>
	<!-- Panel de Avisos -->
    <div class="notices-panel" id="noticesPanel">
        <button class="close-btn-toggle-notices" onClick=toggleNotices()>
                <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path fill="currentColor" d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/>
    </svg>
            </button>
        <div class="panel-header">
			<div class= "panel-container-title">
				<svg width="28" height="28" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  					<path d="M12 3a6 6 0 0 0-6 6v2.3c0 .6-.24 1.17-.66 1.6L4 14.24c-.9.9-.26 2.46 1.03 2.46H19c1.29 0 1.93-1.56 1.03-2.46l-1.34-1.34a2.27 2.27 0 0 1-.66-1.6V9a6 6 0 0 0-6-6Z"
        				stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
  					<path d="M9.5 18a2.5 2.5 0 0 0 5 0"
        				stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
				</svg>
            	<h2 class="panel-title">
                	Avisos del Administrador
            	</h2>			
			</div>
            <p class="panel-subtitle">Información importante del servidor</p>
        </div>
	<div class="wrapper-panel-content">
		<div class="panel-content">					
		<?php
		if ($data && $data['success'] && !empty($data['data'])) {
		foreach ($data['data'] as $aviso) {
			$icono = $aviso['icono'];
			$titulo = $aviso['titulo'];
			$mensaje = $aviso['mensaje'];
			$fecha = $aviso['fecha'];
			echo '<div class="notice-item urgent">';
				echo '<div class="notice-header">';
					echo '<div class="notice-icon">' . htmlspecialchars($icono) . '</div>';
					echo '<div>';
						echo '<div class="notice-title">' . htmlspecialchars($titulo) . '</div>';
						echo '<div class="notice-time">' . htmlspecialchars($fecha) . '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="notice-message">' . htmlspecialchars($mensaje) . '</div>';
			echo '</div>';
			}
		} else {
			echo "<div class='empty-notices'>";
				echo "<div class='empty-icon'>📭</div>";
				echo "<div>No hay avisos nuevos</div>";
			echo "</div>";
			if (!$data) {
				echo '<p>Error: No se pudo decodificar JSON de la API</p>';
			} elseif (!$data['success']) {
					echo '<p>Error de API: ' . htmlspecialchars($data['error'] ?? 'Error desconocido') . '</p>';
				} elseif (empty($data['data'])) {
						echo '<p>La API no devolvió datos. Count: ' . ($data['count'] ?? 0) . '</p>';
					}
		}
	?>  
			</div>

	</div>
    </div>
    <?php
$page = $_REQUEST['page'] ?? 'home'; // si no hay page, usar 'home'
$subpage = $_REQUEST['subpage'] ?? '';
$handler->loadModule($page, $subpage);
?>
</div>
		<footer class="footer">
			<?php include(__PATH_TEMPLATE_ROOT__ . 'inc/modules/footer.php'); ?>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<script type="text/javascript" src="<?php echo __PATH_TEMPLATE_JS__; ?>datatables.min.js"></script>

		<script>
        $(document).ready(function() {
            $('#RankingGeneral').DataTable({
            lengthChange: false,
            ordering: false,
            "searching": true,
            "pageLength": 100,
            "info": false,
			"bPaginate": false,
            "language": {
                        "sProcessing":     "Procesando...",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "No hay datos disponibles",
                        "sSearch":         "",
                        "sLoadingRecords": "Cargando...",
                        "sSearchPlaceholder":    "Buscador",
                        "oAria": {
                            "sSortAscending":  ": Ordena la columna de forma ascendente",
                            "sSortDescending": ": Ordena la columna de forma descendente"
                        },
                        "paginate": {
                                    "next":       "Siguiente",
                                    "previous":   "Anterior"
                        },
                    }
            });
        } );
    </script>

		<script src="<?php echo __PATH_TEMPLATE_JS__; ?>main.js?v=1.0.2"></script>
		<script src="<?php echo __PATH_TEMPLATE_JS__; ?>tooltip.js"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		
		<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
	</body>
</html>