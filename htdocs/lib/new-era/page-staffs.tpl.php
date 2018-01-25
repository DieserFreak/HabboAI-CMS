<!- INCLUDE new-era/header ->
	<div id="column" style="width:70%">
		<div id="content">
			<div id="box">
				<p>Du bist hier auf der Mitarbeiterliste vom Hobba Hotel gelandet! Auf dieser Seite findest du alle Mitarbeiter hier im Hotel. Klick sie doch mal an, um mehr &uuml;ber sie zu erfahren!</p>
			</div>
		</div>
	</div>
	
	<div id="column" style="width:30%">
		<div id="content">
			<div id="box">
				<div id="userinfobox" style="display:none" class="socialmedia-item"></div>
			</div>
		</div>
	</div>
	
	<div id="column" style="width:33.3%">
		<div id="content">
			<div id="box" style="text-align: center;">
				<h2>Hobba Staffs</h2>
			</div>
		</div>
		
		<div id="content">
			<div id="box">
				<table>	
				<!- BEGIN userstaff ->
				<!- IF userstaff.USERRANK >= ABMOD ->
					<tr style="vertical-align: top;">
						<td width="42%;"><div class="stafflistuser" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1;"<!- ELSE ->style="opacity:0.5;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&gesture=sml&action=stand"></div></td>
						<td valign="middle"><b>{userstaff.USERNAME}</b><br />{userstaff.USERWORKING}<br /><br /><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online<!- ENDIF -></td>
					</tr>
				<!- ENDIF ->
				<!- END userstaff ->
				</table>
			</div>
		</div>
	</div>
		
	<div id="column" style="width:33.4%">
		<div id="content">
			<div id="box" style="text-align: center;">
				<h2>Hobba Botschafter</h2>
			</div>
		</div>
		
		<div id="content">
			<div id="box">
				<table>	
				<!- BEGIN userstaff ->
				<!- IF userstaff.USERRANK == ABEXP ->
					<tr style="vertical-align: top;">
						<td width="42%;"><div class="stafflistuser" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1;"<!- ELSE ->style="opacity:0.5;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&gesture=sml&action=stand"></div></td>
						<td valign="middle"><b>{userstaff.USERNAME}</b><br />{userstaff.USERWORKING}<br /><br /><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online<!- ENDIF -></td>
					</tr>
				<!- ENDIF ->
				<!- END userstaff ->
				</table>	
			</div>
		</div>
	</div>
		
	<div id="column" style="width:33.3%">
		<div id="content">
			<div id="box" style="text-align: center;">
				<h2>Hobba DJ's</h2>
			</div>
		</div>
		
		<div id="content">
			<div id="box">
				<table>	
				<!- BEGIN userstaff ->
				<!- IF userstaff.USERRANK == ABDJ ->
					<tr style="vertical-align: top;">
						<td width="42%;"><div class="stafflistuser" <!- IF userstaff.USERONLINE == 1 ->style="opacity:1;"<!- ELSE ->style="opacity:0.5;"<!- ENDIF ->><img class="UserStats" userid="{userstaff.USERID}" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&direction=3&head_direction=3&gesture=sml&action=stand"></div></td>
						<td valign="middle"><b>{userstaff.USERNAME}</b><br />{userstaff.USERWORKING}<br /><br /><!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online<!- ENDIF -></td>
					</tr>
				<!- ENDIF ->
				<!- END userstaff ->
				</table>
			</div>
		</div>
	</div>
<!- INCLUDE new-era/footer ->