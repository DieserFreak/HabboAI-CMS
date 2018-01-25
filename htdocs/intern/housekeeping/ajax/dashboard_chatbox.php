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
	
$dateofweek = time()-2592000;
$chatdb = dbSelect('*', 'cms_hk_chat', "WHERE timestamp > '". $dateofweek ."' ORDER BY timestamp DESC");
while ($row = $chatdb->fetch_array()) {
	$userdb = dbSelect('*', 'users', "WHERE id = '". $row['user_id'] ."' LIMIT 1");
	$userdata = $userdb->fetch_assoc();
?>
<div class="item">
	<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $userdata['look']; ?>&direction=3&head_direction=3&gesture=sml&action=stand" class="<?php if($userdata['online'] == 1){ echo'online'; } else { echo'offline'; } ?>"/>
	<p class="message">
		<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/info/<?php echo $userdata['id']; ?>" class="name">
			<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $core->lasttimeword($row['timestamp']); ?></small>
			<?php echo $userdata['username']; ?>
		</a>
		<?php echo $row['text']; ?>
		<?php if($userdata['id'] == $user->UserData('id') || $user->UserData('rank') >= $_CONFIG['housekeeping']['right']['dashboard.delallchat']){ ?><div style="float:right;"><small><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/home?delchat=<?php echo $row['id']; ?>">[Löschen]</a></small></div><?php } ?>
	</p>
</div>
<?php
}
?>