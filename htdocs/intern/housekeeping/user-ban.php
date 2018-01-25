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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.ban']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$action = (isset($_POST['action'])) ? $filter->FilterText($_POST['action']) : '';
$typ = (isset($_POST['typ'])) ? $filter->FilterText($_POST['typ']) : '';
$value = (isset($_POST['value'])) ? $filter->FilterText($_POST['value']) : '';
$timer = (isset($_POST['timer'])) ? $filter->FilterText($_POST['timer']) : '';
$reason = (isset($_POST['reason'])) ? $filter->FilterText($_POST['reason']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($reason)){
			if($action == 0){
				if(!empty($timer)){
					// Bannen
					$check_ban = dbSelect('*','bans', "WHERE value = '" . $value . "' AND expire > '" . time() . "' LIMIT 1");
					if($check_ban->num_rows < 1){
						if($typ == 0){
							// User
							$check = dbSelect('*','users', "WHERE username = '" . $value . "' LIMIT 1");
							if($check->num_rows > 0){
								$userid = $check->fetch_assoc();
								if($userid['rank'] < $user->UserData('rank')){
									$housekeeping->UserAddBan('user', $userid['username'], $reason, $timer, $user->UserData('username'));
									$housekeeping->hkLogs('User Ban', 'User gebannt', $user->UserData('id'), $remoteip, $userid['id']);
									$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> User <b>' . $value . '</b> wurde erfolgreich gebannt!</div>';
								} else {
									$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst <b>' . $value . '</b> nicht bannen!</div>';
								}
							} else {
								$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User <b>' . $value . '</b> konnte nicht gefunden werden!</div>';
							}	
						} else {
							// IP
							$housekeeping->UserAddBan('ip', $value, $reason, $timer, $user->UserData('username'));
							$housekeeping->hkLogs('User Ban', 'IP gebannt (<b>IP:</b> ' . $value . ')', $user->UserData('id'), $remoteip);
							$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> IP <b>' . $value . '</b> + zuhörige User(s) wurde erfolgreich gebannt!</div>';
						}
					} else {
						$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User/IP <b>' . $value . '</b> ist schon gebannt!</div>';
					}
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte Dauer angeben!</div>';
				}
			} else {
				$check_ban = dbSelect('*','bans', "WHERE value = '" . $value . "' AND expire > '" . time() . "' LIMIT 1");
				if($check_ban->num_rows > 0){
					// Entbannen
					if($typ == 0){
						// User
						$check = dbSelect('*','users', "WHERE username = '" . $value . "' LIMIT 1");
						$userid = $check->fetch_assoc();
						
						$housekeeping->UserUnban('user', $userid['username'], $reason, $user->UserData('username'));
						$housekeeping->hkLogs('User Unban', 'User entbannt', $user->UserData('id'), $remoteip, $userid['id']);
						$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> User <b>' . $value . '</b> wurde erfolgreich entbannt!</div>';	
					} else {
						// IP
						$housekeeping->UserUnban('ip', $value, $reason, $user->UserData('username'));
						$housekeeping->hkLogs('User Unban', 'IP entbannt (<b>IP:</b> ' . $value . ')', $user->UserData('id'), $remoteip);
						$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> IP <b>' . $value . '</b> + zuhörige User(s) wurde erfolgreich entbannt!</div>';	
					}
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> User/IP <b>' . $value . '</b> ist nicht gebannt!</div>';
				}
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte ein Grund angeben!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'user-ban';
$headtitle = 'User - (Ent)bannen';
$toptitle = 'User <small>(Ent)bannen</small>';
$title = 'User </li><li class="active">(Ent)bannen</li>';
require ('./header.php');
?>
<script type="text/javascript">
function banPreset(val)
{
	document.getElementById('timer').value = val;
}
</script>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - (Ent)bannen</h3>
		<div class="pull-right box-tools">
			<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-3"><br />
				<div class="input-group">
					<span class="input-group-addon">Aktion:</span>
					<select name="action" class="form-control">
						<option value="0" <?php if($action == '0'){ echo 'selected'; } ?>>Bannen</option>
						<option value="1" <?php if($action == '1'){ echo 'selected'; } ?>>Entbannen</option>
					</select>
				</div>
			</div>
			<div class="col-xs-3"><br />
				<div class="input-group">
					<span class="input-group-addon">Typ:</span>
					<select name="typ" class="form-control">
						<option value="0" <?php if($typ == '0'){ echo 'selected'; } ?>>User</option>
						<option value="1" <?php if($typ == '1'){ echo 'selected'; } ?>>IP</option>
					</select>
				</div>
			</div>
			<div class="col-xs-3"><b>Username</b> oder <b>IP</b>
				<input class="form-control" value="<?php echo $value; ?>" type="text" name="value">
			</div>
			<div class="col-xs-3"><b>Dauer</b> (in Sekunden)
				<input class="form-control" value="<?php echo $timer; ?>" type="text" name="timer" id="timer">
			</div>
			<div class="col-xs-8"><br />
				<div class="input-group">
					<span class="input-group-addon">Grund:</span>
					<input class="form-control" value="<?php echo $reason; ?>" type="text" name="reason">
				</div>
			</div>
			<div class="col-xs-4" style="margin-top:20px;">
			<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
			<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">(Ent)bannen</button>
			</div>
			<div class="col-xs-10" style="margin-top:20px;"><br /><b>Dauer:</b><br />
				<a href="#" onclick="banPreset(3600);">1 Stunden</a> <big>|</big> 
				<a href="#" onclick="banPreset(7200);">2 Stunden</a> <big>|</big> 
				<a href="#" onclick="banPreset(10800);">3 Stunden</a> <big>|</big> 
				<a href="#" onclick="banPreset(14400);">4 Stunden</a> <big>|</big> 
				<a href="#" onclick="banPreset(43200);">12 Stunden</a> <big>|</big>  
				<a href="#" onclick="banPreset(86400);">1 Tag</a> <big>|</big> 
				<a href="#" onclick="banPreset(259200);">3 Tage</a> <big>|</big> 
				<a href="#" onclick="banPreset(604800);">1 Woche</a> <big>|</big> 
				<a href="#" onclick="banPreset(1209600);">2 Wochen</a> <big>|</big> 
				<a href="#" onclick="banPreset(2592000);">1 Monat</a> <big>|</big> 
				<a href="#" onclick="banPreset(7776000);">3 Monate</a> <big>|</big> 
				<a href="#" onclick="banPreset(1314000);">1 Jahr</a> <big>|</big> 
				<a href="#" onclick="banPreset(2628000);">2 Jahre</a>  <big>|</big> 
				<a href="#" onclick="banPreset(360000000);"> >10 Jahre</a>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>