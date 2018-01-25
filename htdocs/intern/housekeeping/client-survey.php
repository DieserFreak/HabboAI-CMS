<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */
 
 /* ANTOWRTEN MIT ; TRENNEN!!! */
 
header('Content-Type: text/html; charset=UTF-8');
require ('../../inc/base.inc.php');
require ('../../inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.survey']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_GET['answerdel'])){
	$answerid = $filter->FilterText($_GET['answerdel']);
	
	$answercheck = dbSelectNumRows('*', 'infobus_answers', "WHERE id = '" . $answerid . "'");
	if($answercheck > 0){
		$delete = dbDelete('infobus_answers', "WHERE id = '" . $answerid . "'");
		$housekeeping->hkLogs('Client Umfrage', 'Antwortmöglichkeit gelöscht', $user->UserData('id'), $remoteip);
		$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Antwort wurde erfolgreich gelöscht!</div>';
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Antwort existiert nicht!</div>';
	}
}

$asking = (isset($_POST['asking'])) ? $filter->FilterText($_POST['asking']) : '';
$delquestion = (isset($_POST['delquestion'])) ? $filter->FilterText($_POST['delquestion']) : '';
$questionid = (isset($_POST['questionid'])) ? $filter->FilterText($_POST['questionid']) : '';
$answerid = (isset($_POST['answerid'])) ? $filter->FilterText($_POST['answerid']) : '';
$answer = (isset($_POST['answer'])) ? $filter->FilterText($_POST['answer']) : '';

if(isset($_POST['submit_new'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$checkasking = dbSelect('*','infobus_questions', "WHERE question = '" . $asking . "' LIMIT 1");
		if($checkasking->num_rows < 1){
			if(strlen($asking) > 1 && strlen($asking) <= 255){
				$form_data_newquestion = array(
					'question' => $asking
					);
				dbInsert('infobus_questions', $form_data_newquestion);
				$housekeeping->hkLogs('Client Umfrage', 'Umfrage erstellt', $user->UserData('id'), $remoteip, '0', $asking);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Frage wurde erfolgreich erstellt!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, eine Frage ausfüllen! Darf bis zu 255 Zeichen sein!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Diese Frage existiert schon!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_del'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$checkasking = dbSelect('*','infobus_questions', "WHERE id = '" . $delquestion . "' LIMIT 1");
		if($checkasking->num_rows > 0){
			$delete = dbDelete('infobus_questions', "WHERE id = '" . $delquestion . "'");
			$delete = dbDelete('infobus_answers', "WHERE question_id = '" . $delquestion . "'");
			$housekeeping->hkLogs('Client Umfrage', 'Umfrage gelöscht', $user->UserData('id'), $remoteip);
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Frage und die zugehörige Antworten wurden erfolgreich gelöscht!</div>';
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Diese Frage existiert nicht!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_filtern'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$checkasking = dbSelect('*','infobus_questions', "WHERE id = '" . $questionid . "' LIMIT 1");
		if($checkasking->num_rows > 0){
			$result = dbSelect('*', 'infobus_answers', "WHERE question_id = '" . $questionid . "'");
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Diese Frage existiert nicht!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_add'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$checkasking = dbSelect('*','infobus_questions', "WHERE id = '" . $answerid . "' LIMIT 1");
		if($checkasking->num_rows > 0){
			if(strlen($answer) > 1){
				$answers = explode(";", $answer);
				foreach($answers as &$valueid){
					$form_data_newanswer = array(
						'question_id' => $answerid,
						'answer_text' => $valueid
					);
					dbInsert('infobus_answers', $form_data_newanswer);
				}
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Antwort wurde erfolgreich eingefügt!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Ein Antwort darf nicht leer sein und maximal 255 Zeichen!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Diese Frage existiert nicht!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'client-survey';
$headtitle = 'Client - Umfrage';
$toptitle = 'Client <small>Umfrage</small>';
$title = 'Client </li><li class="active">Umfrage</li>';
require ('./header.php');
?>
<?php if(!empty($msg)){ echo $msg; } ?>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Umfrage <small>Erstellen</small></h3>
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body">
			<div class="row">
			<form method="post">
				<div class="col-xs-9">
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Frage</b></span>
						<input class="form-control" value="<?php echo $asking; ?>" type="text" name="asking">
					</div>
				</div>
				<div class="col-xs-3" style="margin-top:20px;">
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
					<button class="btn btn-success btn-flat" style="width:100%;" name="submit_new">Erstellen</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Umfrage <small>Antwortmöglichkeiten filtern</small></h3>
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body">
			<div class="row">
			<form method="post">
				<div class="col-xs-9">
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Frage</b></span>
						<select name="questionid" class="form-control">
						<?php
							$questionsdb = dbSelect('*', 'infobus_questions', "WHERE owner IS NULL ORDER BY id DESC");
							while ($question = $questionsdb->fetch_array()) {
						?>
							<option value="<?php echo $question['id']; ?>"<?php if($questionid == $question['id']){ echo ' selected'; } ?>>(<?php echo $question['id']; ?>) <?php echo $question['question']; ?></option>
						<?php
							}
						?>
						</select>
					</div>
				</div>
				<div class="col-xs-3" style="margin-top:20px;">
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
					<button class="btn btn-primary btn-flat" style="width:100%;" name="submit_filtern">Filtern</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<?php if(isset($result)){ ?>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Umfrage <small>Antwortmöglichkeiten Liste</small></h3>
					<div class="pull-right box-tools">
						<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
						<button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Entfernen"><i class="fa fa-times"></i></button>
					</div>
			</div>
			<div class="box-body table-responsive">
				<table id="client" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="70%">Antwort</th>
							<th width="30%">Aktion</th>
						</tr>
					</thead>
					<tbody>
				<?php
					while ($row = $result->fetch_array()) {
				?>
						<tr>
							<td><?php echo $row['answer_text']; ?></td>
							<td><small><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/survey?answerdel=<?php echo $row['id']; ?>">Löschen</a></small></td>
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
	<?php } ?>
	
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Umfrage <small>Ausführen</small></h3>
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body">
			<center>Um Umfrage auszuführen, musst du im Raum ":startquestion ID" eingeben. Die ID findet ihr in Klammern.</center>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Umfrage <small>Löschen</small></h3>
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body">
			<div class="row">
			<form method="post">
				<div class="col-xs-9">
					<br />
					<div class="input-group">
						<span class="input-group-addon"><b>Frage</b></span>
						<select name="delquestion" class="form-control">
						<?php
							$questionsdb = dbSelect('*', 'infobus_questions', "WHERE owner IS NULL ORDER BY id DESC");
							while ($question = $questionsdb->fetch_array()) {
						?>
							<option value="<?php echo $question['id']; ?>">(<?php echo $question['id']; ?>) <?php echo $question['question']; ?> </option>
						<?php
							}
						?>
						</select>
					</div>
				</div>
				<div class="col-xs-3" style="margin-top:20px;">
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
					<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_del">Löschen</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Umfrage <small>Antwortmöglichkeiten einfügen</small></h3>
				<div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
				</div>
		</div>
		<div class="box-body">
			<div class="row">
			<form method="post">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><b>Frage</b></span>
						<select name="answerid" class="form-control">
						<?php
							$questionsdb = dbSelect('*', 'infobus_questions', "WHERE owner IS NULL ORDER BY id DESC");
							while ($question = $questionsdb->fetch_array()) {
						?>
							<option value="<?php echo $question['id']; ?>"<?php if($answerid == $question['id']){ echo ' selected'; } ?>>(<?php echo $question['id']; ?>) <?php echo $question['question']; ?></option>
						<?php
							}
						?>
						</select>
					</div>
					<br />
					<b>Antworten (jeder weitere Antwort ";" trennen! Bsp: Antwort A;Antwort B;...)</b>
					<textarea class="form-control" name="answer" cols="50" rows="5"><?php echo $answer; ?></textarea>
				</div>
				<div class="col-xs-12" style="margin-top:20px;">
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
					<button class="btn btn-primary btn-flat" style="width:100%;" name="submit_add">Einfügen</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>