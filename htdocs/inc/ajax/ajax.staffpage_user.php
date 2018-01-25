<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

require ('../base.inc.php');

if(!empty($_POST["userid"])) {
	$userid = $filter->FilterText($_POST["userid"]);

	$userstats = dbSelect('*', 'users', "WHERE id = '" . $userid . "' AND rank >= '" . $_CONFIG['community']['stafflist'] . "' ORDER BY id LIMIT 1");
	$numrows = $userstats->num_rows;
	
	if($numrows > 0){
		$row = $userstats->fetch_assoc();
		echo '<div style="float:right;"><small><i>' . $row['working'] . '</i><br /> <img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=' . $row['look'] . '&direction=4&head_direction=3&gesture=sml&action=wav" style="float:right;"></small></div><b><u>' . $row['username'] . '</u></b><br /><small>' . $row['motto'] . '</small><br /><br /><b><u>Über mich:</u></b><br /><small>' . $filter->FilterText($row['working_text']) . '</small><br /><br /><small>Zuletzt online am ' . date("d.m.Y - H:i", $row['last_online']) . '</small>';
	}
}

?>