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
$newslist = dbSelect('*', 'cms_news', "WHERE status = '1' AND date < " . time() . " ORDER BY date DESC");
while ($row = $newslist->fetch_array()) {
	$tpl->block_assign('newslist', array(
		'ID'		=>	$row['id'],
		'TITLE'		=>	$row['title']
	));
}

$topnews = dbSelect('*', 'cms_news', "WHERE status = '1' AND date < " . time() . " ORDER BY views DESC LIMIT " . $_CONFIG['news']['top'] . "");
while ($row = $topnews->fetch_array()) {
	$tpl->block_assign('topnews', array(
		'ID'		=>	$row['id'],
		'TITLE'		=>	$row['title'],
		'IMAGE'		=>	$row['image'],
		'DESC'		=>	$row['desc'],
	));
}

$tpl->assign(array(
	'MENU'			=> '4',
	'SEITE'		=> 'News'
));

$tpl->display($user->UserData('theme').'/news');

?>