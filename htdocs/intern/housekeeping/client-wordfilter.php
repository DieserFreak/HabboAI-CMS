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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.filter']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_GET['del'])){
	$word = $filter->FilterText($_GET['del']);
	
	$wordcheck = dbSelectNumRows('*', 'wordfilter', "WHERE word = '" . $word . "'");
	if($wordcheck > 0){
		$delete = dbDelete('wordfilter', "WHERE word = '" . $word . "'");
		$housekeeping->hkLogs('Wortfilter', 'Wort ('.$word.') gelöscht', $user->UserData('id'), $remoteip);
		$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Das Wort "'.$word.'" wurde erfolgreich gelöscht!</div>';
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Wort existiert nicht!</div>';
	}
}

$newword = (isset($_POST['newword'])) ? $filter->FilterText($_POST['newword']) : '';
$newreplacement = (isset($_POST['newreplacement'])) ? $filter->FilterText($_POST['newreplacement']) : '';
$newantiwerber = (isset($_POST['newantiwerber'])) ? $filter->FilterText($_POST['newantiwerber']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($newword) && !empty($newreplacement)){
			$wordcheck = dbSelectNumRows('*', 'wordfilter', "WHERE word = '" . $newword . "'");
			if($wordcheck <= 0){
				if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.filter.antiwerber']){ 
					$newantiwerber = '0'; 
				}
				
				$form_data_wordfilter = array(
					'word' => $newword,
					'replacement' => $newreplacement,
					'strict' => '1',
					'antiwerber' => $newantiwerber
				);
				dbInsert('wordfilter', $form_data_wordfilter);
				$housekeeping->hkLogs('Wortfilter', 'Wort ('.$newword.') hinzugefügt', $user->UserData('id'), $remoteip);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Das Wort "'.$newword.'" wurde erfolgreich erstellt!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Wort existiert schon!</div>';	
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

$token = NoCSRF::generate( 'csrf_token' );

$active = 'client-filter';
$headtitle = 'Client - Wortfilter';
$toptitle = 'Client <small>Wortfilter</small>';
$title = 'Client </li><li class="active">Wortfilter</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Wortfilter <small>Erstellung</small></h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon"><b>Wort</b></span>
					<input class="form-control" value="<?php echo $newword; ?>" type="text" name="newword">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon"><b>gefiltert zu</b></span>
					<input class="form-control" value="<?php echo $newreplacement; ?>" type="text" name="newreplacement">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon"><b>AntiWerber</b></span>
					<select name="newantiwerber" class="form-control" <?php if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.filter.antiwerber']){ echo'disabled'; } ?>>
						<option value="0" <?php if($newantiwerber == '0'){ echo 'selected'; } ?>>Nein</option>
						<option value="1" <?php if($newantiwerber == '1'){ echo 'selected'; } ?>>Ja</option>
					</select>
				</div>
			</div>
			<br/>
			<div class="col-xs-12" style="margin-top:20px;">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Wortfilter erstellen</button>
			</div>
		</form>
		</div>
	</div>
</div>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Wortfilter <small>Liste</small></h3>     
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="client" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="30%">Wort</th>
					<th width="40%">Filter</th>
					<th width="10%">Strict</th>
					<th width="10%">AntiWerber</th>
					<th width="10%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$wordfilter = dbSelect('*', 'wordfilter');
			while ($row = $wordfilter->fetch_array()) {
		?>
			<tr>
				<td><?php echo $row['word']; ?></td>
				<td><?php echo $row['replacement']; ?></td>
				<td><?php if($row['strict'] == '1'){ echo 'Ja'; } else { echo 'Nein'; } ?></td>
				<td><?php if($row['antiwerber'] == '1'){ echo 'Ja'; } else { echo 'Nein'; } ?></td>
				<td><center><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/wordfilter?del=<?php echo $row['word']; ?>"><small>Löschen</small></a></center></td>
			</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>Wort</th>
					<th>Filter</th>
					<th>Strict</th>
					<th>AntiWerber</th>
					<th>Aktion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>