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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['rules']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'rules';
$headtitle = 'Regeln';
$toptitle = 'Housekeeping <small>Regeln</small>';
$title = 'Housekeeping </li><li class="active">Regeln</li>';
require ('./header.php');
?>
<section class="content invoice">
<h1>Die neusten Badges aus dem Habbo.DE</h1><br>
Hier findest du die 30 neusten Badges aus dem offiziellen Habbo.DE<br>Rechtsklicke ein Badge und speichere es, anschliessend kannst du dieses &uuml;ber unser Badgeuploader hochladen und beschriften.<br><br>
<?php 
	$badges = json_decode( file_get_contents( 'http://habboemotion.com/api/badge' ), true ); 
	echo $badges['count'] . ' Badges gefunden, nur 30 werden angezeigt.<br /><br />'; 
	for( $i = 0; $i < 30; $i++ ) { // Replace the 10 with the amount of badges you want to appear, 30 max. 
		echo '<div style="width:100px;height:100px;margin:10px;float:left;text-align:center"><img src="http://habboo-a.akamaihd.net/c_images/album1584/' . $badges['list'][$i]['code'] . '.gif" alt="" title=" ' . $badges['list'][$i]['desc'] . ' (' . date( "j/n/Y", $badges['list'][$i]['date'] ) . ')" /><br />' . $badges['list'][$i]['name'] . '</div>'; 
	} 
?>

<?php require ('./footer.php'); ?>