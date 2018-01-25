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

	if(!username_exists($username)){
		echo '1#';
	} else {
		echo '0#Der User existiert nicht';
	}
	
}

?>