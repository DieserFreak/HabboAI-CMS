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
	
if(isset($_POST['title'])){
	$title = $filter->FilterText($_POST['title']);
	$description = $filter->FilterText($_POST['description']);
	$start = $filter->FilterText($_POST['start']);
	$end = $filter->FilterText($_POST['end']);
	$allDay = $filter->FilterText($_POST['allDay']);
	$backgroundColor = $filter->FilterText($_POST['backgroundColor']);
	$borderColor = $filter->FilterText($_POST['borderColor']);

	$add_event = array(
		'title' => $title,
		'description' => $description,
		'owner' => $user->UserData('username'),
		'owner_id' => $user->UserData('id'),
		'start' => $start,
		'end' => $end,
		'allDay' => $allDay,
		'backgroundColor' => $backgroundColor,
		'borderColor' => $borderColor
	);
	dbInsert('cms_hk_calendar', $add_event);
	$details = '<b>Notiz im Kalender hinzugefügt</b><hr /><b>Titel:</b> '.$title.'<br /><b>Beschreibung:</b>'.$description;
	$housekeeping->hkLogs('Kalender', 'Notiz hinzugefügt', $user->UserData('id'), $remoteip, '0', $details);
}
?>