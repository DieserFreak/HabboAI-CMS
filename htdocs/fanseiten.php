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
$newusers = dbSelect('*', 'users', "WHERE boyfriend > 0 GROUP by love_date,lovepoints ORDER BY lovepoints  DESC LIMIT 9");
while ($row = $newusers->fetch_array()) {
	$friend = dbSelect('*', 'users', "WHERE id = '".$row['boyfriend']."' LIMIT 1");
	$bf = $friend->fetch_array();
	$tpl->block_assign('newusers', array(
		'ID'		=>	$row['id'],
		'USERNAME'	=>	$row['username'],
		'USERLOOK'	=>	$row['look'],
		'USERONLINE'=>	$row['online'],
		'USERMOTTO' => 	$row['motto'],
		'LOVEPOINTS' => $row['lovepoints'],
		'BOYFRIEND' => $bf['username'],
		'BFLOOK' => $bf['look'],
		'LOVEDATE' => date("d.m.Y" , $row['love_date']),
	
		'USERLAST'	=>	$core->lasttimeword($row['last_online'])
	));
}

$tpl->assign(array(
	'MENU'		=> '2',
	'NEWS'		=> '0',
	'SEITE' => 'Top Beziehungen'
));

$tpl->display($user->UserData('theme').'/page-beziehungen');
?>