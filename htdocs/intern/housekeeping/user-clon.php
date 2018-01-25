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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.clon']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$value = (isset($_POST['value'])) ? $filter->FilterText($_POST['value']) : '';
$type = (isset($_POST['type'])) ? $filter->FilterText($_POST['type']) : '';

if(isset($_POST['submit'])){
	if($type == 'user'){
		$username = dbSelect('*', 'users', "WHERE username = '" . $value . "' LIMIT 1");
		$usercheck = $username->fetch_assoc();
		$userclon = dbSelectNumRows('*', 'users', "WHERE ip_reg = '" . $usercheck['ip_reg'] . "' OR ip_last = '" . $usercheck['ip_last'] . "'");
		if($userclon <= 0){
			$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User <b>' . $value . '</b> konnte nicht gefunden werden!</div>';
		} else {
			$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> User <b>' . $value . '</b> Kloncheck!</div>';
			$housekeeping->hkLogs('User Kloncheck', 'Kloncheck gesucht', $user->UserData('id'), $remoteip, $usercheck['id']);
			$result = dbSelect('*', 'users', "WHERE ip_reg = '" . $usercheck['ip_reg'] . "' OR ip_last = '" . $usercheck['ip_last'] . "' ORDER BY id DESC");
		}
	} elseif($type == 'ip'){
		$userclon = dbSelectNumRows('*', 'users', "WHERE ip_reg = '" . $value . "' OR ip_last = '" . $value . "'");
		if($userclon <= 0){
			$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> IP <b>' . $value . '</b> konnte nicht gefunden werden!</div>';
		} else {
			$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> IP <b>' . $value . '</b> Kloncheck!</div>';
			$housekeeping->hkLogs('User Kloncheck', 'Kloncheck mit IP <b>' . $value . '</b> gesucht', $user->UserData('id'), $remoteip);
			$result = dbSelect('*', 'users', "WHERE ip_reg = '" . $value . "' OR ip_last = '" . $value . "' ORDER BY id DESC");
		}
	}
}

$active = 'user-clon';
$headtitle = 'User - Kloncheck';
$toptitle = 'User <small>Kloncheck</small>';
$title = 'User </li><li class="active">Kloncheck</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Kloncheck - Suchen</h3>   
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Entfernen"><i class="fa fa-times"></i></button>
            </div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-5">
				<div class="input-group">
					<span class="input-group-addon"><b>Username</b> oder <b>IP</b></span>
					<input class="form-control" value="<?php echo $value; ?>" type="text" name="value">
				</div>
			</div>
			<div class="col-xs-3">
				<div class="input-group">
					<span class="input-group-addon">Typ:</span>
					<select name="type" class="form-control">
					<option value="user" <?php if($type == 'user'){ echo 'selected'; } ?>>User</option>
					<option value="ip" <?php if($type == 'ip'){ echo 'selected'; } ?>>IP</option>
					</select>
				</div>
			</div>
			<div class="col-xs-4">
			<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Suchen</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php if(isset($result)){ ?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Kloncheck - Ergebnis</h3>      
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Entfernen"><i class="fa fa-times"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="userlist" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="10%">User</th>
					<th width="10%">E-Mail</th>
					<th width="10%">registrierte IP</th>
					<th width="10%">letzter IP</th>
					<th width="15%">registrierte Datum</th>
					<th width="15%">zuletzt Online</th>
					<th width="5%">Bann</th>
				</tr>
			</thead>
			<tbody>
		<?php
			while ($row = $result->fetch_array()) {
				$userban = dbSelectNumRows('*', 'bans', "WHERE value = '" . $row['username'] . "' AND expire > '".time()."'");
		?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['mail']; ?></td>
					<td><?php echo $row['ip_reg']; ?></td>
					<td><?php echo $row['ip_last']; ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['account_created']); ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['last_online']); ?></td>
					<td><?php if($userban > 0){ echo '<font color="green">Ja</font>'; } else { echo '<font color="red">Nein</font>'; } ?></td>
				</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>E-Mail</th>
					<th>registrierte IP</th>
					<th>letzter IP</th>
					<th>registrierte Datum</th>
					<th>zuletzt Online</th>
					<th>Bann</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php } ?>
<?php require ('./footer.php'); ?>