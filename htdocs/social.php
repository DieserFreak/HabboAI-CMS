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
$tpl->assign(array(
	'MENU'		=> '2',
	'NEWS'		=> '0',
	'SEITE'		=>	"Soziales Netzwerk"
));

$tpl->display($user->UserData('theme').'/page-social');

?>