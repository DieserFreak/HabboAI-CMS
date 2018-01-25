<?php

/* mCMS
 * A first CMS by Micki 
 * FIXED BY PUNCH AND HobbaCH <3 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

#require ('./inc/base.inc.php');
#require ('./inc/maintenance.inc.php');


 
@session_start();
session_destroy();
header('Location: /index.php?l');

exit;

$user->Logout();
?>