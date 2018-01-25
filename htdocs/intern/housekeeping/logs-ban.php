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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['logs.ban']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'logs-ban';
$headtitle = 'Logs - Bann';
$toptitle = 'Logs <small>Bann</small>';
$title = 'Logs </li><li class="active">Bann</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Logs - Bann</h3>     
			<div class="pull-right box-tools"> Du hast insgesamt <?php echo dbSelectNumRows('*', 'bans', "WHERE added_by = '". $user->UserData('username') ."'"); ?> User & IP gebannt - <?php echo dbSelectNumRows('*', 'bans', "WHERE added_by = 'Autoban System'"); ?> User wurden von automatischen Bannsystem gebannt 
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="logs" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="5%">Bantype</th>
					<th width="15%">Value</th>
					<th width="30%">Grund</th>
					<th width="15%">Dauer</th>
					<th width="10%">gebannt von</th>
					<th width="15%">gebannt Uhrzeit</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$banlogs = dbSelectS('*', 'bans', "ORDER BY id DESC LIMIT 1000");
			while ($row = $banlogs->fetch_array()) {
		?>
			<tr class="<?php if($row['expire'] < time()){ echo'green" style="opacity:0.4;'; } ?>">
					<td><?php echo $row['id']; ?></td>
					<td><?php if($row['bantype'] == 'user'){ echo 'User'; }else{  echo 'IP'; } ?></td>
					<td><?php echo $row['value']; ?></td>
					<td><?php if(!empty($row['unban_reason'])){ echo'<small><b>Grund für Entbannung:</b> ' . $row['unban_reason'] . '</small><br/><br/>'; } ?><?php if(!empty($row['reason'])){ echo $row['reason']; } else { echo '<small><i>kein Grund?</i></small>'; } ?></td>
					<td><?php echo date("d.m.Y - H:i",$row['expire']); ?></td>
					<td><?php echo $row['added_by']; ?></td>
					<td><?php echo $row['added_date']; ?></td>
				</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Bantype</th>
					<th>Value</th>
					<th>Grund</th>
					<th>Dauer</th>
					<th>gebannt von</th>
					<th>gebannt Uhrzeit</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>