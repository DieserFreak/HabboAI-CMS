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

if(isset($_GET['del'])){
	$delid = $filter->FilterText($_GET['del']);
	
	$answercheck = dbSelectNumRows('*', 'cms_news_survey', "WHERE news_id = '" . $newsid . "' AND id = '". $delid . "'");
	if($answercheck > 0){
		$delete = dbDelete('cms_news_survey', "WHERE news_id = '" . $newsid . "' AND id = '". $delid . "'");
		$delete = dbDelete('cms_news_survey_results', "WHERE news_id = '" . $newsid . "' AND answer_id = '". $delid . "'");
		$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Antwortmöglichkeit wurde erfolgreich gelöscht!</div>';
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Antwortmöglichkeit existiert nicht!</div>';
	}
}

if(isset($_GET['delall'])){
	$answercheck = dbSelectNumRows('*', 'cms_news_survey', "WHERE news_id = '" . $newsid . "'");
	if($answercheck > 0){
		$delete = dbDelete('cms_news_survey', "WHERE news_id = '" . $newsid . "'");
		$delete = dbDelete('cms_news_survey_results', "WHERE news_id = '" . $newsid . "' AND answer_id != 0");
		$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Alle Antwortmöglichkeiten wurden erfolgreich gelöscht!</div>';
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Antwortmöglichkeit existiert nicht!</div>';
	}
}

$asking = (isset($_POST['asking'])) ? $filter->FilterText($_POST['asking']) : '';
$starttime = (isset($_POST['starttime'])) ? $filter->FilterText($_POST['starttime']) : '';
$endtime = (isset($_POST['endtime'])) ? $filter->FilterText($_POST['endtime']) : '';
$art = (isset($_POST['art'])) ? $filter->FilterText($_POST['art']) : '';
$newanswer = (isset($_POST['newanswer'])) ? $filter->FilterText($_POST['newanswer']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($asking)){
			if(strlen($asking) > 0 && strlen($asking) <= 50){
				if(strlen($starttime) == 16 && strlen($endtime) == 16){
					$newsdb2 = dbSelect('*','cms_news', "WHERE id = '" . $newsid . "' AND survey = '1' LIMIT 1");
					$newsdata2 = $newsdb2->fetch_assoc();

					
					$date_start = date_parse_from_format('d/m/Y H:i', $starttime);
					$timestart = mktime($date_start['hour'], $date_start['minute'], 0, $date_start['month'], $date_start['day'], $date_start['year']);
					
					$date_end = date_parse_from_format('d/m/Y H:i', $endtime);
					$timeend = mktime($date_end['hour'], $date_end['minute'], 0, $date_end['month'], $date_end['day'], $date_end['year']);
					
					$form_data_news = array(
						'survey_question' => $asking,
						'survey_starttime' => $timestart,
						'survey_endtime' => $timeend,
						'survey_art' => $art
					);
					dbUpdate('cms_news', $form_data_news, "WHERE id = '".$newsid."' LIMIT 1");
					$details = '<b>Frage vorher:</b> '.$newsdata2['survey_question'].' | <b>Frage nachher:</b> '.$asking.'<br/><b>Starttime vorher:</b> '.date('d/m/Y H:i',$newsdata2['survey_starttime']).' | <b>Starttime nachher:</b> '.$starttime.'<br/><b>Endtime vorher:</b> '.date('d/m/Y H:i',$newsdata2['survey_endtime']).' | <b>Endtime nachher:</b> '.$endtime.'<br/><b>Art vorher:</b> '.$newsdata2['survey_art'].' | <b>Art nachher:</b> '.$art.'<br/>';
					$housekeeping->hkLogs('News Umfrage Bearbeitung', 'News (<b>ID:</b> '.$newsid.') Umfrage bearbeitet', $user->UserData('id'), $remoteip, '0', $details);
					$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die News wurde erfolgreich bearbeitet!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, gültige Uhrzeiten angeben!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Frage darf nicht über 50 Zeichen lang sein!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, komplett ausfüllen!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['addanswer'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($newanswer)){
			$answerrowcheck = dbSelectNumRows('*', 'cms_news_survey', "WHERE news_id = '" . $newsid . "' AND answer = '". $newanswer ."'");
			if($answerrowcheck < 1){
				$form_data_addanswer = array(
					'news_id' => $newsid,
					'answer' => $newanswer
				);
				dbInsert('cms_news_survey', $form_data_addanswer);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Antwortmöglichkeit wurde erfolgreich eingefügt!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Diese Antwortmöglichkeit existiert schon!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, eine Antwortmöglichkeit ausfüllen!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$newsdb = dbSelect('*','cms_news', "WHERE id = '" . $newsid . "' AND survey = '1' LIMIT 1");
$newsdata = $newsdb->fetch_assoc();

$token = NoCSRF::generate( 'csrf_token' );

$active = 'news-survey';
$headtitle = 'News - Umfrage Bearbeitung';
$toptitle = 'News <small>Umfrage</small> <small>Bearbeitung</small>';
$title = 'News </li><li class="active">Umfrage</li><li class="active">Bearbeitung</li>';
require ('./header.php');
?>
<?php if($newsdb->num_rows > 0){ ?>
	<?php if($newsdata['user_id'] == $user->UserData('id') || $user->UserData('rank') >= $_CONFIG['housekeeping']['right']['news.survey.editall']){ ?>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Umfrage <small>Bearbeitung</small></h3>
					<div class="pull-right box-tools">
						<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
					</div>
			</div>
			<div class="box-body">
				<?php if(!empty($msg)){ echo $msg; } ?>
				<div class="row">
				<form method="post">
					<div class="col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><b>Frage/Aufgabe</b></span>
							<input class="form-control" value="<?php echo $newsdata['survey_question']; ?>" type="text" name="asking">
						</div>
						<br />
					</div>
					<div class="col-xs-4">
						<div class="input-group">
							<span class="input-group-addon"><b>Start-Uhrzeit</b></span>
							<input class="form-control" value="<?php echo date('d/m/Y H:i',$newsdata['survey_starttime']); ?>" type="text" name="starttime" id="newsdate">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="input-group">
							<span class="input-group-addon"><b>End-Uhrzeit</b></span>
							<input class="form-control" value="<?php echo date('d/m/Y H:i',$newsdata['survey_endtime']); ?>" type="text" name="endtime" id="newsdate2">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="input-group">
							<span class="input-group-addon"><b>Typ</b></span>
							<select name="art" class="form-control">
								<option value="1" <?php if($newsdata['survey_art'] == '1'){ echo 'selected'; } ?>>freie Antwortwahl</option>
								<option value="2" <?php if($newsdata['survey_art'] == '2'){ echo 'selected'; } ?>>beschränkte Antwortwahl</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12">
						<br />
						<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
						<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Speichern</button>
					</div>
				</form>
				</div>
			</div>
		</div>
		<?php if($newsdata['survey_art'] == 2){ ?>
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Umfrage <small>Antwortmöglichkeit einfügen</small></h3>
						<div class="pull-right box-tools">
							<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
						</div>
				</div>
				<div class="box-body">
					<div class="row">
					<form method="post">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><b>Antwort</b></span>
								<input class="form-control" type="text" name="newanswer">
							</div>
							<br />
						</div>
						<div class="col-xs-12">
							<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
							<button class="btn btn-primary btn-flat" style="width:100%;" name="addanswer">Einfügen</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Umfrage <small>Antwortmöglichkeit(en) löschen</small></h3>
						<div class="pull-right box-tools">
							<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
						</div>
				</div>
				<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="75%">Antwort</th>
							<th width="25%">Aktion (<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey/edit/<?php echo $newsid; ?>&delall"><small>alle löschen</small></a>)</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$newslist = dbSelect('*', 'cms_news_survey', "WHERE news_id = '".$newsid."' ORDER BY id DESC");
					while ($row = $newslist->fetch_array()) {
				?>
					<tr>
						<td><?php echo $row['answer']; ?></td>
						<td><center><a class="btn btn-app" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey/edit/<?php echo $newsid; ?>&del=<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i> Löschen</a></center></td>
					</tr>
				<?php
					}
				?>
					</tbody>
					<tfoot>
						<tr>
							<th>Antwort</th>
							<th>Aktion</th>
						</tr>
					</tfoot>
				</table>
			</div>
			</div>
		</div>
		<?php } ?>
	<?php } else { ?>
	<div class="error-page">
		<h2 class="headline text-info"> 404</h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> Oops ... 404 Error!</h3>
			<p>
				Du kannst diese News nicht bearbeiten! Falls du Fehler entdecken solltest, melden dich bitte bei höhere Positionen! <a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey">News Umfrage Liste</a>.
			</p>
		</div>
	</div>
	<?php } ?>
<?php } else { ?>
	<div class="error-page">
		<h2 class="headline text-info"> 404</h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> Oops ... 404 Error!</h3>
			<p>
				Die News wurde nicht gefunden! Vielleicht existiert die News nicht oder die Umfrage wurde nicht freigeschaltet! Bitte versuchen Sie erneut: <a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey">News Umfrage Liste</a>.
			</p>
		</div>
	</div>
<?php } ?>
<?php require ('./footer.php'); ?>