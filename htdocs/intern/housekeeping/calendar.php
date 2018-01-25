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

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['dashboard.calendar']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'dashboard-calendar';
$headtitle = 'Kalender';
$toptitle = 'Housekeeping <small>Kalender</small>';
$title = 'Housekeeping </li><li class="active">Kalender</li>';
require ('./header.php');
?>
<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title">Informationen</h4>
			</div>
			<div class="box-body">
				<p align="justify">Hier findest du den Kalender für das Team. Der Kalender vereinfacht uns die Informationen wie z.B. Teambesprechungen, Urlauben, besondere Veranstaltungen, etc.</p>
				<hr />
				<p align="justify">Ganz unten kannst du die Notiz(en) hinzufügen. Wenn du ein Notiz hinzugefügt hast, dann erscheint es bei der Box "ziehbare Notiz". Dort musst du die hinzugefügte 
				Notiz(en) rechts auf dem Kalender drüber ziehen. Bitte die Farbe beachten!</p>
				<hr />
				<p align="justify">Auf dem Kalender kannst du deine Notizen verlängern bzw. die Zeitabstand größern machen oder auf ein anderer Termin verschieben. Alles geht über Drag & Drop!
				Du kannst nur deine eigene Notizen ändern und löschen. Die fremde Notizen brauchst du dafür eine Berechtigung.</p>
				<hr />
				<b>Farbbedeutungen:</b><br />
				<b class="text-green" href="#"><i class="fa fa-square"></i> Grün</b> &#8658; besondere Veranstaltung<br />
				<b class="text-blue" href="#"><i class="fa fa-square"></i> Blau</b> &#8658; Urlaub, Inaktivität, Abwesend<br />
				<b class="text-navy" href="#"><i class="fa fa-square"></i> Dunkelblau</b> &#8658; <br />
				<b class="text-yellow" href="#"><i class="fa fa-square"></i> Gelb</b> &#8658; <br />
				<b class="text-orange" href="#"><i class="fa fa-square"></i> Orange</b> &#8658; <br />
				<b class="text-aqua" href="#"><i class="fa fa-square"></i> Aqua</b> &#8658; <br />
				<b class="text-red" href="#"><i class="fa fa-square"></i> Rot</b> &#8658; wichtige Termin, Treffen, etc.<br />
				<b class="text-fuchsia" href="#"><i class="fa fa-square"></i> Pink</b> &#8658; <br />
				<b class="text-purple" href="#"><i class="fa fa-square"></i> Lila</b> &#8658; DJ Sendeplan
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title">ziehbare Notiz(en)</h4>
			</div>
			<div class="box-body">
				<div id='external-events'>                                        
					
				</div>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Notiz hinzufügen</h3>
			</div>
			<div class="box-body">
				<div class="btn-group" style="width: 100%; margin-bottom: 10px;">
					<button type="button" id="color-chooser-btn" class="btn btn-danger btn-block btn-sm dropdown-toggle" data-toggle="dropdown">Farbe <span class="caret"></span></button>
					<ul class="dropdown-menu" id="color-chooser">
						<li><a class="text-green" href="#"><i class="fa fa-square"></i> Grün</a></li>
						<li><a class="text-blue" href="#"><i class="fa fa-square"></i> Blau</a></li>                                            
						<li><a class="text-navy" href="#"><i class="fa fa-square"></i> Dunkelblau</a></li>                                            
						<li><a class="text-yellow" href="#"><i class="fa fa-square"></i> Gelb</a></li>
						<li><a class="text-orange" href="#"><i class="fa fa-square"></i> Orange</a></li>
						<li><a class="text-aqua" href="#"><i class="fa fa-square"></i> Aqua</a></li>
						<li><a class="text-red" href="#"><i class="fa fa-square"></i> Rot</a></li>
						<li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i> Pink</a></li>
						<li><a class="text-purple" href="#"><i class="fa fa-square"></i> Lila</a></li>
					</ul>
				</div>
				<div class="input-group">                                          
					<input id="new-event" type="text" class="form-control" placeholder="Titel">
					<input id="new-event-desc" type="text" class="form-control" placeholder="Beschreibung">
					<div class="input-group-btn">
						<button id="add-new-event" type="button" class="btn btn-default btn-flat" style="height:68px;">Hinzufügen</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="box box-primary">                                
			<div class="box-body no-padding">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	function ini_events(ele) {
		ele.each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()), // use the element's text as the event title
				description: $.trim($(this).attr("description")) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 1070,
				revert: true, // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});
	}
	ini_events($('#external-events div.fc-event'));
	/*-----------------------------------------------------------------*/
	var date = new Date();
	var d = date.getDate();
	var	m = date.getMonth();
	var	y = date.getFullYear();
	$('#calendar').fullCalendar({
		editable: true,
		events: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/calendar_notes.php",
		eventRender: function(event, element, view) {
			if (event.allDay === 'true') {
				event.allDay = true;
			} else {
				event.allDay = false;
			}
			element.attr('title', event.description);
			element.qtip({
				content: {
					title: event.title + ' <small>von ' + event.owner + '</small>'
				},
				position: {
					my: 'bottom center',
					at: 'top center'
				},
				style: {classes: 'qtip-bootstrap'},
			});
		},
		eventDrop: function(event, delta) {
			var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
			var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
			$.ajax({
				url: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/calendar_update_notes.php",
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
				url: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/calendar_update_notes.php",
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
					url: "<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/calendar_delete_notes.php",
					data: "&id=" + event.id,
					success: function(json) {
						$('#calendar').fullCalendar('removeEvents', event.id);
						alert("Erfolgreich geloescht!");
					}
				});
			}
		},
		
		droppable: true,
		drop: function(date, allDay) {
			var originalEventObject = $(this).data('eventObject');
			var copiedEventObject = $.extend({}, originalEventObject);

			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			copiedEventObject.backgroundColor = $(this).css("background-color");
			copiedEventObject.borderColor = $(this).css("border-color");

			var start = $.fullCalendar.formatDate(copiedEventObject.start, "yyyy-MM-dd HH:mm:ss");
			var end = $.fullCalendar.formatDate(copiedEventObject.end, "yyyy-MM-dd HH:mm:ss");
			
			$.ajax({
				url: '<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/ajax/calendar_add_notes.php',
				data: 'title='+ copiedEventObject.title +'&description='+ copiedEventObject.description +'&start='+ start +'&end='+ end +'&allDay='+ copiedEventObject.allDay +'&backgroundColor='+ copiedEventObject.backgroundColor +'&borderColor='+ copiedEventObject.backgroundColor,
				type: "POST",
				success: function(json) {
					//alert('Erfolgreich eingefuegt!');
				}
			});
			
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			$(this).remove();
		}
	});
	/* ADDING EVENTS */
	var currColor = "#f56954";
	var colorChooser = $("#color-chooser-btn");
	$("#color-chooser > li > a").click(function(e) {
		e.preventDefault();
		currColor = $(this).css("color");
		colorChooser
				.css({"background-color": currColor, "border-color": currColor})
				.html($(this).text()+' <span class="caret"></span>');
	});
	$("#add-new-event").click(function(e) {
		e.preventDefault();
		var val = $("#new-event").val();
		var val2 = $("#new-event-desc").val();
		if (val.length == 0 || val2.length == 0) {
			return;
		}

		//Create event
		var event = $("<div />");
		event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
		event.attr("description", val2);
		event.html(val);
		$('#external-events').prepend(event);

		//Add draggable funtionality
		ini_events(event);

		$("#new-event").val("");
		$("#new-event-desc").val("");
	});
});
</script>
<?php require ('./footer.php'); ?>