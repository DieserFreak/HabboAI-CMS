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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['homepage.badgeshop']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_GET['del'])){
	$badgeid = $filter->FilterText($_GET['del']);
	
	$badgecheck = dbSelectNumRows('*', 'cms_badgeshop', "WHERE id = '" . $badgeid . "'");
	if($badgecheck > 0){
		$delete = dbDelete('cms_badgeshop', "WHERE id = '" . $badgeid . "'");
		$housekeeping->hkLogs('Badgeshop', 'Badge (<b>ID:</b> '.$badgeid.') entfernt', $user->UserData('id'), $remoteip);
		$msg_success = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Das Badge wurde erfolgreich entfernt!</div>';
	} else {
		$msg_success = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Das Badge existiert nicht!</div>';
	}
}

$badge = (isset($_POST['badge'])) ? $filter->FilterText($_POST['badge']) : '';
$badge_name = (isset($_POST['badge_name'])) ? $filter->FilterText($_POST['badge_name']) : '';
$credits = (isset($_POST['credits'])) ? $filter->FilterText($_POST['credits']) : '';
$dias = (isset($_POST['dias'])) ? $filter->FilterText($_POST['dias']) : '';
$limited = (isset($_POST['limited'])) ? $filter->FilterText($_POST['limited']) : '';
$limited_max = (isset($_POST['limited_max'])) ? $filter->FilterText($_POST['limited_max']) : '';
$starttime = (isset($_POST['starttime'])) ? $filter->FilterText($_POST['starttime']) : '';
$endtime = (isset($_POST['endtime'])) ? $filter->FilterText($_POST['endtime']) : '';

if(isset($_POST['newbadge'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if(!empty($badge) && !empty($badge_name)){
			if(is_numeric($credits) && is_numeric($dias) && $credits >= 0 && $dias >= 0){
				if(strlen($starttime) == 16 && strlen($endtime) == 16){
					if(isset($_POST['limited'])){
						if(is_numeric($limited_max) && $limited_max >= 0){
							$details = '<b>Badge hinzugefügt</b><hr /><b>Badge:</b> '.$badge.'<br /><b>Name:</b> '.$badge_name.'<br /><b>Taler:</b> '.$credits.'<br /><b>Diamanten:</b> '.$dias.'<br /><b>Startzeit:</b> '.$starttime.'<br /><b>Endzeit:</b> '.$endtime.'<br /><br /><b>limitierte Anzahl: </b> '.$limited_max.'';
						
							$starttimedate = date_parse_from_format('d/m/Y H:i', $starttime);
							$endtimedate = date_parse_from_format('d/m/Y H:i', $endtime);
							
							$gen_starttime = mktime($starttimedate['hour'], $starttimedate['minute'], 0, $starttimedate['month'], $starttimedate['day'], $starttimedate['year']);
							$gen_endtime = mktime($endtimedate['hour'], $endtimedate['minute'], 0, $endtimedate['month'], $endtimedate['day'], $endtimedate['year']);
							
							$newbadge = array(
								'badge' => $badge,
								'badge_name' => $badge_name,
								'cost_taler' => $credits,
								'cost_dias' => $dias,
								'limited' => '1',
								'limited_max' => $limited_max,
								'limited_selled' => '0',
								'starttime' => $gen_starttime,
								'endtime' => $gen_endtime
							);
							dbInsert('cms_badgeshop', $newbadge);
							$housekeeping->hkLogs('Badgeshop', 'Badge hinzugefügt', $user->UserData('id'), $remoteip, '0', $details);
							$msg_success = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Badge erfolgreich im Shop erstellt!</div>';
						} else {
							$msg_error = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die limitierte Anzahl muss aus Zahlen bestehen und darf nicht negativ sein!</div><script type="text/javascript"> $(window).load(function(){ $(\'#newbadge-modal\').modal(\'show\'); }); </script>';		
						}
					} else {
						$details = '<b>Badge hinzugefügt</b><hr /><b>Badge:</b> '.$badge.'<br /><b>Name:</b> '.$badge_name.'<br /><b>Taler:</b> '.$credits.'<br /><b>Diamanten:</b> '.$dias.'<br /><b>Startzeit:</b> '.$starttime.'<br /><b>Endzeit:</b> '.$endtime.'';
						
						$starttimedate = date_parse_from_format('d/m/Y H:i', $starttime);
						$endtimedate = date_parse_from_format('d/m/Y H:i', $endtime);
						
						$gen_starttime = mktime($starttimedate['hour'], $starttimedate['minute'], 0, $starttimedate['month'], $starttimedate['day'], $starttimedate['year']);
						$gen_endtime = mktime($endtimedate['hour'], $endtimedate['minute'], 0, $endtimedate['month'], $endtimedate['day'], $endtimedate['year']);
						
						$newbadge = array(
							'badge' => $badge,
							'badge_name' => $badge_name,
							'cost_taler' => $credits,
							'cost_dias' => $dias,
							'limited' => '0',
							'limited_max' => '0',
							'limited_selled' => '0',
							'starttime' => $gen_starttime,
							'endtime' => $gen_endtime
						);
						dbInsert('cms_badgeshop', $newbadge);
						$housekeeping->hkLogs('Badgeshop', 'Badge hinzugefügt', $user->UserData('id'), $remoteip, '0', $details);
						$msg_success = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Badge erfolgreich im Shop erstellt!</div>';
					}
				} else {
					$msg_error = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Uhrzeiten (Start und Ende) müssen komplett ausgefüllt werden!</div><script type="text/javascript"> $(window).load(function(){ $(\'#newbadge-modal\').modal(\'show\'); }); </script>';		
				}
			} else {
				$msg_error = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Taler und Diamanten müssen Zahlen haben und darf nicht negativ sein!</div><script type="text/javascript"> $(window).load(function(){ $(\'#newbadge-modal\').modal(\'show\'); }); </script>';		
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

$active = 'homepage-badgeshop';
$headtitle = 'Homepage - Badgeshop';
$toptitle = 'Homepage <small>Badgeshop</small>';
$title = 'Homepage </li><li class="active">Badgeshop</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Badgeshop <small>Liste</small></h3>     
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newbadge-modal" title="Badge hinzufügen"><i class="fa fa-plus"></i> Badge hinzufügen</button>
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<?php if(!empty($msg_success)){ echo $msg_success; } ?>
		<table id="homepage" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="6%">ID</th>
					<th width="10%">Badge</th>
					<th width="15%">Name</th>
					<th width="7%">Taler</th>
					<th width="7%">Diamanten</th>
					<th width="15%">Limited</th>
					<th width="15%">Startzeit</th>
					<th width="15%">Endzeit</th>
					<th width="10%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$badgeshopdb = dbSelect('*', 'cms_badgeshop');
			while ($row = $badgeshopdb->fetch_array()) {
		?>
			<tr class="<?php if($row['endtime'] < time()){ echo'red" style="opacity:0.8;'; } ?>">
				<td><?php echo $row['id']; ?></td>
				<td><center><img src="<?php echo $_CONFIG['website']['url'].'/'.$_CONFIG['website']['badgesurl'].$row['badge']; ?>.gif"></center></td>
				<td><?php echo $row['badge_name']; ?></td>
				<td><?php echo $row['cost_taler']; ?></td>
				<td><?php echo $row['cost_dias']; ?></td>
				<td><?php if($row['limited'] == '1' && $row['limited_selled'] < $row['limited_max']){ echo 'Ja<br />(' . $row['limited_selled'] . ' von ' . $row['limited_max'] . ' verkauft)'; } elseif($row['limited'] == '1' && $row['limited_selled'] == $row['limited_max']){ echo 'Ja<br /><b>AUSVERKAUFT</b> (' . $row['limited_max'] . ' Stk.)'; } else { echo 'Nein'; } ?></td>
				<td><?php echo date("d.m.Y - H:i", $row['starttime']); ?></td>
				<td><?php echo date("d.m.Y - H:i", $row['endtime']); if($row['endtime'] < time()){ echo '<font color="red"><br /><b>ABGELAUFEN</b><font>'; } ?></td>
				<td><center><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/badgeshop?del=<?php echo $row['id']; ?>"><small>Löschen</small></a></center></td>
			</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Badge</th>
					<th>Name</th>
					<th>Taler</th>
					<th>Diamanten</th>
					<th>Limited</th>
					<th>Startzeit</th>
					<th>Endzeit</th>
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
				<h4 class="modal-title"><i class="fa fa-star"></i> Badge im Shop hinzufügen</h4>
			</div>
			<form action="#" method="post">
				<div class="modal-body">
					<?php if(!empty($msg_error)){ echo $msg_error; } ?>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Code</span>
							<input type="text" name="badge" class="form-control" value="<?php echo $badge; ?>" placeholder="Badgecode ...">
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Name</span>
							<input type="text" name="badge_name" class="form-control" value="<?php echo $badge_name; ?>" placeholder="Name ...">
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<input type="text" name="credits" class="form-control" value="<?php echo $credits; ?>" placeholder="Anzahl Taler ...">
							<span class="input-group-addon">Taler</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<input type="text" name="dias" class="form-control" value="<?php echo $dias; ?>" placeholder="Anzahl Diamanten ...">
							<span class="input-group-addon">Diamanten</span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Limitiert</span>
							<span class="input-group-addon">
								<input type="checkbox" name="limited" <?php if(isset($_POST['limited'])){ echo 'checked'; } ?>>
							</span>
							<input type="text" name="limited_max" class="form-control" value="<?php echo $dias; ?>" placeholder="Wenn ja, haken und Anzahl angeben ...">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Startzeit</span>
							<input type="text" name="starttime" class="form-control" value="<?php echo $starttime; ?>" id="badgetime-s">
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Endzeit</span>
							<input type="text" name="endtime" class="form-control" value="<?php echo $endtime; ?>" id="badgetime-e">
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