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
$badgeshop = dbSelect('*', 'cms_badgeshop', "WHERE starttime < '" . time() . "' AND endtime > '" . time() . "' ORDER BY id DESC");
while ($row = $badgeshop->fetch_array()) {
	$tpl->block_assign('badgeshop', array(
		'ID'		=>	$row['id'],
		'BADGE'		=>	$row['badge'],
		'NAME'		=>	$row['badge_name'],
		'COSTTALER'	=>	number_format($row['cost_taler'], 0, '','.'),
		'COSTDIAS'	=>	number_format($row['cost_dias'], 0, '','.'),
		'LIMITED'	=>	$row['limited'],
		'LIMITEDMAX'=>	$row['limited_max'],
		'LIMITEDSEL'=>	($row['limited_max']-$row['limited_selled'])
	));
}
$newusers = dbSelect('*', 'users', "WHERE rank > 0 ORDER BY id DESC LIMIT 1");
while ($row = $newusers->fetch_array()) {
	$tpl->block_assign('newusers', array(
		'ID'		=>	$row['id'],
		'USERNAME'	=>	$row['username'],
		'USERLOOK'	=>	$row['look'],
		'USERONLINE'=>	$row['online'],
		'USERMOTTO' => 	$row['motto'],
		'USERLAST'	=>	$core->lasttimeword($row['last_online'])
	));
}

$tpl->assign(array(
	'MENU'		=>	'3',
	'SEITE'		=>	'Badgeshop'
));

$tpl->display($user->UserData('theme').'/page-badges');

?>