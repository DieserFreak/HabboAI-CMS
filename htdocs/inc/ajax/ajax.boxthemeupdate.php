<?php

require ('../base.inc.php');

$theme = $_GET['theme'];
$uid = $_GET['uid'];
$themechange = array(
					'boxtheme' => $theme
				);
dbUpdate('users', $themechange, "WHERE id = ".$uid." LIMIT 1");

?>