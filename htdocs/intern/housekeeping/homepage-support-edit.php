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

$getid = $filter->FilterText($_GET['id']);
$answer = (isset($_POST['answer'])) ? $filter->FilterText($_POST['answer']) : '';

if(isset($_POST['submit_answer'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$supportcheck = dbSelect('*','cms_support', "WHERE id = '" . $getid . "' LIMIT 1");
		if($supportcheck->num_rows > 0){
			if(!empty($answer)){
				if(strlen($answer) >= 10){
					$support_answer = array(
						'edit_by' => $user->UserData('id'),
						'edit_answer' => $answer,
						'edit_date' => time()
					);
					dbUpdate('cms_support', $support_answer, "WHERE id = '".$getid."' LIMIT 1");
								
					$details = '<b><u>Antwort:</u></b><hr />'.$answer;
					$housekeeping->hkLogs('Support', 'Support (<b>ID:</b> '.$getid.') geantwortet', $user->UserData('id'), $remoteip, '0', $details);
					$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Das Supportticket wurde erfolgreich geantwortet!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Ein Antwort muss mindestens 10 Zeichen lang sein!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, ein Antwort ausfüllen!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Supportticket existiert nicht!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

if(isset($_POST['submit_edit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$supportcheck = dbSelect('*','cms_support', "WHERE id = '" . $getid . "' LIMIT 1");
		$supportc = $supportcheck->fetch_assoc();
		if($supportc['edit_by'] > 0){
			if(!empty($answer)){
				if(strlen($answer) >= 10){
					$details = '<b><u>Antwort vorher:</u></b><hr />'.$supportc['edit_answer'].'<br /><br /><b><u>Antwort nachher:</u></b><hr />'.$answer;
					$support_answer = array(
						'edit_answer' => $answer
					);
					dbUpdate('cms_support', $support_answer, "WHERE id = '".$getid."' LIMIT 1");
					$housekeeping->hkLogs('Support', 'Support (<b>ID:</b> '.$getid.') Antwort bearbeitet', $user->UserData('id'), $remoteip, '0', $details);
					$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Das Supportticket wurde erfolgreich bearbeitet!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Ein Antwort muss mindestens 10 Zeichen lang sein!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, ein Antwort ausfüllen!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Supportticket wurde noch nicht geantwortet!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$supportdb = dbSelect('*','cms_support', "WHERE id = '" . $getid . "' LIMIT 1");
$support = $supportdb->fetch_assoc();

$userdb = dbSelect('*','users', "WHERE id = '" . $support['user_id'] . "' LIMIT 1");
$userdata = $userdb->fetch_assoc();

$token = NoCSRF::generate( 'csrf_token' );

$active = 'homepage-support';
$headtitle = 'Homepage - Support';
$toptitle = 'Support <small>Bearbeitung</small>';
$title = 'Homepage </li><li class="active">Support</li><li class="active">Bearbeitung</li>';
require ('./header.php');
?>
<?php if($supportdb->num_rows > 0){ ?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Support <small>Bearbeitung</small></h3>     
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<form method="post">
			<table id="datat" class="table table-bordered table-striped">
				<tbody>
				<tr>
					<td width="20%"><b>Username</b></td>
					<td width="80%">
						<input class="form-control" value="<?php echo $userdata['username']; ?>" type="text" DISABLED>
					</td>
				</tr>
				<tr>
					<td><b>Thema</b></td>
					<td>
						<input class="form-control" value="<?php echo $support['topic']; ?>" type="text" DISABLED>
					</td>
				</tr>
				<tr>
					<td><b>Priorität</b></td>
					<td>
						<input class="form-control" value="<?php if($support['prioritaet'] == 3){ echo 'Hoch'; } elseif($support['prioritaet'] == 2){ echo 'Mittel'; } else { echo 'Niedrig'; } ?>" type="text" DISABLED>
					</td>
				</tr>
				<tr>
					<td><b>Datum</b></td>
					<td>
						<input class="form-control" value="<?php echo $core->lasttimeword($support['date']); ?> (<?php echo date("d.m.Y - H:i", $support['date']); ?>)" type="text" DISABLED>
					</td>
				</tr>

				<tr>
					<td><b>Text</b></td>
					<td><textarea class="form-control" cols="50" rows="10" DISABLED><?php echo $support['text']; ?></textarea></td>
				</tr>
				<tr>
					<td><b>Antwort<p><p>
					Bitte verwende:<p><p>
					Hallo [Username],
<p><p>
Viele Grüße<br>
[Dein Name]</b></td>
					<td><textarea id="supporttext" class="form-control" name="answer" placeholder="Hallo [Username],

Viele Grüße
[Dein Name]"  cols="50" rows="10"><?php if($support['edit_by'] > 0){ echo $support['edit_answer']; } else { echo $answer; } ?></textarea></td>
				</tr>
				</tbody>
			</table>
			<?php if($support['edit_by'] > 0){ ?>
			<?php if($support['edit_by'] > 0 && $support['edit_date'] < (time()-259200)){ ?>
				<button class="btn btn-danger btn-flat" style="width:100%;" DISABLED>Antwort bearbeiten</button>
				<?php } else { ?>
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-danger btn-flat" style="width:100%;" name="submit_edit">Antwort bearbeiten</button>
				<?php } ?>
			<?php } else { ?>
			<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
			<button class="btn btn-info btn-flat" style="width:100%;" name="submit_answer">Antworten</button>
			<?php } ?>
		</form>
	</div>
</div>
<?php } else { ?>
	<div class="error-page">
		<h2 class="headline text-info"> 404</h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> Oops ... 404 Error!</h3>
			<p>
				Der Supportticket wurde nicht gefunden! Vielleicht existiert der Supportticket nicht. Bitte versuchen Sie erneut: <a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/support">Supportliste</a>.
			</p>
		</div>
	</div>
<?php } ?>
	
<?php require ('./footer.php'); ?>