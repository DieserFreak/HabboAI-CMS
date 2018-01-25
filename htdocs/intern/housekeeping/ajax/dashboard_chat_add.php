<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

require ('../../../inc/base.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['dashboard']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

if(!empty($_POST['text'])) {
	$timespam = time()-30;
	$chatcheck = dbSelectNumRows('*', 'cms_hk_chat', "WHERE user_id = '" . $user->UserData('id') . "' AND timestamp > '". $timespam . "'");
	if($chatcheck < 1){
		$text = $filter->FilterText($_POST['text']);
		$add_new_chat = array(
			'user_id' => $user->UserData('id'),
			'text' => $text,
			'timestamp' => time(),
		);
		dbInsert('cms_hk_chat', $add_new_chat);
		echo '1#Erfolgreich!';
	} else {
		echo '0#Nicht Spammen!';
	}
} else {
	echo '0#Bitte ausfüllen!';
}
?>