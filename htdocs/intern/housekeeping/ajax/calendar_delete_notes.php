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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['dashboard.calendar']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$id = $filter->FilterText($_POST['id']);


if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['dashboard.calendar.changeall']){
		$notedb = dbSelect('*', 'cms_hk_calendar', "WHERE id = '".$id."' LIMIT 1");
		$row = $notedb->fetch_assoc();
		if($user->UserData('id') == $row['owner_id']){
			dbDelete('cms_hk_calendar', "WHERE id = '".$id."' LIMIT 1");
		} else {
			// Error
		}
	} else {
		dbDelete('cms_hk_calendar', "WHERE id = '".$id."' LIMIT 1");
	}
?>