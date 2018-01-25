<!DOCTYPE html>
<html>
<head>
<style>@import url(//fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic|Ubuntu+Condensed);</style>
	<meta charset="UTF-8">
	<title><?php echo $_CONFIG['housekeeping']['name']; ?> - <?php echo $headtitle; ?></title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/AdminLTE/app.js" type="text/javascript"></script>
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
	<?php if(strpos($active, 'stats-') !== false || $active == 'dashboard-home' || $active == 'user-info') { ?>
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/morris/morris.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/raphael-min.js" type="text/javascript"></script>
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/morris/morris.min.js" type="text/javascript"></script>
	<?php } ?>
	<?php if(strpos($active, 'homepage-') !== false || strpos($active, 'logs-') !== false || $active == 'user-list' || $active == 'user-clon' || $active == 'user-clonspec'  || $active == 'user-info' || strpos($active, 'client-') !== false || strpos($active, 'news-') !== false) { ?>
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<?php } ?>
	<?php if(strpos($active, 'news-') !== false) { ?>
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
	<?php } ?>
	<?php if($active == 'events' || $active == 'dashboard-calendar') { ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/qtip/jquery.qtip.css" />
	<script type="text/javascript" src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/qtip/jquery.qtip.js"></script>
	<link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
	<script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>
	<?php } ?>
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="skin-black fixed">
<header class="header">
	<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>" class="logo">Habbo ACP</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-warning"></i>
						<!--<span class="label label-warning">4</span>-->
					</a>
					<ul class="dropdown-menu">
						<li class="header">Du hast neue Benachrichtigungen</li>
						<li>
							<ul class="menu">
								<li>
									<a href="#">
										<i class="ion ion-ios7-people info"></i> <?php echo dbSelectNumRows('*', 'cms_login_logs', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m')."' GROUP BY user_id"); ?> User haben heute eingeloggt
									</a>
								</li>
								<?php if(dbSelectNumRows('*', 'cms_support', "WHERE edit_by = '0'") > 0) { ?>
								<li>
									<a href="#">
										<i class="fa fa-warning danger"></i> Neue Supportticket(s)!
									</a>
								</li>
								<?php } ?>
								<li>
									<a href="#">
										<i class="fa fa-users warning"></i> <?php $iStart = strtotime('-0 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60; for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) { echo dbSelectNumRows('*', 'users', "WHERE FROM_UNIXTIME(account_created, '%d.%m') = '".date('d.m', $i)."'"); } ?> neue User!
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ion ion-ios7-cart success"></i> <?php echo dbSelectNumRows('*', 'cms_shop_purchase', "WHERE status = '0'");?> unbearbeitete Bestellungen
									</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="#">Alle Benachrichtigungen ansehen</a></li>
					</ul>
				</li>
				<li class="dropdown tasks-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="label label-danger"><?php echo dbSelectNumRows('*', 'cms_hk_tasks', "WHERE status = '0' AND user_id = '".$user->UserData('id')."'"); ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">Du hast <?php echo dbSelectNumRows('*', 'cms_hk_tasks', "WHERE status = '0' AND user_id = '".$user->UserData('id')."'"); ?> Aufgabe(n)</li>
						<li>
							<ul class="menu">
								<?php
										$usertasksrows = dbSelectNumRows('*', 'cms_hk_tasks', "WHERE status = '0' AND user_id = '".$user->UserData('id')."' ORDER BY id DESC");
										if($usertasksrows < 1){
											echo '<li><a href="#"><h3>Hurra - Du hast keine Aufgabe!</h3></a></li>';
										}
								
										$usertasks = dbSelect('*', 'cms_hk_tasks', "WHERE status = '0' AND user_id = '".$user->UserData('id')."' ORDER BY id DESC");
										while ($row = $usertasks->fetch_array()) {
								?>							
									<li>
										<a href="#">
											<h3>
												<?php echo $row['task']; ?>
												<small class="pull-right"><?php echo $row['process']; ?>%</small>
											</h3>
											<div class="progress xs">
												<div class="progress-bar progress-bar-aqua" style="width: <?php echo $row['process']; ?>%" role="progressbar" aria-valuenow="<?php echo $row['process']; ?>" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only"><?php echo $row['process']; ?>% erledigt!</span>
												</div>
											</div>
										</a>
									</li>
								<?php
										}
								?>
							</ul>
						</li>
						<li class="footer">
							<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/home#tasklist">Alle Aufgaben sehen</a>
						</li>
					</ul>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span><?php echo $user->UserData('username'); ?><i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header bg-light-blue">
							<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $user->UserData('look'); ?>&direction=3&head_direction=3&gesture=sml&action=stand" class="img-circle" alt="User Image" />
							<p>
								<?php echo $user->UserData('username'); ?> - <?php echo $user->UserData('working'); ?>
								<small>Mitglied seit <?php echo date("F Y",$user->UserData('account_created')); ?></small>
							</p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo $_CONFIG['website']['url'];?>/client" target="_blank" class="btn btn-default btn-flat">Client</a>
								<a href="<?php echo $_CONFIG['website']['url'];?>/me" target="_blank" class="btn btn-default btn-flat">Homepage</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo $_CONFIG['website']['url'];?>/logout" class="btn btn-default btn-flat">Ausloggen</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
	<aside class="left-side sidebar-offcanvas">                
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left" style="background: #fff;padding: 10px;-webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;overflow: hidden;width: 70px;height: 70px;">
					<img style="margin-left:-7px;margin-top:-7px;" src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $user->UserData('look'); ?>&direction=3&head_direction=3&gesture=sml&action=stand">
				</div>
				<div class="pull-left info">
					<p><div style="font-family: Ubuntu Condensed;"><?php echo $user->UserData('username'); ?></div></p>

					<a href="#"><?php if($user->UserData('online') == 1){ ?><b style="font-family: Ubuntu Condensed; color: green; font-size: 13px;"> Online <img src="/lib/Standard/img/online.gif"></b><?php } else { ?><b style="font-family: Ubuntu Condensed; color: red; font-size: 13px;"> Offline <img src="/lib/Standard/img/offline.gif"><?php } ?></b></a>
				</div>
			</div>
			<form action="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/info/0" method="post" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="usersearch" id="username_ac" class="form-control" placeholder="User ..."/>
					<span class="input-group-btn">
						<button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			<ul class="sidebar-menu">
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['dashboard']) { ?>
				<li class="treeview<?php if(strpos($active, 'dashboard-') !== false){ echo ' active'; } ?>">
					<a href="#">
						<i class="fa fa-dashboard"></i>
						<span>Dashboard</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['dashboard']) { ?><li <?php if($active == 'dashboard-home'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/home"><i class="fa fa-angle-double-right"></i> Startseite</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['dashboard.calendar']) { ?><li <?php if($active == 'dashboard-calendar'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/calendar"><i class="fa fa-angle-double-right"></i> Kalender</a></li><?php } ?>
					</ul>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['rules']) { ?>
				<li <?php if($active == 'rules'){ echo 'class="active"'; } ?>>
					<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/neuebadges">
						<i class="fa fa-bullhorn"></i> <span>Die neusten Badges</span> <small class="badge pull-right bg-green">NEU</small>
					</a>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['timeline']) { ?>
				<!--<li <?php if($active == 'timeline'){ echo 'class="active"'; } ?>>
					<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/timeline">
						<i class="fa fa-arrows-v"></i> <span>Timeline (!)</span> <small class="badge pull-right bg-green">Neu</small>
					</a>
				</li>-->
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['commands']) { ?>
				<li <?php if($active == 'commands'){ echo 'class="active"'; } ?>>
					<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/commands">
						<i class="fa fa-stack-exchange"></i> <span>Commandliste</span>
					</a>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['events']) { ?>
				<li <?php if($active == 'events'){ echo 'class="active"'; } ?>>
					<a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/events">
						<i class="fa fa-trophy"></i> <span>Eventkalender</span>
					</a>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['statistik']) { ?>
				<li class="treeview<?php if(strpos($active, 'stats-') !== false){ echo ' active'; } ?>">
					<a href="#">
						<i class="fa fa-bar-chart-o"></i>
						<span>Statistik</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li <?php if($active == 'stats-homepage'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/homepage"><i class="fa fa-angle-double-right"></i> Homepage</a></li>
						<li <?php if($active == 'stats-client'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/client"><i class="fa fa-angle-double-right"></i> Client</a></li>
						<li <?php if($active == 'stats-user'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/statistik/user"><i class="fa fa-angle-double-right"></i> User</a></li>
					</ul>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage']) { ?>
				<li class="treeview<?php if(strpos($active, 'homepage-') !== false){ echo ' active'; } ?>">
					<a href="#">
						<i class="fa fa-edit"></i> <span>Homepageverwaltung</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage.support']) { ?><li <?php if($active == 'homepage-support'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/support"><i class="fa fa-angle-double-right"></i> Support</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage.lotto']) { ?><li <?php if($active == 'homepage-lotto'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/lotto"><i class="fa fa-angle-double-right"></i> Lotto (!)</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage.badgeshop']) { ?><li <?php if($active == 'homepage-badgeshop'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/badgeshop"><i class="fa fa-angle-double-right"></i> Badgeshop</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage.shop']) { ?>
						<li class="treeview<?php if($active == 'homepage-shop' || $active == 'homepage-shoppurchase'){ echo ' active'; } ?>">
							<a href="#">
								<i class="fa fa-calendar-o"></i> Shopverwaltung
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage.shop']) { ?><li <?php if($active == 'homepage-shop'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/shop/edit"><i class="fa fa-angle-double-right"></i> Bearbeitung</a></li><?php } ?>
								<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['homepage.shoppurchase']) { ?><li <?php if($active == 'homepage-shoppurchase'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/homepage/shop/purchase"><i class="fa fa-angle-double-right"></i> Bestellungen</a></li><?php } ?>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['news']) { ?>
				<li class="treeview<?php if(strpos($active, 'news-') !== false){ echo ' active'; } ?>">
					<a href="#">
						<i class="fa fa-bullhorn"></i> <span>Newsverwaltung</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['news']) { ?><li <?php if($active == 'news-home'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news"><i class="fa fa-angle-double-right"></i> News</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['news.survey']) { ?><li <?php if($active == 'news-survey'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/news/survey"><i class="fa fa-angle-double-right"></i> Umfrage</a></li><?php } ?>
					</ul>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client']) { ?>
				<li class="treeview<?php if(strpos($active, 'client-') !== false){ echo ' active'; } ?>">
					<a href="#">
						<i class="fa fa-asterisk"></i> <span>Clientverwaltung</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.config']) { ?><li <?php if($active == 'client-config'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/config"><i class="fa fa-angle-double-right"></i> Config</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.rooms']) { ?><li <?php if($active == 'client-rooms'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/rooms"><i class="fa fa-angle-double-right"></i> Räume</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.furni']) { ?><li <?php if($active == 'client-furni'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/furni"><i class="fa fa-angle-double-right"></i> Möbel Häufigkeit</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.code']) { ?><li <?php if($active == 'client-code'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/code"><i class="fa fa-angle-double-right"></i> Vouchercode</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.survey']) { ?><li <?php if($active == 'client-survey'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>#"><i class="fa fa-angle-double-right"></i> Umfrage</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.badges']) { ?><li <?php if($active == 'client-badges'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/badges"><i class="fa fa-angle-double-right"></i> Badgebeschriftung</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.filter']) { ?><li <?php if($active == 'client-filter'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/wordfilter"><i class="fa fa-angle-double-right"></i> Wordfilter</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.emutask']) { ?><li <?php if($active == 'client-emutask'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/client/emutask"><i class="fa fa-angle-double-right"></i> Emulator Befehle</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['client.autorare']) { ?><li <?php if($active == 'client-autorare'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/badgecreator.php"><i class="fa fa-angle-double-right"></i> Badgecreator</a></li><?php } ?>
					</ul>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user']) { ?>
				<li class="treeview<?php if(strpos($active, 'user-') !== false){ echo ' active'; } ?>">
					<a href="#">
						<i class="fa fa-users"></i> <span>Userverwaltung</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.list']) { ?><li <?php if($active == 'user-list'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/liste"><i class="fa fa-angle-double-right"></i> Liste</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.ban']) { ?><li <?php if($active == 'user-ban'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/ban"><i class="fa fa-angle-double-right"></i> (Ent)bannen</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.clon']) { ?><li <?php if($active == 'user-clon'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/clon"><i class="fa fa-angle-double-right"></i> Klon Check</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.clon']) { ?><li <?php if($active == 'user-clonspec'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/clonspec"><i class="fa fa-angle-double-right"></i> Klonverdacht</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.badgetool']) { ?><li <?php if($active == 'user-badgetool'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/badgetool"><i class="fa fa-angle-double-right"></i> Badgetool</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.mass']) { ?><li <?php if($active == 'user-mass'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/mass"><i class="fa fa-angle-double-right"></i> Massensenden</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.currency']) { ?><li <?php if($active == 'user-currency'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/currency"><i class="fa fa-angle-double-right"></i> Währung senden</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.vip']) { ?><li <?php if($active == 'user-vip'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/vip"><i class="fa fa-angle-double-right"></i> VIP</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.change.name']) { ?><li <?php if($active == 'user-changename'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/change/name"><i class="fa fa-angle-double-right"></i> Name ändern</a></li><?php } ?>                             
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['user.change.password']) { ?><li <?php if($active == 'user-changepassword'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/user/change/password"><i class="fa fa-angle-double-right"></i> Passwort ändern</a></li><?php } ?>
					</ul>
				</li>
				<?php } ?>
				<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['logs']) { ?>
				<li class="treeview<?php if(strpos($active, 'logs-') !== false){ echo ' active'; } ?>">
					<a href="#">
						<i class="fa fa-share-square"></i> <span>Logs</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['logs.login']) { ?><li <?php if($active == 'logs-login'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/login"><i class="fa fa-angle-double-right"></i> Login</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['logs.ban']) { ?><li <?php if($active == 'logs-ban'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/ban"><i class="fa fa-angle-double-right"></i> Bann</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['logs.chat']) { ?><li <?php if($active == 'logs-chat'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/chat"><i class="fa fa-angle-double-right"></i> Chat</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['logs.commands']) { ?><li <?php if($active == 'logs-cmd'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/commands"><i class="fa fa-angle-double-right"></i> Command</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['logs.rooms']) { ?><li <?php if($active == 'logs-room'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/rooms"><i class="fa fa-angle-double-right"></i> Raum</a></li><?php } ?>
						<?php if($user->UserData('rank') >= $_CONFIG['housekeeping']['right']['logs.housekeeping']) { ?><li <?php if($active == 'logs-hk'){ echo 'class="active"'; } ?>><a href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/logs/housekeeping"><i class="fa fa-angle-double-right"></i> Housekeeping</a></li>  <?php } ?>                              
					</ul>
				</li>
				<?php } ?>
			</ul>
		</section>
	</aside>
	
	<aside class="right-side">                
		<section class="content-header">
			<h1><?php echo $toptitle; ?></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Housekeeping</a></li><li class="active"><?php echo $title; ?></li></li>
			</ol>
		</section>
		<section class="content">