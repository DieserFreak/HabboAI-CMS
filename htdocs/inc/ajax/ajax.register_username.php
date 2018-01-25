<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

require ('../base.inc.php');

if(!empty($_POST["username"])) {
	$username = $filter->FilterText($_POST["username"]);

	if(!valid_username($username)){
		echo '0#Der Username ist ungültig';
	} else if(!valid_usernamePrefix($username)){
		echo '0#Der Username ist ungültig';
	} else if(strlen($username) < 3 || strlen($username) > 12){
		echo '0#Der Username muss zwischen 3 und 12 Buchstaben/Zahlen erhalten';
	} else if(!username_exists($username)){
		echo '0#Der Username ist leider vergeben';
	} else {
		echo '1#';
	}
	
}

?>