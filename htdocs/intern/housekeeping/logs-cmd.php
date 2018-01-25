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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['logs.commands']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'logs-cmd';
$headtitle = 'Logs - Commands';
$toptitle = 'Logs <small>Commands</small>';
$title = 'Logs </li><li class="active">Commands</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Logs - Commands</h3>
			<div class="pull-right box-tools">Du hast insgesamt <?php echo dbSelectNumRows('*', 'cmdlogs', "WHERE user_id = '". $user->UserData('id') ."'"); ?> Commands ausgeführt
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="logs" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="10%">User</th>
					<th width="20%">Command / MOD Tool</th>
					<th width="50%">Info</th>
					<th width="15%">Uhrzeit</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$cmdlogs = dbSelectS('*', 'cmdlogs', "ORDER BY id DESC LIMIT 5000");
			while ($row = $cmdlogs->fetch_array()) {
				$userid = dbSelect('*', 'users', "WHERE id = '". $row['user_id'] ."' LIMIT 1");
				$user = $userid->fetch_assoc();
		?>
			<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $user['username']; ?></td>
					<td><?php echo $row['command']; ?></td>
					<td><?php echo $row['extra_data']; ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['timestamp']); ?></td>
				</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>Command / MOD Tool</th>
					<th>Info</th>
					<th>Uhrzeit</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>