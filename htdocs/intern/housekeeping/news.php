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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['news']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_GET['del'])){
	$newsid = $filter->FilterText($_GET['del']);
	
	$checknews = dbSelect('*','cms_news', "WHERE id = '" . $newsid . "' LIMIT 1");
	$newsdb = $checknews->fetch_assoc();
	if($newsdb['user_id'] == $user->UserData('id') || $user->UserData('rank') >= $_CONFIG['housekeeping']['right']['news.delall']){
		if($checknews->num_rows > 0){
			$delete = dbDelete('cms_news', "WHERE id = '" . $newsid . "'");
			$delete = dbDelete('cms_news_survey', "WHERE news_id = '" . $newsid . "'");
			$delete = dbDelete('cms_news_survey_results', "WHERE news_id = '" . $newsid . "'");
			$housekeeping->hkLogs('News', 'News gelöscht', $user->UserData('id'), $remoteip);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die News wurde erfolgreich gelöscht!</div>';
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die News existiert nicht!</div>';
		}
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst diese News nicht löschen! Entweder gehört es dir nicht oder dein Rank ist zu niedrig!</div>';
	}
}

$active = 'news-home';
$headtitle = 'News - Liste';
$toptitle = 'News <small>Liste</small>';
$title = 'News </li><li class="active">Liste</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">News <small>Liste</small></h3>     
			<div class="pull-right box-tools">
				<a class="btn btn-primary btn-sm" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/create" style="color:#ffffff;">News erstellen</a>
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<table id="newsrows" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="20%">Titel</th>
					<th width="15%">Kategorie</th>
					<th width="10%">Autor</th>
					<th width="10%">erstellt von</th>
					<th width="5%">Status</th>
					<th width="10%">Datum</th>
					<th width="5%">Views</th>
					<th width="15%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$newslist = dbSelectS('*', 'cms_news', "ORDER BY id DESC");
			while ($row = $newslist->fetch_array()) {
				$catdb = dbSelect('*', 'cms_news_category', "WHERE id = '" . $row['category'] . "' LIMIT 1");
				$cat = $catdb->fetch_assoc();
				$userdb = dbSelect('*', 'users', "WHERE id = '" . $row['user_id'] . "' LIMIT 1");
				$userdata = $userdb->fetch_assoc();
		?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $cat['category']; ?></td>
				<td><?php echo $row['autor']; ?></td>
				<td><?php echo $userdata['username']; ?></td>
				<td><?php if($row['status'] == '1'){ echo 'Aktiv'; } else { echo 'Inaktiv'; } ?></td>
				<td><?php echo date("d.m.Y - H:i",$row['date']); ?></td>
				<td><?php echo $row['views']; ?></td>
				<td><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/edit/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Bearbeiten</a><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/del/<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i> Löschen</a></td>
			</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Titel</th>
					<th>Kategorie</th>
					<th>Autor</th>
					<th>erstellt von</th>
					<th>Status</th>
					<th>Datum</th>
					<th>Views</th>
					<th>Aktion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>