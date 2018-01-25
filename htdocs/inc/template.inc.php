<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

function page_vars()
{
	global $tpl, $user, $_CONFIG, $core, $user;
	
	$tpl->assign(array(
		'url'				=>	$_CONFIG['website']['url'],
		'name'				=>	$_CONFIG['website']['name'],
		'version'			=>	$_CONFIG['website']['version'],
		'slogan'			=>	$_CONFIG['website']['slogan'],
		'footeradv'			=>	$_CONFIG['website']['footeradv'],
		'badgesurl'			=>	$_CONFIG['website']['badgesurl'],
		'sitealert'			=>	$_CONFIG['website']['sitealert'],

		'ip'				=>	$_CONFIG['client']['ip'],
		'port'				=>	$_CONFIG['client']['port'],
		'mus'				=>	$_CONFIG['client']['mus'],
		'base'				=>	$_CONFIG['client']['base'],
		'external_vars'		=>	$_CONFIG['client']['external_vars'],
		'external_flash'	=>	$_CONFIG['client']['external_flash'],
		'productdata'		=>	$_CONFIG['client']['productdata'],
		'furnidata'			=>	$_CONFIG['client']['furnidata'],
		'habbo_swf'			=>	$_CONFIG['client']['habboswf'],
		'clientmaxusers'	=>	$_CONFIG['client']['maxusers'],
		'clienthash'		=>	$_CONFIG['client']['hash'],
		
		'getdailycredits'	=>	$_CONFIG['getdaily']['credits'],
		'getdailypixels'	=>	$_CONFIG['getdaily']['pixels'],
		'getdailyrespect'	=>	$_CONFIG['getdaily']['respect'],
		'getdailypetrespect'=>	$_CONFIG['getdaily']['petrespect'],
		
		'getdailyvipcredits'=>	$_CONFIG['getdaily']['vip_credits'],
		'getdailyvippixels'	=>	$_CONFIG['getdaily']['vip_pixels'],
		'getdailyvipdias'	=>	$_CONFIG['getdaily']['vip_dias'],
		'getdailyviprespect'=>	$_CONFIG['getdaily']['vip_respect'],
		
		'fbstatus'			=>	$_CONFIG['community']['socialfb'],
		'twstatus'			=>	$_CONFIG['community']['socialtw'],
		'fblink'			=>	$_CONFIG['community']['fbseite'],
		'twname'			=>	$_CONFIG['community']['twname'],
		
		'TIMENOW'			=>	time(),
		'TIMENOWDATE'		=>	date('Y-m-d H:i:s'),
		
		'ONLINE'			=>  $core->ServerStatus('users_online'),
		'SERVERSTATUS'		=>  $core->ServerStatus('status'),
		
		'hkrank'			=>	$_CONFIG['housekeeping']['rank'],
		'hkurl'				=>	$_CONFIG['housekeeping']['url'],
		
		'WARTUNGSMODUSSTATUS'	=>  $_CONFIG['wartungsmodus']['open'],
		'wert' => date('dmshi')
	));
	

	if(!empty($_SESSION['id'])) {
		
		$tpl->assign(array(
			'USERID'			=>	$user->UserData('id'),
			'USERNAME'			=>	$user->UserData('username'),
			'USERRANK'			=>	$user->UserData('rank'),
			'USEREMAIL'			=>	$user->UserData('mail'),
			'USERMOTTO'			=>	wordwrap($user->UserData('motto'), 25, "<br />\n"),
			'USERMOTTO2'		=>	$user->UserData('motto'),
			'USERAVATAR'		=>	$user->UserData('look'),
			'USERCREDITS'		=>	number_format($user->UserData('credits'), 0, '','.'),
			'USERPIXEL'			=>	number_format($user->UserData('activity_points'), 0, '','.'),
			'USERDIAMANT'		=>	number_format($user->UserData('vip_points'), 0, '','.'),
			'USERONLINE'		=>	$core->lasttimeword($user->UserData('last_online')),
			'USERVIP'			=>	$user->UserData('vip'),
			'USERVIPTIME'		=>	date("d.m.y", $user->UserData('vip_time')),
			'USERHCTIME'		=>	$core->getHCDays($user->UserData('id')),
			'USERENEWSLETTER'	=>	$user->UserData('newsletter'),
			'USERHIDEONLINE'	=>	$user->UserData('hide_online'),
			'USERACCTRADING'	=>	$user->UserData('accept_trading'),
			'USERBLOCKNEWFR'	=>	$user->UserData('block_newfriends'),
			'USERAUTH'			=>	$user->UserData('auth_ticket'),
			'theme'				=>	$user->UserData('theme'),
		    'working_text'  	=>	$user->UserData('working_text'),
			'themeurl'			=>	$_CONFIG['website']['url']."/lib/".$user->UserData('theme')."/"
		));
	} else {
		$tpl->assign(array(
			'theme'				=>	$_CONFIG['website']['template'],
			'themeurl'			=>	$_CONFIG['website']['url']."/lib/".$_CONFIG['website']['template']."/"
		));
	}

	include (ROOT ."/inc/lang/".$_CONFIG['website']['language'].".inc.php"); 
}

?>