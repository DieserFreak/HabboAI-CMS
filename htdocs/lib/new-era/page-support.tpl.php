<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_main ->

<br>
<div id="content">
	<div id="right-column">
		<!- IF INFO == 1 -><span class="message error vampire"> Ung&uuml;ltiges Thema & Priorit&auml;t</span><br />
		<!- ELSEIF INFO == 2 -><span class="message error vampire"> Der Text muss mindestens 30 Zeichen lang sein</span><br />
		<!- ELSEIF INFO == 3 -><span class="message error vampire"> Du hast aktuell noch {ANZHALSUP} unbearbeitetes Support! Bitte, hab Geduld</span><br />
		<!- ELSEIF INFO == 4 -><span class="message success"> Support erfolgreich gesendet</span><br />
		<!- ENDIF ->
		<div class="box">
			<div class="socialmedia-item">
				<h2>Information</h2>
				<p>Hier kannst du deine Hilfe, Ideen, Verbesserungsvorschl&auml;ge und so weiter an uns senden. Wir werden so schnell wie m&ouml;glich einen Antwort zu senden, die du hier unten sehen kannst.</p>
			</div>
			<div class="socialmedia-item">
				<h2>Antwort von letzte 2 Supports</h2>
				<br>
				<!- BEGIN usersupport ->
					<hr class="article-hr">
					<b>Thema:</b><br />
					<small>{usersupport.TOPIC}</small><br /><br />
					<b>Antwort:</b><br />
					<small>{usersupport.ANSWER}</small><br /><br />
					<div style="text-align:right">{usersupport.ANSWERDATE}</div>
				<!- END ->
			</div>
		</div>
	</div>
	<div id="left-column">
		<div class="box">
			<h1>Support an Mitarbeiter schreiben</h1>
			<div class="box">
			<!- IF SUPOPEN == 1 ->
				<form id="support" action="" method="post">
					<h3>Username</h3>
					<input type="text" value="{USERNAME}" DISABLED>
					<h3>Thema</h3>
					<p class="legend">Um welche Thema handelt es?</p>
					<select name="topic" class="accountselect">
						<option value="Probleme mit Account oder Client">Probleme mit Account oder Client</option>
						<option value="Ideen bzw. Verbesserungsvorschl&auml;ge">Ideen bzw. Verbesserungsvorschl&auml;ge</option>
						<option value="Beschwerden an Mitarbeiter">Beschwerden an Mitarbeiter</option>
						<option value="Fehler melden">Fehler melden</option>
					</select>
					<h3>Priorit&auml;t</h3>
					<p class="legend">Wie hoch ist die Priorit&auml;t?</p>
					<select name="prioritaet" class="accountselect">
						<option value="1">Niedrig</option>
						<option value="2">Mittel</option>
						<option value="3">Hoch</option>
					</select>
					<h3>Text</h3>
					<p class="legend">Um was geht es? Bitte genaue Informationen angeben! Nur so k&ouml;nnen wir helfen.</p>
					<textarea name="text" rows="15"></textarea>
					<input class="btns red" type="submit" name="submit" value="Senden" style="margin-right:0px; margin-top:10px">
				</form>
			<!- ELSE -> 
				<center>Tut mir leid, aber Support ist geschlossen!</center>
			<!- ENDIF ->
			</div>
		</div>
	</div>
</div>

<!- INCLUDE new-era/footer ->