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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['homepage.support']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_GET['del'])){
	$supportid = $filter->FilterText($_GET['del']);
	
	$checksupport = dbSelect('*','cms_support', "WHERE id = '" . $supportid . "' LIMIT 1");
	$supportdb = $checksupport->fetch_assoc();
	if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage.support.del']){
		if($checksupport->num_rows > 0){
			$delete = dbDelete('cms_support', "WHERE id = '" . $supportid . "'");
			$housekeeping->hkLogs('Support', 'Supportticket gelöscht', $user->UserData('id'), $remoteip);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Das Supportticket wurde erfolgreich gelöscht!</div>';
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Supportticket existiert nicht!</div>';
		}
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du hast kein Zugriff Supporttickets zu löschen!</div>';
	}
}

$active = 'homepage-support';
$headtitle = 'Homepage - Support';
$toptitle = 'Homepage <small>Support</small>';
$title = 'Homepage </li><li class="active">Support</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Support<small>Liste</small></h3>     
	</div>
	<div class="box-body table-responsive">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<table id="homepage" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="15%">User</th>
					<th width="25%">Thema</th>
					<th width="10%">Priorität</th>
					<th width="10%">Datum</th>
					<th width="15%">Bearbeitung</th>
					<th width="20%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$supportdb = dbSelectS('*', 'cms_support', "ORDER BY id DESC");
			while ($row = $supportdb->fetch_array()) {
				$userdb = dbSelect('*', 'users', "WHERE id = '". $row['user_id'] ."' LIMIT 1");
				$userdata = $userdb->fetch_assoc();
				if($row['edit_by'] > 0){
					$editdb = dbSelect('*', 'users', "WHERE id = '". $row['edit_by'] ."' LIMIT 1");
					$editer = $editdb->fetch_assoc();
				}
		?>
			<?php if($row['edit_by'] > 0){ ?>
				<tr class="green" style="opacity:0.7;">
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $userdata['username'] ?></td>
					<td><?php echo $row['topic']; ?></td>
					<td><?php if($row['prioritaet'] == 3){ echo '<b>HOCH</b>'; } elseif($row['prioritaet'] == 2){ echo '<b>MITTEL</b>'; } else { echo '<b>NIEDRIG</b>'; }?></td>
					<td><?php echo date("d.m.Y - H:i",$row['date']); ?></td>
					<td><?php if($row['edit_by'] > 0){ echo 'Bearbeitet von '.$editer['username'].'<br />um '.date("d.m.Y - H:i",$row['edit_date']); } else { echo '<font color="red"><b>nicht bearbeitet</b></font>'; } ?></td>
					<td><center><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/support?del=<?php echo $row['id']; ?>"><i class="fa fa-minus"></i> Löschen</a> <a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/support/edit/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Bearbeiten</a></center></td>
				</tr>
			<?php } else { ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $userdata['username'] ?></td>
					<td><?php echo $row['topic']; ?></td>
					<td><?php if($row['prioritaet'] == 3){ echo '<font color="#FF0000"><b>HOCH</b></font>'; } elseif($row['prioritaet'] == 2){ echo '<font color="#DF7401"><b>MITTEL</b></font>'; } else { echo '<font color="#0489B1"><b>NIEDRIG</b></font>'; }?></td>
					<td><?php echo date("d.m.Y - H:i",$row['date']); ?></td>
					<td><?php if($row['edit_by'] > 0){ echo 'Bearbeitet von '.$editer['username'].'<br />um '.date("d.m.Y - H:i",$row['edit_date']); } else { echo '<font color="red"><b>nicht bearbeitet</b></font>'; } ?></td>
					<td><center><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/support?del=<?php echo $row['id']; ?>"><i class="fa fa-minus"></i> Löschen</a> <a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/support/edit/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Antworten</a></center></td>
				</tr>
			<?php } ?>
		<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>Thema</th>
					<th>Priorität</th>
					<th>Datum</th>
					<th>Bearbeitung</th>
					<th>Aktion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>