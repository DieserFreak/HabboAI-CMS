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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.badgetool']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$action = (isset($_POST['action'])) ? $filter->FilterText($_POST['action']) : '';
$usertyp = (isset($_POST['usertyp'])) ? $filter->FilterText($_POST['usertyp']) : '';
$username = (isset($_POST['username'])) ? $filter->FilterText($_POST['username']) : '';
$badge = (isset($_POST['badge'])) ? $filter->FilterText($_POST['badge']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($badge)){
			switch($usertyp){
				case "0":
					// Ein User
					$check = dbSelect('*','users', "WHERE username = '" . $username . "' LIMIT 1");
					if($check->num_rows > 0){
						if($action == 0){
							$userid = $check->fetch_assoc();
							$housekeeping->UserBadge($userid['id'], '0', $badge);
							$housekeeping->hkLogs('User Badge', 'User Badge verteilt (<b>Badge:</b> '.$badge.')', $user->UserData('id'), $remoteip, $userid['id']);
							$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> User <b>' . $username . '</b> hat erfolgreich das <u>' . $badge . '</u> Badge erhalten!"</div>';
						} else {
							$userid = $check->fetch_assoc();
							$housekeeping->UserBadge($userid['id'], '1', $badge);
							$housekeeping->hkLogs('User Badge', 'User Badge abgezogen (<b>Badge:</b> '.$badge.')', $user->UserData('id'), $remoteip, $userid['id']);
							$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> User <b>' . $username . '</b> hat erfolgreich das <u>' . $badge . '</u> Badge nicht mehr!"</div>';
						}
					} else {
						$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User <b>' . $username . '</b> konnte nicht gefunden werden!</div>';
					}
					break;
				case "1":
					// Alle User
					if($action == 0){
						$housekeeping->UserBadgeMass('0', $badge);
						$housekeeping->hkLogs('User Badge', 'User Badge verteilt (Alle User - <b>Badge:</b> '.$badge.')', $user->UserData('id'), $remoteip);
						$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Alle User haben erfolgreich das <u>' . $badge . '</u> Badge erhalten!"</div>';
					} else {
						$housekeeping->UserBadgeMass('1', $badge);
						$housekeeping->hkLogs('User Badge', 'User Badge abgezogen (Alle User - <b>Badge:</b> '.$badge.')', $user->UserData('id'), $remoteip);
						$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Alle User haben erfolgreich das <u>' . $badge . '</u> Badge nicht mehr!"</div>';
					}
					break;
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Badgecode ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'user-badgetool';
$headtitle = 'User - Badgetool';
$toptitle = 'User <small>Badgetool</small>';
$title = 'User </li><li class="active">Badgetool</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Badge verteilen/abziehen</h3>
		<div class="pull-right box-tools">
			<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-2">
				<div class="input-group">
					<span class="input-group-addon"><b>Aktion</b></span>
					<select name="action" class="form-control">
						<option value="0" <?php if($action == '0'){ echo 'selected'; } ?>>Hinzufügen</option>
						<option value="1" <?php if($action == '1'){ echo 'selected'; } ?>>Abziehen</option>
					</select>
				</div>
			</div>
			<div class="col-xs-2">
				<div class="input-group">
					<span class="input-group-addon"><b>Typ</b></span>
					<select name="usertyp" class="form-control">
						<option value="0" <?php if($usertyp == '0'){ echo 'selected'; } ?>>Ein User</option>
						<option value="1" <?php if($usertyp == '1'){ echo 'selected'; } ?>>Alle User</option>
					</select>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="input-group">
					<span class="input-group-addon"><b>Username</b></span>
					<input class="form-control" value="<?php echo $username; ?>" type="text" name="username">
				</div> (wenn Typ 'Ein User' ist!)
			</div>
			<div class="col-xs-3">
				<div class="input-group">
					<span class="input-group-addon"><b>Badgecode</b></span>
					<input class="form-control" value="<?php echo $badge; ?>" type="text" name="badge">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Senden</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>