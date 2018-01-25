<!- INCLUDE Standard/header ->

</div>
</div>
</div>
<br>
<div class="container_12">
	<div id="right-column">
		<!- IF INFO == 1 -><span class="message error vampire"> Das Motto darf nicht &uuml;ber 50 Zeichen lang sein</span><br />
		<!- ELSEIF INFO == 2 -><script> alert("Deine Einstellungen wurden erfolgreich aktualisiert!\r\rBitte lade den Client neu, um diese wirksam zu machen.")</script>
		<!- ELSEIF INFO == 3 -><span class="message error vampire"> Das aktuelles Passwort ist nicht richtig</span><br />
		<!- ELSEIF INFO == 4 -><span class="message error vampire"> Der eingegebene PIN-Code ist falsch!</span><br />
		<!- ELSEIF INFO == 5 -><span class="message error vampire"> Das Passwort muss mindestens 6 Zeichen lang sein</span><br />
		<!- ELSEIF INFO == 6 -><span class="message error vampire"> Die neue Passw&ouml;rter sind nicht gleich</span><br />
		<!- ELSEIF INFO == 7 -><span class="settings-alert"> Das Passwort wurde erfolgreich ge&auml;ndert</span><br />
		<!- ELSEIF INFO == 8 -><span class="message error vampire"> Die aktuelle E-Mail ist nicht richtig</span><br />
		<!- ELSEIF INFO == 9 -><span class="message error vampire"> Die neue E-Mail ist ung&uuml;ltig</span><br />
		<!- ELSEIF INFO == 10 -><span class="message error vampire"> Die neue E-Mail ist besetzt</span><br />
		<!- ELSEIF INFO == 11 -><span class="message success"> Die E-Mail wurde erfolgreich ge&auml;ndert</span><br />
		<!- ENDIF ->
		<!- IF SETTING == 2 ->
		<!- ENDIF ->
		<!- IF SETTING == 1 ->
		<!- ENDIF ->
		<!- IF SETTING == 3 ->
		<!- ENDIF ->
	</div>
		<!- IF SETTING == 1 ->
	
		<div class="container_12 animated fadeInLeft">
            <div class="grid_12">
               <div class="boxd" style="margin-top: 10px;width: 100%;">
				<form id="motto" action="" method="post">
                   <div class="boxhead">
                        <div style="float: left;">Account Einstellungen</div>
                    </div>
					
					<div class="boxdesc">Motto &auml;ndern <input class="inputs" type="text" value="{USERMOTTO2}" name="a_motto" placeholder="Motto eingeben ..." style="width: 198px;color: #6C7A89;background-color: #F4F4F4;"></div>
                   
					<div class="boxdesc">Newsletter abonnieren
					<select name="a_newsletter" class="settings">
							<option value="1" <!- IF USERENEWSLETTER == 1 ->selected<!- ENDIF ->>Ja</option>
							<option value="0" <!- IF USERENEWSLETTER == 0 ->selected<!- ENDIF ->>Nein</option>
					</select>
                   
					</div>
					<div class="boxdesc">Onlinestatus verstecken 
						<select name="a_hideonline" class="settings">
							<option value="1" <!- IF USERHIDEONLINE == 1 ->selected<!- ENDIF ->>Ja</option>
							<option value="0" <!- IF USERHIDEONLINE == 0 ->selected<!- ENDIF ->>Nein</option>
						</select>
					</div>
					<div class="boxdesc">Antauschen deaktiveren
					<select name="a_accepttrading" class="settings">
						<option value="0" <!- IF USERACCTRADING == 0 ->selected<!- ENDIF ->>Ja</option>
						<option value="1" <!- IF USERACCTRADING == 1 ->selected<!- ENDIF ->>Nein</option>
					</select>
                   
					</div>
					<div class="boxdesc">Freundschaftsanfragen deaktivieren
					<select name="a_blocknewfriends" class="settings">
						<option value="1" <!- IF USERBLOCKNEWFR == 1 ->selected<!- ENDIF ->>Ja</option>
						<option value="0" <!- IF USERBLOCKNEWFR == 0 ->selected<!- ENDIF ->>Nein</option>
					</select>
                   
					</div>
						<div class="boxhead">
							<div style="float: left;">Einstellungen abspeichern</div>
								<input class="button" type="submit" name="submit_motto" value="Speichern" style="width:20%;float:right; margin-right:10px; margin-top:0px" />
						</div>
                    </div>
                </div>
				
            </div>
			</form>
			
		<!- ENDIF ->
		<!- IF SETTING == 2 ->
		<!- IF CHANGEPW == 1 ->
		
		<div class="container_12 animated fadeInLeft">
            <div class="grid_12">
                <div class="boxd" style="margin-top: 10px;width: 100%;">
                   <div class="boxhead">
                        <div style="float: left;">Passwort &auml;ndern</div>
                    </div>
					<form id="password" action="" method="post">
					<div class="boxdesc">Gebe dein aktuelles Passwort ein <input id="passwort" type="password" name="ap_password" placeholder="Aktuelles Passwort eingeben ..." style="float: right;"></div>
					<div class="boxdesc">Gebe nun zur Best&auml;tigung dein PIN-Code ein <select name="ap_day" class="settings" style="float:right;">
				<option value="">Auswahl</option>
				<option value="1" <!- IF BITHDAY == 1 ->selected<!- ENDIF ->>1</option>
				<option value="2" <!- IF BITHDAY == 2 ->selected<!- ENDIF ->>2</option>
				<option value="3" <!- IF BITHDAY == 3 ->selected<!- ENDIF ->>3</option>
				<option value="4" <!- IF BITHDAY == 4 ->selected<!- ENDIF ->>4</option>
				<option value="5" <!- IF BITHDAY == 5 ->selected<!- ENDIF ->>5</option>
				<option value="6" <!- IF BITHDAY == 6 ->selected<!- ENDIF ->>6</option>
				<option value="7" <!- IF BITHDAY == 7 ->selected<!- ENDIF ->>7</option>
				<option value="8" <!- IF BITHDAY == 8 ->selected<!- ENDIF ->>8</option>
				<option value="9" <!- IF BITHDAY == 9 ->selected<!- ENDIF ->>9</option>
				<option value="0" <!- IF BITHDAY == 0 ->selected<!- ENDIF ->>0</option>
				
			</select>
			<select name="ap_month" class="settings" style="float:right;width:80px;">
				<option value="">Auswahl</option>
				<option value="1" <!- IF BITHMONTH == 1 ->selected<!- ENDIF ->>1</option>
				<option value="2" <!- IF BITHMONTH == 2 ->selected<!- ENDIF ->>2</option>
				<option value="3" <!- IF BITHMONTH == 3 ->selected<!- ENDIF ->>3</option>
				<option value="4" <!- IF BITHMONTH == 4 ->selected<!- ENDIF ->>4</option>
				<option value="5" <!- IF BITHMONTH == 5 ->selected<!- ENDIF ->>5</option>
				<option value="6" <!- IF BITHMONTH == 6 ->selected<!- ENDIF ->>6</option>
				<option value="7" <!- IF BITHMONTH == 7 ->selected<!- ENDIF ->>7</option>
				<option value="8" <!- IF BITHMONTH == 8 ->selected<!- ENDIF ->>8</option>
				<option value="9" <!- IF BITHMONTH == 9 ->selected<!- ENDIF ->>9</option>
				<option value="0" <!- IF BITHMONTH == 0 ->selected<!- ENDIF ->>0</option>
			</select>
			<select name="ap_year" class="settings" style="float:right;">
				<option value="">Auswahl</option>	
				<option value="1" <!- IF BITHYEAR == 1 ->selected<!- ENDIF ->>1</option>
				<option value="2" <!- IF BITHYEAR == 2 ->selected<!- ENDIF ->>2</option>
				<option value="3" <!- IF BITHYEAR == 3 ->selected<!- ENDIF ->>3</option>
				<option value="4" <!- IF BITHYEAR == 4 ->selected<!- ENDIF ->>4</option>
				<option value="5" <!- IF BITHYEAR == 5 ->selected<!- ENDIF ->>5</option>
				<option value="6" <!- IF BITHYEAR == 6 ->selected<!- ENDIF ->>6</option>
				<option value="7" <!- IF BITHYEAR == 7 ->selected<!- ENDIF ->>7</option>
				<option value="8" <!- IF BITHYEAR == 8 ->selected<!- ENDIF ->>8</option>
				<option value="9" <!- IF BITHYEAR == 9 ->selected<!- ENDIF ->>9</option>
				<option value="0" <!- IF BITHYEAR == 0 ->selected<!- ENDIF ->>0</option>
				
		
			</select></div>
                   
	
			<div class="boxdesc">Neues Passwort eingeben <input id="passwort" type="password" name="ap_newpassword2" placeholder="Neues Passwort wiederholen ..." style="float: right;"> <input id="passwort" type="password" name="ap_newpassword" placeholder="Neues Passwort ..." style="float: right;">
												</div>
				   <div class="boxhead">Passwort &auml;ndern
				<input class="button" type="submit" name="submit_password" value="Speichern" style="width:20%;float:right; margin-right:10px; margin-top:0px">
			</div>
				   </div>
				   </div>
				   </div>
				   </form>
		<!- ELSE ->
		<div class="box">
			<span class="message error vampire"> Passwort &auml;ndern ist deaktivert</span>
		</div>
		<!- ENDIF ->
		<!- ENDIF ->
		<!- IF SETTING == 3 ->
		<!- IF CHANGEMAIL == 1 ->
		<div class="container_12 animated fadeInLeft">
            <div class="grid_12">
                <div class="boxd" style="margin-top: 10px;">
                   <div class="boxhead">
                        <div style="float: left;">Email ändern</div>
                    </div>
					<form id="email" action="" method="post">
						<div class="boxdesc">
							Aktuelle Email <input id="passwort" type="text" name="ae_email" value="{USEREMAIL}" placeholder="Aktuelle E-Mail eingeben ...">
						</div>
						<div class="boxdesc">
							Neue Email <input id="passwort" type="text" name="ae_newemail" placeholder="Neue E-Mail eingeben ...">
						</div>
					
					<div class="boxhead">
                        <div style="float: left;">Email Speichern</div>
						<input class="button" type="submit" name="submit_email" value="Speichern" style="width:20%;float:right; margin-right:10px; margin-top:0px">
                    </div>
					</form>
					</div>
						</div>
							</div>
		
		<!- ELSE ->
		<div class="box">
			<span class="message error vampire" style="width: 95%;margin-left: 11px;"> E-Mail ändern ist deaktivert</span>
		</div>
		<!- ENDIF ->
		<!- ENDIF ->
		
		
		<!- INCLUDE Standard/footer ->
	</div>
	
