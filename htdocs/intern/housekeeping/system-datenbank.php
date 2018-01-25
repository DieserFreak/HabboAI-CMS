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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['system.datenbank']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'system-datenbank';
$headtitle = 'System - Datenbank';
$toptitle = 'System <small>Datenbank</small>';
$title = 'System </li><li class="active">Datenbank</li>';
require ('./header.php');
?>
<div class="col-md-3">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Datenbank Einträge</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<table width='50%' cellspacing='0' class="table table-hover tablesorter">
				<tr><th colspan="2"><center><b>Client</b></center></td></tr>
				<tr><td width='50%'>Bans</td><td><?php echo dbSelectNumRows('*', 'bans'); ?>x</td></tr>
				<tr><td>Bots</td><td><?php echo dbSelectNumRows('*', 'bots'); ?>x</td></tr>
				<tr><td>Katalog: Items</td><td><?php echo dbSelectNumRows('*', 'catalog_items'); ?>x</td></tr>
				<tr><td>Katalog: LTD</td><td><?php echo dbSelectNumRows('*', 'catalog_ltd'); ?>x</td></tr>
				<tr><td>Katalog: Seite</td><td><?php echo dbSelectNumRows('*', 'catalog_pages'); ?>x</td></tr>
				<tr><td>Chatlogs</td><td><?php echo dbSelectNumRows('*', 'chatlogs'); ?>x</td></tr>
				<tr><td>Möbel</td><td><?php echo dbSelectNumRows('*', 'furniture'); ?>x</td></tr>
				<tr><td>Räume</td><td><?php echo dbSelectNumRows('*', 'rooms'); ?>x</td></tr>
				<tr><td>Wortfilter</td><td><?php echo dbSelectNumRows('*', 'wordfilter'); ?>x</td></tr>				
				<tr><th colspan="2"><center><b>Homepage</b></center></td></tr>
				<tr><td>Events</td><td><?php echo dbSelectNumRows('*', 'cms_events'); ?>x</td></tr>
				<tr><td>News</td><td><?php echo dbSelectNumRows('*', 'cms_news'); ?>x</td></tr>
				<tr><td>Shopbestellungen</td><td><?php echo dbSelectNumRows('*', 'cms_shop_purchase'); ?>x</td></tr>
				<tr><td>Besucher</td><td><?php echo dbSelectNumRows('*', 'cms_visitor_logs'); ?>x</td></tr>
				<tr><th colspan="2"><center><b>Housekeeping</b></center></td></tr>
				<tr><td>Chat</td><td><?php echo dbSelectNumRows('*', 'cms_hk_chat'); ?>x</td></tr>
				<tr><td>Logs</td><td><?php echo dbSelectNumRows('*', 'cms_hk_logs'); ?>x</td></tr>
				<tr><td>Aufgaben</td><td><?php echo dbSelectNumRows('*', 'cms_hk_tasks'); ?>x</td></tr>
				<tr><th colspan="2"><center><b>User</b></center></td></tr>
				<tr><td>User</td><td><?php echo dbSelectNumRows('*', 'users'); ?>x</td></tr>
				<tr><td>Badges</td><td><?php echo dbSelectNumRows('*', 'user_badges'); ?>x</td></tr>
				<tr><td>Haustiere</td><td><?php echo dbSelectNumRows('*', 'user_pets'); ?>x</td></tr>
				<tr><td>Räume besuchen</td><td><?php echo dbSelectNumRows('*', 'user_roomvisits'); ?>x</td></tr>
				<tr><td>Verwarnungen</td><td><?php echo dbSelectNumRows('*', 'user_warning'); ?>x</td></tr>
			</table>
		</div>
	</div>
</div>
<div class="col-md-9">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Datenbank</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
		<?php 
			$db = $mysqli->query("SHOW TABLES");

			while ($rowdb = $db->fetch_array()) {
				echo '<b>Tabelle:</b> '.$rowdb[0].'<br /><u>Spalten</u>: ';
				$colums = $mysqli->query("SHOW COLUMNS FROM ".$rowdb[0]."");

				while ($rowcolum = $colums->fetch_array()) {
					echo $rowcolum[0].' <big>|</big> ';
					
				}
				echo '<hr />';
			}

		?>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>