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

if(isset($_POST['id'])){
	$id = $filter->FilterText($_POST['id']);
	$title = $filter->FilterText($_POST['title']);
	$start = $filter->FilterText($_POST['start']);
	$end = $filter->FilterText($_POST['end']);
	$allday = $filter->FilterText($_POST['allDay']);
	
	if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['dashboard.calendar.changeall']){
		$notedb = dbSelect('*', 'cms_hk_calendar', "WHERE id = '".$id."' LIMIT 1");
		$row = $notedb->fetch_assoc();
		if($user->UserData('id') == $row['owner_id']){
			$update_event = array(
				'title' => $title,
				'start' => $start,
				'end' => $end,
				'allDay' => $allday
			);
			dbUpdate('cms_hk_calendar', $update_event, "WHERE id = '".$id."' LIMIT 1");
		} else {
			// Error
		}
	} else {
		$update_event = array(
			'title' => $title,
			'start' => $start,
			'end' => $end,
			'allDay' => $allday
		);
		dbUpdate('cms_hk_calendar', $update_event, "WHERE id = '".$id."' LIMIT 1");
	}
}
?>