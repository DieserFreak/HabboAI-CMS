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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['system.server']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'system-server';
$headtitle = 'System - Server';
$toptitle = 'System <small>Server</small>';
$title = 'System </li><li class="active">Server</li>';
require ('./header.php');
?>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Server Informationen</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<table width='50%' cellspacing='0' class="table table-hover tablesorter">
				<tr><td width='30%'>Computername</td><td><?php echo $_SERVER['COMPUTERNAME']; ?></td></tr>
				<tr><td width='30%'>Betriebssystem</td><td><?php echo $_SERVER['OS']; ?></td></tr>
				<tr><td width='30%'>Prozessor</td><td><?php echo $_SERVER['PROCESSOR_ARCHITEW6432']; ?></td></tr>
				<tr><td width='30%'>Anzahl Prozessoren</td><td><?php echo $_SERVER['NUMBER_OF_PROCESSORS']; ?></td></tr>
				<tr><td width='30%'>Prozessor BIT</td><td><?php echo $_SERVER['PROCESSOR_ARCHITECTURE']; ?></td></tr>
			</table>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Webserver</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<table width='50%' cellspacing='0' class="table table-hover tablesorter">
				<tr><td width='30%'>PHP Version</td><td><?php echo phpversion(); ?></td></tr>
				<tr><td width='30%'>MySQL Version</td><td><?php echo mysql_get_client_info(); ?></td></tr>
				<tr><td width='30%'>Software</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td></tr>
				<tr><td width='30%'>Port</td><td><?php echo $_SERVER['SERVER_PORT']; ?></td></tr>
				<tr><td width='30%'>Protokoll</td><td><?php echo $_SERVER['SERVER_PROTOCOL']; ?></td></tr>
				<tr><td width='30%'>Path</td><td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td></tr>
				<tr><td width='30%'>FAST CGI max. Request</td><td><?php echo $_SERVER['PHP_FCGI_MAX_REQUESTS']; ?></td></tr>
				<tr><td width='30%'>HTTPS</td><td><?php echo $_SERVER['HTTPS']; ?></td></tr>
			</table>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Emulator</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<table width='50%' cellspacing='0' class="table table-hover tablesorter">
				<tr><td width='30%'>Emulator Version</td><td><?php echo $core->ServerStatus('server_ver');?></td></tr>
				<tr><td width='30%'>Status</td><td><?php if($core->ServerStatus('status') == 1){ echo '<font color="green"><b>Online</b></font>'; } else { echo '<font color="red"><b>Offline</b></font>'; }?></td></tr>
				<tr><td width='30%'>User Online</td><td><?php echo $core->ServerStatus('users_online');?></td></tr>
				<tr><td width='30%'>Räume geladen</td><td><?php echo $core->ServerStatus('rooms_loaded');?></td></tr>
				<tr><td width='30%'>Uuletzt aktualisiert</td><td><?php echo $core->lasttimeword($core->ServerStatus('stamp'));?></td></tr>
			</table>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>