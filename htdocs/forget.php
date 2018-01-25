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
    header('location: '. $_CONFIG['website']['url'] .'/me');
}

$error = '';

if(empty($_GET['code'])){
	$_GET['code'] = '';
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = (isset($_POST['pw_username'])) ? $filter->FilterText($_POST['pw_username']) : '';
		$mail = (isset($_POST['pw_email'])) ? $filter->FilterText($_POST['pw_email']) : '';
		if(empty($username)) {
			$error = 1;
		} else if($user->user_exists($username, $mail)) {
			$error = 2;
		} else {
			$user->UserPassMail($username);
			$error = 3;
		}
	}
} else {
	if(pwcode_exists($filter->FilterText($_GET['code']))){
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$pwcode = $filter->FilterText($_GET['code']);
			$password = (isset($_POST['pw_passwort'])) ? $filter->FilterText($_POST['pw_passwort']) : '';
			$password2 = (isset($_POST['pw_passwort2'])) ? $filter->FilterText($_POST['pw_passwort2']) : '';
			
			if(strlen($password) < 6){
				$error = 4;
			} else if($password != $password2){
				$error = 5;
			} else {
				$userdata = dbSelect('*', 'users', "WHERE pw_code = '" . $pwcode . "' LIMIT 1");
				$userd = $userdata->fetch_assoc();
			
				$new_password = $user->encode($password);
				
				$form_data_user_password = array(
				'password'	=>	$new_password,
				'pw_code'	=>	''
				);
				dbUpdate('users', $form_data_user_password, "WHERE username = '" . $userd['username'] . "'");

				header('location: '. $_CONFIG['website']['url'] .'/index?f');
			}
		}
	} else {
		header('location: '. $_CONFIG['website']['url'] .'/forget');
	}
}

$tpl->assign(array(
	'ERROR'		=>	$error,
	'CODE'		=>	$_GET['code']
));

$tpl->display($_CONFIG['website']['template'].'/page-forget');

?>