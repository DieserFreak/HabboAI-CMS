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
$usercredits = $mysqli->query("SELECT * FROM users a WHERE rank < '" . $_CONFIG['community']['topuserrank'] . "'  ORDER BY credits DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $usercredits->fetch_array()) {
	$tpl->block_assign('usercredits', array(
		'USERID'		=>	$row['id'],
		'USERNAME'		=>	$row['username'],
		'USERLOOK'		=>	$row['look'],
		'USERCREDITS'	=>	number_format($row['credits'], 0, '','.')
	));
}

$userpixel = $mysqli->query("SELECT * FROM users a WHERE rank < '" . $_CONFIG['community']['topuserrank'] . "'  ORDER BY activity_points DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $userpixel->fetch_array()) {
	$tpl->block_assign('userpixel', array(
		'USERID'		=>	$row['id'],
		'USERNAME'		=>	$row['username'],
		'USERLOOK'		=>	$row['look'],
		'USERPIXEL'		=>	number_format($row['activity_points'], 0, '','.')
	));
}

$userdias = $mysqli->query("SELECT * FROM users a WHERE rank < '" . $_CONFIG['community']['topuserrank'] . "'  ORDER BY vip_points DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $userdias->fetch_array()) {
	$tpl->block_assign('userdias', array(
		'USERID'		=>	$row['id'],
		'USERNAME'		=>	$row['username'],
		'USERLOOK'		=>	$row['look'],
		'USERDIAS'		=>	number_format($row['vip_points'], 0, '','.')
	));
}

$useronline = $mysqli->query("SELECT * FROM user_stats a JOIN users b ON a.id = b.id WHERE b.rank < '" . $_CONFIG['community']['topuserrank'] . "' AND NOT EXISTS(SELECT * FROM bans WHERE bans.value = b.username AND bans.expire > ".time().") ORDER BY OnlineTime DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $useronline->fetch_array()) {
	$userstat = dbSelect('*', 'users', "WHERE id = '" . $row['id'] . "' LIMIT 1");
	$row2 = $userstat->fetch_assoc();
	$tpl->block_assign('useronline', array(
		'USERID'		=>	$row2['id'],
		'USERNAME'		=>	$row2['username'],
		'USERLOOK'		=>	$row2['look'],
		'USERONLINE'	=>	round($row['OnlineTime'] / 60 / 60)
	));
}

$userrespect = $mysqli->query("SELECT * FROM user_stats ORDER BY Respect DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $userrespect->fetch_array()) {
	$userstat = dbSelect('*', 'users', "WHERE id = '" . $row['id'] . "' LIMIT 1");
	$row2 = $userstat->fetch_assoc();
	$tpl->block_assign('userrespect', array(
		'USERID'		=>	$row2['id'],
		'USERNAME'		=>	$row2['username'],
		'USERLOOK'		=>	$row2['look'],
		'USERRESPECT'	=>	$row['Respect']
	));
}

$userrespect = $mysqli->query("SELECT * FROM users ORDER BY lovepoints DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $userrespect->fetch_array()) {
	$userstat = dbSelect('*', 'users', "WHERE id = '" . $row['id'] . "' LIMIT 1");
	$row2 = $userstat->fetch_assoc();
	$tpl->block_assign('lovepoints', array(
		'USERID'		=>	$row2['id'],
		'USERNAME'		=>	$row2['username'],
		'USERLOOK'		=>	$row2['look'],
		'LOVEPOINTS'	=>	$row['lovepoints']
	));
}

$userachiev = $mysqli->query("SELECT * FROM user_stats a JOIN users b ON a.id = b.id WHERE b.rank < '" . $_CONFIG['community']['topuserrank'] . "' AND NOT EXISTS(SELECT * FROM bans WHERE bans.value = b.username AND bans.expire > ".time().") ORDER BY AchievementScore DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $userachiev->fetch_array()) {
	$userstat = dbSelect('*', 'users', "WHERE id = '" . $row['id'] . "' LIMIT 1");
	$row2 = $userstat->fetch_assoc();
	$tpl->block_assign('userachiev', array(
		'USERID'		=>	$row2['id'],
		'USERNAME'		=>	$row2['username'],
		'USERLOOK'		=>	$row2['look'],
		'USERACHIEV'	=>	$row['AchievementScore']
	));
}

$userbadge = $mysqli->query("SELECT user_id, COUNT(user_id) AS anzahl FROM (SELECT * FROM user_badges WHERE EXISTS(SELECT * FROM users a WHERE a.id = user_badges.user_id AND a.rank < '" . $_CONFIG['community']['topuserrank'] . "')) anzahlbadges GROUP BY user_id ORDER BY anzahl DESC LIMIT " . $_CONFIG['community']['topusermax']);
while ($row = $userbadge->fetch_array()) {
	$userstat = dbSelect('*', 'users', "WHERE id = '" . $row['user_id'] . "' LIMIT 1");
	$row2 = $userstat->fetch_assoc();
	$tpl->block_assign('userbadge', array(
		'USERID'		=>	$row2['id'],
		'USERNAME'		=>	$row2['username'],
		'USERLOOK'		=>	$row2['look'],
		'USERBADGE'		=>	$row['anzahl']
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
	'MENU'		=> '2',
	'NEWS'		=> '0',
	'SEITE'		=>	"Topuser"
));

$tpl->display($user->UserData('theme').'/page-topuser');

?>