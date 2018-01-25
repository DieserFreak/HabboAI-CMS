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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['dashboard']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$tasktext = (isset($_POST['tasktext'])) ? $filter->FilterText($_POST['tasktext']) : '';
$taskuser = (isset($_POST['taskuser'])) ? $filter->FilterText($_POST['taskuser']) : '';

if(isset($_GET['deltask'])){
	$taskid = $filter->FilterText($_GET['deltask']);
	
	if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['dashboard.delalltask']){
		$taskcheck = dbSelectNumRows('*', 'cms_hk_tasks', "WHERE id = '" . $taskid . "'");
		if($taskcheck > 0){
			$delete = dbDelete('cms_hk_tasks', "WHERE id = '" . $taskid . "' AND added_by = '". $user->UserData('id') . "'");
			$msg_task = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Aufgabe wurde erfogreich gelöscht!</div>';
		} else {
			$msg_task = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Aufgabe existiert nicht oder du hast keine Berechtigung!</div>';
		}
	} else {
		$taskcheck = dbSelectNumRows('*', 'cms_hk_tasks', "WHERE id = '" . $taskid . "' AND added_by = '". $user->UserData('id') . "'");
		if($taskcheck > 0){
			$delete = dbDelete('cms_hk_tasks', "WHERE id = '" . $taskid . "' AND added_by = '". $user->UserData('id') . "'");
			$msg_task = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Aufgabe wurde erfogreich gelöscht!</div>';
		} else {
			$msg_task = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Aufgabe existiert nicht oder du hast keine Berechtigung!</div>';
		}
	}
}

if(isset($_GET['delchat'])){
	$chatid = $filter->FilterText($_GET['delchat']);
	
	if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['dashboard.delallchat']){
		$chatcheck = dbSelectNumRows('*', 'cms_hk_chat', "WHERE id = '" . $chatid . "'");
		if($chatcheck > 0){
			$delete = dbDelete('cms_hk_chat', "WHERE id = '" . $chatid . "'");
			$msg_chat = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Chattext wurde erfogreich gelöscht!</div>';
		} else {
			$msg_chat = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Chattext existiert nicht oder du hast keine Berechtigung!</div>';
		}
	} else {
		$chatcheck = dbSelectNumRows('*', 'cms_hk_chat', "WHERE id = '" . $chatid . "' AND user_id = '". $user->UserData('id') . "'");
		if($chatcheck > 0){
			$delete = dbDelete('cms_hk_chat', "WHERE id = '" . $chatid . "' AND user_id = '". $user->UserData('id') . "'");
			$msg_chat = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Der Chattext wurde erfogreich gelöscht!</div>';
		} else {
			$msg_chat = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der Chattext existiert nicht oder du hast keine Berechtigung!</div>';
		}
	}
}

if(isset($_POST['add_task'])){
	try
	{
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
	
		if(strlen($tasktext) >= 5){
		$userdb = dbSelect('*', 'users', "WHERE id = '". $taskuser ."' LIMIT 1");
		if($userdb->num_rows > 0){
				$taskuser = $userdb->fetch_assoc();
				if($user->UserData('rank') >= $taskuser['rank']){
					$add_new_task = array(
						'user_id' => $taskuser['id'],
						'added_by' => $user->UserData('id'),
						'task' => $tasktext,
						'status' => '0',
						'timestamp' => time(),
					);
					dbInsert('cms_hk_tasks', $add_new_task);
					$detail = '<b>Aufgabe:</b> '.$tasktext;
					$housekeeping->hkLogs('Dashboard', 'Aufgabe erstellt', $user->UserData('id'), $remoteip, $taskuser['id'], $detail);
					$msg_task_t = '<div class="alert alert-success alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Erfolgreich!</b><br /> Die Stunde wurde erfogreich erfasst!</div>';
				} else {
					$msg_task = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Du kannst nur in deiner Position oder drunter eine Aufgabe geben!</div> <script type="text/javascript"> $(window).load(function(){ $(\'#todo-modal\').modal(\'show\'); }); </script>';	
				}
			} else {
				$msg_task = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Der User existiert nicht!</div> <script type="text/javascript"> $(window).load(function(){ $(\'#todo-modal\').modal(\'show\'); }); </script>';
			}
		} else {
			$msg_task = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br /> Die Aufgabe muss mindestens 5 Zeichen lang sein!</div><script type="text/javascript"> $(window).load(function(){ $(\'#todo-modal\').modal(\'show\'); }); </script>';
		}
	}
	catch ( Exception $e )
	{
		$msg_task = '<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Fehler!</b><br /> Erneut versuchen.</div>';	
	}
}

$token = NoCSRF::generate( 'csrf_token' );

$active = 'dashboard-home';
$headtitle = 'Dashboard';
$toptitle = 'Dashboard';
$title = 'Dashboard';
require ('./header.php');
?>

<div class="row">
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php  
						$onlinedb = dbSelect('*', 'online_statistik', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m')."' ORDER BY useronline DESC LIMIT 1");
						$online = $onlinedb->fetch_assoc();
						if($onlinedb->num_rows <= 0){
							$onlineres = 0;
						} else {
							$onlineres = $online['useronline'];
						}
						echo $onlineres; 
					?>
				</h3>
				<p>
					heutiger Userrekord
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-stalker"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/client" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
					<?php 
						echo dbSelectNumRows('*', 'cms_login_logs', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m')."' GROUP BY user_id"); 
					?>
				</h3>
				<p>
					heutige Userlogins
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-log-in"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/homepage" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-green">
			<div class="inner">
				<h3>
					<?php 
						echo dbSelectNumRows('*', 'cms_login_logs', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m')."'");
					?>
				</h3>
				<p>
					heutige gesamte Logins
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-log-in"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/user" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>
					<?php 
						echo dbSelectNumRows('*', 'users', "WHERE FROM_UNIXTIME(account_created, '%d.%m') = '".date('d.m')."'");
					?>
				</h3>
				<p>
					heutige registrierte Users
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/user" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>
					<?php 
						echo dbSelectNumRows('*', 'bans', "WHERE expire > '".time()."'"); 
					?>
				</h3>
				<p>
					Accounts gesperrt
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-close-circled"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/ban" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-maroon">
			<div class="inner">
				<h3>
					<?php 
						echo dbSelectNumRows('*', 'cms_support', "WHERE edit_by = '0'");
					?>
				</h3>
				<p>
					offene Ticket(s)
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-alert-circled"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/support" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php 
						echo dbSelectNumRows('*', 'cms_eventcalendar', "WHERE start > '".date('Y-m-d H:i:s')."'");
					?>
				</h3>
				<p>
					geplante Event(s)
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-film-marker"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/event" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-navy">
			<div class="inner">
				<h3>
					<?php 
						echo dbSelectNumRows('*', 'user_roomvisits', "WHERE FROM_UNIXTIME(entry_timestamp, '%d.%m') = '".date('d.m')."'").'-mal';
					?>
				</h3>
				<p>
					heutige Räume besucht
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-home"></i>
			</div>
			<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/client" class="small-box-footer">
				Mehr Information <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">			
		<div class="box box-danger">
			<div class="box-header">
				<i class="fa fa-bar-chart-o"></i>
				<h3 class="box-title">Teamliste</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="box">
					<table class="table table-striped">
						<tr>
							<th width="5%">#</th>
							<th width="20%">User</th>
							<th width="20%">Rank</th>
							<th width="20%">zuletzt Online</th>
							<th width="25%">Aktion</th>
						</tr>
				<?php
						$userrank = dbSelect('*', 'users', "WHERE rank > 5 ORDER BY rank DESC");
						while ($row = $userrank->fetch_array()) {
							$rankdb = dbSelect('*', 'ranks', "WHERE id = '". $row['rank'] ."' LIMIT 1");
							$rankname = $rankdb->fetch_assoc();
				?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $rankname['name']; ?></td>
							<td><?php if($row['online'] == '1'){ echo '<font color="green"><b>Online</b></font>'; } else { echo $core->lasttimeword($row['last_online']); } ?></td>
							<td><small><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/info/<?php echo $row['id']; ?>">Info</a> | <a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/edit/<?php echo $row['id']; ?>">Bearbeiten</a></small></td>
						</tr>
				<?php
						}
				?>
					</table>
				</div>
			</div>
		</div>
		
		<div class="box box-warning" id="tasklist">
			<div class="box-header">
				<i class="ion ion-clipboard"></i>
				<h3 class="box-title">Stundenerfassung</h3>
				<div class="box-tools pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-warning">Mitarbeiter</button>
						<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/home">Meine Stunden</a></li>
						<?php
							$userlist = dbSelect('*', 'users', "WHERE rank >= '" . $_CONFIG['housekeeping']['right']['dashboard'] . "' AND id != '".$user->UserData('id')."' ORDER BY rank DESC");
							while ($row = $userlist->fetch_array()) {
						?>
							<li class="usertasks" userid="<?php echo $row['id']; ?>"><a><?php echo $row['username']; ?></a></li>
						<?php
							}
						?>
						</ul>
					</div>
					<button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-warning btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
			<form id="tasks">
				<?php if(!empty($msg_task_t)){ echo $msg_task_t; } ?>
				<ul class="todo-list" id="todo-list">
				<?php
					$datepastoneday = time()-86400;
					
					$usertasksrows = dbSelectNumRows('*', 'cms_hk_tasks', "WHERE user_id = '".$user->UserData('id')."' AND (timestamp_end = '0' OR timestamp_end > '" . $datepastoneday . "') ORDER BY id DESC");
					if($usertasksrows < 1){
						echo 'Oh - du hast noch keine Stunden erfasst!';
					}
			
					$usertasks = dbSelect('*', 'cms_hk_tasks', "WHERE user_id = '".$user->UserData('id')."' AND (timestamp_end = '0' OR timestamp_end > '" . $datepastoneday . "') ORDER BY id DESC");
					while ($row = $usertasks->fetch_array()) {
						$userdb = dbSelect('*', 'users', "WHERE id = '". $row['user_id'] ."' LIMIT 1");
						$userdata = $userdb->fetch_assoc();
				?>						
					<li<?php if($row['status'] == 1){ echo' class="done"'; } ?>>
						<span class="handle"></span> 
						<input type="checkbox" class="taskstat" taskid="<?php echo $row['id']; ?>" <?php if($row['status'] == 1){ echo'checked'; } ?>>
						<span class="text"><?php  echo $row['task']; ?></span>
						<small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $core->lasttimeword($row['timestamp']); ?></small>
						<div class="tools">
							<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/home?deltask=<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i></a>
						</div>
					</li>
				<?php
					}
				?>
				</ul>
			</form>
			</div>
			<div class="box-footer clearfix no-border">
				<button class="btn btn-default pull-right" data-toggle="modal" data-target="#todo-modal"><i class="fa fa-plus"></i> Stunden erfassen</button>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="box box-primary">
			<div class="box-header">
				<i class="fa fa-bar-chart-o"></i>
				<h3 class="box-title">All-in-One Statistik</h3>
			</div>
			<div class="box-body">
				<div id="line-allinone" style="height: 300px;"></div>
			</div>
		</div>
		
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-comments-o"></i> Wichtige Anmerkungen</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<?php if(!empty($msg_chat)){ echo $msg_chat; } ?>
			<div id="chat_error"></div>
            <div class="box-body chat" id="chat-box">
				<?php
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
            </div>
			<div class="box-footer">
				<div class="input-group">
					<input class="form-control" id="add_chat_text" placeholder="Gebe hier deine Nachricht ein..."/>
					<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
					<div class="input-group-btn">
						<button class="btn btn-success" id="add_chat"><i class="fa fa-plus"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal Add Task -->
	<div class="modal fade" id="todo-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="ion ion-clipboard"></i> Stundenerfassung</h4>
				</div>
				<form action="#" method="post">
					<div class="modal-body">
						<?php if(!empty($msg_task)){ echo $msg_task; } ?>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Mitarbeiter</span>
								<select name="taskuser" class="form-control">
								<option value="<?php echo $user->UserData('id'); ?>"><?php echo $user->UserData('username'); ?></option>
						<?php
								$userlist = dbSelect('*', 'users', "WHERE rank >= '" . $_CONFIG['housekeeping']['right']['dashboard'] . "' AND id != '".$user->UserData('id')."' ORDER BY rank DESC");
								while ($row = $userlist->fetch_array()) {
						?>
								<option value="<?php echo $row['id']; ?>" <?php if($row['rank'] > $user->UserData('rank')){ echo'DISABLED'; }?>><?php echo $row['username']; ?></option>
						<?php
								}
						?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Aufgabe/ Dauer</span>
								<input type="text" name="tasktext" class="form-control" value="<?php echo $tasktext; ?>Aufgabe:               | Dauer:">
								<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
							</div>
						</div>
					</div>
					<div class="modal-footer clearfix">

						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Abbrechen</button>

						<button type="submit" name="add_task" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Erfassen</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	
<?php require ('./footer.php'); ?>

