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

$question = (isset($_POST['question'])) ? $filter->FilterText($_POST['question']) : '';
$a = (isset($_POST['a'])) ? $filter->FilterText($_POST['a']) : '';
$b = (isset($_POST['b'])) ? $filter->FilterText($_POST['b']) : '';
$c = (isset($_POST['c'])) ? $filter->FilterText($_POST['c']) : '';
$d = (isset($_POST['d'])) ? $filter->FilterText($_POST['d']) : '';
$e = (isset($_POST['e'])) ? $filter->FilterText($_POST['e']) : '';

if (isset($_POST['submit'])){
	if ($user->UserData('vip_points') >= 2){
		if ($user->CheckUserInOwnRoom($user->UserData('id'))){
			if (strlen($question) > 5){
				if (strlen($a) > 0 && strlen($b) > 0){
					$user->CratePoll($user->UserData('id'), $question, $a, $b, $c, $d, $e);
					$error = 5;
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
	'MENU'		=>	'3',
	'SEITE'		=>	'Umfragenshop',
	'ERROR'		=>	$error,
	'QUESTION'		=>	$question,
	'ANSWER_A'		=>	$a,
	'ANSWER_B'		=>	$b,
	'ANSWER_C'		=>	$c,
	'ANSWER_D'		=>	$d,
	'ANSWER_E'		=>	$e
));

$tpl->display($user->UserData('theme').'/page-poll');

?>