<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_main ->
<!- INCLUDE new-era/subheader_account ->

<br>
<div id="content">
	<div id="right-column">
		<!- IF INFO == 1 -><span class="message error vampire"> Das Motto darf nicht &uuml;ber 50 Zeichen lang sein</span><br />
		<!- ELSEIF INFO == 2 -><span class="message success"> Standarddaten wurden erfolgreich ge&auml;ndert</span><br />
		<!- ELSEIF INFO == 3 -><span class="message error vampire"> Das aktuelles Passwort ist nicht richtig</span><br />
		<!- ELSEIF INFO == 4 -><span class="message error vampire"> Der Geburtstagsdatum ist ung&uuml;ltig</span><br />
		<!- ELSEIF INFO == 5 -><span class="message error vampire"> Das Passwort muss mindestens 6 Zeichen lang sein</span><br />
		<!- ELSEIF INFO == 6 -><span class="message error vampire"> Die neue Passw&ouml;rter sind nicht gleich</span><br />
		<!- ELSEIF INFO == 7 -><span class="message success"> Das Passwort wurde erfolgreich ge&auml;ndert</span><br />
		<!- ELSEIF INFO == 8 -><span class="message error vampire"> Die aktuelle E-Mail ist nicht richtig</span><br />
		<!- ELSEIF INFO == 9 -><span class="message error vampire"> Die neue E-Mail ist ung&uuml;ltig</span><br />
		<!- ELSEIF INFO == 10 -><span class="message error vampire"> Die neue E-Mail ist besetzt</span><br />
		<!- ELSEIF INFO == 11 -><span class="message success"> Die E-Mail wurde erfolgreich ge&auml;ndert</span><br />
		<!- ENDIF ->
		<!- IF SETTING == 2 ->
		<div class="box">
			<h1 style="color:#88DAFF;">Passwort-Sicherheit</h1>
			<p>
				 Dein Passwort soll mindestens 8 Zeichen lang sein. Es soll auch mindestens ein Zahl, ein Buchstabe und ein Sonderzeichen erhalten! So hast du ein sicheres Passwort!
			</p>
		</div>
		<!- ENDIF ->
		<!- IF SETTING == 1 ->
		<div class="box">
			<h1 class="lightblue">Standardeinstellungen</h1>
			<p>
				 Du kannst hier ihr Motto &auml;ndern. Das Motto darf nicht gegen die Regeln verst&ouml;&szlig;en! <br /><br />Au&szlig;erdem kannst du hier auch einstellen, ob du Newsletter haben m&ouml;chte und so weiter.
			</p>
		</div>
		<!- ENDIF ->
		<!- IF SETTING == 3 ->
		<div class="box">
			<h1 class="lightblue">E-Mail</h1>
			<p>
				 Du kannst hier ihre E-Mail &auml;ndern. Die E-Mail gilt f&uuml;r z.B. Newsletter, wichtigte Mitteilungen oder auch wichtig f&uuml;r das Passwort-Vergessen-Funktion.
			</p>
		</div>
		<!- ENDIF ->
	</div>
	<div id="left-column">
		<!- IF SETTING == 1 ->
		<div class="box">
		<form id="motto" action="" method="post">
			<h1>Standarddaten &auml;ndern</h1>
			<h3>Motto</h3>
			<p class="legend">W&auml;hle hier ein neues Motto.</p>
			<input type="text" value="{USERMOTTO2}" name="a_motto" placeholder="Motto eingeben ...">
			<h3>Newsletter</h3>
			<p class="legend">W&auml;hle hier, ob du Newsletter haben m&ouml;chtest.</p>
			<select name="a_newsletter" class="accountselect">
				<option value="1" <!- IF USERENEWSLETTER == 1 ->selected<!- ENDIF ->>Ja</option>
				<option value="0" <!- IF USERENEWSLETTER == 0 ->selected<!- ENDIF ->>Nein</option>
			</select>
			<h3>Onlinestatus verstecken</h3>
			<p class="legend">W&auml;hle hier, ob du ihr Onlinestatus verstecken m&ouml;chtest.</p>
			<select name="a_hideonline" class="accountselect">
				<option value="1" <!- IF USERHIDEONLINE == 1 ->selected<!- ENDIF ->>Ja</option>
				<option value="0" <!- IF USERHIDEONLINE == 0 ->selected<!- ENDIF ->>Nein</option>
			</select>
			<h3>Handeln deaktivieren</h3>
			<p class="legend">W&auml;hle hier, ob du das Handeln von fremde Hobba deaktiveren m&ouml;chtest.</p>
			<select name="a_accepttrading" class="accountselect">
				<option value="0" <!- IF USERACCTRADING == 0 ->selected<!- ENDIF ->>Ja</option>
				<option value="1" <!- IF USERACCTRADING == 1 ->selected<!- ENDIF ->>Nein</option>
			</select>
			<h3>Freundeanfrage deaktivieren</h3>
			<p class="legend">W&auml;hle hier, ob du das Anfrage von neuer Freunde deaktiveren m&ouml;chtest.</p>
			<select name="a_blocknewfriends" class="accountselect">
				<option value="1" <!- IF USERBLOCKNEWFR == 1 ->selected<!- ENDIF ->>Ja</option>
				<option value="0" <!- IF USERBLOCKNEWFR == 0 ->selected<!- ENDIF ->>Nein</option>
			</select>
			<div style="margin-top:30px;">
				<span class="account-save-changes">Klickt auf "Speichern"<br>um dein Account zu &auml;ndern</span>
				<input class="btns red" type="submit" name="submit_motto" value="Speichern" style="width:20%;float:right; margin-right:10px; margin-top:0px">
			</div>
		</form>
		</div>
		<!- ENDIF ->
		<!- IF SETTING == 2 ->
		<!- IF CHANGEPW == 1 ->
		<div class="box">
		<form id="password" action="" method="post">
			<h1>Passwort &auml;ndern</h1>
			<h3>Aktuelles Passwort</h3>
			<p class="legend">Gebe hier dein aktuelles Passwort ein.</p>
			<input type="password" name="ap_password" placeholder="Aktuelles Passwort eingeben ...">
			<h3>Geburtstagsdatum</h3>
			<p class="legend">W&auml;hle hier dein Geburtstagsdatum.</p>
			<select name="ap_day" class="accountselect" style="float:left;width:20%;">
				<option value="">Tag</option>
				<option value="1" <!- IF BITHDAY == 1 ->selected<!- ENDIF ->>1</option>
				<option value="2" <!- IF BITHDAY == 2 ->selected<!- ENDIF ->>2</option>
				<option value="3" <!- IF BITHDAY == 3 ->selected<!- ENDIF ->>3</option>
				<option value="4" <!- IF BITHDAY == 4 ->selected<!- ENDIF ->>4</option>
				<option value="5" <!- IF BITHDAY == 5 ->selected<!- ENDIF ->>5</option>
				<option value="6" <!- IF BITHDAY == 6 ->selected<!- ENDIF ->>6</option>
				<option value="7" <!- IF BITHDAY == 7 ->selected<!- ENDIF ->>7</option>
				<option value="8" <!- IF BITHDAY == 8 ->selected<!- ENDIF ->>8</option>
				<option value="9" <!- IF BITHDAY == 9 ->selected<!- ENDIF ->>9</option>
				<option value="10" <!- IF BITHDAY == 10 ->selected<!- ENDIF ->>10</option>
				<option value="11" <!- IF BITHDAY == 11 ->selected<!- ENDIF ->>11</option>
				<option value="12" <!- IF BITHDAY == 12 ->selected<!- ENDIF ->>12</option>
				<option value="13" <!- IF BITHDAY == 13 ->selected<!- ENDIF ->>13</option>
				<option value="14" <!- IF BITHDAY == 14 ->selected<!- ENDIF ->>14</option>
				<option value="15" <!- IF BITHDAY == 15 ->selected<!- ENDIF ->>15</option>
				<option value="16" <!- IF BITHDAY == 16 ->selected<!- ENDIF ->>16</option>
				<option value="17" <!- IF BITHDAY == 17 ->selected<!- ENDIF ->>17</option>
				<option value="18" <!- IF BITHDAY == 18 ->selected<!- ENDIF ->>18</option>
				<option value="19" <!- IF BITHDAY == 19 ->selected<!- ENDIF ->>19</option>
				<option value="20" <!- IF BITHDAY == 20 ->selected<!- ENDIF ->>20</option>
				<option value="21" <!- IF BITHDAY == 21 ->selected<!- ENDIF ->>21</option>
				<option value="22" <!- IF BITHDAY == 22 ->selected<!- ENDIF ->>22</option>
				<option value="23" <!- IF BITHDAY == 23 ->selected<!- ENDIF ->>23</option>
				<option value="24" <!- IF BITHDAY == 24 ->selected<!- ENDIF ->>24</option>
				<option value="25" <!- IF BITHDAY == 25 ->selected<!- ENDIF ->>25</option>
				<option value="26" <!- IF BITHDAY == 26 ->selected<!- ENDIF ->>26</option>
				<option value="27" <!- IF BITHDAY == 27 ->selected<!- ENDIF ->>27</option>
				<option value="28" <!- IF BITHDAY == 28 ->selected<!- ENDIF ->>28</option>
				<option value="29" <!- IF BITHDAY == 29 ->selected<!- ENDIF ->>29</option>
				<option value="30" <!- IF BITHDAY == 30 ->selected<!- ENDIF ->>30</option>
				<option value="31" <!- IF BITHDAY == 31 ->selected<!- ENDIF ->>31</option>
			</select>
			<select name="ap_month" class="accountselect" style="float:left;width:30%;">
				<option value="">Monat</option>
				<option value="1" <!- IF BITHMONTH == 1 ->selected<!- ENDIF ->>Januar</option>
				<option value="2" <!- IF BITHMONTH == 2 ->selected<!- ENDIF ->>Februar</option>
				<option value="3" <!- IF BITHMONTH == 3 ->selected<!- ENDIF ->>M&auml;rz</option>
				<option value="4" <!- IF BITHMONTH == 4 ->selected<!- ENDIF ->>April</option>
				<option value="5" <!- IF BITHMONTH == 5 ->selected<!- ENDIF ->>Mail</option>
				<option value="6" <!- IF BITHMONTH == 6 ->selected<!- ENDIF ->>Juni</option>
				<option value="7" <!- IF BITHMONTH == 7 ->selected<!- ENDIF ->>Juli</option>
				<option value="8" <!- IF BITHMONTH == 8 ->selected<!- ENDIF ->>August</option>
				<option value="9" <!- IF BITHMONTH == 9 ->selected<!- ENDIF ->>September</option>
				<option value="10" <!- IF BITHMONTH == 10 ->selected<!- ENDIF ->>Oktober</option>
				<option value="11" <!- IF BITHMONTH == 11 ->selected<!- ENDIF ->>November</option>
				<option value="12" <!- IF BITHMONTH == 12 ->selected<!- ENDIF ->>Dezember</option>
			</select>
			<select name="ap_year" class="accountselect" style="float:left;width:20%;">
				<option value="">Jahr</option>
				<option value="2008" <!- IF BITHYEAR == 2008 ->selected<!- ENDIF ->>2008</option>
				<option value="2007" <!- IF BITHYEAR == 2007 ->selected<!- ENDIF ->>2007</option>
				<option value="2006" <!- IF BITHYEAR == 2006 ->selected<!- ENDIF ->>2006</option>
				<option value="2005" <!- IF BITHYEAR == 2005 ->selected<!- ENDIF ->>2005</option>
				<option value="2004" <!- IF BITHYEAR == 2004 ->selected<!- ENDIF ->>2004</option>
				<option value="2003" <!- IF BITHYEAR == 2003 ->selected<!- ENDIF ->>2003</option>
				<option value="2002" <!- IF BITHYEAR == 2002 ->selected<!- ENDIF ->>2002</option>
				<option value="2001" <!- IF BITHYEAR == 2001 ->selected<!- ENDIF ->>2001</option>
				<option value="2000" <!- IF BITHYEAR == 2000 ->selected<!- ENDIF ->>2000</option>
				<option value="1999" <!- IF BITHYEAR == 1999 ->selected<!- ENDIF ->>1999</option>
				<option value="1998" <!- IF BITHYEAR == 1998 ->selected<!- ENDIF ->>1998</option>
				<option value="1997" <!- IF BITHYEAR == 1997 ->selected<!- ENDIF ->>1997</option>
				<option value="1996" <!- IF BITHYEAR == 1996 ->selected<!- ENDIF ->>1996</option>
				<option value="1995" <!- IF BITHYEAR == 1995 ->selected<!- ENDIF ->>1995</option>
				<option value="1994" <!- IF BITHYEAR == 1994 ->selected<!- ENDIF ->>1994</option>
				<option value="1993" <!- IF BITHYEAR == 1993 ->selected<!- ENDIF ->>1993</option>
				<option value="1992" <!- IF BITHYEAR == 1992 ->selected<!- ENDIF ->>1992</option>
				<option value="1991" <!- IF BITHYEAR == 1991 ->selected<!- ENDIF ->>1991</option>
				<option value="1990" <!- IF BITHYEAR == 1990 ->selected<!- ENDIF ->>1990</option>
				<option value="1989" <!- IF BITHYEAR == 1989 ->selected<!- ENDIF ->>1989</option>
				<option value="1988" <!- IF BITHYEAR == 1988 ->selected<!- ENDIF ->>1988</option>
				<option value="1987" <!- IF BITHYEAR == 1987 ->selected<!- ENDIF ->>1987</option>
				<option value="1986" <!- IF BITHYEAR == 1986 ->selected<!- ENDIF ->>1986</option>
				<option value="1985" <!- IF BITHYEAR == 1985 ->selected<!- ENDIF ->>1985</option>
				<option value="1984" <!- IF BITHYEAR == 1984 ->selected<!- ENDIF ->>1984</option>
				<option value="1983" <!- IF BITHYEAR == 1983 ->selected<!- ENDIF ->>1983</option>
				<option value="1982" <!- IF BITHYEAR == 1982 ->selected<!- ENDIF ->>1982</option>
				<option value="1981" <!- IF BITHYEAR == 1981 ->selected<!- ENDIF ->>1981</option>
				<option value="1980" <!- IF BITHYEAR == 1980 ->selected<!- ENDIF ->>1980</option>
				<option value="1979" <!- IF BITHYEAR == 1979 ->selected<!- ENDIF ->>1979</option>
				<option value="1978" <!- IF BITHYEAR == 1979 ->selected<!- ENDIF ->>1978</option>
				<option value="1977" <!- IF BITHYEAR == 1978 ->selected<!- ENDIF ->>1977</option>
				<option value="1976" <!- IF BITHYEAR == 1977 ->selected<!- ENDIF ->>1976</option>
				<option value="1975" <!- IF BITHYEAR == 1976 ->selected<!- ENDIF ->>1975</option>
				<option value="1974" <!- IF BITHYEAR == 1975 ->selected<!- ENDIF ->>1974</option>
				<option value="1973" <!- IF BITHYEAR == 1974 ->selected<!- ENDIF ->>1973</option>
				<option value="1972" <!- IF BITHYEAR == 1973 ->selected<!- ENDIF ->>1972</option>
				<option value="1971" <!- IF BITHYEAR == 1972 ->selected<!- ENDIF ->>1971</option>
				<option value="1970" <!- IF BITHYEAR == 1971 ->selected<!- ENDIF ->>1970</option>
			</select><br /><br />
			<h3>Neues Passwort</h3>
			<p class="legend">W&auml;hle hier ein neues Passwort.</p>
			<input type="password" name="ap_newpassword" placeholder="Neues Passwort ..."><br />
			<p class="legend">Wiederhole hier ein neues Passwort.</p>
			<input type="password" name="ap_newpassword2" placeholder="Neues Passwort wiederholen ...">
			<div style="margin-top:30px;">
				<span class="account-save-changes">Klickt auf "Speichern"<br>um dein Passwort zu &auml;ndern</span>
				<input class="btns red" type="submit" name="submit_password" value="Speichern" style="width:20%;float:right; margin-right:10px; margin-top:0px">
			</div>
		</form>
		</div>
		<!- ELSE ->
		<div class="box">
			<span class="message error vampire"> Passwort &auml;ndern ist deaktivert</span>
		</div>
		<!- ENDIF ->
		<!- ENDIF ->
		<!- IF SETTING == 3 ->
		<!- IF CHANGEMAIL == 1 ->
		<div class="box">
		<form id="email" action="" method="post">
			<h1>E-Mail &auml;ndern</h1>
			<h3>Aktuelle E-Mail</h3>
			<p class="legend">Die aktuelle E-Mail hier eingeben.</p>
			<input type="text" name="ae_email" value="{USEREMAIL}" placeholder="Aktuelle E-Mail eingeben ...">
			<h3>Neue E-Mail</h3>
			<p class="legend">Die neue E-Mail hier eingeben..</p>
			<input type="text" name="ae_newemail" placeholder="Neue E-Mail eingeben ...">
			<div style="margin-top:30px;">
				<span class="account-save-changes">Klickt auf "Speichern"<br>um deine E-Mail zu &auml;ndern</span>
				<input class="btns red" type="submit" name="submit_email" value="Speichern" style="width:20%;float:right; margin-right:10px; margin-top:0px">
			</div>
		</form>
		</div>
		<!- ELSE ->
		<div class="box">
			<span class="message error vampire"> E-Mail &auml;ndern ist deaktivert</span>
		</div>
		<!- ENDIF ->
		<!- ENDIF ->
	</div>
</div>

<!- INCLUDE new-era/footer ->