<!- INCLUDE new-era/header ->
	<div id="column" style="width:100%">
	<!- IF FIXALERT == 1 ->
	<div id="content"><div id="success">Client erfolgreich gefixxt. Falls es immer noch nicht klappt, dann bitte <a href="{url}/support" style="color:#fff;">hier</a> melden!</div></div>
	<!- ENDIF ->
	
	<!- IF CLIENTALERT == 1 ->
	<div id="content"><div id="warning">Client ist leider &uuml;berf&uuml;llt. Im Client darf maximal {clientmaxusers} User online sein. Bitte warten Sie und versuchen Sie erneut.</div></div>
	<!- ENDIF ->

	<!- IF GETMONEYALERT == 1 ->
	<div id="content"><div id="success">Du hast f&uuml;r heute {getdailycredits} Taler, {getdailypixels} Duckets, {getdailyrespect} Respektverf&uuml;gung und {getdailypetrespect} Respektverf&uuml;gung f&uuml;r Haustiere erhalten.</div></div>
	<!- ELSEIF GETMONEYALERT == 2 ->
	<div id="content"><div id="success"><b>VIP:</b> Du hast f&uuml;r heute {getdailyvipcredits} Taler, {getdailyvippixels} Duckets, {getdailyvipdias} Diamanten, {getdailyviprespect} Respektverf&uuml;gung und {getdailypetrespect} Respektverf&uuml;gung f&uuml;r Haustiere erhalten.</div></div>
	<!- ENDIF ->
	</div>

	<div id="column" style="width:55%">
		<div id="content">
			<div id="me">
				<div style="background: url('http://www.habbo.com/habbo-imaging/avatarimage?figure={USERAVATAR}&direction=2&head_direction=3&gesture=sml&action=wav&size=l');">
				</div>
				
				{USERNAME} {USERMOTTO} 
			</div>
		</div>
		<div id="content">
			<div id="boxtitle">Hobba Veranstaltungen</div>
			<div id="box">
			<center><p>Hier findest du die Liste der offiziellen Events im Client.</p></center>
			<!- BEGIN events ->
			<!- IF events.END > TIMENOWDATE ->
				<span class="room"><span class="users">{events.START}</span>{events.NAME}</span>
			<!- ENDIF ->
			<!- END events ->
			</div>
		</div>
	</div>
	
	<div id="column" style="width:45%">
	
		<div id="content">
			<div id="boxtitle">Meine Informationen</div>
			<div id="box">
				<span class="room">
					<p style="text-align:right;">
					{USERCREDITS} Taler <img src="{themeurl}/img/symbol/credits.png"><br />
					{USERPIXEL} Duckets <img src="{themeurl}/img/symbol/duckets.png"><br />
					{USERDIAMANT} Diamamten <img src="{themeurl}/img/symbol/diamonds.png"><br />
					</p>
					<p>
					<!- IF USERHCTIME == 0 ->
					<img src="{themeurl}/img/symbol/hc.png"> Du bist leider kein Hobba Club Mitglied<br/>
					<!- ELSE ->
					<img src="{themeurl}/img/symbol/hc.png"> Dein Hobba Club l&auml;uft noch  {USERHCTIME} Tage lang<br/>
					<!- ENDIF ->
					<!- IF USERVIP == 1 ->
					<img src="{themeurl}/img/symbol/vip.png"> Dein Hobba VIP l&auml;uft bis zum {USERVIPTIME}
					<!- ELSE ->
					<img src="{themeurl}/img/symbol/vip.png"> Du bist leider kein Hobba VIP Mitglied
					<!- ENDIF ->
					</p>
					<p style="text-align:right;">
					<img src="{themeurl}/img/symbol/laston.png"> <small>Zuletzt online {USERONLINE}</small><br /><br />
					<small><i><a href="{url}/me?fix" style="color:#fff;text-decoration: none;">Client buggt? Klick hier!</a></i></small>
					</p>
				</span>
			</div>
		</div>
		
		<div id="content">
			<div id="boxtitle">Die neusten News</div>
			<div id="slides">
				{NEWSLIDE}
			</div>
		</div>
	</div>

<!- INCLUDE new-era/footer ->