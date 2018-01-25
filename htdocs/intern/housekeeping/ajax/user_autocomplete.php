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

$username = $filter->FilterText($_GET['name_startsWith']);
if(strlen($username) >= 2){
	$usercheck = dbSelect('*', 'users', "WHERE username LIKE '%" . strtoupper($username) . "%' LIMIT 20");
	$data = array();
	while ($row = $usercheck->fetch_array()) {
		array_push($data, $row['username']);	
	}	
	echo json_encode($data);
}
	
?>