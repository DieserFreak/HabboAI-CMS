<!DOCTYPE html>
<html>
<head>
	<title>Hobba - {slogan}</title>
	<link type="text/css" rel="stylesheet" href="{themeurl}css/habbo.out.css">
	<script src="{themeurl}js/jquery.min.js"></script>
	<script type="text/javascript" src="{themeurl}js/register.js"></script>
	<link rel="icon" href="{themeurl}img/faviconn.png"/>
</head>
<body>
<div id="habbo-hotel-image"></div>
<form id="registration" action="" method="post">
<!- IF REGOPEN == 1 ->
	<!- IF CLONCHECK ->
	<p>{CLONCHECKTEXT}</p>
	<a class="btn red" href="{url}">Zur&uuml;ck</a>
	<!- ELSE ->
	<div class="logo"></div>
	<span class="title">Willkommen im Hobba!</span>
	
	<!- IF ERROR ->
	<div class="message error vampire">
		<!- IF ERROR == 1 ->		Bitte Daten eingeben
		<!- ELSEIF ERROR == 2 ->	Der Username ist ung&uuml;ltig
		<!- ELSEIF ERROR == 3 ->	Der Username muss zwischen 3 und 12 Buchstaben/Zahlen erhalten
		<!- ELSEIF ERROR == 4 ->	Der Username ist leider vergeben
		<!- ELSEIF ERROR == 5 ->	Die E-Mail ist ung&uuml;ltig
		<!- ELSEIF ERROR == 6 ->	Die E-Mail ist bereits vergeben
		<!- ELSEIF ERROR == 7 ->	Das Passwort muss mindestens 6 Zeichen lang sein
		<!- ELSEIF ERROR == 8 ->	Die Passw&ouml;rter sind nicht gleich
		<!- ELSEIF ERROR == 9 ->	Du hast kein richtiges Geschlecht ausgew&auml;hlt
		<!- ELSEIF ERROR == 10 ->	Du hast kein richtiges Geburtstagsdatum ausgew&auml;hlt
		<!- ELSEIF ERROR == 11 ->	Der Sicherheitscode ist falsch
		<!- ENDIF ->
	</div>
	<!- ENDIF ->
	
	<p></p>
	<div class="section">
		<span class="title">Username</span>
		<p>
			Bitte geben Sie ein g&uuml;ltigen Username ein! Es darf nicht gegen die Regeln verst&ouml;ßen.
		</p>
		<input type="text" name="registration_name" id="registration_name" placeholder="Username" value="{USERNAME}" class="active">
		<div id="message_name"></div> 
	</div>
	<div class="section">
		<span class="title">Email</span>
		<p>
			Bitte geben Sie ein g&uuml;ltiges E-Mail ein!
		</p>
		<input type="text" name="registration_mail" id="registration_mail" placeholder="E-Mail" value="{EMAIL}" class="active">
		<div id="message_email"></div> 
	</div>
	<div class="section">
		<span class="title">Passwort</span>
		<p>
			Dein Passwort musst mindestens 6 Zeichen lang sein!
		</p>

		<input type="password" name="registration_pass" id="registration_pass" placeholder="Passwort">
		<input type="password" name="registration_passw" id="registration_passw" placeholder="Passwort Wiederholung">
		<div id="message_password"></div> 
	</div>
	<div class="section">
		<span class="title">Geschlecht</span>
		<p>
			Bitte w&auml;hlen Sie ihre Geschlecht!
		</p>
		<select name="registration_gender" id="registration_gender" class="dateselector">
			<option value="">Geschlecht</option>
			<option value="1" <!- IF GESCHLECHT == 1 ->selected<!- ENDIF ->>M&auml;nnlich</option>
			<option value="2" <!- IF GESCHLECHT == 2 ->selected<!- ENDIF ->>Weiblich</option>
		</select>
		<div id="message_gender"></div> 
	</div>
	<div class="section" id="birthday">
		<span class="title">Geburtstagsdatum</span>
		<p>
			Bitte w&auml;hlen Sie ihre g&uuml;ltige Geburtstagsdatum.
		</p>
		<select name="registrationBean_day" id="registrationBean_day" class="dateselector">
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
		<select name="registrationBean_month" id="registrationBean_month" class="dateselector">
			<option value="">Monat</option>
			<option value="1" <!- IF BITHMONTH == 1 ->selected<!- ENDIF ->>Januar</option>
			<option value="2" <!- IF BITHMONTH == 2 ->selected<!- ENDIF ->>Februar</option>
			<option value="3" <!- IF BITHMONTH == 3 ->selected<!- ENDIF ->>M&auml;rz</option>
			<option value="4" <!- IF BITHMONTH == 4 ->selected<!- ENDIF ->>April</option>
			<option value="5" <!- IF BITHMONTH == 5 ->selected<!- ENDIF ->>Mai</option>
			<option value="6" <!- IF BITHMONTH == 6 ->selected<!- ENDIF ->>Juni</option>
			<option value="7" <!- IF BITHMONTH == 7 ->selected<!- ENDIF ->>Juli</option>
			<option value="8" <!- IF BITHMONTH == 8 ->selected<!- ENDIF ->>August</option>
			<option value="9" <!- IF BITHMONTH == 9 ->selected<!- ENDIF ->>September</option>
			<option value="10" <!- IF BITHMONTH == 10 ->selected<!- ENDIF ->>Oktober</option>
			<option value="11" <!- IF BITHMONTH == 11 ->selected<!- ENDIF ->>November</option>
			<option value="12" <!- IF BITHMONTH == 12 ->selected<!- ENDIF ->>Dezember</option>
		</select>
		<select name="registrationBean_year" id="registrationBean_year" class="dateselector">
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
		</select>
		<div id="message_birthday"></div> 
	</div>
	<div class="section">
		<span class="title">Captcha</span>
		<p>
			<center><img src="{url}/inc/captcha/captcha.php" border="0" title="Captcha"><br/>
			<small><font color="#fff"> Zeigt das Captcha nicht an? Bitte Seite neu laden!</font></small></center>
		</p>
		<input type="text" name="registration_captcha" placeholder="Captcha eingeben" class="active">
	</div>
	<a class="btn red" href="{url}">Zur&uuml;ck</a>
	<input class="btns green" type="submit" value="Registrieren">
	<!- ENDIF ->
<!- ELSE ->
	<div class="logo"></div>
	<span class="title">Registrierung ist geschlossen!</span>
	<p>Kommen Sie n&auml;chstes mal wieder!</p>
	<a class="btn red" href="{url}">Zur&uuml;ck</a>
<!- ENDIF ->
</form>
</body>
</html>