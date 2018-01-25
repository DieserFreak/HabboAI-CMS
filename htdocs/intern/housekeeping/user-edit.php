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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.edit']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$getid = $filter->FilterText($_GET['id']);

if(isset($_POST['submit_look'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$s_userdb = dbSelect('*','users', "WHERE id = '" . $getid . "' LIMIT 1");
		$s_udata = $s_userdb->fetch_assoc();
		
		if($s_userdb->num_rows > 0){
			if($user->UserData('id') == $s_udata['id'] || $user->UserData('rank') > $s_udata['rank']){
				$user_look = array(
					'look' => $_CONFIG['register']['figure']
				);
				dbUpdate('users', $user_look, "WHERE id = '".$s_udata['id']."' LIMIT 1");
				$housekeeping->hkLogs('User Edit', 'User Look zurückgesetzt', $user->UserData('id'), $remoteip, $s_udata['id']);
				$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Das Aussehen wurde erfolgreich zurückgesetzt!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst User nicht über deine Position das Aussehen zurücksetzen!</div>';
			}
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_disconnect'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$s_userdb = dbSelect('*','users', "WHERE id = '" . $getid . "' LIMIT 1");
		$s_udata = $s_userdb->fetch_assoc();
		
		if($s_userdb->num_rows > 0){
			if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.edit.disconnect']){
				if($user->UserData('rank') > $s_udata['rank']){
					$housekeeping->EmuTaskUserDisconnect($s_udata['id']);
					$housekeeping->hkLogs('User Edit', 'User disconnect', $user->UserData('id'), $remoteip, $s_udata['id']);
					$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> User wurde erfolgreich aus dem Client gekickt!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst User nicht über deine Position aus dem Client kicken!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du hast kein Rechte um User aus dem Client zu kicken!</div>';
			}
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_vip'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$s_userdb = dbSelect('*','users', "WHERE id = '" . $getid . "' LIMIT 1");
		$s_udata = $s_userdb->fetch_assoc();
		
		if($s_userdb->num_rows > 0){
			if($user->UserData('id') == $s_udata['id'] || $user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.vip']){
				if($user->UserData('rank') > $s_udata['rank']){
					$reset_vip = array(
						'vip' => '0',
						'vip_time' => '0'
					);
					dbUpdate('users', $reset_vip, "WHERE id = '" . $s_udata['id'] . "'");
					$core->MUS('updatevip', $s_udata['id']);
					$housekeeping->hkLogs('User Edit', 'User VIP Mitglied beendet', $user->UserData('id'), $remoteip, $s_udata['id']);
					$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Das VIP Mitglied wurde erfolgreich beendet!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst User nicht über deine Position VIP Mitglied zu beenden!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du hast kein Rechte um User VIP Mitglied zu beenden!</div>';
			}
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_settings'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$s_userdb = dbSelect('*','users', "WHERE id = '" . $getid . "' LIMIT 1");
		$s_udata = $s_userdb->fetch_assoc();
		
		if($s_userdb->num_rows > 0){
			if($user->UserData('id') == $s_udata['id'] || $user->UserData('rank') == '10' || $user->UserData('rank') > $s_udata['rank']){
				$hide_online = (isset($_POST['hide_online'])) ? $filter->FilterText($_POST['hide_online']) : '';
				$block_newfriends = (isset($_POST['block_newfriends'])) ? $filter->FilterText($_POST['block_newfriends']) : '';
				$accept_trading = (isset($_POST['accept_trading'])) ? $filter->FilterText($_POST['accept_trading']) : '';
				$newsletter = (isset($_POST['newsletter'])) ? $filter->FilterText($_POST['newsletter']) : '';
				$allow_comment = (isset($_POST['allow_comment'])) ? $filter->FilterText($_POST['allow_comment']) : '';
				$raumalert = (isset($_POST['raumalert'])) ? $filter->FilterText($_POST['raumalert']) : '';
				$werbercmd = (isset($_POST['werbercmd'])) ? $filter->FilterText($_POST['werbercmd']) : '';
				
				if($user->UserData('rank') >= 10){
					$reset_vip = array(
						'hide_online' => $hide_online,
						'block_newfriends' => $block_newfriends,
						'accept_trading' => $accept_trading,
						'newsletter' => $newsletter,
						'allow_comment' => $allow_comment,
						'raumalert' => $raumalert,
						'werbercmd' => $werbercmd
					);
				} elseif($user->UserData('rank') >= 9){
					$reset_vip = array(
						'accept_trading' => $accept_trading,
						'newsletter' => $newsletter,
						'allow_comment' => $allow_comment,
						'raumalert' => $raumalert,
						'werbercmd' => $werbercmd
					);
				} else {
					$reset_vip = array(
						'allow_comment' => $allow_comment,
						'raumalert' => $raumalert,
						'werbercmd' => $werbercmd
					);
				}
				dbUpdate('users', $reset_vip, "WHERE id = '" . $s_udata['id'] . "'");
				$core->MUS('updatescmd', $s_udata['id']);
				
				$housekeeping->hkLogs('User Edit', 'User Einstellungen geändert', $user->UserData('id'), $remoteip, $s_udata['id']);
				$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Die Einstellungen wurde erfolgreich geändert!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst User nicht über deine Position Einstellungen zu ändern!</div>';
			}
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_daten'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$s_userdb = dbSelect('*','users', "WHERE id = '" . $getid . "' LIMIT 1");
		$s_udata = $s_userdb->fetch_assoc();
		
		if($s_userdb->num_rows > 0){
			if($user->UserData('id') == $s_udata['id'] || $user->UserData('rank') == '10' || $user->UserData('rank') > $s_udata['rank']){
				$real_name = (isset($_POST['real_name'])) ? $filter->FilterText($_POST['real_name']) : '';
				$rank = (isset($_POST['rank'])) ? $filter->FilterText($_POST['rank']) : '';
				$mail = (isset($_POST['mail'])) ? $filter->FilterText($_POST['mail']) : '';
				$birth = (isset($_POST['birth'])) ? $filter->FilterText($_POST['birth']) : '';
				$motto = (isset($_POST['motto'])) ? $filter->FilterText($_POST['motto']) : '';
				$working = (isset($_POST['working'])) ? $filter->FilterText($_POST['working']) : '';
				$working_text = (isset($_POST['working_text'])) ? $filter->FilterText($_POST['working_text']) : '';
				$secretcode = (isset($_POST['secretcode'])) ? $filter->FilterText($_POST['secretcode']) : '';
				
				if($user->UserData('rank') == 9){
					$rank = '<i>kein Zugriff</i>';
					$mail = '<i>kein Zugriff</i>';
					$birth = '<i>kein Zugriff</i>';
					$secretcode = '<i>kein Zugriff</i>';
				} elseif($user->UserData('rank') == 8){
					$rank = '<i>kein Zugriff</i>';
					$mail = '<i>kein Zugriff</i>';
					$birth = '<i>kein Zugriff</i>';
					$secretcode = '<i>kein Zugriff</i>';
				} elseif($user->UserData('rank') <= 7) {
					$real_name = '<i>kein Zugriff</i>';
					$rank = '<i>kein Zugriff</i>';
					$mail = '<i>kein Zugriff</i>';
					$birth = '<i>kein Zugriff</i>';
					$working = '<i>kein Zugriff</i>';
					$secretcode = '<i>kein Zugriff</i>';
				}
				
				$credits = (isset($_POST['credits'])) ? $filter->FilterText($_POST['credits']) : '';
				$activity_points = (isset($_POST['activity_points'])) ? $filter->FilterText($_POST['activity_points']) : '';
				$vip_points = (isset($_POST['vip_points'])) ? $filter->FilterText($_POST['vip_points']) : '';
				
				if($user->UserData('rank') <= 9){
					$credits = '<i>kein Zugriff</i>';
					$activity_points = '<i>kein Zugriff</i>';
					$vip_points = '<i>kein Zugriff</i>';
				}
				
				$details = '<u><b>Real Name</b></u><br /> <b>Vorher:</b> '.$s_udata['real_name'].' - <b>Nachher:</b> '.$real_name.'<br/><u><b>Rank</b></u><br /> <b>Vorher:</b> '.$s_udata['rank'].' - <b>Nachher:</b> '.$rank.'<br/><u><b>E-Mail</b></u><br /> <b>Vorher:</b> '.$s_udata['mail'].' - <b>Nachher:</b> '.$mail.'<br/><u><b>Geburtstagsdatum</b></u><br /> <b>Vorher:</b> '.$s_udata['birth'].' - <b>Nachher:</b> '.$birth.'<br/><u><b>Motto</b></u><br /> <b>Vorher:</b> '.$s_udata['motto'].' - <b>Nachher:</b> '.$motto.'<br/><u><b>Arbeitsteilung</b></u><br /> <b>Vorher:</b> '.$s_udata['working'].' - <b>Nachher:</b> '.$working.'<br/><u><b>"Über mich"-Text</b></u><br /> <b>Vorher:</b> '.$s_udata['working_text'].' - <b>Nachher:</b> '.$working_text.'<br/><u><b>Sicherheitscode</b></u><br /> <b>Vorher:</b> '.$s_udata['secretcode'].' - <b>Nachher:</b> '.$secretcode.'<hr /><u><b>Taler</b></u><br /> <b>Vorher:</b> '.$s_udata['credits'].' - <b>Nachher:</b> '.$credits.'<br /><u><b>Duckets</b></u><br /> <b>Vorher:</b> '.$s_udata['activity_points'].' - <b>Nachher:</b> '.$activity_points.'<br /><u><b>Diamanten</b></u><br /> <b>Vorher:</b> '.$s_udata['vip_points'].' - <b>Nachher:</b> '.$vip_points.'<br />';
				
				if($user->UserData('rank') == 10){
					if($credits >= 0 && $activity_points >= 0 && $vip_points >= 0){
						if($rank >= 0 && $rank <= 10){
							$change_date = array(
								'real_name' => $real_name,
								'rank' => $rank,
								'mail' => $mail,
								'birth' => $birth,
								'motto' => $motto,
								'working' => $working,
								'working_text' => $working_text,
								'secretcode' => $secretcode,
								'credits' => $credits,
								'activity_points' => $activity_points,
								'vip_points' => $vip_points
							);
							dbUpdate('users', $change_date, "WHERE id = '" . $s_udata['id'] . "'");
					
							$core->MUS('updatecredits', $s_udata['id']);
							$core->MUS('updatepixels', $s_udata['id']);
							$core->MUS('updatepoints', $s_udata['id']);
					
							$housekeeping->hkLogs('User Edit', 'User Daten geändert', $user->UserData('id'), $remoteip, $s_udata['id'], $details);
							$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Die Daten wurde erfolgreich geändert!</div>';
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte Rank nur zwischen 1 und 10!</div>';
						}
					} else {
						$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte Taler, Duckets und Diamanten keine negative Zahlen ausfüllen!</div>';
					}
				} elseif($user->UserData('rank') == 9){
					$change_date = array(
						'real_name' => $real_name,
						'motto' => $motto,
						'working' => $working,
						'working_text' => $working_text
					);
					dbUpdate('users', $change_date, "WHERE id = '" . $s_udata['id'] . "'");

					$housekeeping->hkLogs('User Edit', 'User Daten geändert', $user->UserData('id'), $remoteip, $s_udata['id'], $details);
					$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Die Daten wurde erfolgreich geändert!</div>';

				} elseif($user->UserData('rank') == 8){
					$change_date = array(
						'real_name' => $real_name,
						'motto' => $motto,
						'working' => $working,
						'working_text' => $working_text
					);
					dbUpdate('users', $change_date, "WHERE id = '" . $s_udata['id'] . "'");

					$housekeeping->hkLogs('User Edit', 'User Daten geändert', $user->UserData('id'), $remoteip, $s_udata['id'], $details);
					$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Die Daten wurde erfolgreich geändert!</div>';
				} else {
					$change_date = array(
						'motto' => $motto,
						'working_text' => $working_text
					);
					dbUpdate('users', $change_date, "WHERE id = '" . $s_udata['id'] . "'");

					$housekeeping->hkLogs('User Edit', 'User Daten geändert', $user->UserData('id'), $remoteip, $s_udata['id'], $details);
					$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Die Daten wurde erfolgreich geändert!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst User nicht über deine Position Daten zu ändern!</div>';
			}
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$userdb = dbSelect('*','users', "WHERE id = '" . $getid . "' LIMIT 1");
$udata = $userdb->fetch_assoc();

$_SESSION['csrf_token'] = NoCSRF::generate( 'csrf_token' );
$token = NoCSRF::generate( 'csrf_token' );

$active = 'user-edit';
$headtitle = 'User - Bearbeitung: '.$udata['username'];
$toptitle = 'User <small>Bearbeitung: '.$udata['username'].'</small>';
$title = 'User </li><li class="active">Bearbeitung</li>';
require ('./header.php');
?>
<?php if($userdb->num_rows > 0){ ?>
<script type="text/javascript">
function banPreset(val)
{
	document.getElementById('timer').value = val;
}
</script>
<?php if(!empty($msg)){ echo $msg; } ?>
<div class="col-md-8">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo $udata['username']; ?> bearbeiten</h3>
		</div>
		<div class="box-body table-responsive">
		<form method="post">
			<table id="datat" class="table table-bordered table-striped">
				<tbody>
				<tr>
					<td width="30%"><b>Username</b></td>
					<td width="70%">
						<input class="form-control" value="<?php echo $udata['username']; ?>" type="text" DISABLED>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Name</b></td>
					<td width="70%">
						<input class="form-control" value="<?php echo $udata['real_name']; ?>" type="text" name="real_name" <?php if($user->UserData('rank') < 8){ echo 'DISABLED'; } ?>>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Rank</b></td>
					<td width="70%">
					<select name="rank" class="form-control" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>>
					<?php
							$rankdb = dbSelect('*', 'ranks');
							while ($rank = $rankdb->fetch_array()) {
					?>
						<option value="<?php echo $rank['id']; ?>" <?php if($udata['rank'] == $rank['id']){ echo 'selected'; } ?>><?php echo $rank['name']; ?></option>
					<?php
							}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>VIP</b></td>
					<td width="70%">
						<input class="form-control" value="<?php if($udata['vip'] > 0){ echo 'VIP Mitglied bis zum '.date("d.m.Y - H:i", $udata['vip_time']); } else { echo 'kein VIP Mitglied'; } ?>" type="text" DISABLED>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>E-Mail</b></td>
					<td width="70%">
						<input class="form-control" value="<?php echo $udata['mail']; ?>" type="text" name="mail" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>PIN-Code</b></td>
					<td width="70%"><input class="form-control" value="<?php echo $udata['birth']; ?>" type="text" name="birth" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>></td>
				</tr>
				<tr>
					<td width="30%"><b>Motto</b></td>
					<td width="70%">
						<input class="form-control" value="<?php echo $udata['motto']; ?>" type="text" name="motto">
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Account Erstellung</b></td>
					<td width="70%">
						<input class="form-control" value="<?php echo date("d.m.Y - H:i", $udata['account_created']); ?>" type="text" DISABLED>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Zuletzt Online</b></td>
					<td width="70%">
						<input class="form-control" value="<?php echo $core->lasttimeword($udata['last_online']); ?> (<?php echo date("d.m.Y - H:i", $udata['last_online']); ?>)" type="text" DISABLED>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>IP</b></td>
					<td width="70%">
						<div class="input-group">
							<span class="input-group-addon"><b>registrierte IP</b></span>
							<input class="form-control" value="<?php echo $udata['ip_reg']; ?>" type="text" name="value" DISABLED>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><b>letzter IP</b></span>
							<input class="form-control" value="<?php echo $udata['ip_last']; ?>" type="text" name="value" DISABLED>
						</div>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Währungen</b></td>
					<td width="70%">
						<div class="input-group">
							<input class="form-control" value="<?php echo $udata['credits']; ?>" type="text" name="credits" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>>
							<span class="input-group-addon"><b>Taler</b></span>
						</div>
						<br />
						<div class="input-group">
							<input class="form-control" value="<?php echo $udata['activity_points']; ?>" type="text" name="activity_points" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>>
							<span class="input-group-addon"><b>Duckets</b></span>
						</div>
						<br />
						<div class="input-group">
							<input class="form-control" value="<?php echo $udata['vip_points']; ?>" type="text" name="vip_points" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>>
							<span class="input-group-addon"><b>Diamanten</b></span>
						</div>
					
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Aufgabenteilung</b></td>
					<td width="70%"><input class="form-control" value="<?php echo $udata['working']; ?>" type="text" name="working" <?php if($user->UserData('rank') < 8){ echo 'DISABLED'; } ?>></td>
				</tr>
				<tr>
					<td width="30%"><b>&rsaquo; Über mich &lsaquo; Text</b></td>
					<td width="70%"><input class="form-control" value="<?php echo $udata['working_text']; ?>" type="text" name="working_text"></td>
				</tr>
				<tr>
					<td width="30%"><b>Sicherheitscode</b></td>
					<td width="70%"><input class="form-control" value="<?php if($user->UserData('rank') < 10){ echo '****'; } else { echo $udata['secretcode']; }?>" type="text" name="secretcode" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>></td>
				</tr>
				</tbody>
			</table>
			<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
			<button class="btn btn-primary btn-flat" style="width:100%;" name="submit_daten">Ändern</button>
		</form>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Aktionen</h3>
		</div>
		<div class="box-body">
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/info/<?php echo $udata['id']; ?>"><button class="btn btn-info btn-flat" style="width:100%;">Information anschauen</button></a>
			<br /><br />
			<form method="post">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-warning btn-flat" style="width:100%;" name="submit_look">Aussehen zurücksetzen</button>
			</form>
			<br />
			<form method="post">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_disconnect">Aus Client kicken</button>
			</form>
			<?php if($udata['vip'] > 0){ ?>
			<br />
			<form method="post">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn bg-maroon btn-flat" style="width:100%;" name="submit_vip">VIP Mitglied beenden</button>
			</form>
			<?php } ?>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">(Ent)bannen</h3>
		</div>
		<div class="box-body">
		<form method="post" action="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/ban">
			<?php if(dbSelectNumRows('*', 'bans', "WHERE value = '" . $udata['username'] . "' AND expire > '".time()."'") > 0){ ?>
				<div class="input-group">
					<span class="input-group-addon"><b>Grund</b></span>
					<input class="form-control" type="text" name="reason">
				</div>
				<br />
				<input type="hidden" name="typ" value="0">
				<input type="hidden" name="value" value="<?php echo $udata['username']; ?>">
				<input type="hidden" name="action" value="1">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_settings">Entbannen</button>
			<?php } else { ?>
				<div class="input-group">
					<span class="input-group-addon"><b>Grund</b></span>
					<input class="form-control" type="text" name="reason">
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon"><b>Dauer</b> (in Sekunden)</span>
					<input class="form-control" type="text" name="timer" id="timer">
				</div>
				<br />
				<input type="hidden" name="typ" value="0">
				<input type="hidden" name="value" value="<?php echo $udata['username']; ?>">
				<input type="hidden" name="action" value="0">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_settings">Bannen</button>
				<br />
				<br /><b>Dauer:</b><br />
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
			<?php } ?>
		</form>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Einstellungen</h3>
		</div>
		<div class="box-body table-responsive">
		<form method="post">
			<table id="datat" class="table table-bordered table-striped">
				<tbody>
				<tr>
					<td width="30%"><b>Online verstecken</b></td>
					<td width="70%">
						<select name="hide_online" class="form-control" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>>
							<option value="1" <?php if($udata['hide_online'] == '1'){ echo 'selected'; } ?>>Ja</option>
							<option value="0" <?php if($udata['hide_online'] == '0'){ echo 'selected'; } ?>>Nein</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>F-Anfrage blockieren</b></td>
					<td width="70%">
						<select name="block_newfriends" class="form-control" <?php if($user->UserData('rank') < 10){ echo 'DISABLED'; } ?>>
							<option value="1" <?php if($udata['block_newfriends'] == '1'){ echo 'selected'; } ?>>Ja</option>
							<option value="0" <?php if($udata['block_newfriends'] == '0'){ echo 'selected'; } ?>>Nein</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Tauschen akzeptieren</b></td>
					<td width="70%">
						<select name="accept_trading" class="form-control" <?php if($user->UserData('rank') < 9){ echo 'DISABLED'; } ?>>
							<option value="1" <?php if($udata['accept_trading'] == '1'){ echo 'selected'; } ?>>Ja</option>
							<option value="0" <?php if($udata['accept_trading'] == '0'){ echo 'selected'; } ?>>Nein</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>Newsletter</b></td>
					<td width="70%">
						<select name="newsletter" class="form-control" <?php if($user->UserData('rank') < 9){ echo 'DISABLED'; } ?>>
							<option value="1" <?php if($udata['newsletter'] == '1'){ echo 'selected'; } ?>>Ja</option>
							<option value="0" <?php if($udata['newsletter'] == '0'){ echo 'selected'; } ?>>Nein</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>News Kommentar erlauben</b></td>
					<td width="70%">
						<select name="allow_comment" class="form-control" <?php if($user->UserData('rank') < 6){ echo 'DISABLED'; } ?>>
							<option value="1" <?php if($udata['allow_comment'] == '1'){ echo 'selected'; } ?>>Ja</option>
							<option value="0" <?php if($udata['allow_comment'] == '0'){ echo 'selected'; } ?>>Nein</option>
						</select>
					</td>
				</tr>	
				<tr>
					<td width="30%"><b>&rsaquo; :raumalert &lsaquo; erlauben</b></td>
					<td width="70%">
						<select name="raumalert" class="form-control" <?php if($user->UserData('rank') < 6){ echo 'DISABLED'; } ?>>
							<option value="1" <?php if($udata['raumalert'] == '1'){ echo 'selected'; } ?>>Ja</option>
							<option value="0" <?php if($udata['raumalert'] == '0'){ echo 'selected'; } ?>>Nein</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="30%"><b>&rsaquo; :werber X &lsaquo; erlauben</b></td>
					<td width="70%">
						<select name="werbercmd" class="form-control" <?php if($user->UserData('rank') < 6){ echo 'DISABLED'; } ?>>
							<option value="1" <?php if($udata['werbercmd'] == '1'){ echo 'selected'; } ?>>Ja</option>
							<option value="0" <?php if($udata['werbercmd'] == '0'){ echo 'selected'; } ?>>Nein</option>
						</select>
					</td>
				</tr>
				</tbody>
			</table>
			<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
			<button class="btn btn-primary btn-flat" style="width:100%;" name="submit_settings">Ändern</button>
		</form>
		</div>
	</div>
</div>
<?php } else { ?>
	<div class="error-page">
		<h2 class="headline text-info"> 404</h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> Oops ... 404 Error!</h3>
			<p>
				Der User wurde nicht gefunden! Vielleicht existiert der User nicht. Bitte versuchen Sie erneut: <a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/liste">Userlist</a>.
			</p>
		</div>
	</div>
<?php } ?>
<?php require ('./footer.php'); ?>