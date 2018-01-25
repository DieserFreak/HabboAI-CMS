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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['events']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'events';
$headtitle = 'Eventkalender';
$toptitle = 'Housekeeping <small>Eventkalender</small>';
$title = 'Housekeeping </li><li class="active">Eventkalender</li>';
require ('./header.php');
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">                                
			<div class="box-body no-padding">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	var date = new Date();
	var d = date.getDate();
	var	m = date.getMonth();
	var	y = date.getFullYear();
	var hour = date.getHours();
	var min  = date.getMinutes();
	var sec  = date.getSeconds();
	$('#calendar').fullCalendar({
		defaultView: 'agendaWeek',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'agendaWeek,agendaDay'
		},
		allDay: false,
		allDayText: '',
		editable: true,
		droppable: true,
		events: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/eventcalendar_events.php",

		eventRender: function(event, element, view) {
			if (event.allDay === 'true') {
				event.allDay = true;
			} else {
				event.allDay = false;
			}
			element.attr('title', event.description);
			element.qtip({
				content: {
					title: event.title
				},
				position: {
					my: 'bottom center',
					at: 'top center'
				},
				style: {classes: 'qtip-bootstrap'}
			});
		},
		selectable: true,
		selectHelper: true,

		select: function(start, end, allDay) {
			var title = prompt('Eventtitel:');
			var description = prompt('Beschreibung:');
			if (title && description) {
				var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
				var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
				$.ajax({
					url: '<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/eventcalendar_add_events.php',
					data: 'title='+ title +'&description='+ description +'&start='+ start +'&end='+ end,
					type: "POST",
					success: function(json) {
						alert('Erfolgreich eingefuegt!');
						window.location.reload();
					}
				});
				calendar.fullCalendar('renderEvent',{title: title, start: start, end: end, allDay: allDay}, true);
			}
			calendar.fullCalendar('unselect');
		},
		editable: true,
		eventDrop: function(event, delta) {
			var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
			var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
			$.ajax({
				url: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/eventcalendar_update_events.php",
				data: "title="+ event.title +"&start="+ start +"&end="+ end +"&allDay="+ event.allDay +"&id="+ event.id,
				type: "POST",
				success: function(json) {
					//alert("Erfolgreich geaendert!");
				}
			});
		},
		eventResize: function(event) {
			var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
			var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
			$.ajax({
				url: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/eventcalendar_update_events.php",
				data: "title="+ event.title+"&start="+ start +"&end="+ end +"&allDay="+ event.allDay +"&id="+ event.id,
				type: "POST",
				success: function(json) {
					//alert("Erfolgreich geaendert!");
				}
			});
		},
		eventClick: function(event) {
			var decision = confirm("Willst du das Event löschen?");
			if (decision) {
				$.ajax({
					type: "POST",
					url: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/eventcalendar_delete_events.php",
					data: "&id=" + event.id,
					success: function(json) {
						$('#calendar').fullCalendar('removeEvents', event.id);
						alert("Erfolgreich geloescht!");
					}
				});
			}
		}
	});
});
</script>
<?php require ('./footer.php'); ?>