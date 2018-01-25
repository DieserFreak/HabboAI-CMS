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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.vip']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$type = (isset($_POST['type'])) ? $filter->FilterText($_POST['type']) : '';
$username = (isset($_POST['username'])) ? $filter->FilterText($_POST['username']) : '';
$dauer = (isset($_POST['dauer'])) ? $filter->FilterText($_POST['dauer']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		switch($type){
			case "0":
				// Ein User
				$check = dbSelect('*','users', "WHERE username = '" . $username . "' LIMIT 1");
				if($check->num_rows > 0){
					$userid = $check->fetch_assoc();
					$housekeeping->UserVip($userid['id'], $dauer);
					$housekeeping->hkLogs('User VIP', 'User VIP verteilt (<b>Dauer:</b> '.$dauer.' Tag(e))', $user->UserData('id'), $remoteip, $userid['id']);
					$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der User <b>' . $username . '</b> hat erfolgreich ' . $dauer . ' Tag(e) VIP erhalten!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User <b>' . $username . '</b> konnte nicht gefunden werden!</div>';
				}
				break;
			case "1":
				// Alle User
				$housekeeping->UserVipMass('0', '0', $dauer);
				$housekeeping->hkLogs('User VIP', 'User VIP verteilt (Alle User - <b>Dauer:</b> '.$dauer.' Tag(e))', $user->UserData('id'), $remoteip);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Alle User haben erfolgreich ' . $dauer . ' Tag(e) VIP erhalten!</div>';
				break;
			case "2":
				//Alle User online
				$housekeeping->UserVipMass('0', '1', $dauer);
				$housekeeping->hkLogs('User VIP', 'User VIP verteilt (Alle User online - <b>Dauer:</b> '.$dauer.' Tag(e))', $user->UserData('id'), $remoteip);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Alle User Online haben erfolgreich ' . $dauer . ' Tag(e) VIP erhalten!</div>';
				break;
			case "3":
				// Alle VIP Mitglieder
				$housekeeping->UserVipMass('1', '0', $dauer);
				$housekeeping->hkLogs('User VIP', 'User VIP verteilt (Alle VIP Mitglieder - <b>Dauer:</b> '.$dauer.' Tag(e))', $user->UserData('id'), $remoteip);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Alle VIP Mitglieder haben erfolgreich ' . $dauer . ' Tag(e) VIP erhalten!</div>';
				break;
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'user-vip';
$headtitle = 'User - VIP';
$toptitle = 'User <small>VIP</small>';
$title = 'User </li><li class="active">VIP</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - VIP verteilen/verlängern</h3>
		<div class="pull-right box-tools">
			<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-3">
				<div class="input-group">
					<span class="input-group-addon"><b>Typ</b></span>
					<select name="type" class="form-control">
						<option value="0" <?php if($type == '0'){ echo 'selected'; } ?>>Ein User</option>
						<option value="1" <?php if($type == '1'){ echo 'selected'; } ?>>Alle User</option>
						<option value="2" <?php if($type == '2'){ echo 'selected'; } ?>>Alle User online</option>
						<option value="3" <?php if($type == '3'){ echo 'selected'; } ?>>Alle VIP Mitglieder</option>
					</select>
				</div>
			</div>
			
			<div class="col-xs-3">
				<div class="input-group">
					<span class="input-group-addon"><b>Username</b></span>
					<input class="form-control" value="<?php echo $username; ?>" type="text" name="username">
				</div>
				(wenn Typ 'Ein User' ist!)
			</div>
			<div class="col-xs-3">
				<div class="input-group">
					<span class="input-group-addon"><b>Dauer</b></span>
					<select name="dauer" class="form-control">
						<option value="1" <?php if($dauer == '1'){ echo 'selected'; } ?>>1 Tag</option>
						<option value="2" <?php if($dauer == '2'){ echo 'selected'; } ?>>2 Tag</option>
						<option value="3" <?php if($dauer == '3'){ echo 'selected'; } ?>>3 Tag</option>
						<option value="4" <?php if($dauer == '4'){ echo 'selected'; } ?>>4 Tag</option>
						<option value="5" <?php if($dauer == '5'){ echo 'selected'; } ?>>5 Tag</option>
						<option value="6" <?php if($dauer == '6'){ echo 'selected'; } ?>>6 Tag</option>
						<option value="7" <?php if($dauer == '7'){ echo 'selected'; } ?>>1 Woche</option>
						<option value="14" <?php if($dauer == '14'){ echo 'selected'; } ?>>2 Wochen</option>
						<option value="21" <?php if($dauer == '21'){ echo 'selected'; } ?>>3 Wochen</option>
						<option value="30" <?php if($dauer == '30'){ echo 'selected'; } ?>>1 Monat</option>
						<option value="60" <?php if($dauer == '60'){ echo 'selected'; } ?>>2 Monate</option>
						<option value="90" <?php if($dauer == '90'){ echo 'selected'; } ?>>3 Monate</option>
					</select>
				</div>
			</div>
			<div class="col-xs-3">
			<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
			<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">VIP vergeben</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>