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
	
if(isset($_POST['check'])) {
	$check = $filter->FilterText($_POST['check']);
	$change_task = array(
		'status' => '1',
		'timestamp_end' => time(),
	);
	dbUpdate('cms_hk_tasks', $change_task, "WHERE id = '".$check."' LIMIT 1");
} elseif(isset($_POST['uncheck'])) {
	$uncheck = $filter->FilterText($_POST['uncheck']);
		$change_task = array(
		'status' => '0',
		'timestamp_end' => '',
	);
	dbUpdate('cms_hk_tasks', $change_task, "WHERE id = '".$uncheck."' LIMIT 1");
}
?>