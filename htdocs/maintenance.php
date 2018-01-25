<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */
 
header('Content-Type: text/html; charset=UTF-8');
require ('./inc/base.inc.php');

if($_CONFIG['wartungsmodus']['open'] != 1){
    header('location: '. $_CONFIG['website']['url']);
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $filter->FilterText($_POST['ml_username']);
    $passwort = $filter->FilterText($user->encode($_POST['ml_passwort']));
		
    if(strlen($username) < 1 || strlen($passwort) < 1) {
		$error = 1;
    } else if(!$user->UserCheck($username, $passwort)){
		$error = 2;
	} else if(!$user->UserLogin($username, $passwort)){
		$error = 3;
	}
}

$tpl->assign(array(
	'ADMLOGIN'	=>	$_CONFIG['wartungsmodus']['adminlogin'],
	'REASON'	=>	$_CONFIG['wartungsmodus']['reason'],
	'ERROR'		=>	$error
));

$tpl->display($_CONFIG['website']['template'].'/page-maintenance');

?>