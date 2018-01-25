<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

header('Content-Type: text/html; charset=UTF-8');
require ('./inc/base.inc.php');
require ('./inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

//if($user->UserData('rank') <= 9){ header('location: '. $_CONFIG['website']['url'] .'/client');}
$error = '';

$shopvip = dbSelect('*', 'cms_shop', "WHERE art = 'vip' ORDER BY days ASC");
while ($row = $shopvip->fetch_array()) {
	$tpl->block_assign('shopvip', array(
		'DAYS'		=>	number_format($row['days'], 0, '','.'),
		'COST'		=>	$row['cost'],
		'ID'		=>	$row['id'],
	));
}

$shopid = (isset($_POST['shopid'])) ? $filter->FilterText($_POST['shopid']) : '';
$psc_code = (isset($_POST['psc'])) ? $filter->FilterText($_POST['psc']) : '';

if(isset($_POST['submit'])){
	$str = preg_replace('/[^0-9]/', '', $psc_code);
	
	if(empty($shopid)){
		$error = 1;
	} else if(strlen($str) != 16){
		$error = 2;
	} else if(CheckShop($user->UserData('id'), "vip")){
		$error = 3;
	} else {
		$form_data_purchase = array(
			'user_id' => $user->UserData('id'),
			'art' => "vip",
			'shop_id' => $shopid,
			'code' => $psc_code,
			'date' => time()
		);
		
		dbInsert('cms_shop_purchase', $form_data_purchase);
		$error = 4;
	}
}

$tpl->assign(array(
	'MENU'		=>	'3',
	'SEITE'		=>	'Premium Mitgliedschaft',
	'ERROR'		=>	$error
));

$tpl->display($user->UserData('theme').'/page-vip');

?>