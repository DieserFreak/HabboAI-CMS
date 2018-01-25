<?php
/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

header('Content-Type: text/html; charset=utf-8');
require ('./inc/base.inc.php');
require ('./inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($_CONFIG['client']['maxusers'] <= $core->ServerStatus('users_online')) {
	header('location: '. $_CONFIG['website']['url'] .'/me?client');
}

if($_CONFIG['housekeeping']['rank'] <= $user->UserData('rank')){
	if(empty($_SESSION['intern']['acp'])){
		header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'');
	}
}

/*
if($user->UserData('online') == 1){
	header('location: '. $_CONFIG['website']['url'] .'/me');
}
*/

$form_data_user_clientauth = array(
	'auth_ticket' => $core->GenerateTicket(),
	'ip_last'	=>	$remoteip
);
dbUpdate('users', $form_data_user_clientauth, "WHERE id = '" . $user->UserData('id') . "' LIMIT 1");

$tpl->assign(array(
	'SEITE'		=>	'Client'
));

$tpl->display($user->UserData('theme').'/page-client');

?>