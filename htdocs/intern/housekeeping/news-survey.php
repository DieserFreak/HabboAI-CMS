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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['news.survey']){
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
			$form_data_newssurvey = array(
				'survey' => '0',
				'survey_question' => '',
				'survey_endtime' => '',
				'survey_art' => '1'
			);
			dbUpdate('cms_news', $form_data_newssurvey, "WHERE id = '".$newsid."' LIMIT 1");
			$delete = dbDelete('cms_news_survey', "WHERE news_id = '" . $newsid . "'");
			$delete = dbDelete('cms_news_survey_results', "WHERE news_id = '" . $newsid . "'");
			$housekeeping->hkLogs('News Umfrage', 'News (<b>ID:</b> '.$newsid.')Umfrage gelöscht', $user->UserData('id'), $remoteip);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Umfrage wurde erfolgreich gelöscht!</div>';
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die News existiert nicht!</div>';
		}
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst diese News nicht löschen! Entweder gehört es dir nicht oder dein Rank ist zu niedrig!</div>';
	}
}

$active = 'news-survey';
$headtitle = 'News - Umfrage';
$toptitle = 'News <small>Umfrage</small>';
$title = 'News </li><li class="active">Umfrage</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">News <small>Umfrage Liste</small></h3>     
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
					<th width="10%">erstellt von</th>
					<th width="5%">Status</th>
					<th width="10%">Datum</th>
					<th width="20%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$newslist = dbSelect('*', 'cms_news', "WHERE survey = 1 ORDER BY id DESC");
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
				<td><?php echo $userdata['username']; ?></td>
				<td><?php if($row['status'] == '1'){ echo 'Aktiv'; } else { echo 'Inaktiv'; } ?></td>
				<td><?php echo date("d.m.Y - H:i",$row['date']); ?></td>
				<td><center>
					<a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey/result/<?php echo $row['id']; ?>"><i class="fa fa-bars"></i> Ergebnis</a>
					<a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey/edit/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Bearbeiten</a>
					<a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey/del/<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i> Löschen</a>
				</center></td>
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
					<th>erstellt von</th>
					<th>Status</th>
					<th>Datum</th>
					<th>Aktion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>