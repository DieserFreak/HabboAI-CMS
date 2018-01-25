<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_community ->

<div id="main" class="container_12">

<div class="container_12 animated fadeInLeft">
	<div id="right-column">
	<div class="boxd" style="margin-top: 10px;">
				    <div class="title9">Magic WIRED: Bedingungen</div>
			<div class="box_new" style="width:480px;float:right;">
				<div class="boxdesc" id="table" style="width:91%;height:auto;margin:0;margin-left: 16px;">				
<img src="/lib/standard//img/teaser_Shakespeare_reading.png" align="right" style="margin-left: 10px;">
				<b>Hat der User Badge X?</b><br>
Mit dieser Bedingung kannst du entscheiden ob ein Effekt zugelassen wird wenn der User Badge X hat.<br>
<b>userhasbadge:<i>Badgecode</i></b>
<br><br>
<b>Hat der User nicht das Badge X?</b><br>
Mit dieser Bedingung kannst du entscheiden ob ein Effekt zugelassen wird wenn dem User Badge X fehlt.<br>
<b>userhasntbadge:<i>Badgecode</i></b>
<br><br>
<b>Hat der User Effekt X aktiviert?</b><br>
Mit dieser Bedingung kannst du entscheiden ob ein Effekt zugelassen wird wenn der User Effekt X aktiviert hat.<br>
<b>userhaseffect:<i>EnableID</i></b>
<br><br>
<b>Hat der User nicht Effekt X?</b><br>
Mit dieser Bedingung kannst du entscheiden ob ein Effekt zugelassen wird wenn der User nicht Effekt X aktiviert hat.<br>
<b>userhasnteffect:<i>EnableID</i></b>
<br><br>
<b>Hat der User Handitem X?</b><br>
Mit dieser Bedingung kannst du entscheiden ob ein Effekt zugelassen wird wenn der User Handitem X aktiviert hat.<br>
<b>carrying:<i>HanditemID</i></b>
<br><br>
<b>Hat der User nicht Handitem X?</b><br>
Mit dieser Bedingung kannst du entscheiden ob ein Effekt zugelassen wird wenn dem User Handitem X fehlt.<br>
<b>notcarrying:<i>HanditemID</i></b>
<br><br>


				</div>
				</div>
			</div>
			
		<div id="left-column">
			<div class="boxd" style="margin-top: -783px;float: right;">
				    <div class="title9">Informationen</div>
				<div class="boxdesc" id="table" style="width:91%;height:auto;margin:0;">
						<img src="/lib/standard//img/book.gif" style="float:left;margin:auto;margin-left:-15px;" />
						Du veranstaltest gerne Partys, Treffen & andere coole Dinge in deinem Raum?<br>
Mit dem Magic WIRED kannst du deinen Raum noch interessanter machen!<br>
<br><br>
Entscheide welche Sorte von Usern in deinen Raum darf, welcher Effekt oder welches Handitem beim betreten ausgel&ouml;st werden soll oder versende bei bestimmten Kriterien coole Nachrichten!<br><br>
Du findest in den jewiligen Boxen (Effekt oder Bedingung) die jeweiligen <b>Variablen</b> die du in den jeweiligen WIREDs einsetzen musst.<br><br>
Beispiel -<br>
Du tr&auml;gst die Variable im WIRED ein und setzt hinterher einen Doppelpunkt <b>(:)</b><br>
Hinter diesem Doppelpunkt kommt dann der Wert. (Beispiel: - alert:Hallo, dies ist ein Alert! | handitem:34 | effect:45)<br><br>

<u>REGELWERK - Magic WIRED</u><br>
§ MW1. - Das versenden von massenhaften Alerts ist strengstens verboten.<br>
<b>Strafma&szlig;: 48 Stunden Accountsperrung</b><br><br>

§ MW2. - Sofern es noch Schwachstellen mit dem Magic WIREDs gibt, 
m&uuml;ssen diese sofort gemeldet werden und d&uuml;rfen unter keinen Umst&auml;nden ausgenutzt werden!<br>
<b>Strafma&szlig;: 48 Stunden Accountsperrung</b><br><br>

§ MW3. - Magic WIREDs d&uuml;rfen weder verschenkt noch verliehen werden.<br>
<b>Strafma&szlig;: 50% Entzug des Gesamtverm&ouml;gens + 120 Minuten Accountsperrung</b><br><br>

							</div>
						</div>
						
	<div class="boxd" style="margin-top: -115px;">
				    <div class="title9">Magic WIRED: Effekte</div>			
		<div class="box_new" style="width:400px;">
				<div class="boxdesc" id="table" style="width:91%;height:auto;margin:0;">
					<b>Alert versenden</b><br>
Um einen Alert in deinen R&auml;umen versenden zu k&ouml;nnen, ben&ouml;tigst du folgende Variable:<br>
<b>alert:<i>Deine Nachricht</i></b>
<br><br>

<b>Handitem vergeben</b><br>
Spendiere deinen Raumbesuchern ein 'K&auml;ffchen oder ein Eis!
Hierf&uuml;r ben&ouml;tigst du die Variable:<br>
<b>handitem:<i>HanditemID</i></b>
<br>
	<img src="/lib/standard//img/read_all_about_it_small_promo.png" align="right" style="margin-left: 10px;">
<br>

<b>In einen anderen Raum senden</b><br>
Du m&ouml;chtest deine Besucher auf den Mond schie&szlig;en?<br>
Mit dieser Variable kannst du sie in andere R&auml;ume versenden:<br>
<b>send:<i>RaumID</i></b>
<br><br>

<b>Effekt vorschlagen</b><br>
Schlage deinen Raumbesuchern einen Effekt vor, welchen sie anschlie&szlig;end mit einem Klick aktivieren k&ouml;nnen. Variable:<br>
<b>effect:<i>EnableID</i></b>
<br><br>

<b>Lass sie Tanzen!</b><br>
Lass deine Raumbesucher mit einer einfachen Variable Tanzen!<br>
Es gibt 4 verschiedene Tanzmoves zwischen denen du dich entscheiden musst. (ID 1-4)<br>
<b>dance:<i>DanceID </i></b>

						
					</div>
				</div>				
						
		</div>
</div>

	<div id="main" class="container_12" style="margin-left: -10px;">
<!- INCLUDE Standard/footer -></div>