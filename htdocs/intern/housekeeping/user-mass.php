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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.mass']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$action = (isset($_POST['action'])) ? $filter->FilterText($_POST['action']) : '';
$typ = (isset($_POST['typ'])) ? $filter->FilterText($_POST['typ']) : '';
$value = (isset($_POST['value'])) ? $filter->FilterText($_POST['value']) : '';
$list = (isset($_POST['action'])) ? $filter->FilterText($_POST['list']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($value)){
			if(!empty($list)){
				switch($action){
					case "0":
						// Taler
						if($value > 0){
							if($typ == 0){
								// User ID
								$userid = explode(";", $list);
								foreach($userid as &$valueid){
									$userid_check = dbSelect('*','users', "WHERE id = '" . $valueid . "'");
									if($userid_check->num_rows > 0){
										$query = $mysqli->query("UPDATE users SET credits = credits + " . $value . " WHERE id = '" . $valueid . "'");
										$core->MUS('updatecredits', $valueid);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Taler verteilt (<b>Anzahl:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>User ID Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Taler erfolgreich verteilt!</div>';
							} else {
								//Username
								$userid = explode(";", $list);
								foreach($userid as &$valuename){
									$username_check = dbSelect('*','users', "WHERE username = '" . $valuename . "'");
									if($username_check->num_rows > 0){
										$userdata = $username_check->fetch_assoc();
										$query = $mysqli->query("UPDATE users SET credits = credits + " . $value . " WHERE id = '" . $userdata['id'] . "'");
										$core->MUS('updatecredits', $userdata['id']);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Taler verteilt (<b>Anzahl:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>Username Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Taler erfolgreich verteilt!</div>';
							}
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Taler darf nicht negativ und muss aus Zahlen bestehen!</div>';
						}
						break;
					case "1":
						// Pixel
						if($value > 0){
							if($typ == 0){
								// User ID
								$userid = explode(";", $list);
								foreach($userid as &$valueid){
									$userid_check = dbSelect('*','users', "WHERE id = '" . $valueid . "'");
									if($userid_check->num_rows > 0){
										$query = $mysqli->query("UPDATE users SET activity_points = activity_points + " . $value . " WHERE id = '" . $valueid . "'");
										$core->MUS('updatepixels', $valueid);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Pixel verteilt (<b>Anzahl:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>User ID Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Pixel erfolgreich verteilt!</div>';
							} else {
								//Username
								$userid = explode(";", $list);
								foreach($userid as &$valuename){
									$username_check = dbSelect('*','users', "WHERE username = '" . $valuename . "'");
									if($username_check->num_rows > 0){
										$userdata = $username_check->fetch_assoc();
										$query = $mysqli->query("UPDATE users SET activity_points = activity_points + " . $value . " WHERE id = '" . $userdata['id'] . "'");
										$core->MUS('updatepixels', $userdata['id']);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Pixel verteilt (<b>Anzahl:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>Username Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Pixel erfolgreich verteilt!</div>';
							}
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Pixel darf nicht negativ und muss aus Zahlen bestehen!</div>';
						}
						break;
					case "2":
						// Diamanten
						if($value > 0){
							if($typ == 0){
								// User ID
								$userid = explode(";", $list);
								foreach($userid as &$valueid){
									$userid_check = dbSelect('*','users', "WHERE id = '" . $valueid . "'");
									if($userid_check->num_rows > 0){
										$query = $mysqli->query("UPDATE users SET vip_points = vip_points + " . $value . " WHERE id = '" . $valueid . "'");
										$core->MUS('updatepoints', $valueid);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Diamanten verteilt (<b>Anzahl:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>User ID Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Diamanten erfolgreich verteilt!</div>';
							} else {
								//Username
								$userid = explode(";", $list);
								foreach($userid as &$valuename){
									$username_check = dbSelect('*','users', "WHERE username = '" . $valuename . "'");
									if($username_check->num_rows > 0){
										$userdata = $username_check->fetch_assoc();
										$query = $mysqli->query("UPDATE users SET vip_points = vip_points + " . $value . " WHERE id = '" . $userdata['id'] . "'");
										$core->MUS('updatepoints', $userdata['id']);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Diamanten verteilt (<b>Anzahl:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>Username Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Diamanten erfolgreich verteilt!</div>';
							}
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Diamanten darf nicht negativ und muss aus Zahlen bestehen!</div>';
						}
						break;
					case "3":
						// Badge
						if(!empty($value)){
							if($typ == 0){
								// User ID
								$userid = explode(";", $list);
								foreach($userid as &$valueid){
									$userbadge_check = dbSelect('*','user_badges', "WHERE user_id = '" . $valueid . "' AND badge_id = '" . $value . "'");
									if($userbadge_check->num_rows < 1){
										$form_data_badge = array(
											'user_id' => $valueid,
											'badge_id' => $value
											);
										dbInsert('user_badges', $form_data_badge);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Badge verteilt (<b>Code:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>User ID Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Badge <u>' . $value . '</u> erfolgreich verteilt!</div>';
							} else {
								//Username
								$userid = explode(";", $list);
								foreach($userid as &$valuename){
									$username_check = dbSelect('*','users', "WHERE username = '" . $valuename . "'");
									$userdata = $username_check->fetch_assoc();
									
									$userbadge_check = dbSelect('*','user_badges', "WHERE user_id = '" . $userdata['id'] . "' AND badge_id = '" . $value . "'");
									if($userbadge_check->num_rows < 1){
										$form_data_badge = array(
											'user_id' => $userdata['id'],
											'badge_id' => $value
											);
										dbInsert('user_badges', $form_data_badge);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Badge verteilt (<b>Code:</b> ' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>Username Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Badge <u>' . $value . '</u> erfolgreich verteilt!</div>';
							}
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Badgecode darf nicht leer sein!</div>';
						}
						break;
					case "4":
						// Möbel
						if(!empty($value)){
							if($typ == 0){
							// User ID
								$userid = explode(";", $list);
								foreach($userid as &$valueid){
									$userbadge_check = dbSelect('*','users', "WHERE id = '" . $valueid . "'");
									if($userbadge_check->num_rows < 1){
										$core->MUS('giveitem', $valueid.' '.$value);
									}
								}
								$housekeeping->hkLogs('User Massen', 'Item verteilt (' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>User ID Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Item \'' . $value . '\' erfolgreich verteilt!</div>';
							} else {
								//Username
								$userid = explode(";", $list);
								foreach($userid as &$valuename){
									$username_check = dbSelect('*','users', "WHERE username = '" . $valuename . "'");
									$userdata = $username_check->fetch_assoc();
									
									$core->MUS('giveitem', $userdata['id'].' '.$value);
								}
								$housekeeping->hkLogs('User Massen', 'Item verteilt (' . $value . ')', $user->UserData('id'), $remoteip, '0', '<b>Username Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Item \'' . $value . '\' erfolgreich verteilt!</div>';
							
							}
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Value darf nicht leer sein!</div>';
						}
						break;
					case "5":
						// VIP
						if($value > 0){
							if($typ == 0){
								// User ID
								$userid = explode(";", $list);
								foreach($userid as &$valueid){
									$userid_check = dbSelect('*','users', "WHERE id = '" . $valueid . "'");
									if($userid_check->num_rows > 0){
										$housekeeping->UserVip($valueid, $value);
									}
								}
								$housekeeping->hkLogs('User Massen', 'VIP verteilt (Dauer: ' . $value . ' Tage)', $user->UserData('id'), $remoteip, '0', '<b>User ID Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Tag(e) VIP erfolgreich verteilt!</div>';
							} else {
								//Username
								$userid = explode(";", $list);
								foreach($userid as &$valuename){
									$username_check = dbSelect('*','users', "WHERE username = '" . $valuename . "'");
									$userdata = $username_check->fetch_assoc();
									
									$housekeeping->UserVip($userdata['id'], $value);
								}
								$housekeeping->hkLogs('User Massen', 'VIP verteilt (Dauer: ' . $value . ' Tage)', $user->UserData('id'), $remoteip, '0', '<b>Username Liste:</b> '.$list);
								$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> ' . $value . ' Tag(e) VIP erfolgreich verteilt!</div>';
							}
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> VIP Tag(e) darf nicht negativ und muss aus Zahlen bestehen!</div>';
						}
						break;
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Ohne User geht nichts!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte das Feld Value angeben!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'user-mass';
$headtitle = 'User - Massensenden';
$toptitle = 'User <small>Massensenden</small>';
$title = 'User </li><li class="active">Massensenden</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Massensenden</h3>
		<div class="pull-right box-tools">
			<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-5">
				<div class="input-group">
					<span class="input-group-addon">Aktion:</span>
					<select name="action" class="form-control">
						<option value="0" <?php if($action == '0'){ echo 'selected'; } ?>>Taler</option>
						<option value="1" <?php if($action == '1'){ echo 'selected'; } ?>>Pixel</option>
						<option value="2" <?php if($action == '2'){ echo 'selected'; } ?>>Diamanten</option>
						<option value="3" <?php if($action == '3'){ echo 'selected'; } ?>>Badge</option>
						<option value="4" <?php if($action == '4'){ echo 'selected'; } ?>>Möbel</option>
						<option value="5" <?php if($action == '5'){ echo 'selected'; } ?>>VIP</option>
					</select>
				</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon">Typ:</span>
				<select name="typ" class="form-control">
					<option value="0" <?php if($typ == '0'){ echo 'selected'; } ?>>User ID</option>
					<option value="1" <?php if($typ == '1'){ echo 'selected'; } ?>>Username</option>
				</select>
			</div>
			<br /><b>Value</b><br/><small>(Taler/Pixel/Diamant &rArr; Anzahl | Badge &rArr; Badgecode | Möbel &rArr; "ItemID PageID GeschenkNachricht" | VIP &rArr; Dauer in Tage)</small>
				<input class="form-control" value="<?php echo $value; ?>" type="text" name="value">
			<br />
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Senden</button>
			</div>
			<div class="col-xs-7"><b>Liste</b> (Trennung ";" benutzen (kein Leerzeichen, Enter, etc.)! Beispiel: Micki;Mr.Evil;Minni)
				<textarea class="form-control" name="list" cols="50" rows="10"><?php echo $list; ?></textarea>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>