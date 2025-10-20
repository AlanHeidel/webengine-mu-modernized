<?php
//test
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// $logFile = '/home2/cwuvhlzc/public_html/includes/cache/cron_debug.txt';
// try {
//     $conn = new PDO("dblib:host=45.235.98.35:1433;dbname=MuOnlineS1", "sa", "Musqlseason6");
//     file_put_contents($logFile, "✅ Conexión exitosa (dblib)\n", FILE_APPEND);
// } catch (PDOException $e) {
//     file_put_contents($logFile, "❌ Error de conexión: " . $e->getMessage() . "\n", FILE_APPEND);
// }
// file_put_contents($logFile, "Inicio cron: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);



// access
define('access', 'cron');

// Load WebEngine
if(!@include_once(str_replace('\\','/',dirname(dirname(__FILE__))).'/' . 'webengine.php')) die('Failed to load WebEngine CMS.');

// Cron List
$cronList = getCronList();
if(!is_array($cronList)) die();

// Encapsulation
function loadCronFile($path) {
	include($path);
}

// Execute Crons
foreach($cronList as $cron) {
	if($cron['cron_status'] != 1) continue;
	if(!check_value($cron['cron_last_run'])) {
		$lastRun = $cron['cron_run_time'];
	} else {
		$lastRun = $cron['cron_last_run']+$cron['cron_run_time'];
	}
	if(time() > $lastRun) {
		$filePath = __PATH_CRON__.$cron['cron_file_run'];
		if(file_exists($filePath)) {
			loadCronFile($filePath);
		}
	}
}