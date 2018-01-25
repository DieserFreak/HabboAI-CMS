<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */
 
header('Content-Type: text/html; charset=UTF-8');
require ('../../inc/base.inc.php');
require ('../../inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['system.config']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$configdb = dbSelect('*', 'cms_config');
while ($crow = $configdb->fetch_array()) {
	if(isset($_POST[$crow['config'].'-s'])){
		try
		{
			NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );

			$value = $filter->FilterText($_POST[$crow['config'].'-v']);
			if(!empty($value)){
				$config_change = array(
					'option' => $value
				);
				dbUpdate('cms_config', $config_change, "WHERE config = '".$crow['config']."' LIMIT 1");
				$detail = '<b>Alt:</b> '.$crow['option'].' <big>|</big> <b>Neu:</b> '.$value;
				$housekeeping->hkLogs('Administrator Config', 'Option <u>'.$crow['config'].'</u> geändert', $user->UserData('id'), $remoteip, '0', $detail);
				$msg = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Option "'.ucfirst($crow['config']).'" wurde erfolgreich geändert!</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Es darf nicht leer sein!</div>';		
			}
		}
		catch ( Exception $e )
		{
			$msg = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Bitte, versuchen Sie erneut (NoCSRF)!</div>';	
		}
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'system-config';
$headtitle = 'System - Config';
$toptitle = 'System <small>Config</small>';
$title = 'System </li><li class="active">Config</li>';
require ('./header.php');
?>
<div class="col-md-12">
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab">Website</a></li>
			<li><a href="#tab_3" data-toggle="tab">Registrierung</a></li>
			<li><a href="#tab_4" data-toggle="tab">Get Daily</a></li>
			<li><a href="#tab_5" data-toggle="tab">Wartungsmodus</a></li>
			<li><a href="#tab_6" data-toggle="tab">Account</a></li>
			<li><a href="#tab_7" data-toggle="tab">Community</a></li>
		</ul>
		<div class="tab-content">
			<?php if(!empty($msg)){ echo $msg; } ?>
			<div class="tab-pane active" id="tab_1">
			<form method="post">
				<big>Website</big><br />
				<br />
			<?php
				$websitedb = dbSelect('*', 'cms_config', "WHERE config LIKE 'website-%' AND config != 'website-footeradv' ORDER BY config DESC");
				while ($website = $websitedb->fetch_array()) {
			?>
			<i><?php echo $website['desc']; ?></i><br />
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon"><?php echo ucfirst(substr($website['config'], 8)); ?>:</span><input class="form-control" name="<?php echo $website['config']; ?>-v" value="<?php echo $website['option']; ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="<?php echo $website['config']; ?>-s"><?php echo ucfirst(substr($website['config'], 8)); ?> ändern</button>
				<br />
				<br />
			</div>
			<?php	
				}
			?>
			</form>
			</div>
			<div class="tab-pane" id="tab_2">
			<form method="post">
				<big>Client</big><br />
				<br />
			<?php
				$websitedb = dbSelect('*', 'cms_config', "WHERE config LIKE 'client-%' ORDER BY config DESC");
				while ($website = $websitedb->fetch_array()) {
			?>
			<i><?php echo $website['desc']; ?></i><br />
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon"><?php echo ucfirst(substr($website['config'], 7)); ?>:</span><input class="form-control" name="<?php echo $website['config']; ?>-v" value="<?php echo $website['option']; ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="<?php echo $website['config']; ?>-s"><?php echo ucfirst(substr($website['config'], 7)); ?> ändern</button>
				<br />
				<br />
			</div>
			<?php	
				}
			?>
			</form>
			</div>
			<div class="tab-pane" id="tab_3">
			<form method="post">
				<big>Registrierung</big><br />
				<br />
			<?php
				$websitedb = dbSelect('*', 'cms_config', "WHERE config LIKE 'register-%' ORDER BY config DESC");
				while ($website = $websitedb->fetch_array()) {
			?>
			<i><?php echo $website['desc']; ?></i><br />
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon"><?php echo ucfirst(substr($website['config'], 9)); ?>:</span><input class="form-control" name="<?php echo $website['config']; ?>-v" value="<?php echo $website['option']; ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="<?php echo $website['config']; ?>-s"><?php echo ucfirst(substr($website['config'], 9)); ?> ändern</button>
				<br />
				<br />
			</div>
			<?php	
				}
			?>
			</form>
			</div>
			<div class="tab-pane" id="tab_4">
			<form method="post">
				<big>Get Daily</big><br />
				<br />
			<?php
				$websitedb = dbSelect('*', 'cms_config', "WHERE config LIKE 'getdaily-%' ORDER BY config DESC");
				while ($website = $websitedb->fetch_array()) {
			?>
			<i><?php echo $website['desc']; ?></i><br />
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon"><?php echo ucfirst(substr($website['config'], 9)); ?>:</span><input class="form-control" name="<?php echo $website['config']; ?>-v" value="<?php echo $website['option']; ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="<?php echo $website['config']; ?>-s"><?php echo ucfirst(substr($website['config'], 9)); ?> ändern</button>
				<br />
				<br />
			</div>
			<?php	
				}
			?>
			</form>
			</div>
			<div class="tab-pane" id="tab_5">
			<form method="post">
				<big>Wartungsmodus</big><br />
				<br />
			<?php
				$websitedb = dbSelect('*', 'cms_config', "WHERE config LIKE 'wartungsmodus-%' ORDER BY config DESC");
				while ($website = $websitedb->fetch_array()) {
			?>
			<i><?php echo $website['desc']; ?></i><br />
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon"><?php echo ucfirst(substr($website['config'], 14)); ?>:</span><input class="form-control" name="<?php echo $website['config']; ?>-v" value="<?php echo $website['option']; ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="<?php echo $website['config']; ?>-s"><?php echo ucfirst(substr($website['config'], 14)); ?> ändern</button>
				<br />
				<br />
			</div>
			<?php	
				}
			?>
			</form>
			</div>
			<div class="tab-pane" id="tab_6">
			<form method="post">
				<big>Account</big><br />
				<br />
			<?php
				$websitedb = dbSelect('*', 'cms_config', "WHERE config LIKE 'account-%' ORDER BY config DESC");
				while ($website = $websitedb->fetch_array()) {
			?>
			<i><?php echo $website['desc']; ?></i><br />
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon"><?php echo ucfirst(substr($website['config'], 8)); ?>:</span><input class="form-control" name="<?php echo $website['config']; ?>-v" value="<?php echo $website['option']; ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="<?php echo $website['config']; ?>-s"><?php echo ucfirst(substr($website['config'], 8)); ?> ändern</button>
				<br />
				<br />
			</div>
			<?php	
				}
			?>
			</form>
			</div>
			<div class="tab-pane" id="tab_7">
			<form method="post">
				<big>Community</big><br />
				<br />
			<?php
				$websitedb = dbSelect('*', 'cms_config', "WHERE config LIKE 'community-%' ORDER BY config DESC");
				while ($website = $websitedb->fetch_array()) {
			?>
			<i><?php echo $website['desc']; ?></i><br />
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon"><?php echo ucfirst(substr($website['config'], 10)); ?>:</span><input class="form-control" name="<?php echo $website['config']; ?>-v" value="<?php echo $website['option']; ?>" type="text">
				</div>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
				<button class="btn btn-primary btn-flat" style="width:100%;" name="<?php echo $website['config']; ?>-s"><?php echo ucfirst(substr($website['config'], 10)); ?> ändern</button>
				<br />
				<br />
			</div>
			<?php	
				}
			?>
			</form>
			</div>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>