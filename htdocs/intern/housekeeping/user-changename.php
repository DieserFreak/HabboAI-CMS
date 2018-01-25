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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.change.name']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$oldname = (isset($_POST['oldname'])) ? $filter->FilterText($_POST['oldname']) : '';
$newname = (isset($_POST['newname'])) ? $filter->FilterText($_POST['newname']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$check = dbSelect('*','users', "WHERE username = '" . $oldname . "' LIMIT 1");
		if($check->num_rows > 0){
			$userid = $check->fetch_assoc();
			if($userid['rank'] < $user->UserData('rank') || $userid['id'] == $user->UserData('id')){
				if($housekeeping->valid_username($newname) && strlen($newname) > 3 && strlen($newname) <= 12){
						$user->ChangeName($userid['id'], $userid['username'], $newname);
						$housekeeping->hkLogs('User Name', 'User Name geändert (<b>alt:</b> '.$oldname.' - <b>neu:</b> '.$newname.')', $user->UserData('id'), $remoteip, $userid['id']);
						
						$roomsunload = dbSelect('*','rooms', "WHERE owner = '" . $newname . "'");
						while($row = $roomsunload->fetch_assoc()){
							$core->MUS('unloadroom', $row['id']); 
						}
						$core->MUS('updateusersrooms');
						
						$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> <b>' . $oldname . '</b>\'s Username wurde auf <b>' . $newname . ' geändert!</b>!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Name ist unerlaubt (Zeichen, lang, kurz ...)!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du darfst nur User unter deine Position Name ändern!</div>';
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

$active = 'user-changename';
$headtitle = 'User - Name ändern';
$toptitle = 'User <small>Name ändern</small>';
$title = 'User </li><li class="active">Name ändern</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Name ändern</h3>
		<div class="pull-right box-tools">
			<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
		</div>
	</div>
			&nbsp;&nbsp;&nbsp;<i>Beachte, dass du pro Namechange 20 Diamanten abziehen musst und der User dann 3 Wochen kein Namechange mehr bekommt!</i>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-5">
				<div class="input-group">
					<span class="input-group-addon"><b>Username</b></span>
					<input class="form-control" value="<?php echo $oldname; ?>" type="text" name="oldname">
				</div>
			</div>
			<div class="col-xs-5">
				<div class="input-group">
					<span class="input-group-addon"><b>neue Username</b></span>
					<input class="form-control" value="<?php echo $newname; ?>" type="text" name="newname">
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