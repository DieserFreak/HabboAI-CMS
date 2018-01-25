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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.currency']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$action = (isset($_POST['action'])) ? $filter->FilterText($_POST['action']) : '';
$value = (isset($_POST['value'])) ? $filter->FilterText($_POST['value']) : '';
$credits = (isset($_POST['credits'])) ? $filter->FilterText($_POST['credits']) : '';
$activity_points = (isset($_POST['activity_points'])) ? $filter->FilterText($_POST['activity_points']) : '';
$vip_points = (isset($_POST['vip_points'])) ? $filter->FilterText($_POST['vip_points']) : '';
$reason = (isset($_POST['reason'])) ? $filter->FilterText($_POST['reason']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$userdb = dbSelect('*','users', "WHERE username = '" . $value . "' LIMIT 1");
		$udata = $userdb->fetch_assoc();
		
		if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.currency.credits']){ $credits = '0'; }
		if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.currency.pixels']){ $activity_points = '0'; }
		if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.currency.dias']){ $vip_points = '0'; }
		
		if($userdb->num_rows > 0){
			if(strlen($credits) > 0 && strlen($activity_points) > 0 && strlen($vip_points) > 0 && !empty($reason)){
				if(is_numeric($credits) && is_numeric($activity_points) && is_numeric($vip_points)){
					if($credits  >= 0 && $activity_points  >= 0 && $vip_points >= 0){
						if($action == 0){ $aktion = 'Erhalten'; } else { $aktion = 'Abziehen'; }
						$details = '<big>'.$aktion.'</big><br /><br /><b>Taler:</b> '.$credits.'<br/><b>Duckets:</b> '.$activity_points.'<br/><b>Diamanten:</b> '.$vip_points.'<br/><br/><b>Grund:</b>'.$reason;
						$housekeeping->currency($udata['id'], $action, $credits, $activity_points, $vip_points);
						$housekeeping->hkLogs('User Währung', 'Währung(en) gegeben/abgezogen', $user->UserData('id'), $remoteip, $udata['id'], $details);
						$msg = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gefunden!</b><br /> Die Währung(en) wurde(n) erfolgreich gegeben/abgezogen!</div>';
					} else {
						$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, keine negative Zahlen!</div>';	
					}
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, Zahlen angeben!</div>';	
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, Zahlen und Grund angeben!</div>';	
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der User extistiert nicht!</div>';
		}
	}
	catch ( Exception $e )
	{
		echo 'Error! Versuchen Sie nochmal!';
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'user-currency';
$headtitle = 'User - Währung senden';
$toptitle = 'User <small>Währung senden</small>';
$title = 'User </li><li class="active">Währung senden</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Währungen</h3>
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
					<span class="input-group-addon">Aktion</span>
					<select name="action" class="form-control">
						<option value="0" <?php if($action == '0'){ echo 'selected'; } ?>>Erhalten</option>
						<option value="1" <?php if($action == '1'){ echo 'selected'; } ?>>Abziehen</option>
					</select>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon">Username</span>
					<input class="form-control" value="<?php echo $value; ?>" type="text" name="value">
				</div>
			</div>
			<div class="col-xs-2">
				<div class="input-group">
					<input class="form-control" value="<?php echo $credits; ?>" type="text" name="credits" <?php if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.currency.credits']){ echo 'DISABLED'; }?>>
					<span class="input-group-addon">Taler</span>
				</div>
			</div>
			<div class="col-xs-2">
				<div class="input-group">
					<input class="form-control" value="<?php echo $activity_points; ?>" type="text" name="activity_points" <?php if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.currency.pixels']){ echo 'DISABLED'; }?>>
					<span class="input-group-addon">Duckets</span>
				</div>
			</div>
			<div class="col-xs-2">
				<div class="input-group">
					<input class="form-control" value="<?php echo $vip_points; ?>" type="text" name="vip_points" <?php if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.currency.dias']){ echo 'DISABLED'; }?>>
					<span class="input-group-addon">Diamanten</span>
				</div>
			</div>
			<div class="col-xs-8">
				<br />
				<div class="input-group">
					<span class="input-group-addon">Grund</span>
					<input class="form-control" value="<?php echo $reason; ?>" type="text" name="reason">
				</div>
			</div>
			<div class="col-xs-4">
				<br />
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Senden</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>