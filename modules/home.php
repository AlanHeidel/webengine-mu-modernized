<?php 
	//DESCOMENTAR LA SIGUIENTE LINEA PARA ACTIVAR EL CHECKEO DEL SERVER
	// $serverStatus = CheckGS(config('ip_game_server',true), config('port_game_server',true));
	//LA SIGUIENTE LINEA FUERZA EL ESTADO DEL SERVER A ONLINE
	$serverStatus = true;

	$disabledSidebar = array(
	'rankings',);
	$serverInfoCache = LoadCacheData('server_info.cache');
	if(is_array($serverInfoCache)) {
		$srvInfo = explode("|", $serverInfoCache[1][0]);
	}
	$maxOnline = config('maximum_online', true);
	$onlinePlayers = check_value($srvInfo[3]) ? $srvInfo[3] : 0;
	$onlinePlayersPercent = check_value($maxOnline) ? $onlinePlayers*100/$maxOnline : 0;

	//Descargas
	$downloadsCACHE = loadCache('downloads.cache');
$downloadCLIENTS = [];

if(is_array($downloadsCACHE)) {
    foreach($downloadsCACHE as $tempDownloadsData) {
        if($tempDownloadsData['download_type'] == 1) {
            $downloadCLIENTS[] = $tempDownloadsData;
        }
    }
}
?>
		<div id="header">
			<div class="logo-container">
				<a href="<?php echo __BASE_URL__; ?>">
					<img class="webengine-mu-logo" src="<?php echo __PATH_TEMPLATE_IMG__; ?>logo.webp" title="<?php config('server_name'); ?>"/>
				</a>
			</div>
			<div class="download-discord-container">
				<?php	
				echo '<a class="download-button" href="'.$downloadCLIENTS[0]['download_link'].'" target="_blank">';
					echo '<button class="button" type="button">';
	  echo '<span class="button__text">Descargar</span>';
	  echo '<span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>';
	echo '</button>';
				echo '</a>';
				?>
				<div class="contact-container">
		<div class="divider">
			  <h6>Encontranos en:</h6>
		</div>
		<div class="discord-container">
			<div class="card-contact">	
			  <a href="https://discord.gg/Vtcktf7jB7" target=blank class="social-link3">
				<svg viewBox="0 0 16 16" class="bi bi-discord" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" style="color: white"> <path fill="white" d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"></path> </svg>
			  </a>
	  <a href="https://chat.whatsapp.com/L2uG4fYamerFJv6IoRmOel?mode=ems_copy_t" target=blank class="social-link4">
		<svg viewBox="0 0 16 16" class="bi bi-whatsapp" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" style="color: white"> <path fill="white" d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path> </svg>
	  </a>
	</div>                 
		</div>
	</div>
			</div>
		</div>
		</div>
		<div class="content">
		<div class="sub-header">
			<?php echo '<center><div class="sidebar-banner"><a href="'.__BASE_URL__.'register"><img src="'.__PATH_TEMPLATE_IMG__.'sidebar_banner_join.webp"/></a></div></center>';?>
		  <?php echo '<center><div class="sidebar-banner"><a href="'.__BASE_URL__.'downloads"><img src="'.__PATH_TEMPLATE_IMG__.'sidebar_banner_download.webp"/></a></div></center>'; ?>
		</div>
		
		<div class="server-info-container">
			<div class="server-info-header">
				<h1>NUESTRO SERVIDOR Y RANKINGS</h1>
			</div>
			<div class="server-info-content">
			<?php
			echo '<div class="card-home bg-dark">';
		echo '<div class="card-header-home text-white bg-primary">';
			echo '<i class="fas fa-info-circle"></i> '.lang('sidebar_srvinfo_txt_1').'';
		echo '</div>';
		echo '<div class="card-body" style="padding:unset !important;">';
			echo '<table class="table text-white">';
				if(check_value(config('server_info_season', true))) echo '<tr><td style="width:1%;text-align:center;"><i class="fa-solid fa-check-to-slot"></i></td><td> '.lang('sidebar_srvinfo_txt_6').'</td><td>'.config('server_info_season', true).'</td></tr>';
				if(check_value(config('server_info_exp', true))) echo '<tr><td style="width:1%;text-align:center;"><i class="fa-solid fa-square-poll-horizontal"></i></td><td> '.lang('sidebar_srvinfo_txt_7').'</td><td>'.config('server_info_exp', true).'</td></tr>';	
				if(check_value(config('server_info_drop', true))) echo '<tr><td style="width:1%;text-align:center;"><i class="fas fa-tint"></i></td> <td>'.lang('sidebar_srvinfo_txt_9').'</td><td>'.config('server_info_drop', true).'</td></tr>';
				echo '<tr><td style="width:1%;text-align:center;"><i class="fa-solid fa-square-pen"></i></td><td>'.lang('sidebar_srvinfo_txt_2').'</td><td style="font-weight:bold;">'.number_format($srvInfo[0]).'</td></tr>';
				echo '<tr><td style="width:1%;text-align:center;"><i class="fas fa-user-friends"></i></td><td>'.lang('sidebar_srvinfo_txt_3').'</td><td style="font-weight:bold;">'.number_format($srvInfo[1]).'</td></tr>';
				echo '<tr><td style="width:1%;text-align:center;"><i class="fas fa-shield-alt"></i></td><td>'.lang('sidebar_srvinfo_txt_4').'</td><td style="font-weight:bold;">'.number_format($srvInfo[2]).'</td></tr>';
				if(check_value(config('maximum_online', true))) echo '<tr><td style="width:1%;text-align:center;"><i class="fas fa-signal"></i></td><td> '.lang('sidebar_srvinfo_txt_5').'</td><td style="font-weight:bold;" class="text-primary">'.number_format($onlinePlayers + 15).'</td></tr>';
				if($serverStatus == true){
					echo '<tr><td style="width:1%;text-align:center;" class="align-middle"><i class="fa-solid fa-server"></i></td><td class="align-middle">Estado del Servidor</td><td style="font-weight:bold;" class="align-middle"><div class="spinner-grow spinner-grow-sm text-success" role="status"><span class="visually-hidden">Online...</span></div> <span class="text-success">Online</span></td></tr>';
				} 
				else {
					echo '<tr><td style="width:1%;text-align:center;" class="align-middle"><i class="fa-solid fa-server"></i></td><td class="align-middle">Estado del Servidor</td><td style="font-weight:bold;" class="align-middle"><div class="spinner-grow spinner-grow-sm text-danger" role="status"><span class="visually-hidden">Offline...</span></div> <span class="text-danger">Offline</span></td></tr>';
				}
			echo '</table>';
		echo '</div>';
	echo '</div>';
	$GuildRankingData = LoadCacheData('rankings_guilds.cache');
$topGuildLimit = 5;
	echo '<div class="card-home bg-dark">';
		echo '<div class="card-header-home text-white bg-primary">';
			echo '<i class="fa-solid fa-trophy"></i> '.lang('rankings_txt_4').'';
		echo '</div>';
		echo '<div class="card-body" style="padding:unset !important;">';
				echo '<table class="table text-white table-striped">';
				echo '<thead class="table-dark">';
					echo '<tr>';
						echo '<th class="text-center"><i class="fa-solid fa-shield"></i> Guild</th>'; // Guild
						echo '<th class="text-center"><i class="fa-solid fa-user-shield"></i> Master</th>'; // Master
						echo '<th class="text-center"><i class="fa-solid fa-bolt"></i> '.lang('rankings_txt_19').'</th>'; // Score
					echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				if(is_array($GuildRankingData)) {
					$topGuild = array_slice($GuildRankingData, 0, $topGuildLimit+1);
						foreach($topGuild as $key => $row) {
							if($key == 0) continue;
							echo '<tr>';
								echo '<td class="text-start ps-3 align-middle">'.returnGuildLogo($row[3], 30).' '.guildProfile($row[0]).'</td>';
								echo '<td class="text-center align-middle">'.playerProfile($row[1]).'</td>';
								echo '<td class="text-center align-middle">'.number_format($row[2],0,",",".").'</td>';
							echo '</tr>';
						}
					}
			echo '</tbody>';
			echo '</table>';
			echo '<div class="card-footer text-center bg-dark">';
				echo '<a href="'.__BASE_URL__.'rankings/guilds" class="btn btn-primary btn-sm">Ver Mas</a>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	?>
			</div>
		</div>

		<div class='new-items-container'>
			<div class='new-items-title'>
			<h1>NUEVOS SET'S PARA TODAS LAS RAZAS</h1>
			<h4>Y muchos items mas...</h3>
			</div>
			<div class='sets-container'>
				<div class='brave'>
					<img src="<?php echo __PATH_TEMPLATE_IMG__; ?>brave.gif" alt="Animated gif"/>
				</div>
				<div class='hades'>
					<img src="<?php echo __PATH_TEMPLATE_IMG__; ?>hades.gif" alt="Animated gif"/>
				</div>
				<div class='seraphim'>
					<img src="<?php echo __PATH_TEMPLATE_IMG__; ?>seraphim.gif" alt="Animated gif"/>
				</div>
				<div class='phantom'>
					<img src="<?php echo __PATH_TEMPLATE_IMG__; ?>phantom.gif" alt="Animated gif"/>
				</div>
			</div>
			<button class="learn-more" onClick="location.href='<?php echo __BASE_URL__; ?>news'">
  				<span class="circle" aria-hidden="true">
  					<span class="icon arrow"></span>
  				</span>
  				<span class="button-text">Mas Noticias</span>
			</button>
		</div>

		</div>