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
$info = '';

$topic = (isset($_POST['topic'])) ? $filter->FilterText($_POST['topic']) : '';
$prioritaet = (isset($_POST['prioritaet'])) ? $filter->FilterText($_POST['prioritaet']) : '';
$text = (isset($_POST['text'])) ? $filter->FilterText($_POST['text']) : '';



if(isset($_POST['submit'])){
	
	$newuseralert = "Es wurde gerade ein Support-Ticket auf der Homepage erstellt!";
$core->MUS('sa', $newuseralert);
	
	if(strlen($topic) < 1){
		$info = 1;
	} else if(!is_numeric($prioritaet)){
		$info = 1;
	} else if(strlen($text) < 30){
		$info = 2;
	} else if(CheckSupport($user->UserData('id'))){
		$info = 3;
	} else {
		$form_data_support = array(
			'user_id' => $user->UserData('id'),
			'topic' => $topic,
			'prioritaet' => $prioritaet,
			'text' => $text,
			'date' => time()
			);
		dbInsert('cms_support', $form_data_support);
		$info = 4;
	}
}




$usersupport = dbSelect('*', 'cms_support', "WHERE user_id = '" . $user->UserData('id') . "' AND edit_by != '' ORDER BY edit_date DESC LIMIT " . $_CONFIG['support']['maxcount']);
while($row = $usersupport->fetch_assoc()) {
	$tpl->block_assign('usersupport', array(
		'TOPIC'			=>	$row['topic'],
		'ANSWER'		=>	$row['edit_answer'],
		'TICKETID'		=>	$row['id'],
		'ANSWERDATE'	=>	date("d.m.Y - H:i" ,$row['edit_date']),
	));
}
	
$tpl->assign(array(
	'MENU'		=>	'1',
	'NEWS'		=> '0',
	'SEITE'		=>	"Support",
	'SUPOPEN'	=>	$_CONFIG['support']['open'],
	'INFO'		=>	$info,
	'ANZHALSUP'	=>	$_CONFIG['support']['maxcount']
));

$tpl->display($user->UserData('theme').'/page-support');

?>