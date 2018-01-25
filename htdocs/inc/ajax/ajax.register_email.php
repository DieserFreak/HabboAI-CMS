<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

require ('../base.inc.php');

if(!empty($_POST["email"])) {
	$email = $filter->FilterText($_POST["email"]);

	if(!valid_email($email)){
		echo '0#Die E-Mail ist ung&uuml;ltig';
	} else if(!email_exists($email)){
		echo '0#Die E-Mail ist bereits vergeben';
	} else {
		echo '1#';
	}
}

?>