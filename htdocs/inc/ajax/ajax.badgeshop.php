<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

require ('../base.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if(!empty($_POST["badgeid"])) {
	$badgeid = $filter->FilterText($_POST["badgeid"]);

	$badgedb = dbSelect('*', 'cms_badgeshop', "WHERE id = '" . $badgeid . "' LIMIT 1");
	$badge = $badgedb->fetch_assoc();
	
	$userdb = dbSelect('*', 'users', "WHERE id = '" . $user->UserData('id') . "' LIMIT 1");
	$userdata = $userdb->fetch_assoc();
	
	$userbadge = dbSelect('*', 'user_badges', "WHERE user_id = '" . $userdata['id'] . "' AND badge_id = '" . $badge['badge'] . "' LIMIT 1");
	
	if($userbadge->num_rows > 0){
		echo '<div class="message error vampire">Du besitzt das Badge schon</div>';
	} else {
		if($badge['cost_taler'] <= $userdata['credits'] AND $badge['cost_dias'] <= $userdata['vip_points']){
			if($badge['limited'] == 1){
				if($badge['limited_max'] > $badge['limited_selled']){
					$user->BuyBadge($userdata['id'], $badge['id']);
					echo '<div class="message success">Erfolgreich das Badge gekauft</div>';
				} else {
					echo '<div class="message error vampire">Das Badge ist leider ausverkauft</div>';
				}
			} else {
				$user->BuyBadge($userdata['id'], $badge['id']);
				echo '<div class="message success">Erfolgreich das Badge gekauft</div>';
			}
		} else {
			echo '<div class="message error vampire">Du hast zu wenig Taler/Diamanten</div>';
		}
	}
}

?>