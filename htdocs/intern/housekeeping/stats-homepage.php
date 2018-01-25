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

$active = 'stats-homepage';
$headtitle = 'Statistik - Homepage';
$toptitle = 'Statistik <small>Homepage</small>';
$title = 'Statistik </li><li class="active">Homepage</li>';
require ('./header.php');
?>
<div class="row" id="connectedSortable">
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Housekeepinglogs</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-hklogs" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">News</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-news" style="height: 300px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Support</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body chart-responsive">
				<div class="chart" id="line-support" style="height: 300px;"></div>
			</div>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>