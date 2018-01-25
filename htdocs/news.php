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
//if($user->UserData('rank') <= 9){ header('location: '. $_CONFIG['website']['url'] .'/client');}
$newslist = dbSelect('*', 'cms_news', "WHERE status = '1' AND date < " . time() . " ORDER BY date DESC");
while ($row = $newslist->fetch_array()) {
	$tpl->block_assign('newslist', array(
		'ID'		=>	$row['id'],
		'TITLE'		=>	$row['title'],
		'DESC'		=> 	$row['desc'],
		'DATE'			=>	date("d.m.Y",$newsdata['date']),
	));
}

$topnews = dbSelect('*', 'cms_news', "WHERE status = '1'");
while ($row = $topnews->fetch_array()) {
	$tpl->block_assign('topnews', array(
		'ID'		=>	$row['id'],
		'TITLE'		=>	$row['title'],
		'IMAGE'		=>	$row['image'],
		'DESC'		=>	$row['desc'],
		'AUTOR'		=> 	$row['autor'],
		'DATE'			=>	date("d.m.Y",$row['date']),
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
	'MENU'			=> '4',
	'SEITE'		=> 'Archiv'
));

$tpl->display($user->UserData('theme').'/page-news');

?>