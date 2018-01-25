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
$newsslide = '';

$news = dbSelect('*', 'cms_news', "WHERE status = '1' AND date < " . time() . " ORDER BY date DESC LIMIT " . $_CONFIG['news']['slidenum'] . "");
while($newsdata = $news->fetch_array()){
	$newsslide .= '<div class="bullet" style="border-radius: 5px;left:0!important;background-image:url(' . $newsdata['image'] . ');">';
	$newsslide .= '<span class="bullet-title">' . $newsdata['title'] . '</span><br>';
	$newsslide .= '<span class="bullet-content">' . $newsdata['desc'] . '</span>';
	$newsslide .= '<span class="bullet-button"><a id="bullet-url" href="' . $_CONFIG['website']['url']. '/news/' . $newsdata['id'] . '" class="btn medium green condensed">Liest mehr &raquo;</a></span>';
	$newsslide .= '</div>';
}

$hotrooms = dbSelect('*', 'rooms', "WHERE users_now > '0' ORDER BY users_now DESC LIMIT 4");
if($hotrooms->num_rows > 0) {
	while ($row = $hotrooms->fetch_array()) {
		if($row['users_now'] >= $row['users_max']) {
			$imgnr = 3;
		} else if ($row['users_now'] >= ($row['users_max'])-5) {
			$imgnr = 2;
		} else {
			$imgnr = 1;
		}
		$tpl->block_assign('hotrooms', array(
			'NAME'		=>	$row['caption'],
			'USERSNOW'		=>	$row['users_now'],
			'USERSMAX'		=>	$row['users_max'],
			'IMGNR'		=>	$imgnr,
		));
	}
} else {
	$tpl->block_assign('hotrooms', array(
		'NAME'		=>	'',
		'USERSNOW'		=>	'',
		'USERSMAX'		=>	''
	));
}

$heute = date("j.n");
$usersbirths = dbSelect('*', 'users', "WHERE birth LIKE '" . $heute . "%' ORDER BY id DESC");
if($usersbirths->num_rows > 0) {
	while ($row = $usersbirths->fetch_array()) {
		$tpl->block_assign('usersbirth', array(
			'USERNAME'		=>	$row['username'],
			'MOTTO'			=>	$row['motto']
		));
	}
} else {
	$tpl->block_assign('usersbirth', array(
		'USERNAME'		=>	'',
		'MOTTO'			=>	''
	));
}
$userbans = dbSelect('*', 'bans', "WHERE bantype='user' AND added_by != 'Autoban System' ORDER BY id DESC LIMIT 6");
if($userbans->num_rows > 0) {
	while ($row = $userbans->fetch_array()) {
		$tpl->block_assign('userbans', array(
			'BANNAME'		=>	$row['value'],
			'BANGRUND'			=>	$row['reason'],
			'BANEXPIRE'			=>	date("d.m.Y",$row['expire']),
			'BANSTAFF'			=>	$row['added_by'],
		));
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
$newusers = dbSelect('*', 'users', "WHERE rank > 0 ORDER BY id DESC LIMIT 3");
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
	'MENU'		=> '2',
	'NEWS'		=> '0',
	'NAME'  => $user->UserData('username'),
	'usertaler' => $user->UserData('credits'),
	'userduckets' => $user->UserData('activity_points'),
	'userdia' => $user->UserData('vip_points'),
	
));

$tpl->display($user->UserData('theme').'/page-info');

?>