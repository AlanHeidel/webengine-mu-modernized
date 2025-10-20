<?php

if(!isLoggedIn()) redirect(1,'login');

echo '<div class="page-title"><span>'.lang('module_titles_txt_4').'</span></div>';

// module status
if(!mconfig('active')) throw new Exception(lang('error_47'));
	
// common class
$common = new common();

// Retrieve Account Information
$accountInfo = $common->accountInformation($_SESSION['userid']);
if(!is_array($accountInfo)) throw new Exception(lang('error_12'));

# account online status
$onlineStatus = ($common->accountOnline($_SESSION['username']) ? '<span class="label label-success">'.lang('myaccount_txt_9').'</span>' : '<span class="label label-danger">'.lang('myaccount_txt_10').'</span>');

# account status
$accountStatus = ($accountInfo[_CLMN_BLOCCODE_] == 1 ? '<span class="label label-danger">'.lang('myaccount_txt_8').'</span>' : '<span class="label label-default">'.lang('myaccount_txt_7').'</span>');

# characters info
$Character = new Character();
$AccountCharacters = $Character->AccountCharacter($_SESSION['username']);

// Account Information
echo '<div class="myaccount-container">';
echo '<div class="myaccount-card card shadow-lg rounded-3 overflow-hidden">';
	echo '<div class="card-header-myaccount bg-primary text-white fw-bold">';
		echo '<h5 class="text-center">Información de tu cuenta</h5>'; 
	echo '</div>';
	echo '<div class="card-body p-0">';
		echo '<table class="table text-white table-hover table-borderless align-middle mb-0">';
			echo '<tbody>';
				echo '<tr>';
					echo '<th scope="row">'.lang('myaccount_txt_1').'</th>';
					echo '<td>'.$accountStatus.'</td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th scope="row">'.lang('myaccount_txt_2').'</th>';
					echo '<td>'.$accountInfo[_CLMN_USERNM_].'</td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th scope="row">'.lang('myaccount_txt_3').'</th>';
					echo '<td>'.$accountInfo[_CLMN_EMAIL_].' 
						<a href="'.__BASE_URL__.'usercp/myemail/" class="btn btn-sm btn-outline-primary float-end">'.lang('myaccount_txt_6').'</a></td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th scope="row">'.lang('myaccount_txt_4').'</th>';
					echo '<td>&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226; 
						<a href="'.__BASE_URL__.'usercp/mypassword/" class="btn btn-sm btn-outline-primary float-end">'.lang('myaccount_txt_6').'</a></td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th scope="row">'.lang('myaccount_txt_5').'</th>';
					echo '<td>'.$onlineStatus.'</td>';
				echo '</tr>';
				
				try {
					$creditSystem = new CreditSystem();
					$creditCofigList = $creditSystem->showConfigs();
					if(is_array($creditCofigList)) {
						foreach($creditCofigList as $myCredits) {
							if(!$myCredits['config_display']) continue;
							
							$creditSystem->setConfigId($myCredits['config_id']);
							switch($myCredits['config_user_col_id']) {
								case 'userid':
									$creditSystem->setIdentifier($accountInfo[_CLMN_MEMBID_]);
									break;
								case 'username':
									$creditSystem->setIdentifier($accountInfo[_CLMN_USERNM_]);
									break;
								case 'email':
									$creditSystem->setIdentifier($accountInfo[_CLMN_EMAIL_]);
									break;
								default:
									continue 2;
							}
							
							$configCredits = $creditSystem->getCredits();
							
							echo '<tr>';
								echo '<th scope="row">'.$myCredits['config_title'].'</th>';
								echo '<td>'.number_format($configCredits).'</td>';
							echo '</tr>';
						}
					}
				} catch(Exception $ex) {}
			echo '</tbody>';
		echo '</table>';
	echo '</div>';
echo '</div>';

// Account Characters
echo '<div class="page-title-myaccount"><span>'.lang('myaccount_txt_15').'</span></div>';
if(is_array($AccountCharacters)) {
	$onlineCharacters = loadCache('online_characters.cache') ? loadCache('online_characters.cache') : array();
	echo '<div class="character-list column text-center">';
		foreach($AccountCharacters as $characterName) {
			$characterData = $Character->CharacterData($characterName);
			if(!is_array($characterData)) continue;
			
			if(defined('_TBL_MASTERLVL_')) {
				if(_TBL_MASTERLVL_ != _TBL_CHR_) {
					$characterMLData = $Character->getMasterLevelInfo($characterName);
					if(is_array($characterMLData)) {
						$characterData[_CLMN_CHR_LVL_] += $characterMLData[_CLMN_ML_LVL_];
					}
				} else {
					$characterData[_CLMN_CHR_LVL_] += $characterData[_CLMN_ML_LVL_];
				}
			}
			
			$characterClassAvatar = getPlayerClassAvatar($characterData[_CLMN_CHR_CLASS_], false);
			$characterOnlineStatus = in_array($characterName, $onlineCharacters) ? '<img src="'.__PATH_ONLINE_STATUS__.'" class="online-status-indicator"/>' : '<img src="'.__PATH_OFFLINE_STATUS__.'" class="online-status-indicator"/>';
			echo '<div class="col-xl-6">';
				echo '<div class="myaccount-character-name text-primary">'.playerProfile($characterName).$characterOnlineStatus.'</div>';
				echo '<div class="myaccount-character-block">';
					echo '<a href="'.__BASE_URL__.'profile/player/req/'.$characterName.'" target="_blank">';
						echo '<img src="'.$characterClassAvatar.'" />';
					echo '</a>';
				echo '</div>';
				echo '<div class="myaccount-character-block-location text-muted">'.returnMapName($characterData[_CLMN_CHR_MAP_]).'<br />'.$characterData[_CLMN_CHR_MAP_X_].', '.$characterData[_CLMN_CHR_MAP_Y_].'</div>';
				echo '<span class="myaccount-character-block-level text-white">'.$characterData[_CLMN_CHR_LVL_].'</span>';
			echo '</div>';
		}
	echo '</div>';
} else {
	message('warning', lang('error_46'));
}

// Connection History (IGCN)
if(defined('_TBL_CH_')) {
	echo '<div class="page-title"><span>'.lang('myaccount_txt_16').'</span></div>';
	$me = Connection::Database('Me_MuOnline');
	$connectionHistory = $me->query_fetch("SELECT TOP 10 * FROM "._TBL_CH_." WHERE "._CLMN_CH_ACCID_." = ? ORDER BY "._CLMN_CH_ID_." DESC", array($_SESSION['username']));
	if(is_array($connectionHistory)) {
		echo '<table class="table table-condensed general-table-ui">';
			echo '<tr>';
				echo '<td>'.lang('myaccount_txt_13').'</td>';
				echo '<td>'.lang('myaccount_txt_17').'</td>';
				echo '<td>'.lang('myaccount_txt_18').'</td>';
				echo '<td>'.lang('myaccount_txt_19').'</td>';
			echo '</tr>';
			foreach($connectionHistory as $row) {
				echo '<tr>';
					echo '<td>'.$row[_CLMN_CH_DATE_].'</td>';
					echo '<td>'.$row[_CLMN_CH_SRVNM_].'</td>';
					echo '<td>'.$row[_CLMN_CH_IP_].'</td>';
					echo '<td>'.$row[_CLMN_CH_STATE_].'</td>';
				echo '</tr>';
			}
		echo '</table>';
	}
}

echo '</div>';