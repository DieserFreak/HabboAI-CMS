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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['statistik']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'stats-user';
$headtitle = 'Statistik - User';
$toptitle = 'Statistik <small>User</small>';
$title = 'Statistik </li><li class="active">User</li>';
require ('./header.php');
?>
<div class="row" id="connectedSortable">
	<div class="col-md-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Online</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-useronline" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Login</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-login" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Registrierung</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-register" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">VIP</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="pie-vip" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Rank</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="bar-rank" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Bans</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-banlogs" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Geschlecht</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="pie-gender" style="height: 300px;"></div>
			</div>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>