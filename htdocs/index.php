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

if(LOGGING_IN == true){
    header('location: '. $_CONFIG['website']['url'] .'/me.php');
}
function callbackOB($buffer)
{
	return remove_utf8_bom(str_replace("\r\n"," ",$buffer));
}

$error = '';
$banreason = '';
$bantime = '';

if(isset($_GET['l'])) {
	$error = 4;
}

if(isset($_GET['f'])) {
	$error = 5;
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $filter->FilterText($_POST['l_username']);
    $passwort = $filter->FilterText($user->encode($_POST['l_passwort']));
		
    if(strlen($username) < 1 || strlen($passwort) < 1) {
		$error = 1;
    } else if(!$user->UserCheck($username, $passwort)){
		$error = 2;
	} else if(!$user->UserLogin($username, $passwort)){
		$error = 3;
	}
}

if($error == 3) {
	$username = $filter->FilterText($_POST['l_username']);
	
	$ban = $mysqli->query("SELECT * FROM bans WHERE value = '" . $username ."' AND bantype = 'user' AND expire > '".time()."' or value = '".$remoteip."' AND bantype = 'ip' AND expire > '".time()."' ORDER BY id DESC LIMIT 1");
	$bandata = $ban->fetch_assoc();
	
	$tpl->assign(array(
		'BANREASON'		=>	$bandata['reason'],
		'BANSTAFF'		=>	$bandata['added_by'],
		'BANTIME'		=>	date('d.m.Y - H:i:s', $bandata['expire'])
	));
}

$tpl->assign(array(
	'ERROR'		=>	$error
));

$tpl->display($_CONFIG['website']['template'].'/page-index-new');
?>