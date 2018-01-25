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
$info = '<div id="sitealert">Erflogreich geändert!</div>';

if($_GET['setting'] == 1) {
	$st_motto = (isset($_POST['a_motto'])) ? $filter->FilterText($_POST['a_motto']) : '';
	$st_newsletter = (isset($_POST['a_newsletter'])) ? $filter->FilterText($_POST['a_newsletter']) : '';
	$st_hideonline = (isset($_POST['a_hideonline'])) ? $filter->FilterText($_POST['a_hideonline']) : '';
	$st_accepttrading = (isset($_POST['a_accepttrading'])) ? $filter->FilterText($_POST['a_accepttrading']) : '';
	$st_blocknewfriends = (isset($_POST['a_blocknewfriends'])) ? $filter->FilterText($_POST['a_blocknewfriends']) : '';

	if(isset($_POST['submit_motto'])){
		if(strlen($st_motto) > 50){
			$info = 1;
		} else {
			$user->ChangeMotto($user->UserData('id'), $st_motto);
			$user->ChangeUserStats($user->UserData('id'), $st_newsletter, $st_hideonline, $st_accepttrading, $st_blocknewfriends);
			$info = 2;
			
		}
}
}
if($_GET['setting'] == 2) {
	$pw_password = (isset($_POST['ap_password'])) ? $filter->FilterText($_POST['ap_password']) : '';
	$birth_day = (isset($_POST['ap_day'])) ? $filter->FilterText($_POST['ap_day']) : '';
	$birth_month = (isset($_POST['ap_month'])) ? $filter->FilterText($_POST['ap_month']) : '';
	$birth_year = (isset($_POST['ap_year'])) ? $filter->FilterText($_POST['ap_year']) : '';
	$pw_newpassword = (isset($_POST['ap_newpassword'])) ? $filter->FilterText($_POST['ap_newpassword']) : '';
	$pw_newpassword2 = (isset($_POST['ap_newpassword2'])) ? $filter->FilterText($_POST['ap_newpassword2']) : '';

	if(isset($_POST['submit_password'])){
		$pw_birthday = $birth_day. "." . $birth_month . "." . $birth_year;

		if(!CheckPassword($user->UserData('id'), $user->encode($pw_password))){
			$info = 3;
		} else if(!CheckBirthday($user->UserData('id'), $pw_birthday)){
			$info = 4;
		} else if(strlen($pw_newpassword) < 6){
			$info = 5;
		} else if($pw_newpassword != $pw_newpassword2){
			$info = 6;
		} else {
			$user->ChangePassword($user->UserData('id'), $user->encode($pw_newpassword));
			$info = 7;
		}
	}
}

if($_GET['setting'] == 3) {
	$ml_email = (isset($_POST['ae_email'])) ? $filter->FilterText($_POST['ae_email']) : '';
	$ml_newemail = (isset($_POST['ae_newemail'])) ? $filter->FilterText($_POST['ae_newemail']) : '';

	if(isset($_POST['submit_email'])){
		if(!CheckEmail($user->UserData('id'), $ml_email)){
			$info = 8;
		} else if(!valid_email($ml_newemail)){
			$info = 9;
		} else if(!email_exists($ml_email)){
			$info = 10;
		} else {
			$user->ChangeEmail($user->UserData('id'), $ml_newemail);
			$info = 11;
		}
	}
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
	'MENU'		=>	'1',
	'NEWS'		=>	'0',
	'SEITE'		=>	"Einstellungen",
	'INFO'		=>	$info,
	'SETTING'	=>	$_GET['setting'],
	'CHANGEPW'	=>	$_CONFIG['account']['changepassword'],
	'CHANGEMAIL'=>	$_CONFIG['account']['changeemail'],
));

if($_GET['setting'] == 2) {
	$tpl->assign(array(
		'BITHDAY'		=> 	$birth_day,
		'BITHMONTH'		=>	$birth_month,
		'BITHYEAR'		=>	$birth_year
	));
}

$tpl->display($user->UserData('theme').'/page-account');

?>