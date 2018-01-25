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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['client.furni']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$itemid = (isset($_POST['itemid'])) ? $filter->FilterText($_POST['itemid']) : '';
$usertyp = (isset($_POST['user'])) ? $filter->FilterText($_POST['user']) : '';

if(isset($_POST['submit'])){
	switch($usertyp){
		case "0":
			// Alle User (ohne Mitarbeiter)
			$base_itemdb = dbSelect('*', 'items', "WHERE id = '" . $itemid . "' LIMIT 1");
			$base_item = $base_itemdb->fetch_assoc();	
			$result = dbSelectNumRows('*', 'items', "WHERE EXISTS(SELECT * FROM users WHERE users.id = items.user_id AND users.rank < '3' AND items.base_item = '".$base_item['base_item']."')");
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Ergebnis!</b><br /> Diese M&ouml;bel gibt es nur '.$result.'-mal im Hotel (alle User ohne Mitarbeiter)!</div>';
			break;
		case "1":
			// Alle User (mit Mitarbeiter)
			$base_itemdb = dbSelect('*', 'items', "WHERE id = '" . $itemid . "' LIMIT 1");
			$base_item = $base_itemdb->fetch_assoc();	
			$result = dbSelectNumRows('*', 'items', "WHERE EXISTS(SELECT * FROM users WHERE users.id = items.user_id AND items.base_item = '".$base_item['base_item']."')");
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Ergebnis!</b><br /> Diese M&ouml;bel gibt es nur '.$result.'-mal im Hotel (alle User mit Mitarbeiter)!</div>';
			break;
		case "2":
			// Nur User Online (ohne Mitarbeiter)
			$base_itemdb = dbSelect('*', 'items', "WHERE id = '" . $itemid . "' LIMIT 1");
			$base_item = $base_itemdb->fetch_assoc();
			$result = dbSelectNumRows('*', 'items', "WHERE EXISTS(SELECT * FROM users WHERE users.id = items.user_id AND users.rank < '3' AND users.online = '1' AND items.base_item = '".$base_item['base_item']."')");
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Ergebnis!</b><br /> Diese M&ouml;bel gibt es nur '.$result.'-mal im Hotel (alle User Online ohne Mitarbeiter)!</div>';
			break;
		case "3":
			// Nur User Online (mit Mitarbeiter)
			$base_itemdb = dbSelect('*', 'items', "WHERE id = '" . $itemid . "' LIMIT 1");
			$base_item = $base_itemdb->fetch_assoc();
			$result = dbSelectNumRows('*', 'items', "WHERE EXISTS(SELECT * FROM users WHERE users.id = items.user_id AND users.online = '1' AND items.base_item = '".$base_item['base_item']."')");
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Ergebnis!</b><br /> Diese M&ouml;bel gibt es nur '.$result.'-mal im Hotel (alle User Online mit Mitarbeiter)!</div>';
			break;
		case "4":
			// Nur Mitarbeiter
			$base_itemdb = dbSelect('*', 'items', "WHERE id = '" . $itemid . "' LIMIT 1");
			$base_item = $base_itemdb->fetch_assoc();
			$result = dbSelectNumRows('*', 'items', "WHERE EXISTS(SELECT * FROM users WHERE users.id = items.user_id AND users.rank > '2' AND items.base_item = '".$base_item['base_item']."')");
			$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Ergebnis!</b><br /> Diese M&ouml;bel gibt es nur '.$result.'-mal im Hotel (nur Mitarbeiter)!</div>';
			break;
	}
}

$active = 'client-furni';
$headtitle = 'Client - Möbelhäufigkeit';
$toptitle = 'Client <small>Möbelhäufigkeit</small>';
$title = 'Client </li><li class="active">Möbelhäufigkeit</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Client <small>Möbelhäufigkeit</small></h3>
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
					<span class="input-group-addon"><b>Item ID</b></span>
					<input class="form-control" value="<?php echo $itemid; ?>" type="text" name="itemid">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon"><b>Typ</b></span>
					<select name="user" class="form-control">
						<option value="0" <?php if($usertyp == '0'){ echo 'selected'; } ?>>Alle User (ohne Mitarbeiter)</option>
						<option value="1" <?php if($usertyp == '1'){ echo 'selected'; } ?>>Alle User (mit Mitarbeiter)</option>
						<option value="2" <?php if($usertyp == '2'){ echo 'selected'; } ?>>Nur User Online (ohne Mitarbeiter)</option>
						<option value="3" <?php if($usertyp == '3'){ echo 'selected'; } ?>>Nur User Online (mit Mitarbeiter)</option>
						<option value="4" <?php if($usertyp == '4'){ echo 'selected'; } ?>>Nur Mitarbeiter</option>
					</select>
				</div>
			</div>
			<div class="col-xs-4">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="submit">Ermitteln</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>