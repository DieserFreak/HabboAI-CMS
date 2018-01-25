<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

require ('../../../inc/base.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['dashboard']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$userid = $filter->FilterText($_POST['userid']);

$datepastoneday = time()-3024000;

$usertasksrows = dbSelectNumRows('*', 'cms_hk_tasks', "WHERE user_id = '".$userid."' AND (timestamp_end = '0' OR timestamp_end > '" . $datepastoneday . "') ORDER BY id DESC");
if($usertasksrows < 1){
	echo '<li>Er/Sie hat noch keine Stunden erfasst!</li>';
}

$usertasks = dbSelect('*', 'cms_hk_tasks', "WHERE user_id = '".$userid."' AND (timestamp_end = '0' OR timestamp_end > '" . $datepastoneday . "') ORDER BY id DESC");
while ($row = $usertasks->fetch_array()) {
	$userdb = dbSelect('*', 'users', "WHERE id = '". $row['user_id'] ."' LIMIT 1");
	$userdata = $userdb->fetch_assoc();
?>						
<li<?php if($row['status'] == 1){ echo' class="done"'; } ?>>
	<span class="handle"></span> 
	<span class="text"><?php  echo $row['task']; ?></span>
	<small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $core->lasttimeword($row['timestamp']); ?></small>
	<div class="tools">
		<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/home?deltask=<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i></a>
	</div>
</li>
<?php
}
?>