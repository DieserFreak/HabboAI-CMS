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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.change.password']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$username = (isset($_POST['username'])) ? $filter->FilterText($_POST['username']) : '';
$pw = (isset($_POST['pw'])) ? $filter->FilterText($_POST['pw']) : '';
$pw2 = (isset($_POST['pw2'])) ? $filter->FilterText($_POST['pw2']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$check = dbSelect('*','users', "WHERE username = '" . $username . "' LIMIT 1");
		if($check->num_rows > 0){
			$userid = $check->fetch_assoc();
			if($userid['rank'] < $user->UserData('rank') || $userid['id'] == $user->UserData('id')){
				if(strlen($pw) > 5 && $pw == $pw2){
						$password = $user->encode($pw);
						$user->ChangePassword($userid['id'], $password);
						$housekeeping->hkLogs('User Passwort', 'User Passwort geändert', $user->UserData('id'), $remoteip, $userid['id']);
						$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> <b>' . $username . '</b>\'s Passwort wurde erfolgreich geändert!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Passwort muss mindestens 6 Zeichen lang oder die Passwörter sind nicht gleich!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du darfst nur User unter deine Position Passwort ändern!</div>';
			}
		}	else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User <b>' . $username . '</b> konnte nicht gefunden werden!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'user-changepassword';
$headtitle = 'User - Passwort ändern';
$toptitle = 'User <small>Passwort ändern</small>';
$title = 'User </li><li class="active">Passwort ändern</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Passwort ändern</h3>
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
					<span class="input-group-addon"><b>Username</b></span>
					<input class="form-control" value="<?php echo $username; ?>" type="text" name="username">
				</div>
			</div>
			<div class="col-xs-3">
				<div class="input-group">
					<span class="input-group-addon"><b>Neue Passwort</b></span>
					<input class="form-control" type="password" name="pw">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon"><b>Passwortwiederholung</b></span>
					<input class="form-control" type="password" name="pw2">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Ändern</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>