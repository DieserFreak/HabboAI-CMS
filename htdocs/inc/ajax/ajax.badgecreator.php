<?php

/* mCMS
 * edited by Leni and Remote
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

require ('../base.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

function protect($string, $output = false) {
    $string = str_replace("'", "", $string);
    $string = strip_tags($string);


    return $string;
}
$title = $filter->FilterText($_POST['title']);
$desc = $filter->FilterText($_POST['desc']);
$image = protect($_POST['image'], 'hi');

$userdb = dbSelect('*', 'users', "WHERE id = '" . $user->UserData('id') . "' LIMIT 1");
$userdata = $userdb->fetch_assoc();

if ($userdata['credits'] >= '5000' && $userdata['vip_points'] >= '5') {
	$form_data_user_badge = array(
				'credits'	=>	$userdata['credits'] - 5000,
				'vip_points'=>	$userdata['vip_points'] - 5
				);
	dbUpdate('users', $form_data_user_badge, "WHERE id = '" . $userdata['id'] . "'");
				
		$form_data_badgecreate = array(
			'badge_title' => $title,
			'badge_desc' => $desc,
			'badge_image' => $image,
			'user_id' => $userdata['id'],
			'timestamp' => time(),
			'status'	=> 0
			);
		dbInsert('user_ownbadge', $form_data_badgecreate);
    
	$getownbadge = dbSelect('*', 'user_ownbadge', "WHERE badge_title = '" . $title . "' AND user_id = '".$userdata['id']."'");
	if($getownbadge->num_rows > 0)
	{
		$badge = $getownbadge->fetch_object();
	}
    
    $core->MUS('updatepoints', $userdata['id']);
    $core->MUS('updatecredits', $userdata['id']);
    //aktivitaetenstream($userdata['id'], 'createbadge', '', '');
   // $mysql->query("INSERT INTO hp_modlog (user_id, action, bemerkung, timestamp) VALUES ('" . $userdata['id'] . "', 'createbadge', '', '" . time() . "') ");
   // $mysql->query("INSERT INTO hp_mcp (user_id, action, extra_data, extra_data2, timestamp, bearbeitet, status) VALUES ('" . $userdata['id'] . "', 'createbadge', '".$badge->id."', '', '" . time() . "', '0', '0') ");
    echo 'erfolgreich';
    exit;
} else {
    echo 'wenigmoney';
    exit;
}
?>