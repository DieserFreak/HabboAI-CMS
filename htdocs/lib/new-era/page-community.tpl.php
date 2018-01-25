<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_community ->

<br>
<div id="content">
	<div id="right-column">
		<div class="box">
			<h1>Heiße R&auml;ume</h1>
			<!- IF HOTROOMSR > 0 ->
				<!- BEGIN hotrooms ->
				<span class="room" style="line-height:30px;"><span <!- IF hotrooms.IMGNR == 3 ->class="usersred"<!- ELSEIF hotrooms.IMGNR == 2 ->class="usersorange"<!- ELSE ->class="users"<!- ENDIF ->>{hotrooms.USERSNOW}/{hotrooms.USERSMAX}</span> <img src="{themeurl}/img/symbol/icon_room_{hotrooms.IMGNR}.png" style="float:left; margin-right:5px;">{hotrooms.NAME}</span>
				<!- END hotrooms ->
			<!- ELSE ->
				<span class="room"><center>Aktuell sind die User nicht im Raum</center></span>
			<!- ENDIF ->
		</div>
		<div class="box">
			<h1>Geburtstag im Hobba</h1>
			<!- IF USERSBIRTHR > 0 ->
				<!- BEGIN usersbirth ->
				<span class="room"><b>User:</b> {usersbirth.USERNAME} ({usersbirth.MOTTO})</span>
				<!- END usersbirth ->
				<span class="room"><img src="{themeurl}/img/frank/Gift_Club_Frank.gif" align="right">Herzlichen Gl&uuml;ckwunsch w&uuml;nschen wir euch!<br /><br />Hobba-Team</span>
			<!- ELSE ->
				<span class="room"><img src="{themeurl}/img/frank/frank_21.gif" align="left"><center>Heute hat leider keiner <br/>Geburtstag. <br /><br />Schade!</center></span>
			<!- ENDIF ->
		</div>
	</div>
	<div id="left-column">
		<div class="box">
			<h1>Die neusten News</h1>
			<div id="slides">
				{NEWSLIDE}
			</div>
		</div>
		<div class="box">
			<h1>Hobba der Woche</h1>
			<p>
				 M&ouml;chtest du als Hobba der Woche sein? Kein Problem! Dann sollst du im Hobba Hotel so ber&uuml;hmt machen, damit du eventuell herausgepickt wirst und mit ins Voting hinzugef&uuml;gt. Letztendlich wird es entschieden, wer am meisten Stimmen hat.
			</p>
			<br>
			<div id="avatar" style="background: url('http://www.habbo.com/habbo-imaging/avatarimage?figure={HDWAVATAR}&direction=2&head_direction=2&gesture=sml&action=wav&size=l') center -30px no-repeat;"></div>
			<div id="avatar-info" class="uotw" style="width:60%">
				 {HDWNAME}<br>
				<span class="motto">{HDWMOTTO}</span>
			</div>
			<a style="float:right;" class="btn medium red condensed">{HDWNAME}'s Profil besuchen &raquo;</a>
		</div>
	</div>
</div>

<!- INCLUDE new-era/footer ->