<?php

/* mCMS
 * edited by Hazed and Remote
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
$error = '';

$userdb = dbSelect('*', 'users', "WHERE id = '" . $user->UserData('id') . "' LIMIT 1");
$userdata = $userdb->fetch_assoc();
if (isset($_POST['sendbadge'])) {
    $username = $filter->FilterText($_POST['username']);
    $badgeid = $filter->FilterText($_POST['badgeid']);
	


    if ($userdata['vip_points'] >= 2) {
        $check = dbSelect('*', 'users', "WHERE username = '" . $user->UserData('id') . "' ");
		
        if ($check->num_rows > 0) {
            $row = $check->fetch_object();

            $badge_check = dbSelect('*', 'user_ownbadge', "WHERE id = '".$badgeid."' AND user_id = '" . $userdata['id'] . "' ");
			 if ($badge_check->num_rows > 0) {
                $badge = $badge_check->fetch_object();
				$form_data_user = array(
				'vip_points'=>	$userdata['vip_points'] - 2
				);
				dbUpdate('users', $form_data_user, "WHERE id = '" . $userdata['id'] . "'");
                $query->MUS('updatepoints', $user->id);
					$form_data_sendbadge = array(
			'user_id' => $row->id,
			'badge_id' => $badge->badge_id,
			'badge_slot' => 0
			);
		dbInsert('user_badges', $form_data_sendbadge);
                // MUS('givebadge', $row->id . ' ' . $badge->badge_id);
                $msg = 'Das Badge wurde erfolgreich an ' . $username . ' gesendet!';
            }
        } else {
            $msg = 'Es konnte keinen Username gefunden werden!';
            $fehler = 'true';
        }
    } else {
        $msg = 'Du hast zu wenig Sterne, um ein Badge weiter zu schicken!';
        $fehler = 'true';
    }
}

$badgecreator = dbSelect('*', 'user_ownbadge', "WHERE user_id = '".$userdata['id']."'");
while ($row = $badgecreator->fetch_array()) {
	$tpl->block_assign('badgecreator', array(
		'BIMAGE'		=>	$row['badge_image'],
		'BID'		=>	$row['badge_id'],
		'BTITLE'		=>	$row['badge_title'],
		'BDESC'	=>	$row['badge_desc'],
		'BSTATUS'	=>	$row['status'],
		'BADGEID'	=>	$row['id'],
		'BTIME'		=> date('d.m.Y H:i', $row['timestamp'])
		
	));
}

$tpl->assign(array(
	'MENU'		=>	'545',
	'SEITE'		=>	'Badgecreator',
	'ERROR'		=>	$error
));

$tpl->display($user->UserData('theme').'/page-badgecreator');

?>