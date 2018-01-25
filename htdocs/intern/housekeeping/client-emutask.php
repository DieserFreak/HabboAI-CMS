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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.emutask']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

// Staffchat
if(isset($_POST['staffchat'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$text = $filter->FilterText($_POST['satext']);
		
		if(!empty($text)){
			$housekeeping->EmuTaskStaffchat($text);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
			$housekeeping->hkLogs('Emutask', 'Staffchat ausgeführt', $user->UserData('id'), $remoteip, '0', $text);
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Text ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// Hotelalert
if(isset($_POST['hotelalert'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$text = $filter->FilterText($_POST['hatext']);
		
		if(!empty($text)){
			$housekeeping->EmuTaskHotelalert($text);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
			$housekeeping->hkLogs('Emutask', 'Hotelalert ausgeführt', $user->UserData('id'), $remoteip, '0', $text);
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Text ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// User disconnect
if(isset($_POST['disconnect'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$username = $filter->FilterText($_POST['dcusername']);
		
		if(!empty($username)){
			if($housekeeping->UsernameCheck($username)){
				$username = dbSelect('*', 'users', "WHERE username = '" . $username . "' LIMIT 1");
				$usercheck = $username->fetch_assoc();
				$housekeeping->EmuTaskUserDisconnect($usercheck['id']);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
				$housekeeping->hkLogs('Emutask', 'Userdisconnect ausgeführt', $user->UserData('id'), $remoteip, $usercheck['id']);
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Username existiert nicht!</div>';		
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Feld ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// Senduser
if(isset($_POST['senduser'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$username = $filter->FilterText($_POST['sendusername']);
		$roomid = $filter->FilterText($_POST['roomid']);
		if(!empty($username)){
			if($housekeeping->UsernameCheck($username)){
				$username = dbSelect('*', 'users', "WHERE username = '" . $username . "' LIMIT 1");
				$usercheck = $username->fetch_assoc();
				$housekeeping->EmuTaskSendUser($usercheck['id'], $roomid);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Username existiert nicht!</div>';		
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Feld ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// Raum unload
if(isset($_POST['roomunload'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$roomid = $filter->FilterText($_POST['roomid']);
		
		if(!empty($roomid)){
			$roomcheck = dbSelectNumRows('*', 'rooms', "WHERE id = '" . $roomid . "'");
			if($roomcheck > 0){
				$housekeeping->EmuTaskUnloadRoom($roomid);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
				$housekeeping->hkLogs('Emutask', 'Raum ('.$roomid.') Unload ausgeführt', $user->UserData('id'), $remoteip);
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Raum ID existiert nicht!</div>';		
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Feld ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// User Räume unload
if(isset($_POST['uroomsunload'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$username = $filter->FilterText($_POST['uroomsusername']);
		
		if(!empty($username)){
			if($housekeeping->UsernameCheck($username)){
				$userdb = dbSelect('*', 'users', "WHERE username = '" . $username . "' LIMIT 1");
				$usercheck = $userdb->fetch_assoc();
				$housekeeping->EmuTaskUserRoomsUnload($username);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
				$housekeeping->hkLogs('Emutask', 'User Räume Unloads ausgeführt', $user->UserData('id'), $remoteip, $usercheck['id']);
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Username existiert nicht!</div>';		
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Feld ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// Giftitem an ein User
if(isset($_POST['giftuser'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$username = $filter->FilterText($_POST['giftusername']);
		$giftitemid = $filter->FilterText($_POST['giftitemid']);
		$giftpageid = $filter->FilterText($_POST['giftpageid']);
		$giftmessage = $filter->FilterText($_POST['giftmessage']);
		
		if(!empty($username) && !empty($giftitemid) && !empty($giftpageid) && !empty($giftmessage)){
			if($housekeeping->UsernameCheck($username)){
				$username = dbSelect('*', 'users', "WHERE username = '" . $username . "' LIMIT 1");
				$usercheck = $username->fetch_assoc();
				$housekeeping->EmuTaskGiveItem('0', $giftitemid, $giftpageid, $giftmessage, '0',  $usercheck['id']);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
				$housekeeping->hkLogs('Emutask', 'Giftitem ausgeführt (Item ID: '.$giftitemid.' | Page ID: '.$giftpageid.' | Nachricht: '.$giftmessage.')', $user->UserData('id'), $remoteip, $usercheck['id']);
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Username existiert nicht!</div>';		
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, alle Felder ausf&uuml;llen!!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// Giftitem an alle User online
if(isset($_POST['giftalluser'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$giftitemid = $filter->FilterText($_POST['giftallitemid']);
		$giftpageid = $filter->FilterText($_POST['giftallpageid']);
		$giftmessage = $filter->FilterText($_POST['giftallmessage']);
		
		if(!empty($giftitemid) && !empty($giftpageid) && !empty($giftmessage)){
			$housekeeping->EmuTaskGiveItem('1', $giftitemid, $giftpageid, $giftmessage);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
			$housekeeping->hkLogs('Emutask', 'Giftitem Useronline ausgeführt (Item ID: '.$giftitemid.' | Page ID: '.$giftpageid.' | Nachricht: '.$giftmessage.')', $user->UserData('id'), $remoteip);
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, alle Felder ausf&uuml;llen!!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// Giftitem an alle User online (mit Limit)
if(isset($_POST['giftallusergen'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$giftlimit = $filter->FilterText($_POST['giftallgenlimit']);
		$giftitemid = $filter->FilterText($_POST['giftallgenitemid']);
		$giftpageid = $filter->FilterText($_POST['giftallgenpageid']);
		$giftmessage = $filter->FilterText($_POST['giftallgenmessage']);
		
		if(!empty($giftlimit) && !empty($giftitemid) && !empty($giftpageid) && !empty($giftmessage)){
			$housekeeping->EmuTaskGiveItem('2', $giftitemid, $giftpageid, $giftmessage, $giftlimit);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
			$housekeeping->hkLogs('Emutask', 'Giftitem Limit ('.$giftlimit.') ausgeführt (Item ID: '.$giftitemid.' | Page ID: '.$giftpageid.' | Nachricht: '.$giftmessage.')', $user->UserData('id'), $remoteip);
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, alle Felder ausf&uuml;llen!!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

// Update Navigator
if(isset($_POST['navigator'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		//$core->MUS('addroom','1 model_14 Raumtest!');
		$core->MUS('updateusersrooms');
		$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Befehl wurde erfolgreich ausgeführt!</div>';
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'client-emutask';
$headtitle = 'Client - Emulator Befehle';
$toptitle = 'Client <small>Emulator Befehle</small>';
$title = 'Client </li><li class="active">Emulator Befehle</li>';
require ('./header.php');
?>
<div class="col-md-12">
	<?php if(!empty($msg)){ echo $msg; } ?>
</div>
<div class="col-md-6">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Staffchat</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-9"><b>Text</b> f&uuml;r Staffchat:
						<textarea class="form-control" name="satext" cols="50" rows="5"></textarea>
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<br /><button class="btn btn-app" style="width:100%;" name="staffchat"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Hotelalert</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-9"><b>Text</b> f&uuml;r Hotelalert:
						<textarea class="form-control" name="hatext" cols="50" rows="5"></textarea>
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<br /><button class="btn btn-app" style="width:100%;" name="hotelalert"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">User disconnect</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-8"><b>Username</b>:
						<input class="form-control" type="text" name="dcusername">
					</div>
					<div class="col-xs-2">
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<button class="btn btn-app" style="width:100%;" name="disconnect"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">User im Raum teleportieren</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-5"><b>Username</b>:
						<input class="form-control" type="text" name="sendusername">
					</div>
					<div class="col-xs-3"><b>Raum ID</b>:
						<input class="form-control" type="text" name="roomid">
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<button class="btn btn-app" style="width:100%;" name="senduser"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Raum unload</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-8"><b>Raum ID</b>:
						<input class="form-control" type="text" name="roomid">
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<button class="btn btn-app" style="width:100%;" name="roomunload"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">R&auml;ume von User unload</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-8"><b>Username</b>:
						<input class="form-control" type="text" name="uroomsusername">
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<button class="btn btn-app" style="width:100%;" name="uroomsunload"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Update Navigator</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-11">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<button class="btn btn-app" style="width:100%;" name="navigator"><i class="fa fa-play"></i>Navigator updaten</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Geschenk an ein User</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-8">
						<b>Username</b>:
						<input class="form-control" type="text" name="giftusername">
						<br />
						<b>Item ID</b>:
						<input class="form-control" type="text" name="giftitemid">
						<br />
						<b>Page ID</b>:
						<input class="form-control" type="text" name="giftpageid">
						<br />
						<b>Geschenktext</b>:
						<input class="form-control" type="text" name="giftmessage">
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<br /><button class="btn btn-app" style="width:100%;" name="giftuser"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Geschenk an alle User Online</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-8">
						<b>Item ID</b>:
						<input class="form-control" type="text" name="giftallitemid">
						<br />
						<b>Page ID</b>:
						<input class="form-control" type="text" name="giftallpageid">
						<br />
						<b>Geschenktext</b>:
						<input class="form-control" type="text" name="giftallmessage">
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<br /><button class="btn btn-app" style="width:100%;" name="giftalluser"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Geschenk an alle User Online (Zufall)</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<form method="post">
					<div class="col-xs-8">
						<b>Anzal User</b>:
						<input class="form-control" type="text" name="giftallgenlimit">
						<br />
						<b>Item ID</b>:
						<input class="form-control" type="text" name="giftallgenitemid">
						<br />
						<b>Page ID</b>:
						<input class="form-control" type="text" name="giftallgenpageid">
						<br />
						<b>Geschenktext</b>:
						<input class="form-control" type="text" name="giftallgenmessage">
					</div>
					<div class="col-xs-2">
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<br /><button class="btn btn-app" style="width:100%;" name="giftallusergen"><i class="fa fa-play"></i>Ausf&uuml;hren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>