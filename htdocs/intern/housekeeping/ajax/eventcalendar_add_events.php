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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['events']){
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

	$add_event = array(
		'title' => $title,
		'description' => $description,
		'owner_id' => $user->UserData('id'),
		'start' => $start,
		'end' => $end
	);
	dbInsert('cms_eventcalendar', $add_event);
	$details = '<b>Event im Kalender hinzugefügt</b><hr /><b>Titel:</b> '.$title.'<br /><b>Beschreibung:</b>'.$description;
	$housekeeping->hkLogs('Eventkalender', 'Event hinzugefügt', $user->UserData('id'), $remoteip, '0', $details);
}
?>