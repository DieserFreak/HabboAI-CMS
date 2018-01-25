<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */
 
header('Content-Type: text/html; charset=UTF-8');
require ('../../inc/base.inc.php');
require ('../../inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.autorare']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'client-autorare';
$headtitle = 'Client - Automatische Rareänderung';
$toptitle = 'Client <small>Automatische Rareänderung</small>';
$title = 'Client </li><li class="active">Automatische Rareänderung</li>';
require ('./header.php');
?>
Coming Soon
<?php require ('./footer.php'); ?>