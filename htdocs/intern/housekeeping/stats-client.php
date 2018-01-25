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

$active = 'stats-client';
$headtitle = 'Statistik - Client';
$toptitle = 'Statistik <small>Client</small>';
$title = 'Statistik </li><li class="active">Client</li>';
require ('./header.php');
?>
<div class="row" id="connectedSortable">
	<div class="col-md-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">maximale Useronline</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-maxonline" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Chatlogs</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-chatlogs" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Räume</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="pie-room" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Freunde</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="pie-friend" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Raumbesucher</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-roomvisit" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Commandlogs</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-cmdlogs" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Wortfilter</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="pie-wordfilter" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">MOD Tickets</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-mod" style="height: 300px;"></div>
			</div>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>