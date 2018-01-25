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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.config']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$motd = $filter->FilterText($_POST['motd']);
		$MaxRoomsPerUser = $filter->FilterText($_POST['MaxRoomsPerUser']);
		$MaxPetsPerRoom = $filter->FilterText($_POST['MaxPetsPerRoom']);
		$MaxMarketPlacePrice = $filter->FilterText($_POST['MaxMarketPlacePrice']);
		$vipha_interval = $filter->FilterText($_POST['vipha_interval']);
		$timer = $filter->FilterText($_POST['timer']);
		$credits = $filter->FilterText($_POST['credits']);
		$pixels = $filter->FilterText($_POST['pixels']);
		$points = $filter->FilterText($_POST['points']);
		$vipclothesforhcusers = $filter->FilterText($_POST['vipclothesforhcusers']);
		$allow_friendfurnidrops = $filter->FilterText($_POST['allow_friendfurnidrops']);
		$ShowUsersAndRoomsInAbout = $filter->FilterText($_POST['ShowUsersAndRoomsInAbout']);
		$DisableOtherUsersToMovingOtherUsersToDoor = $filter->FilterText($_POST['DisableOtherUsersToMovingOtherUsersToDoor']);
		$ip_lastforbans = $filter->FilterText($_POST['ip_lastforbans']);

		$query = $mysqli->query("UPDATE server_settings SET motd = '".$motd."', MaxRoomsPerUser = '".$MaxRoomsPerUser."', MaxPetsPerRoom = '".$MaxPetsPerRoom."', MaxMarketPlacePrice = '".$MaxMarketPlacePrice."', vipha_interval = '".$vipha_interval."', timer = '".$timer."', credits = '".$credits."', pixels = '".$pixels."', points = '".$points."', vipclothesforhcusers = '".$vipclothesforhcusers."', allow_friendfurnidrops = '".$allow_friendfurnidrops."', ShowUsersAndRoomsInAbout = '".$ShowUsersAndRoomsInAbout."', DisableOtherUsersToMovingOtherUsersToDoor = '".$DisableOtherUsersToMovingOtherUsersToDoor."', ip_lastforbans = '".$ip_lastforbans."'");  

		$details = 'motd = '.$motd.'<br/>MaxRoomsPerUser = '.$MaxRoomsPerUser.'<br/>MaxPetsPerRoom = '.$MaxPetsPerRoom.'<br/>MaxMarketPlacePrice = '.$MaxMarketPlacePrice.'<br/>vipha_interval = '.$vipha_interval.'<br/>timer = '.$timer.'<br/>credits = '.$credits.'<br/>pixels = '.$pixels.'<br/>points = '.$points.'<br/>vipclothesforhcusers = '.$vipclothesforhcusers.'<br/>allow_friendfurnidrops = '.$allow_friendfurnidrops.'<br/>ShowUsersAndRoomsInAbout = '.$ShowUsersAndRoomsInAbout.'<br/>DisableOtherUsersToMovingOtherUsersToDoor = '.$DisableOtherUsersToMovingOtherUsersToDoor.'<br/>ip_lastforbans = '.$ip_lastforbans;
		$housekeeping->hkLogs('Client Config', 'Client Einstellungen geändert', $user->UserData('id'), $remoteip, '0', $details);

		$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Gespeichern!</b><br /> Die Einstellungen wurden erfolgreich gespeichert!</div>';
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'client-config';
$headtitle = 'Client - Config';
$toptitle = 'Client <small>Config</small>';
$title = 'Client </li><li class="active">Config</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Client <small>Config</small></h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<form method="post">
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
			<div class="col-md-4">
				<label>Willkommennachricht</label>
				<div class="form-group">
					<input class="form-control" name="motd" value="<?php echo $housekeeping->ServerSettings('motd');?>" type="text">
				</div>
				<br />
				<label>Maximale Räume pro User</label>
				<div class="input-group">
					<input class="form-control" name="MaxRoomsPerUser" value="<?php echo $housekeeping->ServerSettings('MaxRoomsPerUser');?>" type="text"><span class="input-group-addon"> Räume pro User</span>
				</div>
				<br />
				<label>Maximale Haustiere pro Raum</label>
				<div class="input-group">
					<input class="form-control" name="MaxPetsPerRoom" value="<?php echo $housekeeping->ServerSettings('MaxPetsPerRoom');?>" type="text"><span class="input-group-addon"> Haustiere pro Raum</span>
				</div>
				<br />
				<label>Maximale Taleranzahl im Marktplatz</label>
				<div class="input-group">
					<input class="form-control" name="MaxMarketPlacePrice" value="<?php echo $housekeeping->ServerSettings('MaxMarketPlacePrice');?>" type="text"><span class="input-group-addon"> Taler</span>
				</div>
				<br />
				<label>VIP Hotelalert Intervall</label>
				<div class="input-group">
					<input class="form-control" name="vipha_interval" value="<?php echo $housekeeping->ServerSettings('vipha_interval');?>" type="text"><span class="input-group-addon"> Sekunden</span>
				</div>
				<br />
			</div>
			<div class="col-md-4">
				<label>Timer (Taler, Pixel & Diamanten pro XX Minuten)</label>
				<div class="input-group">
					<input class="form-control" name="timer" value="<?php echo $housekeeping->ServerSettings('timer');?>" type="text"><span class="input-group-addon"> Minuten</span>
				</div>
				<br />
				<label>Taler pro Minuten</label>
				<div class="input-group">
					<input class="form-control" name="credits" value="<?php echo $housekeeping->ServerSettings('credits');?>" type="text"><span class="input-group-addon"> Taler pro Minuten</span>
				</div>
				<br />
				<label>Pixel pro Minuten</label>
				<div class="input-group">
					<input class="form-control" name="pixels" value="<?php echo $housekeeping->ServerSettings('pixels');?>" type="text"><span class="input-group-addon"> Pixels pro Minuten</span>
				</div>
				<br />
				<label>Diamanten pro Minuten</label>
				<div class="input-group">
					<input class="form-control" name="points" value="<?php echo $housekeeping->ServerSettings('points');?>" type="text"><span class="input-group-addon"> Diamanten pro Minuten</span>
				</div>
				<br />
			</div>
			<div class="col-md-4">
				<label>VIP Kleidungen für HC User</label>
				<select name="vipclothesforhcusers" class="form-control">
					<option value="1" <?php if($housekeeping->ServerSettings('vipclothesforhcusers') == '1'){ echo 'selected'; } ?>>Ja</option>
					<option value="0" <?php if($housekeeping->ServerSettings('vipclothesforhcusers') == '0'){ echo 'selected'; } ?>>Nein</option>
				</select>
				<br />
				<label>Erlaubt Möbel von Freunde im eigene Raum zu legen</label>
				<select name="allow_friendfurnidrops" class="form-control">
					<option value="1" <?php if($housekeeping->ServerSettings('allow_friendfurnidrops') == '1'){ echo 'selected'; } ?>>Ja</option>
					<option value="0" <?php if($housekeeping->ServerSettings('allow_friendfurnidrops') == '0'){ echo 'selected'; } ?>>Nein</option>
				</select>
				<br />
				<label>Zeigt USer und Raum in ":info" oder ":about" an</label>
				<select name="ShowUsersAndRoomsInAbout" class="form-control">
					<option value="1" <?php if($housekeeping->ServerSettings('ShowUsersAndRoomsInAbout') == '1'){ echo 'selected'; } ?>>Ja</option>
					<option value="0" <?php if($housekeeping->ServerSettings('ShowUsersAndRoomsInAbout') == '0'){ echo 'selected'; } ?>>Nein</option>
				</select>
				<br />
				<label>Deaktivierung die "push", "pull" / "spush" einer User zur Tür</label>
				<select name="DisableOtherUsersToMovingOtherUsersToDoor" class="form-control">
					<option value="1" <?php if($housekeeping->ServerSettings('DisableOtherUsersToMovingOtherUsersToDoor') == '1'){ echo 'selected'; } ?>>Ja</option>
					<option value="0" <?php if($housekeeping->ServerSettings('DisableOtherUsersToMovingOtherUsersToDoor') == '0'){ echo 'selected'; } ?>>Nein</option>
				</select>
				<br />
				<label>IP Ban mit letzter IP benutzen</label>
				<select name="ip_lastforbans" class="form-control">
					<option value="1" <?php if($housekeeping->ServerSettings('ip_lastforbans') == '1'){ echo 'selected'; } ?>>Ja</option>
					<option value="0" <?php if($housekeeping->ServerSettings('ip_lastforbans') == '0'){ echo 'selected'; } ?>>Nein</option>
				</select>
				<br />
			</div>
			<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
			<center><button type="submit" name="submit" class="btn btn-primary" style="width:95%;">Speichern</button></center>
		</div>
	</div>
	</form>
</div>
<?php require ('./footer.php'); ?>