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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.rooms.edit']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$roomid = $filter->FilterText($_GET['id']);

if(isset($_GET['right'])){
	$rightid = $filter->FilterText($_GET['right']);
	
	$rightcheck = dbSelectNumRows('*', 'room_rights', "WHERE room_id = '" . $roomid . "' AND user_id = '". $rightid . "'");
	if($rightcheck > 0){
		$delete = dbDelete('room_rights', "WHERE room_id = '" . $roomid . "' AND user_id = '". $rightid . "'");
		$housekeeping->hkLogs('Raum Edit', 'Raum ID <u>'.$roomid.'</u> Rechte gelöscht', $user->UserData('id'), $remoteip, $rightid);
		$msg_r = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Rechte wurde erfolgreich gelöscht!</div>';
	} else {
		$msg_r = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Rechte existiert nicht!</div>';
	}
}

if(isset($_GET['rightall'])){
	$rightcheck = dbSelectNumRows('*', 'room_rights', "WHERE room_id = '" . $roomid . "'");
	if($rightcheck > 0){
		$delete = dbDelete('room_rights', "WHERE room_id = '" . $roomid . "'");
		$housekeeping->hkLogs('Raum Edit', 'Raum ID <u>'.$roomid.'</u> Rechte gelöscht (alle)', $user->UserData('id'), $remoteip);
		$msg_r = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Alle Rechte wurden erfolgreich gelöscht!</div>';
	} else {
		$msg_r = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Raum hat keine vergebene Rechte!</div>';
	}
}

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$roomdb = dbSelect('*','rooms', "WHERE id = '" . $roomid . "' LIMIT 1");
		$roomdata = $roomdb->fetch_assoc();

		$roomname = $filter->FilterText($_POST['roomname']);
		$roomowner = $filter->FilterText($_POST['roomowner']);
		$roomcategory = $filter->FilterText($_POST['roomcategory']);
		$roomstate = $filter->FilterText($_POST['roomstate']);
		$roompassword = $filter->FilterText($_POST['roompassword']);
		$roomusersmax = $filter->FilterText($_POST['roomusersmax']);
		$roommodel = $filter->FilterText($_POST['roommodel']);
		$roomdesc = $filter->FilterText($_POST['roomdesc']);

		if(!empty($roomname) && !empty($roomowner) && !empty($roomcategory) && !empty($roomstate) && !empty($roomusersmax) && !empty($roommodel)){
			if(strlen($roomname) > 3 && strlen($roomname) <= 50 && strlen($roomdesc) <= 200){
				if($housekeeping->UsernameCheck($roomowner)){
					if($roomusersmax >= 1 && $roomusersmax <= 500){
						$checkmodel = dbSelect('*','room_models', "WHERE id = '" . $roommodel . "' LIMIT 1");
						if($checkmodel->num_rows > 0){
							if($roomstate == 'password'){
								if(!empty($roompassword) && strlen($roompassword) > 3){
									$details = '<b>Name:</b> '.$roomdata['caption'].' &rArr; '.$roomname.'<br /><b>Besitzer:</b> '.$roomdata['owner'].' &rArr; '.$roomowner.'<br /><b>Kategorie:</b> '.$roomdata['category'].' &rArr; '.$roomcategory.'<br /><b>State:</b> '.$roomdata['state'].' &rArr; '.$roomstate.'<br /><b>Passwort:</b> '.$roomdata['password'].' &rArr; '.$roompassword.'<br /><b>Max Users:</b> '.$roomdata['users_max'].' &rArr; '.$roomusersmax.'<br /><b>Modell:</b> '.$roomdata['model_name'].' &rArr; '.$roommodel.'<br /><b>Beschreibung:</b> '.$roomdata['description'].' &rArr; '.$roomdesc.'<br />';
									$housekeeping->hkLogs('Raum Edit', 'Raum ID <u>'.$roomid.'</u> bearbeitet', $user->UserData('id'), $remoteip, '0', $details);
									$form_data_room = array(
										'caption' => $roomname,
										'owner' => $roomowner,
										'category' => $roomcategory,
										'state' => $roomstate,
										'password' => $roompassword,
										'users_max' => $roomusersmax,
										'model_name' => $roommodel,
										'description' => $roomdesc
									);
									dbUpdate('rooms', $form_data_room, "WHERE id = '".$roomid."' LIMIT 1");
									$housekeeping->EmuTaskUnloadRoom($roomid);
									$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Raum wurde erfolgreich geändert!</div>';
								} else {
									$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bei einer Zugang mit Passwort muss man ein Passwort über 4 Buchstaben sein!</div>';
								}
							} else {
								$details = '<b>Name:</b> '.$roomdata['caption'].' &rArr; '.$roomname.'<br /><b>Besitzer:</b> '.$roomdata['owner'].' &rArr; '.$roomowner.'<br /><b>Kategorie:</b> '.$roomdata['category'].' &rArr; '.$roomcategory.'<br /><b>State:</b> '.$roomdata['state'].' &rArr; '.$roomstate.'<br /><b>Passwort:</b> '.$roomdata['password'].' &rArr; '.$roompassword.'<br /><b>Max Users:</b> '.$roomdata['users_max'].' &rArr; '.$roomusersmax.'<br /><b>Modell:</b> '.$roomdata['model_name'].' &rArr; '.$roommodel.'<br /><b>Beschreibung:</b> '.$roomdata['description'].' &rArr; '.$roomdesc.'<br />';
								$housekeeping->hkLogs('Raum Edit', 'Raum ID <u>'.$roomid.'</u> bearbeitet', $user->UserData('id'), $remoteip, '0', $details);
								$form_data_room = array(
									'caption' => $roomname,
									'owner' => $roomowner,
									'category' => $roomcategory,
									'state' => $roomstate,
									'password' => '',
									'users_max' => $roomusersmax,
									'model_name' => $roommodel,
									'description' => $roomdesc
								);
								dbUpdate('rooms', $form_data_room, "WHERE id = '".$roomid."' LIMIT 1");
								$housekeeping->EmuTaskUnloadRoom($roomid);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Raum wurde erfolgreich geändert!</div>';
							}
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Raummodel existiert nicht!</div>';
						}
					} else {
						$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Maximale User im Raum darf nur zwischen 1 und 500!</div>';
					}
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der User existiert nicht!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Raumname musst zwischen 3 und 50 Buchstaben sein und Beschreibung musst unter 200 Buchstaben sein!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, komplett ausfüllen (Ausnahme: Passwort & Beschreibung)!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$roomdb = dbSelect('*','rooms', "WHERE id = '" . $roomid . "' LIMIT 1");
$roomdata = $roomdb->fetch_assoc();

$_SESSION['csrf_token'] = NoCSRF::generate( 'csrf_token' );
$token = NoCSRF::generate( 'csrf_token' );

$active = 'client-rooms';
$headtitle = 'Client - Räume';
$toptitle = 'Client <small>Räume</small>';
$title = 'Client </li><li class="active">Räume</li><li class="active">Bearbeitung</li>';
require ('./header.php');
?>
<?php if($roomdb->num_rows > 0){ ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Raum <small>Bearbeitung: <?php echo $roomdata['caption']; ?> - Besitzer: <?php echo $roomdata['owner']; ?></small></h3>
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body">
			<?php if(!empty($msg)){ echo $msg; } ?>
			<div class="row">
			<form method="post">
				<div class="col-xs-5">
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Raumname</b></span>
						<input class="form-control" value="<?php echo $roomdata['caption']; ?>" type="text" name="roomname">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Besitzer</b></span>
						<input class="form-control" value="<?php echo $roomdata['owner']; ?>" type="text" name="roomowner">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Kategorie</b></span>
						<select name="roomcategory" class="form-control">
						<?php
							$catsdb = dbSelectS('*', 'navigator_flatcats', "ORDER BY id DESC");
							while ($cat = $catsdb->fetch_array()) {
						?>
							<option value="<?php echo $cat['id']; ?>"<?php if($cat['id'] == $roomdata['category']){ echo ' selected'; } ?>><?php echo $cat['caption']; ?></option>
						<?php
							}
						?>
						</select>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Zustand</b></span>
						<select name="roomstate" class="form-control">
							<option value="open" <?php if($roomdata['state'] == 'open'){ echo 'selected'; } ?>>Offen</option>
							<option value="locked" <?php if($roomdata['state'] == 'locked'){ echo 'selected'; } ?>>Klingel</option>
							<option value="password" <?php if($roomdata['state'] == 'password'){ echo 'selected'; } ?>>Passwort</option>
						</select>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Passwort</b></span>
						<input class="form-control" value="<?php echo $roomdata['password']; ?>" type="text" name="roompassword">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Useranzahl maximal</b></span>
						<input class="form-control" value="<?php echo $roomdata['users_max']; ?>" type="text" name="roomusersmax">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Modell</b></span>
						<input class="form-control" value="<?php echo $roomdata['model_name']; ?>" type="text" name="roommodel">
					</div>
				</div>
				<div class="col-xs-7">
					<b>Raumbeschreibung</b>
					<textarea class="form-control" name="roomdesc" cols="50" rows="16"><?php echo $roomdata['description']; ?></textarea>
				</div>
				<br/>
				<div class="col-xs-12" style="margin-top:20px;">
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
					<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Raum bearbeiten</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Raumrechte <small>Liste</small></h3>     
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body table-responsive">
		<?php if(!empty($msg_r)){ echo $msg_r; } ?>
			<table id="client" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="80%">Username</th>
						<th width="20%">Aktion (<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/rooms/edit/<?php echo $roomid; ?>&rightall"><small>alle löschen</small></a>)</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$roomrightsdb = dbSelect('*', 'room_rights', "WHERE room_id = '" . $roomdata['id'] . "'");
				while ($row = $roomrightsdb->fetch_array()) {
					$userdb = dbSelect('*','users', "WHERE id = '" . $row['user_id'] . "' LIMIT 1");
					$userdata = $userdb->fetch_assoc();
			?>
				<tr>
					<td><?php echo $userdata['username']; ?></td>
					<td><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/rooms/edit/<?php echo $roomid; ?>&right=<?php echo $row['user_id']; ?>"><small>Rechte löschen</small></a></td>
				</tr>
			<?php
				}
			?>
				</tbody>
				<tfoot>
					<tr>
						<th>Username</th>
						<th>Aktion</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
<?php } else { ?>
	<div class="error-page">
		<h2 class="headline text-info"> 404</h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> Oops ... 404 Error!</h3>
			<p>
				Der Raum wurde nicht gefunden! Vielleicht existiert den Raum nicht. Bitte versuchen Sie erneut: <a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/rooms">Räume Liste</a>.
			</p>
		</div>
	</div>
<?php } ?>
<?php require ('./footer.php'); ?>