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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['logs.chat']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$value = (isset($_POST['value'])) ? $filter->FilterText($_POST['value']) : '';
$typ = (isset($_POST['type'])) ? $filter->FilterText($_POST['type']) : '';
$limit = (isset($_POST['limit'])) ? $filter->FilterText($_POST['limit']) : '';

if(isset($_POST['submit'])){
	if($typ == 'user'){
		if(!$housekeeping->UsernameCheck($value)){
			$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User konnte nicht gefunden werden!</div>';
		} else {
			$username = dbSelect('*', 'users', "WHERE username = '" . $value . "' LIMIT 1");
			$usercheck = $username->fetch_assoc();
			$loginlogs = dbSelectNumRows('*', 'chatlogs', "WHERE user_id = '" . $usercheck['id'] . "' AND room_id != '0'");
			if($loginlogs <= 0){
				$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Leider konnte kein Protokoll gefunden werden!</div>';
			} else {
				$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Das Protokoll wurde gefunden!</div>';
				$housekeeping->hkLogs('Chatlogs', 'Chatlogs gesucht', $user->UserData('id'), $remoteip, $usercheck['id']);
				$result = dbSelect('*', 'chatlogs', "WHERE user_id = '" . $usercheck['id'] . "' AND room_id != '0' ORDER BY id DESC LIMIT " . $limit);
			}
		}
	} elseif($typ == 'room'){
		$loginlogs = dbSelectNumRows('*', 'chatlogs', "WHERE room_id = '" . $value . "'");
		if($loginlogs <= 0){
			$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Leider konnte kein Protokoll gefunden werden!</div>';
		} else {
			$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Das Protokoll wurde gefunden!</div>';
			$housekeeping->hkLogs('Chatlogs', 'Chatlogs mit Raum ID <b>' . $value . '</b> gesucht', $user->UserData('id'), $remoteip);
			$result = dbSelect('*', 'chatlogs', "WHERE room_id = '" . $value . "' ORDER BY id DESC LIMIT " . $limit);
		}
	}
}

$active = 'logs-chat';
$headtitle = 'Logs - Chat';
$toptitle = 'Logs <small>Chat</small>';
$title = 'Logs </li><li class="active">Chat</li>';
require ('./header.php');
?>		
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Logs - Chat - Suchen</h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Entfernen"><i class="fa fa-times"></i></button>
            </div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-4"><b>Username</b> oder <b>Raum ID</b>
				<input class="form-control" value="<?php echo $value; ?>" type="text" name="value">
			</div>
			<div class="col-xs-4"><b>Typ</b>
				<select name="type" class="form-control">
				<option value="user" <?php if($typ == 'user'){ echo 'selected'; } ?>>User</option>
				<option value="room" <?php if($typ == 'room'){ echo 'selected'; } ?>>Raum</option>
				</select>
			</div>
			<div class="col-xs-4"><b>Maximale Eintr&auml;ge</b> (je mehr, desto länger ist der Suchzeit!)
				<select name="limit" class="form-control">
				<option value="50" <?php if($limit == '50'){ echo 'selected'; } ?>>50</option>
				<option value="100" <?php if($limit == '100'){ echo 'selected'; } ?>>100</option>
				<option value="250" <?php if($limit == '250'){ echo 'selected'; } ?>>250</option>
				<option value="500" <?php if($limit == '500'){ echo 'selected'; } ?>>500</option>
				<option value="1000" <?php if($limit == '1000'){ echo 'selected'; } ?>>1000</option>
				<option value="1000000" <?php if($limit == '1000000'){ echo 'selected'; } ?>>alle</option>
				</select>
			</div>
			<div class="col-xs-12" style="margin-top:20px;">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Suchen</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php if(isset($result)){ ?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Logs - Chat - Protokoll</h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Entfernen"><i class="fa fa-times"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="logs" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="10%">Uhrzeit</th>
					<th width="10%">User</th>
					<th width="20%">Raum</th>
					<th width="50%">Nachricht</th>
				</tr>
			</thead>
			<tbody>
		<?php
			while ($row = $result->fetch_array()) {
				$userid = dbSelect('*', 'users', "WHERE id = '" . $row['user_id'] . "' LIMIT 1");
				$user = $userid->fetch_assoc();
				$roomid = dbSelect('*', 'rooms', "WHERE id = '" . $row['room_id'] . "' LIMIT 1");
				$room = $roomid->fetch_assoc();
		?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['timestamp']); ?></td>
					<td><?php echo $user['username']; ?></td>
					<td><?php if($roomid->num_rows > 0){ echo $room['caption']; } else { echo '<small><i>Raum existiert nicht mehr</i></small>'; } ?></td>
					<td><?php echo utf8_decode($row['message']); ?></td>
				</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Uhrzeit</th>
					<th>User</th>
					<th>Raum</th>
					<th>Nachricht</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php } ?>
<?php require ('./footer.php'); ?>