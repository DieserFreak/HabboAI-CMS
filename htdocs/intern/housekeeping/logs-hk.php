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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['logs.housekeeping']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'logs-hk';
$headtitle = 'Logs - Housekeeping';
$toptitle = 'Logs <small>Housekeeping</small>';
$title = 'Logs </li><li class="active">Housekeeping</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Logs - Housekeeping</h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<div id="logdetailtext"></div>
		<table id="logs" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="20%">Aktion</th>
					<th width="25%">Info</th>
					<th width="11%">User</th>
					<th width="13%">User IP</th>
					<th width="11%">gezielte User</th>
					<th width="10%">Uhrzeit</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$hklogs = dbSelectS('*', 'cms_hk_logs', "ORDER BY id DESC LIMIT 5000");
			while ($row = $hklogs->fetch_array()) {
				$userid = dbSelect('*', 'users', "WHERE id = '". $row['user_id'] ."' LIMIT 1");
				$user = $userid->fetch_assoc();
				if($row['target_id'] != 0){ 
					$targetid = dbSelect('*', 'users', "WHERE id = '". $row['target_id'] ."' LIMIT 1");
					$target = $targetid->fetch_assoc();
				}
		?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['action']; ?></td>
					<td><?php echo $row['message']; ?> <?php if(!empty($row['details'])){ echo '<small><a data-toggle="modal" data-target="#detail-'.$row['id'].'">[INFO]</a></small>'; } ?></td>
					<td><?php echo $user['username']; ?></td>
					<td><?php echo $row['user_ip']; ?></td>
					<td><?php if($row['target_id'] != 0){ echo $target['username']; } else { echo'<i>keine</i>'; } ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['timestamp']); ?></td>
				</tr>
				<div class="modal fade" id="detail-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><?php echo $row['details']; ?></div><div class="modal-footer clearfix"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Schließen</button></div></div></div></div>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Aktion</th>
					<th>Info</th>
					<th>User</th>
					<th>User IP</th>
					<th>gezielte User</th>
					<th>Uhrzeit</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>