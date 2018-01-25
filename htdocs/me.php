<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

header('Content-Type: text/html; charset=iso-8859-1');
require ('./inc/base.inc.php');
require ('./inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

//if($user->UserData('rank') <= 9){ header('location: '. $_CONFIG['website']['url'] .'/client');}
$fixalert = '';
$clientalert = '';
$getmoneyalert = '';

if(isset($_GET['fix'])){
	$form_data_user_fix = array(
		'home_room' => '0'
	);
	dbUpdate('users', $form_data_user_fix, "WHERE id = '" . $user->UserData('id') . "'");
	$fixalert = 1;
}

if(isset($_GET['client'])){
	$clientalert = 1;
}

$core->VipTimeCheck();

$date_normal = date('d.m.Y');
if($user->UserData('vip') == '1' && $date_normal !== $user->UserData('getmoney_date')){
	$user->GetDailyVIP($user->UserData('id'));
	$getmoneyalert = 2;
} elseif($user->UserData('vip') == '0' && $date_normal !== $user->UserData('getmoney_date')){
	$user->GetDaily($user->UserData('id'));
	$getmoneyalert = 1;
}	

$newsslide = '';

$news = dbSelect('*', 'cms_news', "WHERE status = '1' AND date < " . time() . " ORDER BY date DESC LIMIT " . $_CONFIG['news']['slidenum'] . "");
while($newsdata = $news->fetch_array()){
	$newsslide .= '<div class="bullet" style="border-radius: 5px;left:0!important;background-image:url(' . $newsdata['image'] . ');">';
	$newsslide .= '<span class="bullet-title">' . $newsdata['title'] . '</span><br>';
	$newsslide .= '<span class="bullet-content">' . $newsdata['desc'] . '</span>';
	$newsslide .= '<span class="bullet-button"><a id="bullet-url" href="' . $_CONFIG['website']['url']. '/news/' . $newsdata['id'] . '" class="btn medium green condensed">Liest mehr &raquo;</a></span>';
	$newsslide .= '</div>';
}

$events = $mysqli->query("SELECT * FROM cms_eventcalendar ORDER BY start DESC LIMIT 4");
if($events->num_rows > 0) {
	while ($row = $events->fetch_array()) {
		if(date('Y-m-d H:i:s') < $row['start']) {
			$tpl->block_assign('events', array(
				'NAME'		=>	$row['title'],
				'START'		=>	$row['start'],
				'END'	=>	$row['end']
			));
		} else {
			$tpl->block_assign('events', array(
				'NAME'	=>	$row['title'],
				'START'	=>	'L&Auml;UFT GERADE',
				'END'	=>	$row['end']
			));
		}
	}
}
if(!empty($_CONFIG['community']['hdw'])) {
	$userhdw = dbSelect('*', 'users', "WHERE id = '" . $_CONFIG['community']['hdw'] . "' LIMIT 1");
	$hdwdata = $userhdw->fetch_assoc();
	$tpl->assign(array(
		'HDWNAME'		=> $hdwdata['username'],
		'HDWMOTTO'		=> $hdwdata['motto'],
		'HDWAVATAR'		=> 	$hdwdata['look'],
	));
} else {
	$tpl->assign(array(
		'HDWNAME'		=> 'Nicht bekannt',
		'HDWMOTTO'		=> 'Motto ist leider ausgestorben',
		'HDWAVATAR'		=> 	'',
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
$artikel = dbSelect('*', 'cms_news', "WHERE status = '1' ORDER BY date DESC LIMIT 3");
while ($row = $artikel->fetch_array()) {
	$tpl->block_assign('artikel', array(
		'ID'		=>	$row['id'],
		'TITLE'		=>	$row['title'],
		'IMAGE'		=>	$row['image'],
		'DESC'		=>	$row['desc'],
		'AUTOR'		=> 	$row['autor'],
		'DATE'			=>	date("d.m.Y",$row['date']),
	));
}

$tpl->assign(array(
	'MENU'		=>	'1',
	'NEWS'		=>	'1',
	'NEWSLIDE'	=>	$newsslide,
	'SEITE'		=>	$user->UserData('username'),
	'FIXALERT'	=>	$fixalert,
	'CLIENTALERT'	=>	$clientalert,
	'GETMONEYALERT'	=>	$getmoneyalert
));

$tpl->display($user->UserData('theme').'/page-me');

?>