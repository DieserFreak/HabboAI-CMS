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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['system.clean']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_POST['submit_chatlogs'])){
	$timepast = time()-2592000;
	$rowscount = dbSelectNumRows('*', 'chatlogs', "WHERE timestamp < '" . $timepast . "'");
	$housekeeping->hkLogs('Datensätze leeren', 'Chatlogs Datensätze ('.$rowscount.') gelöscht', $user->UserData('id'), $remoteip);
	$delete = dbDelete('chatlogs', "WHERE timestamp < '" . $timepast . "'");
	$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Chatlogs Datensätze ('.$rowscount.') gelöscht!</div>';
}

if(isset($_POST['submit_commandlogs'])){
	$timepast = time()-2592000;
	$rowscount = dbSelectNumRows('*', 'cmdlogs', "WHERE timestamp < '" . $timepast . "'");
	$housekeeping->hkLogs('Datensätze leeren', 'Commandlogs Datensätze ('.$rowscount.') gelöscht', $user->UserData('id'), $remoteip);
	$delete = dbDelete('cmdlogs', "WHERE timestamp < '" . $timepast . "'");
	$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Commandlogs Datensätze ('.$rowscount.') gelöscht!</div>';
}

if(isset($_POST['submit_userroomlogs'])){
	$timepast = time()-2592000;
	$rowscount = dbSelectNumRows('*', 'user_roomvisits', "WHERE entry_timestamp < '" . $timepast . "'");
	$housekeeping->hkLogs('Datensätze leeren', 'Raumbesucherlogs Datensätze ('.$rowscount.') gelöscht', $user->UserData('id'), $remoteip);
	$delete = dbDelete('user_roomvisits', "WHERE entry_timestamp < '" . $timepast . "'");
	$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Raumbesucherlogs Datensätze ('.$rowscount.') gelöscht!</div>';
}

if(isset($_POST['submit_loginlogs'])){
	$timepast = time()-2592000;
	$rowscount = dbSelectNumRows('*', 'cms_login_logs', "WHERE timestamp < '" . $timepast . "'");
	$housekeeping->hkLogs('Datensätze leeren', 'Loginlogs Datensätze ('.$rowscount.') gelöscht', $user->UserData('id'), $remoteip);
	$delete = dbDelete('cms_login_logs', "WHERE timestamp < '" . $timepast . "'");
	$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Loginlogs Datensätze ('.$rowscount.') gelöscht!</div>';
}

if(isset($_POST['submit_onlinelogs'])){
	$timepast = time()-1296000;
	$rowscount = dbSelectNumRows('*', 'online_statistik', "WHERE timestamp < '" . $timepast . "'");
	$housekeeping->hkLogs('Datensätze leeren', 'Onlinelogs Datensätze ('.$rowscount.') gelöscht', $user->UserData('id'), $remoteip);
	$delete = dbDelete('online_statistik', "WHERE timestamp < '" . $timepast . "'");
	$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Onlinelogs Datensätze ('.$rowscount.') gelöscht!</div>';
}

$active = 'system-clean';
$headtitle = 'System - Datensätze leeren';
$toptitle = 'System <small>Datensätze leeren</small>';
$title = 'System </li><li class="active">Datensätze leeren</li>';
require ('./header.php');
?>
<?php if(!empty($msg)){ echo $msg; } ?>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Commandlogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<center>Alle Commandlogs, die älter als 30 Tagen sind, löschen.</center>
			<hr />
			<form method="post">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_commandlogs">Leeren</button>
			</form>
		</div>
	</div>
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Loginlogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<center>Alle Loginlogs, die älter als 30 Tagen sind, löschen.</center>
			<hr />
			<form method="post">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_loginlogs">Leeren</button>
			</form>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Raumbesucherlogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<center>Alle Raumbesucherlogs, die älter als 30 Tagen sind, löschen.</center>
			<hr />
			<form method="post">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_userroomlogs">Leeren</button>
			</form>
		</div>
	</div>
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Onlinelogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<center>Alle Onlinelogs, die älter als 15 Tagen sind, löschen.</center>
			<hr />
			<form method="post">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_onlinelogs">Leeren</button>
			</form>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Chatlogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<center>Alle Chatlogs, die älter als 30 Tagen sind, löschen.</center>
			<hr />
			<form method="post">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_chatlogs">Leeren</button>
			</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>