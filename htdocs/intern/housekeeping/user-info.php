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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.info']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_POST['usersearch'])){
	if(!empty($_POST['usersearch'])){
		$search = $filter->FilterText($_POST['usersearch']);
		$userdb = dbSelect('*','users', "WHERE username = '" . $search . "' LIMIT 1");
		$udata = $userdb->fetch_assoc();
		header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/user/info/'.$udata['id']);
	}
}

$getid = $filter->FilterText($_GET['id']);

$userdb = dbSelect('*','users', "WHERE id = '" . $getid . "' LIMIT 1");
$udata = $userdb->fetch_assoc();

$uinfodb = dbSelect('*', 'user_info', "WHERE user_id = '" . $udata['id'] . "'");
$userinfo = $uinfodb->fetch_assoc();

$ustatsdb = dbSelect('*', 'user_stats', "WHERE id = '" . $udata['id'] . "'");
$userstats = $ustatsdb->fetch_assoc();
						
$active = 'user-info';
$headtitle = 'User - Information: '.$udata['username'];
$toptitle = 'User <small>Information: '.$udata['username'].'</small>';
$title = 'User </li><li class="active">Informationen</li>';
require ('./header.php');
?>
<?php if($userdb->num_rows > 0){ ?>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Allgemein</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table id="datat" class="table table-bordered table-striped">
				<tbody>
				<tr>
					<td width="50%"><b>Status</b></td>
					<td width="50%"><?php if($udata['online'] == 1){ echo '<font color="green">Online</font>'; } else { echo '<font color="red">Offline</font>'; } ?></td>
				</tr>
				<tr>
					<td><b>zuletzt Online</b></td>
					<td><?php echo $core->lasttimeword($udata['last_online']); ?></td>
				</tr>
				<tr>
					<td><b>VIP</b></td>
					<td><?php if($udata['vip'] == 1){ echo 'Ja, läuft bis zum '.date("d.m.Y", $udata['vip_time']); } else { echo 'Nein'; } ?></td>
				</tr>
				<tr>
					<td><b>Bann</b></td>
					<td><?php if(dbSelectNumRows('*', 'bans', "WHERE value = '" . $udata['username'] . "' AND expire > '".time()."'") > 0){ echo 'Ja'; } else { echo 'Nein'; } ?></td>
				</tr>
				<tr>
					<td><b>Bans insgesamt</b></td>
					<td><?php echo dbSelectNumRows('*', 'bans', "WHERE value = '" . $udata['username'] . "'"); ?>-mal</td>
				</tr>
				<tr>
					<td><b>User gebannt</b></td>
					<td><?php echo dbSelectNumRows('*', 'bans', "WHERE added_by = '" . $udata['username'] . "'"); ?>-mal</td>
				</tr>
				<tr>
					<td><b>Anzahl fremde Meldungen</b></td>
					<td><?php echo $userinfo['cautions']; ?>-mal</td>
				</tr>
				<tr>
					<td><b>Hilferufe gesendet</b></td>
					<td><?php echo $userinfo['cfhs']; ?>-mal</td>
				</tr>
				<tr>
					<td><b>unnötige Hilferufe gesendet</b></td>
					<td><?php echo $userinfo['cfhs_abusive']; ?>-mal</td>
				</tr>
				<tr>
					<td><b>Client eingecheckt</b></td>
					<td><?php echo $userinfo['client_counter']; ?>-mal</td>
				</tr>
				<tr>
					<td><b>Bestellungen</b></td>
					<td><?php echo dbSelectNumRows('*', 'cms_shop_purchase', "WHERE user_id = '" . $udata['id'] . "'"); ?>-mal</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-5">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Statistik</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table id="datat" class="table table-bordered table-striped">
				<tbody>
				<tr>
					<td width="40%"><b>Räume besucht</b></td>
					<td width="60%"><?php echo $userstats['RoomVisits']; ?>-mal</td>
				</tr>
				<tr>
					<td><b>Onlinezeit</b></td>
					<td><?php echo round($userstats['OnlineTime'] / 60 / 60); ?> Stunden</td>
				</tr>
				<tr>
					<td><b>Respekt</b></td>
					<td><?php echo $userstats['Respect']; ?>-mal erhalten | <?php echo $userstats['RespectGiven']; ?>-mal verteilt</td>
				</tr>
				<tr>
					<td><b>Geschenke</b></td>
					<td><?php echo $userstats['GiftsReceived']; ?>-mal beschenkt | <?php echo $userstats['GiftsGiven']; ?>-mal verschenkt</td>
				</tr>
				<tr>
					<td><b>Erfahrungspunkte</b></td>
					<td><?php echo $userstats['AchievementScore']; ?> Erfahrungspunkte</td>
				</tr>
				<tr>
					<td><b>Anzahl eigene Bots</b></td>
					<td><?php echo dbSelectNumRows('*', 'user_bots', "WHERE userid = '" . $udata['id'] . "'"); ?> Bot(s)</td>
				</tr>
				<tr>
					<td><b>Empfohlene Räume</b></td>
					<td><?php echo $userstats['staff_picks']; ?>-mal</td>
				</tr>
				<tr>
					<td><b>Räume</b></td>
					<td><?php echo dbSelectNumRows('*', 'rooms', "WHERE owner = '" . $udata['username'] . "'"); ?> Räume</td>
				</tr>
				<tr>
					<td><b>Freunde</b></td>
					<td><?php echo dbSelectNumRows('*', 'messenger_requests', "WHERE to_id = '" . $udata['id'] . "'"); ?> Anfrage | <?php echo dbSelectNumRows('*', 'messenger_friendships', "WHERE user_one_id = '" . $udata['id'] . "' OR user_two_id = '" . $udata['id'] . "'"); ?> Freunde</td>
				</tr>
				<tr>
					<td><b>Möbel</b></td>
					<td><?php echo dbSelectNumRows('*', 'items', "WHERE user_id = '" . $udata['id'] . "'"); ?> Möbel</td>
				</tr>
				<tr>
					<td><b>Möbel im Inventar</b></td>
					<td><?php echo dbSelectNumRows('*', 'items', "WHERE user_id = '" . $udata['id'] . "' AND room_id = '0'"); ?> Möbel</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Aktionen</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/edit/<?php echo $udata['id']; ?>"><button class="btn btn-danger btn-flat" style="width:100%;">Bearbeiten</button></a>
			<br /><br /><br />
			<form action="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/clon" method="post">
				<input type="hidden" name="value" value="<?php echo $udata['username']; ?>">
				<input type="hidden" name="type" value="user">
				<button class="btn btn-warning btn-flat" style="width:100%;" name="submit">Kloncheck</button>
			</form>
			<br /><br />
			<form action="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/login" method="post">
				<input type="hidden" name="value" value="<?php echo $udata['username']; ?>">
				<input type="hidden" name="type" value="user">
				<input type="hidden" name="limit" value="500">
				<button class="btn bg-maroon btn-flat" style="width:100%;" name="submit">Loginlogs</button>
			</form>
			<br />
			<form action="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/chat" method="post">
				<input type="hidden" name="value" value="<?php echo $udata['username']; ?>">
				<input type="hidden" name="type" value="user">
				<input type="hidden" name="limit" value="500">
				<button class="btn bg-maroon btn-flat" style="width:100%;" name="submit">Chatlogs</button>
			</form>
			<br />
			<form action="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/rooms" method="post">
				<input type="hidden" name="value" value="<?php echo $udata['username']; ?>">
				<input type="hidden" name="type" value="user">
				<input type="hidden" name="limit" value="500">
				<button class="btn bg-maroon btn-flat" style="width:100%;" name="submit">Raumlogs</button>
			</form>
			<br />
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Badges (<?php echo dbSelectNumRows('*', 'user_badges', "WHERE user_id = '" . $udata['id'] . "'"); ?>)</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<table width='100%' cellspacing='0' cellpadding='5' align='center' border='0'>
				<tr>
					<td>
						<div style="padding:5px;">
				<?php
					$badgesdb = dbSelect('*', 'user_badges', "WHERE user_id = '" . $udata['id'] . "' ORDER BY badge_id DESC");
					
					if($badgesdb->num_rows < 1){
						echo '<center>Kein Badge gefunden</center>';
					}
					
					while ($ubadge = $badgesdb->fetch_array()) {
				?>
					<img src="<?php echo $_CONFIG['website']['url'].'/'.$_CONFIG['website']['badgesurl'].$ubadge['badge_id']; ?>.gif">
				<?php
					}
				?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Figure</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<table width='100%' cellspacing='0' cellpadding='5' align='center' border='0'>
				<tr>
					<td>
						<center>
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=6&head_direction=6&gesture=sml">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=8&head_direction=8&gesture=sml">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=5&head_direction=5&gesture=sml">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=1&head_direction=1&gesture=sml">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=4&head_direction=4&gesture=sml">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=2&head_direction=2&gesture=sml">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=7&head_direction=7&gesture=sml">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $udata['look']; ?>&size=b&direction=3&head_direction=3&gesture=sml">
						</center>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Loginlogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body chart-responsive">
			<div class="chart" id="userinfo-login" style="height: 300px;"></div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Usernamelogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table id="datat" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="35%">alte Username</th>
						<th width="35%">neue Username</th>
						<th width="30%">Datum</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$changename = dbSelect('*', 'user_namechange', "WHERE user_id = '" . $udata['id'] . "' ORDER BY id DESC");
				
				if($changename->num_rows < 1){
					echo '<td colspan="3">Keine Einträge gefunden</th>';
				}
				
				while ($nchange = $changename->fetch_array()) {
			?>
				<tr>
					<td><?php echo $nchange['oldname']; ?></td>
					<td><?php echo $nchange['newname']; ?></td>
					<td><?php echo date("d.m.Y - H:i",$nchange['timestamp']); ?></td>
				</tr>
			<?php
				}
			?>
				</tbody>
				<tfoot>
					<tr>
						<th>alte Username</th>
						<th>neue Username</th>
						<th>Datum</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Chatlogs</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body chart-responsive">
			<div class="chart" id="userinfo-chatlogs" style="height: 300px;"></div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Verwarnungen</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table id="datat" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="70%">Anmerkung</th>
						<th width="30%">Datum</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$userwarnung = dbSelect('*', 'user_warning', "WHERE user_id = '" . $udata['id'] . "' ORDER BY id DESC");
				
				if($userwarnung->num_rows < 1){
					echo '<td colspan="2">Keine Einträge gefunden</th>';
				}
				
				while ($waning = $userwarnung->fetch_array()) {
			?>
				<tr>
					<td><?php echo $waning['reason']; ?></td>
					<td><?php echo date("d.m.Y - H:i",$waning['timestamp']); ?></td>
				</tr>
			<?php
				}
			?>
				</tbody>
				<tfoot>
					<tr>
						<th>Anmerkung</th>
						<th>Datum</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div><br>
<div class="col-md-4">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">Support-Anfragen</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table id="datat" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="70%">Thema</th>
						<th width="30%">Datum</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$userwarnung = dbSelect('*', 'user_spielerakte', "WHERE user_id = '" . $udata['id'] . "' ORDER BY id DESC");
				
				if($userwarnung->num_rows < 1){
					echo '<td colspan="2">Keine Einträge gefunden</th>';
				}
				
				while ($waning = $userwarnung->fetch_array()) {
			?>
				<tr>
					<td><?php echo $waning['reason']; ?></td>
					<td><?php echo date("d.m.Y - H:i",$waning['timestamp']); ?></td>
				</tr>
			<?php
				}
			?>
				</tbody>
				<tfoot>
					<tr>
						<th>Thema</th>
						<th>Datum</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="box box-solid box-primary">
		<div class="box-header">
			<h3 class="box-title">MOD Tickets</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body chart-responsive">
			<div class="chart" id="userinfo-modtickets" style="height: 300px;"></div>
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