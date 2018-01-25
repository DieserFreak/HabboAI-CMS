<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

function valid_username($username)
{
	$filter = preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $username);
	
	if($filter == $username){
		return $username; //preg_match('#^[a-z]{1,2}[a-z0-9-_.-]+$#i', $username);
	}
}

function valid_usernamePrefix($username)
{
	$first = substr($username, 0, 4);
	$first_head = substr($username, 0, 5);
	
	if(strnatcasecmp($first,"MOD-") == false || strnatcasecmp($first,"ADM-") == false || strnatcasecmp($first_head,"HEAD-") == false || strnatcasecmp($first,"@") == false) {
		return false;
	} else {
		return $username;
	}
}
function getUsername($userid)
{
	$userinfo = dbSelect('*', 'users', "WHERE id = '" . $userid . "' LIMIT 1");
	$userinfo2 = $userinfo->fetch_array();
	return $userinfo2['username'];
	
}
function getUserlook($userid)
{
	$userinfo = dbSelect('*', 'users', "WHERE id = '" . $userid . "' LIMIT 1");
	$userinfo2 = $userinfo->fetch_array();
	return $userinfo2['look'];
	
}
function username_exists($username)
{
	$row = dbSelectNumRows('*', 'users', "WHERE username = '" . $username . "' LIMIT 1");
	if($row > 0){
		return false;
	} else {
		return $username;
	}
}

function valid_email($email)
{
	return preg_match('#^[a-z0-9_.-]+@([a-z0-9_.-]+\.)+[a-z]{2,4}$#si', $email);
}

function email_exists($email)
{
	$row = dbSelectNumRows('*', 'users', "WHERE mail = '" . $email . "' LIMIT 1");
	if($row > 0){
		return false;
	} else {
		return $email;
	}
}

function pwcode_exists($code)
{
	$row = dbSelectNumRows('*', 'users', "WHERE pw_code = '" . $code . "' LIMIT 1");
	if($row < 1) {
		return false;
	} else {
		return true;
	}
}

function CheckPassword($userid, $password)
{
	$row = dbSelectNumRows('*', 'users', "WHERE id = '" . $userid . "' AND password = '" . $password . "' LIMIT 1");
	if($row < 1) {
		return false;
	} else {
		return true;
	}
}

function CheckEmail($userid, $email)
{
	$row = dbSelectNumRows('*', 'users', "WHERE id = '" . $userid . "' AND mail = '" . $email . "' LIMIT 1");
	if($row < 1) {
		return false;
	} else {
		return true;
	}
}

function CheckBirthday($userid, $birth)
{
	$row = dbSelectNumRows('*', 'users', "WHERE id = '" . $userid . "' AND birth = '" . $birth . "' LIMIT 1");
	if($row < 1) {
		return false;
	} else {
		return true;
	}
}

function CheckSupport($userid)
{
	global $_CONFIG;
	
	$row = dbSelectNumRows('*', 'cms_support', "WHERE user_id = '" . $userid . "' AND edit_by = ''");
	if($row < $_CONFIG['support']['maxcount']) {
		return false;
	} else {
		return true;
	}
}

function CheckShop($userid, $art)
{
	$row = dbSelectNumRows('*', 'cms_shop_purchase', "WHERE user_id = '" . $userid . "' AND art = '" . $art . "' AND status = '0'");
	if($row < 1) {
		return false;
	} else {
		return true;
	}
}

?>