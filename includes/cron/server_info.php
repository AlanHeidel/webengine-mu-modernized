<?php
//test
// $logFile = '/home2/cwuvhlzc/public_html/includes/cache/cron_debug.txt';
// file_put_contents('/home2/cwuvhlzc/public_html/includes/cache/cron_debug.txt', "Estoy en server_info\n", FILE_APPEND);
// file_put_contents($logFile, "📌 Ejecutando cron interno server_info X\n", FILE_APPEND);


// File Name
$file_name = basename(__FILE__);

// load databases
$mu = Connection::Database('MuOnline');
$me = Connection::Database('Me_MuOnline');

# total accounts
$totalAccounts = 0;
$countAccounts = $me->query_fetch_single("SELECT COUNT(*) as totalAccounts FROM "._TBL_MI_);
if(is_array($countAccounts)) $totalAccounts = $countAccounts['totalAccounts'];
$serverInfo[] = $totalAccounts;

# total characters
$totalCharacters = 0;
$countCharacters = $mu->query_fetch_single("SELECT COUNT(*) as totalCharacters FROM "._TBL_CHR_);
if(is_array($countCharacters)) $totalCharacters = $countCharacters['totalCharacters'];
$serverInfo[] = $totalCharacters;

# total guilds
$totalGuilds = 0;
$countGuilds = $mu->query_fetch_single("SELECT COUNT(*) as totalGuilds FROM "._TBL_GUILD_);
if(is_array($countGuilds)) $totalGuilds = $countGuilds['totalGuilds'];
$serverInfo[] = $totalGuilds;

# total online
$totalOnline = 0;
$countOnline = $me->query_fetch_single("SELECT COUNT(*) as totalOnline FROM "._TBL_MS_." WHERE "._CLMN_CONNSTAT_." = 1");
if(is_array($countOnline)) $totalOnline = $countOnline['totalOnline'];
$serverInfo[] = $totalOnline;
	
if(is_array($serverInfo)) {
	$cacheDATA = implode("|",$serverInfo);
	UpdateCache('server_info.cache',$cacheDATA);
}

// UPDATE CRON
updateCronLastRun($file_name);