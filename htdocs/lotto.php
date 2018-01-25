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

$error = '';

$caption = (isset($_POST['caption'])) ? $filter->FilterText($_POST['caption']) : '';
$model = (isset($_POST['model'])) ? $filter->FilterText($_POST['model']) : '';

if (isset($_POST['submit'])){
	if($user->UserData('online') == 1){
		$UserModel = dbSelectNumRows('*', 'rooms', "WHERE model_name = 'model_" . $model . "' AND owner = '" . $user->UserData('username') . "'");
		if ($UserModel <= 10){
			if (strlen($caption) > 2){
				$filter = preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $caption);
				if ($filter == $caption){
					$ModelExist = dbSelectNumRows('*', 'room_models', "WHERE id = 'model_" . $model . "' LIMIT 1");
					if ($ModelExist > 0){
						$core->MUS('addroom', $user->UserData('id').' model_'.$model.' '.$caption);
						$error = 6;
					} else {
						$error = 5;
					}
				} else {
					$error = 4;
				}
			} else {
				$error = 3;
			}
		} else {
			$error = 2;
		}
	} else {
		$error = 1;
	}
}

$tpl->assign(array(
	'MENU'		=>	'2',
	'SEITE'		=>	'Lotto',
	'ERROR'		=>	$error,
	'CAPTION'		=>	$caption,
	'MODEL'		=>	$model
));

$tpl->display($user->UserData('theme').'/page-lotto');

?>