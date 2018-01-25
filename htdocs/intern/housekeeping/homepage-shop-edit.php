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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['homepage.shop']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_POST['submit_c'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$shopdb = dbSelect('*', 'cms_shop', "WHERE art = 'credits'");
		while ($srow = $shopdb->fetch_array()){
			$value = $filter->FilterText($_POST[$srow['id'].'-v']);
			if(!empty($value)){
				$shop_change = array(
					'count' => $value
				);
				dbUpdate('cms_shop', $shop_change, "WHERE id = '".$srow['id']."' LIMIT 1");
				//$housekeeping->hkLogs('Shop Edit', 'Talershop geändert', $user->UserData('id'), $remoteip);
				$msg_c = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Talershop wurde erfolgreich geändert!</div>';
			} else {
				$msg_c = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Es darf nicht leer sein!</div>';		
			}
		}
	}
	catch ( Exception $e )
	{
		$msg_c = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}
	
if(isset($_POST['submit_d'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$shopdb = dbSelect('*', 'cms_shop', "WHERE art = 'dias'");
		while ($srow = $shopdb->fetch_array()){
			$value = $filter->FilterText($_POST[$srow['id'].'-v']);
			if(!empty($value)){
				$shop_change = array(
					'count' => $value
				);
				dbUpdate('cms_shop', $shop_change, "WHERE id = '".$srow['id']."' LIMIT 1");
				//$housekeeping->hkLogs('Shop Edit', 'Diamantenshop geändert', $user->UserData('id'), $remoteip);
				$msg_d = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Diamantenshop wurde erfolgreich geändert!</div>';
			} else {
				$msg_d = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Es darf nicht leer sein!</div>';		
			}
		}
	}
	catch ( Exception $e )
	{
		$msg_d = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}
	
if(isset($_POST['submit_v'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		$shopdb = dbSelect('*', 'cms_shop', "WHERE art = 'vip'");
		while ($srow = $shopdb->fetch_array()){
			$value = $filter->FilterText($_POST[$srow['id'].'-v']);
			if(!empty($value)){
				$shop_change = array(
					'days' => $value
				);
				dbUpdate('cms_shop', $shop_change, "WHERE id = '".$srow['id']."' LIMIT 1");
				//$housekeeping->hkLogs('Shop Edit', 'Vipshop geändert', $user->UserData('id'), $remoteip);
				$msg_v = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Vipshop wurde erfolgreich geändert!</div>';
			} else {
				$msg_v = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Es darf nicht leer sein!</div>';		
			}
		}
	}
	catch ( Exception $e )
	{
		$msg_v = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'homepage-shop';
$headtitle = 'Homepage - Shop Bearbeitung';
$toptitle = 'Homepage <small>Shop Bearbeitung</small>';
$title = 'Homepage </li><li class="active">Shop Bearbeitung</li>';
require ('./header.php');
?>
<div class="col-md-4">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Shop Bearbeitung <small>Taler</small></h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<?php if(!empty($msg_c)){ echo $msg_c; } ?>
			<form method="post">
				<table id="datat" class="table table-bordered table-striped">
					<tbody>
				<?php
						$shop = dbSelect('*', 'cms_shop', "WHERE art = 'credits' ORDER BY id ASC");
						while ($row = $shop->fetch_array()) {
				?>
					<tr>
						<td width="45%">
							<div class="input-group">
								<input class="form-control" value="<?php echo $row['cost']; ?>" type="text" DISABLED>
								<span class="input-group-addon">Euro</span>
							</div>
						</td>
						<td>
						<center>&rArr;</center>
						</td>
						<td width="45%">
							<div class="input-group">
								<input class="form-control" value="<?php echo $row['count']; ?>" type="text" name="<?php echo $row['id']; ?>-v">
								<span class="input-group-addon">Taler</span>
							</div>
						</td>
					</tr>
				<?php 
						}
				?>
					</tbody>
				</table>
				<br />
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit_c">Talershop ändern</button>
			</form>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Shop Bearbeitung <small>Diamanten</small></h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<?php if(!empty($msg_d)){ echo $msg_d; } ?>
			<form method="post">
				<table id="datat" class="table table-bordered table-striped">
					<tbody>
				<?php
						$shop = dbSelect('*', 'cms_shop', "WHERE art = 'dias' ORDER BY id ASC");
						while ($row = $shop->fetch_array()) {
				?>
					<tr>
						<td width="45%">
							<div class="input-group">
								<input class="form-control" value="<?php echo $row['cost']; ?>" type="text" DISABLED>
								<span class="input-group-addon">Euro</span>
							</div>
						</td>
						<td>
						<center>&rArr;</center>
						</td>
						<td width="45%">
							<div class="input-group">
								<input class="form-control" value="<?php echo $row['count']; ?>" type="text" name="<?php echo $row['id']; ?>-v">
								<span class="input-group-addon">Diamanten</span>
							</div>
						</td>
					</tr>
				<?php 
						}
				?>
					</tbody>
				</table>
				<br />
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit_d">Diamantenshop ändern</button>
			</form>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Shop Bearbeitung <small>VIP</small></h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<?php if(!empty($msg_v)){ echo $msg_v; } ?>
			<form method="post">
				<table id="datat" class="table table-bordered table-striped">
					<tbody>
				<?php
						$shop = dbSelect('*', 'cms_shop', "WHERE art = 'vip' ORDER BY id ASC");
						while ($row = $shop->fetch_array()) {
				?>
					<tr>
						<td width="45%">
							<div class="input-group">
								<input class="form-control" value="<?php echo $row['cost']; ?>" type="text" DISABLED>
								<span class="input-group-addon">Euro</span>
							</div>
						</td>
						<td>
						<center>&rArr;</center>
						</td>
						<td width="45%">
							<div class="input-group">
								<input class="form-control" value="<?php echo $row['days']; ?>" type="text" name="<?php echo $row['id']; ?>-v">
								<span class="input-group-addon">Tage</span>
							</div>
						</td>
					</tr>
				<?php 
						}
				?>
					</tbody>
				</table>
				<br />
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit_v">Vipshop ändern</button>
			</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>