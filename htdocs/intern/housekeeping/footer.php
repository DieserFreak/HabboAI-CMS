		</section>
	</aside>
</div>
<script type="text/javascript">
	$(function() {
		$('#username_ac').autocomplete({
			source: function( request, response ) {
				$.ajax({
					url : '<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/user_autocomplete.php',
					dataType: "json",
					data: {
					   name_startsWith: request.term
					},
					 success: function( data ) {
						 response( $.map( data, function( item ) {
							return {
								label: item,
								value: item
							}
						}));
					}
				});
			},
			autoFocus: true,
			minLength: 2,
			messages: {
				noResults: '',
				results: function() {}
			}
		});
	});
</script>
<?php if($active == 'dashboard-home'){ ?>
<script type="text/javascript">
	$(function() {
		var timeout = setInterval(reloadChat, 2000);    
		function reloadChat () {
			$('#chat-box').load('<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/dashboard_chatbox.php');
		}
		
		$("#add_chat").click(function(){
			var text=$("#add_chat_text").val();
		  $.ajax({
				type:"post",
				url:"<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/dashboard_chat_add.php",
				data:"text="+text,
				success:function(data){
					var check = data;
					var arr = check.split('#');
					if(arr[0] == 0){
						$("#chat_error").html('<div class="alert alert-danger alert-dismissable" style="margin-left:20px;margin-right:20px;"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error!</b><br />' + arr[1] + '</div>');
					} else {
						$("#chat_error").html('');
					}
				}
			 });
			$('#add_chat_text').val('');
		});
		$('#add_chat_text').keypress(function(e){
			if(e.which == 13){
            $('#add_chat').click();
			}
		});
		$('#chat-box').slimScroll({
			height: '450px'
		});
		
		$(".todo-list").todolist({
			onCheck: function(ele) {},
			onUncheck: function(ele) {}
		});		
			
		$("#date").inputmask("datetime");
		
		var line = new Morris.Line({
			element: 'line-allinone',
			resize: true,
			data: [
			<?php
				$iStart = strtotime('-6 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
					$registed = dbSelectNumRows('*', 'users', "WHERE FROM_UNIXTIME(account_created, '%d.%m') = '".date('d.m', $i)."'");
					$login = dbSelectNumRows('*', 'cms_login_logs', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."' GROUP BY user_id");
					$onlinedb = dbSelect('*', 'online_statistik', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."' ORDER BY useronline DESC LIMIT 1");
					$online = $onlinedb->fetch_assoc();
					if($onlinedb->num_rows <= 0){
						$onlineres = 0;
					} else {
						$onlineres = $online['useronline'];
					}
			?>
{y: '<?php echo date('Y-m-d', $i); ?>', logins: <?php echo $login; ?>, registed: <?php echo $registed; ?>, online: <?php echo $onlineres; ?>},
			<?php } ?>
			],
			xkey: ['y'],
			ykeys: ['logins', 'registed', 'online'],
			labels: ['Login', 'registrierte User', 'maximale Useronline'],
			lineColors: ['#3c8dbc', '#088A08', '#FE9A2E', '#FE642E'],
			hideHover: 'auto'
		});
		
		$( "#connectedSortable" ).sortable();
		$( "#connectedSortable" ).disableSelection();
		//$(".box-header, .nav-tabs").css("cursor","move");
	});
	$(document).ready(function(){
		$('input', ".todo-list").on('ifChecked', function(event) {
			var taskid = $(this).attr('taskid');
		  
			$.ajax({
					type:"post",
					url:"<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/dashboard_task_change.php",
					data: "check="+taskid,
			});
		});
		$('input', ".todo-list").on('ifUnchecked', function(event) {
			var taskid = $(this).attr('taskid');
		  
			$.ajax({
					type:"post",
					url:"<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/dashboard_task_change.php",
					data: "uncheck="+taskid,
			});
		});
		
		$(".usertasks").click(function(){
			var userid = $(this).attr('userid');
			$.ajax({
				type:"post",
				url:"<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/dashboard_task_box.php",
				data:"userid="+userid,
					success:function(data){
						$(".todo-list").html(data);
				}
			});
		});
	});
</script>
<?php } ?>
<?php if(strpos($active, 'news-') !== false){ ?>
<script type="text/javascript">
	$(function() {
		$('#newsrows').dataTable( {
			"aaSorting": [[0, 'desc']]
		} );
		$("#newsdate").inputmask("datetime");
		$("#newsdate2").inputmask("datetime");
		CKEDITOR.replace('newstext');
	});
</script>
<?php } ?>
<?php if(strpos($active, 'logs-') !== false){ ?>
<script type="text/javascript">
	$(function() {
		var oTable = $('#logs').dataTable( {
			"aaSorting": [[0, 'desc']],
			"iDisplayLength": 50
		} );
	});
</script>
<?php } ?>
<?php if(strpos($active, 'homepage-') !== false){ ?>
<script type="text/javascript">
	$(function() {
		$('#homepage').dataTable( {
			"aaSorting": [[0, 'desc']],
			"iDisplayLength": 50
		} );
		$("#badgetime-s").inputmask("datetime");
		$("#badgetime-e").inputmask("datetime");
	});
</script>
<?php } ?>
<?php if(strpos($active, 'user-') !== false){ ?>
<script type="text/javascript">
	$(function() {
		$('#userlist').dataTable( {
			"aaSorting": [[0, 'asc']],
			"iDisplayLength": 50
		} );
	<?php if($active == 'user-info'){ ?>	
		// Loginlogs
		var bar = new Morris.Line({
			element: 'userinfo-login',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM cms_login_logs WHERE user_id = '" . $udata['id'] . "' AND FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$logincount = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $logincount; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM cms_login_logs WHERE user_id = '" . $udata['id'] . "' GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// Chatlogs
		var bar = new Morris.Line({
			element: 'userinfo-chatlogs',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM chatlogs WHERE user_id = '" . $udata['id'] . "' AND FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$chatcount = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $chatcount; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM chatlogs WHERE user_id = '" . $udata['id'] . "' GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// MOD Tickets
		var bar = new Morris.Line({
			element: 'userinfo-modtickets',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM moderation_tickets WHERE sender_id = '" . $udata['id'] . "' AND FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$cmdlogs = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $cmdlogs; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM moderation_tickets WHERE sender_id = '" . $udata['id'] . "' GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
	<?php } ?>
	});
</script>
<?php } ?>
<?php if(strpos($active, 'client-') !== false){ ?>
<script type="text/javascript">
	$(function() {
		$('#client').dataTable( {
			"aaSorting": [[0, 'asc']]
		} );
	});
</script>
<?php } ?>
<?php if($active == 'stats-user'){ ?>
<script type="text/javascript">
	$(function() {
		// Onlinelogs
		var line = new Morris.Line({
			element: 'line-useronline',
			resize: true,
			data: [
			<?php
				// User Online bzw. geladene Räume
				$result = $mysqli->query("SELECT * FROM online_statistik");
				$rowscount = $result->num_rows;
				$rowscountmin = $rowscount - 500;
				
				$row = $mysqli->query("SELECT * FROM online_statistik ORDER BY timestamp ASC LIMIT ".$rowscountmin.", ".$rowscount);
				while($sql = $row->fetch_assoc()){
			?>
{y: '<?php echo date('Y-m-d H:i', $sql['timestamp']); ?>', online: <?php echo $sql['useronline']; ?>},
			<?php } ?>
			],
			xkey: ['y'],
			ykeys: ['online'],
			labels: ['Useronline'],
			lineColors: ['#3c8dbc', '#088A08', '#FE9A2E', '#FE642E'],
			hideHover: 'auto',
			goals: [<?php //$durchschnittdb = $mysqli->query("SELECT AVG(useronline) FROM online_statistik"); $durchschnitt = $durchschnittdb->fetch_assoc(); echo $durchschnitt['AVG(useronline)'];?>],
			goalLineColors: ['#FE2E2E'],
			pointSize: 0.01,
			smooth: true,
		});
		// Geschlecht
		var donut = new Morris.Donut({
			element: 'pie-gender',
			resize: true,
			colors: ["#3c8dbc", "#f56954"],
			data: [
				{label: "Männlich", value: <?php echo dbSelectNumRows('*', 'users', "WHERE gender = 'M'"); ?>},
				{label: "Weiblich", value: <?php echo dbSelectNumRows('*', 'users', "WHERE gender = 'F'"); ?>}
			],
			hideHover: 'auto'
		});	
		// Loginlogs
		var bar = new Morris.Line({
			element: 'line-login',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM cms_login_logs WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$logincount = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $logincount; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM cms_login_logs GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// Registrierung
		var line = new Morris.Line({
			element: 'line-register',
			resize: true,
			data: [
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
					$registed = dbSelectNumRows('*', 'users', "WHERE FROM_UNIXTIME(account_created, '%d.%m') = '".date('d.m', $i)."'");
			?>
{y: '<?php echo date('Y-m-d', $i); ?>', registed: <?php echo $registed; ?>},
			<?php } ?>
			],
			xkey: ['y'],
			ykeys: ['registed', ],
			labels: ['Registriert',],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM users GROUP BY FROM_UNIXTIME(account_created, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// Rank
		var bar = new Morris.Bar({
			element: 'bar-rank',
			resize: true,
			data: [
				{y: 'User', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '1'"); ?>},
				{y: 'VIP', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '2'"); ?>},
				{y: 'Sponsor', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '3'"); ?>},
				{y: 'eXperte', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '5'"); ?>},
				{y: 'MOD', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '6'"); ?>},
				{y: 'EM', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '7'"); ?>},
				{y: 'CM', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '8'"); ?>},
				{y: 'HM', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '9'"); ?>},
				{y: 'Entwickler', a: <?php echo dbSelectNumRows('*', 'users', "WHERE rank = '10'"); ?>}
			],
			barColors: ['#3c8dbc'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Rank'],
			hideHover: 'auto'
		});
		// VIP
		var donut = new Morris.Donut({
			element: 'pie-vip',
			resize: true,
			colors: ["#3c8dbc", "#f56954"],
			data: [
				{label: "User", value: <?php echo dbSelectNumRows('*', 'users', "WHERE vip = '0'"); ?>},
				{label: "VIP", value: <?php echo dbSelectNumRows('*', 'users', "WHERE vip = '1'"); ?>}
			],
			hideHover: 'auto'
		});	
		// Bannlogs
		var bar = new Morris.Line({
			element: 'line-banlogs',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result_user = $mysqli->query("SELECT * FROM bans WHERE added_date = '".date('l, F d, Y', $i)."' AND bantype = 'user'");
				$regicount_user = $result_user->num_rows;
				$result_ip = $mysqli->query("SELECT * FROM bans WHERE added_date = '".date('l, F d, Y', $i)."' AND bantype = 'ip'");
				$regicount_ip = $result_ip->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $regicount_user; ?>, b: <?php echo $regicount_ip; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB', '#f56954'],
			xkey: 'y',
			ykeys: ['a', 'b'],
			labels: ['User', 'IP'],
			hideHover: 'auto',
			dateFormat: function (x) { return new Date(x).toString(); },
		});
		
		$( "#connectedSortable" ).sortable();
		$( "#connectedSortable" ).disableSelection();
		$(".box-header, .nav-tabs").css("cursor","move");
	});
</script>
<?php } ?>
<?php if($active == 'stats-client'){ ?>
<script type="text/javascript">
	$(function() {
		// Chatlogs
		var bar = new Morris.Line({
			element: 'line-chatlogs',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM chatlogs WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$chatcount = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $chatcount; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM chatlogs GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// Räume
		var donut = new Morris.Donut({
			element: 'pie-room',
			resize: true,
			colors: ["#04B431", "#3c8dbc", "#f56954"],
			data: [
				{label: "Offen", value: <?php echo dbSelectNumRows('*', 'rooms', "WHERE state = 'open'"); ?>},
				{label: "Klingeln", value: <?php echo dbSelectNumRows('*', 'rooms', "WHERE state = 'locked'"); ?>},
				{label: "Passwort", value: <?php echo dbSelectNumRows('*', 'rooms', "WHERE state = 'password'"); ?>}
			],
			hideHover: 'auto'
		});	
		// Raumlogs
		var bar = new Morris.Line({
			element: 'line-roomvisit',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM user_roomvisits WHERE FROM_UNIXTIME(entry_timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$chatcount = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $chatcount; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM user_roomvisits GROUP BY FROM_UNIXTIME(entry_timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// Freunde
		var donut = new Morris.Donut({
			element: 'pie-friend',
			resize: true,
			colors: ["#3c8dbc", "#f56954"],
			data: [
				{label: "Freunde", value: <?php echo dbSelectNumRowsS('*', 'messenger_friendships'); ?>},
				{label: "Freundschaftsanfrage", value: <?php echo dbSelectNumRowsS('*', 'messenger_requests'); ?>},
			],
			hideHover: 'auto'
		});	
		// Wordfilter
		var donut = new Morris.Donut({
			element: 'pie-wordfilter',
			resize: true,
			colors: ["#3c8dbc", "#f56954"],
			data: [
				{label: "Normal", value: <?php echo dbSelectNumRows('*', 'wordfilter', "WHERE antiwerber = '0'"); ?>},
				{label: "Antiwerber", value: <?php echo dbSelectNumRows('*', 'wordfilter', "WHERE antiwerber = '1'"); ?>},
			],
			hideHover: 'auto'
		});	
		// Commandlogs
		var bar = new Morris.Line({
			element: 'line-cmdlogs',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM cmdlogs WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$cmdlogs = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $cmdlogs; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM cmdlogs GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// MOD Tickets
		var bar = new Morris.Line({
			element: 'line-mod',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM moderation_tickets WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$cmdlogs = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $cmdlogs; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM moderation_tickets GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// max. User
		var line = new Morris.Line({
			element: 'line-maxonline',
			resize: true,
			data: [
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
					$onlinedb = dbSelect('*', 'online_statistik', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."' ORDER BY useronline DESC LIMIT 1");
					$online = $onlinedb->fetch_assoc();
					if($onlinedb->num_rows <= 0){
						$onlineres = 0;
					} else {
						$onlineres = $online['useronline'];
					}
			?>
{y: '<?php echo date('Y-m-d', $i); ?>', online: <?php echo $onlineres; ?>},
			<?php } ?>
			],
			xkey: ['y'],
			ykeys: [ 'online'],
			labels: ['maximale Useronline'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		
		$( "#connectedSortable" ).sortable();
		$( "#connectedSortable" ).disableSelection();
		$(".box-header, .nav-tabs").css("cursor","move");
	});
</script>
<?php } ?>
<?php if($active == 'stats-homepage'){ ?>
<script type="text/javascript">
	$(function() {
		// Housekeepinglogs
		var bar = new Morris.Line({
			element: 'line-hklogs',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM cms_hk_logs WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m', $i)."'");
				$hklogs = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $hklogs; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto',
			goals: [<?php $resultdb = $mysqli->query("SELECT AVG(a.rcount) AS average FROM (SELECT COUNT(*) AS rcount FROM cms_hk_logs GROUP BY FROM_UNIXTIME(timestamp, '%d.%m.%Y')) a"); $result = $resultdb->fetch_assoc(); echo round($result['average']); ?>],
			goalLineColors: ['#FE2E2E'],
		});
		// News
		var bar = new Morris.Line({
			element: 'line-news',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM cms_news WHERE FROM_UNIXTIME(date, '%d.%m') = '".date('d.m', $i)."' AND date >= '".time()."'");
				$hklogs = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $hklogs; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto'
		});
		// Support
		var bar = new Morris.Line({
			element: 'line-support',
			resize: true,
			data: [		
			<?php
				$iStart = strtotime('-13 days'); $iEnd = time(); $iStepOneDay = 24 * 60 * 60;
				for ($i = $iStart; $i <= $iEnd; $i += $iStepOneDay) {
				$result = $mysqli->query("SELECT * FROM cms_support WHERE FROM_UNIXTIME(date, '%d.%m') = '".date('d.m', $i)."'");
				$hklogs = $result->num_rows;
			?>
				{y: '<?php echo date('Y-m-d', $i)?>', a: <?php echo $hklogs; ?>},
			<?php } ?>

			],
			barColors: ['#01A9DB'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Anzahl'],
			hideHover: 'auto'
		});
		
		$( "#connectedSortable" ).sortable();
		$( "#connectedSortable" ).disableSelection();
		$(".box-header, .nav-tabs").css("cursor","move");
	});
</script>
<?php } ?>
</body>
</html>