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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.badges']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_GET['del'])){
	$badgeid = $filter->FilterText($_GET['del']);
	
	$badgecheck = dbSelect('*', 'external_badges', "WHERE id = '" . $badgeid . "'");
	if($badgecheck->num_rows > 0){
		$badged = $badgecheck->fetch_assoc();
		$housekeeping->hkLogs('Badgebeschriftung', 'Beschriftung vom Badge '.$badged['badge'].' entfernt', $user->UserData('id'), $remoteip);
		$delete = dbDelete('external_badges', "WHERE id = '" . $badgeid . "'");
		$msg_success = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Badgebeschriftung wurde erfolgreich entfernt!</div>';
	} else {
		$msg_success = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Badgebeschriftung existiert nicht!</div>';
	}
}

$badge = (isset($_POST['badge'])) ? $filter->FilterText($_POST['badge']) : '';
$badge_title = (isset($_POST['badge_title'])) ? $filter->FilterText($_POST['badge_title']) : '';
$badge_desc = (isset($_POST['badge_desc'])) ? $filter->FilterText($_POST['badge_desc']) : '';

if(isset($_POST['newbadge'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($badge) && !empty($badge_title) && !empty($badge_desc)){	
			$badgecheck = dbSelectNumRows('*', 'external_badges', "WHERE badge = '" . $badge . "'");
			if($badgecheck < 1){
				$newbadge = array(
					'badge' => $badge,
					'title' => $badge_title,
					'desc' => $badge_desc
				);
				dbInsert('external_badges', $newbadge);
				
				$details = '<b>Badgebeschriftung hinzugefügt</b><hr /><b>Badge:</b> '.$badge.'<br /><b>Titel:</b> '.$badge_title.'<br /><b>Beschreibung:</b> '.$badge_desc;			
				$housekeeping->hkLogs('Badgebeschriftung', 'Beschriftung hinzugefügt', $user->UserData('id'), $remoteip, '0', $details);
				$msg_success = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Badgebeschriftung erfolgreich hinzugefügt!</div>';
			} else {
				$msg_error = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Badge ist schon beschriftet!</div><script type="text/javascript"> $(window).load(function(){ $(\'#newbadge-modal\').modal(\'show\'); }); </script>';
			}
		} else {
			$msg_error = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, alles ausfüllen!</div><script type="text/javascript"> $(window).load(function(){ $(\'#newbadge-modal\').modal(\'show\'); }); </script>';
		}
	}
	catch ( Exception $e )
	{
		$msg_error = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'client-badges';
$headtitle = 'Client - Badgebeschriftung';
$toptitle = 'Client <small>Badgebeschriftung</small>';
$title = 'Client </li><li class="active">Badgebeschriftung</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Badgebeschriftung <small>Liste</small></h3>     
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newbadge-modal" title="Badge hinzufügen"><i class="fa fa-plus"></i> Badge hinzufügen</button>
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<?php if(!empty($msg_success)){ echo $msg_success; } ?>
		<table id="client" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="15%">Badge</th>
					<th width="5%">Code</th>
					<th width="20%">Name</th>
					<th width="45%">Beschreibung</th>
					<th width="10%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$badgeshopdb = dbSelect('*', 'external_badges');
			while ($row = $badgeshopdb->fetch_array()) {
		?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><center><img src="<?php echo $_CONFIG['website']['url'].'/'.$_CONFIG['website']['badgesurl'].$row['badge']; ?>.gif"></center></td>
				<td><?php echo $row['badge']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['desc']; ?></td>
				<td><center><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/badges?del=<?php echo $row['id']; ?>"><small>Löschen</small></a></center></td>
			</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Badge</th>
					<th>Code</th>
					<th>Titel</th>
					<th>Beschreibung</th>
					<th>Aktion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div class="modal fade" id="newbadge-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-star"></i> Badgebeschriftung hinzufügen</h4>
			</div>
			<form action="#" method="post">
				<div class="modal-body">
					<?php if(!empty($msg_error)){ echo $msg_error; } ?>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Badgecode</span>
							<input type="text" name="badge" class="form-control" value="<?php echo $badge; ?>" placeholder="Code ...">
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Titel</span>
							<input type="text" name="badge_title" class="form-control" value="<?php echo $badge_title; ?>" placeholder="Titel ...">
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Beschreibung</span>
							<input type="text" name="badge_desc" class="form-control" value="<?php echo $badge_desc; ?>" placeholder="Beschreibung ...">
						</div>
					</div>
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				</div>
				<div class="modal-footer clearfix">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Abbrechen</button>
					<button type="submit" name="newbadge" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Hinzufügen</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>