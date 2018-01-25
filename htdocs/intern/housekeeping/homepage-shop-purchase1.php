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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['homepage.shoppurchase']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$status = (isset($_POST['status'])) ? $filter->FilterText($_POST['status']) : '';
$purchaseid = (isset($_POST['purchaseid'])) ? $filter->FilterText($_POST['purchaseid']) : '';

if(isset($_POST['submit'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

		if($status == 0){
			// kein Status ausgewählt
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, ein Status auswählen!</div>';
		} elseif($status == 1){
			// Ungültig
			$checkpurchase = dbSelect('*','cms_shop_purchase', "WHERE id = '" . $purchaseid . "' LIMIT 1");
			if($checkpurchase->num_rows > 0){
				$purchase_missed = array(
					'status' => '1',
					'edit_by' => $user->UserData('id')
				);
				dbUpdate('cms_shop_purchase', $purchase_missed, "WHERE id = '".$purchaseid."' LIMIT 1");
				$housekeeping->hkLogs('Shop Bestellung', 'Bestellung (<b>ID:</b> '.$purchaseid.') ungültig', $user->UserData('id'), $remoteip);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Bestellung wurde erfolgreich als ungültig geklärt!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Bestellung existiert nicht!</div>';
			}
		} elseif($status == 2){
			// Gültig
			$checkpurchase = dbSelect('*','cms_shop_purchase', "WHERE id = '" . $purchaseid . "' LIMIT 1");
			if($checkpurchase->num_rows > 0){
				$purchaseuser = $checkpurchase->fetch_assoc();
				
				$shopdb = dbSelect('*', 'cms_shop', "WHERE id = '" . $purchaseuser['shop_id'] . "' LIMIT 1");
				$shop = $shopdb->fetch_assoc();
				
				if($shop['art'] == 'credits'){
					$housekeeping->currency($purchaseuser['user_id'], 0, $shop['count'], '0', '0');
				} elseif($shop['art'] == 'dias'){
					$housekeeping->currency($purchaseuser['user_id'], 0, '0', '0', $shop['count']);
				} elseif($shop['art'] == 'vip'){
					$housekeeping->UserVip($purchaseuser['user_id'], $shop['days']);
				}
				
				$purchase_missed = array(
					'status' => '2',
					'edit_by' => $user->UserData('id')
				);
				dbUpdate('cms_shop_purchase', $purchase_missed, "WHERE id = '".$purchaseid."' LIMIT 1");
				$housekeeping->hkLogs('Shop Bestellung', 'Bestellung ID (<b>ID:</b> '.$purchaseid.') gültig', $user->UserData('id'), $remoteip);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Bestellung wurde erfolgreich als gültig geklärt und der User hat die folgende Wünsche automatisch erhalten!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Bestellung existiert nicht!</div>';
			}
		
		}
	}
	catch ( Exception $e )
	{
		$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'homepage-shoppurchase';
$headtitle = 'Homepage - Shop Bestellungen';
$toptitle = 'Homepage <small>Shop Bestellungen</small>';
$title = 'Homepage </li><li class="active">Shop Bestellungen</li>';
require ('./header.php');
?>


<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Shop Bestellungen <small>Liste</small></h3>     
	</div>
	<div class="box-body table-responsive">
		<?php if(!empty($msg)){ echo $msg; } ?>
		<table id="homepage" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="10%">User</th>
					<th width="7%">Art</th>
					<th width="8%">Euro</th>
					<th width="15%">PSC Code</th>
					<th width="10%">Status</th>
					<th width="10%">Bearbeiter</th>
					<th width="15%">Datum</th>
					<th width="20%">Aktion</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$purchasedb = dbSelectS('*', 'cms_shop_purchase', "ORDER BY id DESC");
			while ($row = $purchasedb->fetch_array()) {
				$userdb = dbSelect('*', 'users', "WHERE id = '" . $row['user_id'] . "' LIMIT 1");
				$userd = $userdb->fetch_assoc();
				$editerdb = dbSelect('*', 'users', "WHERE id = '" . $row['edit_by'] . "' LIMIT 1");
				$editer = $editerdb->fetch_assoc();
				$shopdb = dbSelect('*', 'cms_shop', "WHERE id = '" . $row['shop_id'] . "' LIMIT 1");
				$shop = $shopdb->fetch_assoc();
		?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $userd['username']; ?></td>
				<td><?php if($row['art'] == 'credits'){ echo number_format($shop['count'], 0, '','.').' Taler'; } elseif($row['art'] == 'dias'){ echo number_format($shop['count'], 0, '','.').' Diamanten'; } elseif($row['art'] == 'vip') { echo $shop['days'].' Tage VIP'; } ?></td>
				<td><?php echo $shop['cost']; ?> €</td>
				<td><?php echo $row['code']; ?></td>
				<td><?php if($row['status'] == 2){ echo '<font color="green"><b>Gültig</b></font>';  } elseif ($row['status'] == 1) { echo '<font color="red"><b>Ungültig</b></font>';  } else { echo '<font color="orange"><b>Unbearbeitet</b></font>'; } ?></td>
				<td><?php  if($row['status'] > 0){ echo $editer['username']; } else { echo '<i>keiner</i>'; } ?></td>
				<td><?php echo date("d.m.Y - H:i",$row['date']); ?></td>
				<td><?php if($row['status'] == 0){ ?>
					<form method="post">
					<select name="status" class="form-control" style="width:49%;">
						<option value="0" <?php if($status == '0'){ echo 'selected'; } ?>>Auswählen</option>
						<option value="1" <?php if($status == '1'){ echo 'selected'; } ?>>Ungültig</option>
						<option value="2" <?php if($status == '2'){ echo 'selected'; } ?>>Gültig</option>
					</select>
					<input type="hidden" name="purchaseid" value="<?php echo $row['id']; ?>">
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
					<button class="btn btn-primary btn-flat" style="width:49%;" name="submit">Ermitteln</button>
					</form>
					<?php } else { ?>
					<center>-/-</center>
					<?php } ?>
				</td>
			</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>Art</th>
					<th>Euro</th>
					<th>PSC Code</th>
					<th>Status</th>
					<th>Bearbeiter</th>
					<th>Datum</th>
					<th>Aktion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php require ('./footer.php'); ?>