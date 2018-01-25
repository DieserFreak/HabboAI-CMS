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

$newstitle = (isset($_POST['title'])) ? $filter->FilterText($_POST['title']) : '';
$newscategory = (isset($_POST['category'])) ? $filter->FilterText($_POST['category']) : '';
$newsimage = (isset($_POST['image'])) ? $filter->FilterText($_POST['image']) : '';
$newsdesc = (isset($_POST['desc'])) ? $filter->FilterText($_POST['desc']) : '';
$newstext = (isset($_POST['text'])) ? $_POST['text'] : '';
$newsautor = (isset($_POST['autor'])) ? $filter->FilterText($_POST['autor']) : '';
$newsstatus = (isset($_POST['status'])) ? $filter->FilterText($_POST['status']) : '';
$newscomment = (isset($_POST['comment'])) ? $filter->FilterText($_POST['comment']) : '';
$newsimages = (isset($_POST['images'])) ? $filter->FilterText($_POST['images']) : '';
$newsdate = (isset($_POST['date'])) ? $filter->FilterText($_POST['date']) : '';
$newssurvey = (isset($_POST['survey'])) ? $filter->FilterText($_POST['survey']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($newstitle) && !empty($newsimage) && !empty($newsdesc) && !empty($newstext) && !empty($newsautor) && !empty($newsdate)){
			if(strlen($newstitle) > 0 && strlen($newstitle) <= 30){
				if(strlen($newsdesc) > 0 && strlen($newsdesc) <= 100){
					if(strlen($newsdate) == 16){
						if(strlen($newsautor) > 0 && strlen($newsautor) <= 20){
							$date = date_parse_from_format('d/m/Y H:i', $newsdate);
							$datetotimest = mktime($date['hour'], $date['minute'], 0, $date['month'], $date['day'], $date['year']);
							$newstextcom = nl2br($filter->NewsText($newstext));
							$form_data_news = array(
								'title' => $newstitle,
								'category' => $newscategory,
								'image' => $newsimage,
								'desc' => $newsdesc,
								'text' => $newstext,
								'autor' => $newsautor,
								'user_id' => $user->UserData('id'),
								'status' => $newsstatus,
								'comment' => $newscomment,
								'images' => $newsimages,
								'date' => $datetotimest,
								'survey' => $newssurvey
							);
							dbInsert('cms_news', $form_data_news);
							$details = '';
							$housekeeping->hkLogs('News Erstellung', 'News erstellt', $user->UserData('id'), $remoteip, '0', $details);
							$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die News wurde erfolgreich erstellt!</div>';
						} else {
							$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br />Autor darf nicht über 20 Zeichen haben!</div>';
						}
					} else {
						$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br />Gültiges Datum eingeben!</div>';
					}
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br />Beschreibung darf nicht über 100 Zeichen haben!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br />Titel darf nicht über 30 Zeichen haben!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, komplett ausfüllen (Ausnahme: Bilder, Screenshot, ...)!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'news-home';
$headtitle = 'News - Erstellung';
$toptitle = 'News <small>Erstellung</small>';
$title = 'News </li><li class="active">Erstellung</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">News <small>Erstellung</small></h3>
		<div class="pull-right box-tools">
			<a class="btn btn-danger btn-sm" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news" style="color:#ffffff;">Erstellung abbrechen</a>
			<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">Titel</span>
					<input class="form-control" value="<?php echo $newstitle; ?>" type="text" name="title">
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon">Veröffentlichungsdatum</span>
					<input class="form-control" value="<?php echo $newsdate; ?>" type="text" name="date" id="newsdate">
				</div>
			</div>
			<div class="col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">Newsbild</span>
					<input class="form-control" value="<?php echo $newsimage; ?>" type="text" name="image">
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon">Autor</span>
					<input class="form-control" value="<?php echo $newsautor; ?>" type="text" name="autor">
				</div>
			</div>
			<div class="col-xs-3">
				<br />
				<div class="input-group">
					<span class="input-group-addon">Kategorie</span>
					<select name="category" class="form-control">
						<?php
							$categorydb = dbSelectS('*', 'cms_news_category', "ORDER BY id DESC");
							while ($cats = $categorydb->fetch_array()) {
						?>
							<option value="<?php echo $cats['id']; ?>"<?php if($newscategory == $cats['id']){ echo ' selected'; } ?>><?php echo $cats['category']; ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-xs-3">
				<br />
				<div class="input-group">
					<span class="input-group-addon">Status</span>
					<select name="status" class="form-control">
						<option value="1"<?php if($newsstatus == '1'){ echo ' selected'; } ?>>Aktiv</option>
						<option value="0"<?php if($newsstatus == '0'){ echo ' selected'; } ?>>Inaktiv</option>
					</select>
				</div>
			</div>
			<div class="col-xs-3">
				<br />
				<div class="input-group">
					<span class="input-group-addon">Kommentar erlauben</span>
					<select name="comment" class="form-control">
						<option value="0"<?php if($newscomment == '0'){ echo ' selected'; } ?>>Nein</option>
						<option value="1"<?php if($newscomment == '1'){ echo ' selected'; } ?>>Ja</option>
					</select>
				</div>
			</div>
			<div class="col-xs-3">
				<br />
				<div class="input-group">
					<span class="input-group-addon">Umfrage</span>
					<select name="survey" class="form-control">
						<option value="0"<?php if($newssurvey == '0'){ echo ' selected'; } ?>>Nein</option>
						<option value="1"<?php if($newssurvey == '1'){ echo ' selected'; } ?>>Ja</option>
					</select>
				</div>
			</div>
			<div class="col-xs-12">
				<br />
				<div class="input-group">
					<span class="input-group-addon">Beschreibung:</span>
					<input class="form-control" value="<?php echo $newsdesc; ?>" type="text" name="desc">
				</div>
				<br />
				<textarea id="newstext" class="form-control" name="text" cols="50" rows="10"><?php echo $newstext; ?></textarea>
				<br />
				<b>Screenshot, Bilder, etc.</b> (Trennung ";" benutzen - ohne Leerzeichen!)
				<textarea class="form-control" name="images" cols="50" rows="2"><?php echo $newsimages; ?></textarea>
				<br />
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">News einfügen</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>