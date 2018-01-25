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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.list']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'user-list';
$headtitle = 'User - Liste';
$toptitle = 'User <small>Liste</small>';
$title = 'User </li><li class="active">Liste</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">User - Liste</h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="userlist" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="8%">User</th>
					<th width="10%">Rank</th>
					<th width="15%">E-Mail</th>
					<th width="10%">registrierte IP</th>
					<th width="10%">letzter IP</th>
					<th width="13%">registrierte Datum</th>
					<th width="13%">zuletzt Online</th>
					<th width="21%">Option</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$users = dbSelectS('*', 'users', "ORDER BY id DESC");
			while ($row = $users->fetch_array()) {
				$rankid = dbSelect('*', 'ranks', "WHERE id = '". $row['rank'] ."' LIMIT 1");
				$rank = $rankid->fetch_assoc();
		?>
			<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $rank['name']; ?></td>
					<td><?php echo $row['mail']; ?></td>
					<td><?php echo $row['ip_reg']; ?></td>
					<td><?php echo $row['ip_last']; ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['account_created']); ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['last_online']); ?></td>
					<td><center><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/info/<?php echo $row['id']; ?>"><i class="fa fa-credit-card"></i> Info</a><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/edit/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Bearbeiten</a></center></td>
				</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>Rank</th>
					<th>E-Mail</th>
					<th>registrierte IP</th>
					<th>letzter IP</th>
					<th>registrierte Datum</th>
					<th>zuletzt Online</th>
					<th>Option</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>