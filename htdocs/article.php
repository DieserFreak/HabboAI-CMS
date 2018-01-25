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
$newsid = $filter->FilterText($_GET['id']);

$newscheck = dbSelect('*', 'cms_news', "WHERE id = '" . $newsid . "' AND status = '1' AND date < " . time() . "");

$row = $newscheck->num_rows;
if($row < 1) {
	header('location: '. $_CONFIG['website']['url'].'/news');
}

$news->NewsView($newsid);

$newsdata = $newscheck->fetch_assoc();

$newscatdb = dbSelect('*', 'cms_news_category', "WHERE id = '" . $newsdata['category'] . "'");
$newscat = $newscatdb->fetch_assoc();
	
if(!empty($newsdata['images'])) {
	$images = explode(";", $newsdata['images']);
	foreach($images as &$value) {
		$tpl->block_assign('newsimages', array(
			'IMGURL'		=>	$value,
		));
	}
} else {
	$tpl->block_assign('newsimages', array(
		'IMGURL'		=>	'',
	));
}

$surveyresulcheck = dbSelectNumRows('*', 'cms_news_survey_results', "WHERE news_id = '" . $newsdata['id'] . "' AND user_id = '" . $user->UserData('id') . "' LIMIT 1");


if($newsdata['survey_art'] == 2) {
	$answerdb = dbSelect('*', 'cms_news_survey', "WHERE news_id = '" . $newsdata['id'] . "'");
	while($answer = $answerdb->fetch_assoc()) {
		$tpl->block_assign('surveyop', array(
			'OPTION'		=>	$answer['answer'],
			'OPTIONID'		=>	$answer['id'],
		));
	}
} else {
	$tpl->block_assign('surveyop', array(
		'OPTION'		=>	'',
		'OPTIONID'		=>	'',
	));
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if($newsdata['survey'] == 1) {
		$useranswer = $filter->FilterText($_POST['answer']);
			
		if(strlen($useranswer) < 1) {
			echo '<script>alert("Der Antwort ist leer!");</script>';
		} else if($newsdata['survey_art'] == 1) {
			$news->SurveyAnswer($newsdata['id'], $user->UserData('id'), '0', $useranswer);
		} else if($newsdata['survey_art'] == 2){
			$news->SurveyAnswer($newsdata['id'], $user->UserData('id'), $useranswer, '');
		}
	}
}


$newslist = dbSelect('*', 'cms_news', "WHERE status = '1' ORDER BY id DESC LIMIT 4");
while ($row = $newslist->fetch_array()) {
	$tpl->block_assign('newslist', array(
		'ID'		=>	$row['id'],
		'TITLE'		=>	$row['title'],
		'DESC'		=> 	$row['desc'],
		'DATE'			=>	date("d.m.Y",$newsdata['date']),
	));
}
$newusers = dbSelect('*', 'users', "WHERE rank > 0 ORDER BY id DESC LIMIT 1");
while ($row = $newusers->fetch_array()) {
	$tpl->block_assign('newusers', array(
		'ID'		=>	$row['id'],
		'USERNAME'	=>	$row['username'],
		'USERLOOK'	=>	$row['look'],
		'USERONLINE'=>	$row['online'],
		'USERMOTTO' => 	$row['motto'],
		'USERLAST'	=>	$core->lasttimeword($row['last_online'])
	));
}

$tpl->assign(array(
	'MENU'			=>	'4',
	'NEWSGET'		=>	$_GET['id'],
	'SEITE'			=>	$newsdata['title'],
	'NEWSID'		=>	$newsdata['id'],
	'TITLE'			=>	$newsdata['title'],
	'CATEGORY'		=>	$newscat['category'],
	'AUTOR'			=>	$newsdata['autor'],
	'DESC' 			=> 	$newsdata['desc'],
	'TEXT'			=>	$news->NewsUserData($newsdata['text']),
	'DATE'			=>	date("d.m.Y",$newsdata['date']),
	'SURVEY'		=>	$newsdata['survey'],
	'SURVEYART'		=>	$newsdata['survey_art'],
	'IMAGES'		=>	$newsdata['images'],
	'SURVEYQUESTION'=>	$newsdata['survey_question'],
	'SURVEYSTARTTI'	=>	$newsdata['survey_starttime'],
	'SURVEYENDTIME'	=>	$newsdata['survey_endtime'],
	'SURVEYCHECK'	=>	$surveyresulcheck
));

$tpl->display($user->UserData('theme').'/page-article');

?>