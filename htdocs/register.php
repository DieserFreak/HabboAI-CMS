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

$error = '';
$cloncheck = '';
$clonchecktext = '';
$ipban = '';

$ip_check = dbSelectNumRows('*', 'users', "WHERE ip_last = '".$remoteip."'");
if($ip_check >= $_CONFIG['register']['clone']){
	$cloncheck = 1;
	$clonchecktext = 'Achtung! Du stehst im Verdacht zu klonen und kannst dich somit nicht mehr registrieren. <br /><br /> IP: ' . $remoteip . '<br />Max erlaubte Accounts pro IP: ' . $_CONFIG['register']['clone'] . '<br /><br />Gefundene Accounts: ' . $ip_check->num_rows;
}

$ipban_check = dbSelectNumRows('*', 'bans', "WHERE value = '".$remoteip."' and expire > '".time()."'");
if($ipban_check > 0){
	$ipban = 1;
}

$randfigure = $mysqli->query("SELECT * FROM cms_register ORDER BY RAND() LIMIT 5");
while ($row = $randfigure->fetch_array()) {
	$tpl->block_assign('regfigure', array(
		'ID'		=>	$row['id'],
		'FIGURE'	=>	$row['figure']
	));
}

$username = (isset($_POST['registration_name'])) ? $filter->FilterText($_POST['registration_name']) : '';
$email = (isset($_POST['registration_mail'])) ? $filter->FilterText($_POST['registration_mail']) : '';
$password = (isset($_POST['registration_pass'])) ? $filter->FilterText($_POST['registration_pass']) : '';
$password2 = (isset($_POST['registration_passw'])) ? $filter->FilterText($_POST['registration_passw']) : '';
$geschlecht = (isset($_POST['registration_gender'])) ? $filter->FilterText($_POST['registration_gender']) : '';
$brithday_day = (isset($_POST['registrationBean_day'])) ? $filter->FilterText($_POST['registrationBean_day']) : '';
$brithday_month = (isset($_POST['registrationBean_month'])) ? $filter->FilterText($_POST['registrationBean_month']) : '';
$brithday_year = (isset($_POST['registrationBean_year'])) ? $filter->FilterText($_POST['registrationBean_year']) : '';
$figure = (isset($_POST['registration_figure'])) ? $filter->FilterText($_POST['registration_figure']) : '';

if($_SERVER['REQUEST_METHOD'] == "POST")
{	
	if(empty($username) || empty($email) || empty($password) || empty($password2)) {
		$error = 1;
	} else if(!valid_username($username)){
		$error = 2;
	} else if(!valid_usernamePrefix($username)){
		$error = 2;
	} else if(strlen($username) < 3 || strlen($username) > 12){
		$error = 3;
	} else if(!username_exists($username)){
		$error = 4;
	} else if(!valid_email($email)){
		$error = 5;
	} else if(!email_exists($email)){
		$error = 6;
	} else if(strlen($password) < 6){
		$error = 7;
	} else if($password != $password2){
		$error = 8;
	} else if(!is_numeric($geschlecht)){
		$error = 9;
	} else if(!is_numeric($brithday_day) || !is_numeric($brithday_month) || !is_numeric($brithday_year)){
		$error = 10;
	} else {
		$reg_birthday = $brithday_day . "-" . $brithday_month . "-" . $brithday_year;
		$reg_password = $user->encode($password);
		if($geschlecht == 1){ $reg_gender = 'M'; } else { $reg_gender = 'F'; }

		if($_CONFIG['register']['vip'] == 1){
			$reg_vip = 1;
			$reg_viptime = 60*60*24*$_CONFIG['register']['viptime']+time();
			$reg_rank = 2;
		} else {
			$reg_vip = 0;
			$reg_viptime = 0;
			$reg_rank = 1;
		}
		
		if(empty($figure)){
			$ufigure = $_CONFIG['register']['figure'];
		} else {
			$ufigure = $figure;
		}
		
		$form_data_users = array(
		'username' => $username,
		'real_name' => $_CONFIG['website']['name'],
		'password' => $reg_password,
		'mail' => $email,
		'rank' => $reg_rank,
		'credits' => $_CONFIG['register']['taler'],
		'vip_points' => $_CONFIG['register']['diamant'],
		'activity_points' => $_CONFIG['register']['pixel'],
		'look' => $ufigure,
		'gender' => $reg_gender,
		'motto' => $_CONFIG['register']['motto'],
		'account_created' => time(),
		'last_online' => time(),
		'online' => '0',
		'ip_last' => $remoteip,
		'ip_reg' => $remoteip,
		'home_room' => $_CONFIG['register']['home_room'],
		'newsletter' => '1',
		'birth' => $reg_birthday,
		'theme' => $_CONFIG['website']['template'],
		'vip' => $reg_vip,
		'vip_time' => $reg_viptime
		);
		dbInsert('users', $form_data_users);
		
		$finduser = $mysqli->query("SELECT id FROM users WHERE username = '" . $username . "'");
		$userdata = $finduser->fetch_assoc();
		
	

 
 $v4mapped_prefix_hex = '00000000000000000000ffff';
$v4mapped_prefix_bin = pack("H*", $v4mapped_prefix_hex);

// Or more readable when using PHP >= 5.4
# $v4mapped_prefix_bin = hex2bin($v4mapped_prefix_hex); 

// Parse
$addr = $_SERVER['REMOTE_ADDR'];
$addr_bin = inet_pton($addr);
if( $addr_bin === FALSE ) {
  // Unparsable? How did they connect?!?
  die('Invalid IP address');
}

// Check prefix
if( substr($addr_bin, 0, strlen($v4mapped_prefix_bin)) == $v4mapped_prefix_bin) {
  // Strip prefix
  $addr_bin = substr($addr_bin, strlen($v4mapped_prefix_bin));
}

// Convert back to printable address in canonical form
$addr = inet_ntop($addr_bin);
  $newuseralert = "$username hat sich gerade im Habbo registriert!";
$core->MUS('sa', $newuseralert);

$newuserwhisperalert = "Wir begrüßen ganz herzlich unseren neuen Spieler $username!";
 $core->MUS('whisperall', $newuserwhisperalert);
		
		
		$form_data_user_info = array(
		'user_id' => $userdata['id'],
		'reg_timestamp' => time()
		);
		dbInsert('user_info', $form_data_user_info);
		
		$form_data_user_stats = array(
		'id' => $userdata['id']
		);
		dbInsert('user_stats', $form_data_user_stats);
		
		$form_data_user_badges = array(
		'user_id' => $userdata['id'],
		'badge_id' => $_CONFIG['register']['badge'],
		'badge_slot' =>'0'
		);
		dbInsert('user_badges', $form_data_user_badges);
	
		$_SESSION['id'] = $userdata['id'];
		header('location: '. $_CONFIG['website']['url'] .'/register/accept');
	}
}

$tpl->assign(array(
	'REGOPEN'		=>	$_CONFIG['register']['open'],
	'CLONCHECK'		=>	$cloncheck,
	'CLONCHECKTEXT'	=>	$clonchecktext,
	'IPBAN'			=>	$ipban,
	'ERROR'			=>	$error,
	'USERNAME'		=>	$username,
	'EMAIL'			=>	$email,
	'GESCHLECHT'	=>	$geschlecht,
	'BITHDAY'		=> 	$brithday_day,
	'BITHMONTH'		=>	$brithday_month,
	'BITHYEAR'		=>	$brithday_year
));
 
$tpl->display($_CONFIG['website']['template'].'/page-register');

?>