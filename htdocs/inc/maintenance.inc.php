<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

if($_CONFIG['wartungsmodus']['open'] == 1){
	if(!empty($_SESSION['id'])){
		if(!$user->WartungsmodusRank($user->UserData('id'))){
			header('location: '. $_CONFIG['website']['url'] .'/maintenance');
			session_destroy();
		}
	} else {
		header('location: '. $_CONFIG['website']['url'] .'/maintenance');
	}
}

?>