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

$newsid = $filter->FilterText($_GET['id']);

$newsdb = dbSelect('*','cms_news', "WHERE id = '" . $newsid . "' AND survey = '1' LIMIT 1");
$newsdata = $newsdb->fetch_assoc();

$active = 'news-survey';
$headtitle = 'News - Umfrage Ergebnis';
$toptitle = 'News <small>Umfrage</small> <small>Ergebnis</small>';
$title = 'News </li><li class="active">Umfrage</li><li class="active">Ergebnis</li>';
require ('./header.php');
?>
<?php if($newsdb->num_rows > 0){ ?>
	<?php if($newsdata['survey_art'] == 2){ ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">News <small>Umfrage - Antwortmöglichkeiten - Anzahl Abstimmung</small></h3>     
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="70%">Antwortmöglichkeit</th>
						<th width="30%">Abstimmunganzahl</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$newslist = dbSelect('*', 'cms_news_survey', "WHERE news_id = '".$newsid."' ORDER BY id ASC");
				while ($row = $newslist->fetch_array()) {
					$countdb = dbSelect('COUNT(*)', 'cms_news_survey_results', "WHERE answer_id = '". $row['id'] . "' AND news_id = '" . $newsid . "' LIMIT 1");
					$count = $countdb->fetch_assoc();
			?>
				<tr>
					<td><?php echo $row['answer']; ?></td>
					<td><?php echo $count['COUNT(*)']; ?>-mal abgestimmt</td>
				</tr>
			<?php
				}
			?>
				</tbody>
				<tfoot>
					<tr>
						<th>Antwortmöglichkeit</th>
						<th>Abstimmunganzahl</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<?php } ?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">News <small>Umfrage - Antworten von User</small></h3>     
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body table-responsive">
			<table id="newsrows" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="20%">User</th>
						<th width="60%">Antwort</th>
						<th width="20%">Datum</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$newslist = dbSelect('*', 'cms_news_survey_results', "WHERE news_id = '".$newsid."' ORDER BY id DESC");
				while ($row = $newslist->fetch_array()) {
					$userdb = dbSelect('*', 'users', "WHERE id = '" . $row['user_id'] . "' LIMIT 1");
					$userdata = $userdb->fetch_assoc();
					
					if($row['answer_id'] != 0){
						$answerdb = dbSelect('*', 'cms_news_survey', "WHERE id = '" . $row['answer_id'] . "' LIMIT 1");
						$answeroptions = $answerdb->fetch_assoc();
					}
			?>
				<tr>
					<td><?php echo $userdata['username']; ?></td>
					<td><?php if($newsdata['survey_art'] == 1){ if(!empty($row['answer_text'])){ echo $row['answer_text']; } else { echo '<small>kein Antwort</small>'; } } else { echo $answeroptions['answer']; } ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['timestamp']); ?></td>
				</tr>
			<?php
				}
			?>
				</tbody>
				<tfoot>
					<tr>
						<th>User</th>
						<th>Antwort</th>
						<th>Datum</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
<?php } else { ?>
	<div class="error-page">
		<h2 class="headline text-info"> 404</h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> Oops ... 404 Error!</h3>
			<p>
				Die News wurde nicht gefunden! Vielleicht existiert die News nicht oder die Umfrage wurde nicht freigeschaltet!. Bitte versuchen Sie erneut: <a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey">News Umfrage Liste</a>.
			</p>
		</div>
	</div>
<?php } ?>
<?php require ('./footer.php'); ?>