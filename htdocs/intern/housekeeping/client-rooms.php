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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.rooms']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'client-rooms';
$headtitle = 'Client - Räume';
$toptitle = 'Client <small>Räume</small>';
$title = 'Client </li><li class="active">Räume</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Räume <small>Liste</small></h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="client" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="15%">Name</th>
					<th width="10%">Besitzer</th>
					<th width="15%">Kategorie</th>
					<th width="10%">Zustand</th>
					<th width="10%">User maximal</th>
					<th width="10%">Modell</th>
					<th width="10%">Option</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$users = dbSelectS('*', 'rooms', "ORDER BY id DESC");
			while ($row = $users->fetch_array()) {
				$categoryid = dbSelect('*', 'navigator_flatcats', "WHERE id = '". $row['category'] ."' LIMIT 1");
				$category = $categoryid->fetch_assoc();
		?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['caption']; ?></td>
				<td><?php echo $row['owner']; ?></td>
				<td><?php echo $category['caption']; ?></td>
				<td><?php if($row['state'] == 'open'){ echo 'Offen'; } elseif($row['state'] == 'locked'){ echo 'Klingel'; } else { echo 'Passwort'; }?></td>
				<td><?php echo $row['users_max']; ?></td>
				<td><?php echo $row['model_name']; ?></td>
				<td><center><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/rooms/edit/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Bearbeiten</a></center></td>
			</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Besitzer</th>
					<th>Kategorie</th>
					<th>Zustand</th>
					<th>User maximal</th>
					<th>Modell</th>
					<th>Option</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>