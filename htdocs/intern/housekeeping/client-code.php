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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.code']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(isset($_GET['del'])){
	$code = $filter->FilterText($_GET['del']);
	
	$codecheck = dbSelectNumRows('*', 'vouchers', "WHERE code = '" . $code . "'");
	if($codecheck > 0){
		$delete = dbDelete('vouchers', "WHERE code = '" . $code . "'");
		$housekeeping->hkLogs('Vouchercode', 'Code ('.$code.') gelöscht', $user->UserData('id'), $remoteip);
		$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Code "'.$code.'" wurde erfolgreich gelöscht!</div>';
	} else {
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Code existiert nicht!</div>';
	}
}

$newcode = (isset($_POST['newcode'])) ? $filter->FilterText($_POST['newcode']) : '';
$credits = (isset($_POST['credits'])) ? $filter->FilterText($_POST['credits']) : '';
$pixels = (isset($_POST['pixels'])) ? $filter->FilterText($_POST['pixels']) : '';
$points = (isset($_POST['points'])) ? $filter->FilterText($_POST['points']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
        
		if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.code.dias']){
			$points = '0';
		}
		
		if(!empty($newcode)){
			if($credits >= 0 && $pixels >= 0 && $points >= 0){
				$codecheck = dbSelectNumRows('*', 'vouchers', "WHERE code = '" . $newcode . "'");
				if($codecheck <= 0){
					$form_data_code = array(
						'code' => $newcode,
						'credits' => $credits,
						'pixels' => $pixels,
						'vip_points' => $points
					);
					dbInsert('vouchers', $form_data_code);
				
					$details = 'Taler: '.$credits.' | Pixels: '.$pixels.' | Diamanten: '.$points;
					$housekeeping->hkLogs('Vouchercode', 'Code ('.$newcode.') erstellt', $user->UserData('id'), $remoteip, '0', $details);
					$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Code "'.$newcode.'" wurde erfolgreich erstellt!</div>';
				} else {
					$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Codename existiert schon!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Zahlen darf nicht negativ sein!</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Codename ist leer!</div>';
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'client-code';
$headtitle = 'Client - Vouchercode';
$toptitle = 'Client <small>Vouchercode</small>';
$title = 'Client </li><li class="active">Vouchercode</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Code <small>Erstellung</small></h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<div class="row">
		<form method="post">
			<div class="col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">Code:</span><input class="form-control" name="newcode" value="<?php if(isset($_POST['newcode'])){ echo $newcode; } else { echo $housekeeping->VoucherRandom(15); } ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<div class="input-group">
					<input class="form-control" name="credits" value="<?php if(isset($_POST['credits'])){ echo $credits; } else { echo '0'; } ?>" type="text"><span class="input-group-addon"> Taler</span>
				</div>
			</div>
			<div class="col-xs-2">
				<div class="input-group">
					<input class="form-control" name="pixels" value="<?php if(isset($_POST['pixels'])){ echo $pixels; } else { echo '0'; } ?>" type="text"><span class="input-group-addon"> Pixel</span>
				</div>
			</div>
			<div class="col-xs-2">
				<div class="input-group">
					<input class="form-control" name="points" value="<?php if(isset($_POST['points'])){ echo $points; } else { echo '0'; } ?>" type="text" <?php if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.code.dias']){ ?>disabled<?php } ?>><span class="input-group-addon"> Diamanten</span>
				</div>
			</div>
			<br/>
			<div class="col-xs-12" style="margin-top:20px;">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Code erstellen</button>
			</div>
		</form>
		</div>
	</div>
</div>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Vouchercodes <small>Liste</small></h3>     
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>
	<div class="box-body table-responsive">
		<table id="client" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="30%">Code</th>
					<th width="40%">Taler</th>
					<th width="10%">Pixel</th>
					<th width="10%">Diamanten</th>
					<th width="10%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$voucherslist = dbSelect('*', 'vouchers');
			while ($row = $voucherslist->fetch_array()) {
		?>
			<tr>
				<td><?php echo $row['code']; ?></td>
				<td><?php echo $row['credits']; ?></td>
				<td><?php echo $row['pixels']; ?></td>
				<td><?php echo $row['vip_points']; ?></td>
				<td><center><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/code?del=<?php echo $row['code']; ?>"><small>Löschen</small></a></center></td>
			</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>Code</th>
					<th>Taler</th>
					<th>Pixel</th>
					<th>Diamanten</th>
					<th>Aktion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>