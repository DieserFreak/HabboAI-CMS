<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_community ->

<link type="text/css" rel="stylesheet" href="/lib/punch/css/team/style.css">

<div id="content">
<div id="right-column" style="margin-top: 70px;">
	<div id="right-column" style="float: right;width: 49%;">
		<h1 style="border: none;display: table-cell;border-color: #3F3F3F;vertical-align: middle;overflow: overlay;width: 47.5%;background-color: #20B2AA;border-bottom: 2px solid #248680;margin: 10px;padding: 10px;color: white;font-weight: 500;height: 15px;line-height: 11px;text-align: center;font-size: 14px;letter-spacing: 0.5px;position: absolute;margin-left: 0px;margin-top: 12px;">Badge erstellen</h1>
			<div class="infobox">
				<div id="infobox_content">
				<img src="http://www.Hobba.st/swf/c_images/album1584/HM.gif" align="right">
			Die Administratoren, auch unter dem Namen als &bdquo;Site Producer&rdquo; bekannt, sind f&uuml;r den Inhalt im Hobba zust&auml;ndig. Sie befassen sich mit der Technik und entwickeln die sogenannten &bdquo;Addons&rdquo; f&uuml;r das Hotel. Jeder Admin hat seine eigenen Aufgaben. So ist das Marketing- und Advertisingmanagement auch den Hotelmanagern als Hauptaufgabe zugeordnet.	</div>
	
	</div>
	
	<div class="teamheader" id="cm">Community-/Eventmanagement</div>
			<div class="infobox">
				<div id="infobox_content">
				<img src="http://www.Hobba.st/swf/c_images/album1584/CM.gif" align="right">
			Zu den Aufgaben geh&ouml;ren die Organisation und Umsetzung der Events. In erster Linie ist das Communitymanagement f&uuml;r die W&uuml;nsche der User da. Desweiteren betreuen sie die GameX Mitarbeiter und die Experten.
	</div>
	</div>
	
	<div class="teamheader" id="mod">Moderation</div>
			<div class="infobox">
				<div id="infobox_content">
				<img src="http://www.Hobba.st/swf/c_images/album1584/MOD.gif" align="right">
			Die Moderatoren beantworten alle eingehenden Hilferufe und helfen nebenbei den Hobbas bei ihren Sorgen oder auch Problemen.
	</div>
	</div>
	</div>
	
	</div>
<div class="grid_6" style="float: left;margin-left: -1px;">
	<div id="left-column" style="width: 102%;">
		<h1 style="border: none;display: table-cell;border-color: #3F3F3F;vertical-align: middle;overflow: overlay;width: 47.5%;background-color: #20B2AA;border-bottom: 2px solid #248680;margin: 10px;padding: 10px;color: white;font-weight: 500;height: 15px;line-height: 11px;text-align: center;font-size: 14px;letter-spacing: 0.5px;position: absolute;margin-left: 0px;margin-top: 12px;">Badge erstellen</h1>
		<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 10 ->
		<div class="Hobbateam">
		<div class="staffavatar" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1; margin-top: -7px;"<!- ELSE ->style="opacity:0.5; margin-top: -8px;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&action=wlk&gesture=<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->" style="margin-top:-5px;margin-left:5px;"></div>
		
		<div class="staffinfo">
			<div id="staffitem"> <b>Username: </b>{userstaff.USERNAME}</b></div>
			<div id="staffitem"> <b>Aufgabe: </b>{userstaff.USERWORKING}</b></div>
			<div id="staffitem"> <b>Letzter Login: </b><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></b></div>
			
		</div>
		</div>
				<!- ENDIF ->
		<!- END userstaff ->
		
		
		<!- BEGIN userstaff ->
			<!- IF userstaff.USERNAME == 'Punch' ->
		<div class="Hobbateam">
		<div class="staffavatar" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1;margin-top: -8px;"<!- ELSE ->style="opacity:0.5; margin-top: -8px;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&action=wlk&gesture<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->" style="margin-top:-5px;margin-left:5px;"></div>
		
		<div class="staffinfo">
			<div id="staffitem"> <b>Username: </b>{userstaff.USERNAME}</b></div>
			<div id="staffitem"> <b>Aufgabe: </b>{userstaff.USERWORKING}</b></div>
			<div id="staffitem"> <b>Letzter Login: </b><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></b></div>
			
		</div>
		</div>
				<!- ENDIF ->
		<!- END userstaff ->
		
		
		
		<div class="teamheader" id="cm">Hobba Community-/Eventmanagement</div>
		<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 7 ->
		<div class="Hobbateam">
		<div class="staffavatar" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1;margin-top: -8px;"<!- ELSE ->style="opacity:0.5; margin-top: -8px;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&action=wlk&gesture=<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->" style="margin-top:-5px;margin-left:5px;"></div>
		
		<div class="staffinfo">
			<div id="staffitem"> <b>Username: </b>{userstaff.USERNAME}</b></div>
			<div id="staffitem"> <b>Aufgabe: </b>{userstaff.USERWORKING}</b></div>
			<div id="staffitem"> <b>Letzter Login: </b><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></b></div>
			
		</div>
		</div>
				<!- ENDIF ->
		<!- END userstaff ->
		
		<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 8 ->
		<div class="Hobbateam">
		<div class="staffavatar" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1;margin-top: -8px;"<!- ELSE ->style="opacity:0.5; margin-top: -8px;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&action=wlk&gesture=<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->" style="margin-top:-5px;margin-left:5px;"></div>
		
		<div class="staffinfo">
			<div id="staffitem"> <b>Username: </b>{userstaff.USERNAME}</b></div>
			<div id="staffitem"> <b>Aufgabe: </b>{userstaff.USERWORKING}</b></div>
			<div id="staffitem"> <b>Letzter Login: </b><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></b></div>
			
		</div>
		</div>
				<!- ENDIF ->
		<!- END userstaff ->
		
		<div class="teamheader" id="mod">Hobba Moderation</div>
		<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 6 ->
		<div class="Hobbateam">
		<div class="staffavatar" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1;margin-top: -8px;"<!- ELSE ->style="opacity:0.5; margin-top: -8px;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&action=wlk&gesture=<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->" style="margin-top:-5px;margin-left:5px;"></div>
		
		<div class="staffinfo">
			<div id="staffitem"> <b>Username: </b>{userstaff.USERNAME}</b></div>
			<div id="staffitem"> <b>Aufgabe: </b>{userstaff.USERWORKING}</b></div>
			<div id="staffitem"> <b>Letzter Login: </b><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></b></div>
			
		</div>
		</div>
				<!- ENDIF ->
		<!- END userstaff ->
		
		
		</div>

	</div>


	</div>

<!- INCLUDE Standard/footer ->