<!DOCTYPE html>
<html>
<head>
	<title>Hobba - {slogan}</title>
	<link href="{themeurl}frontpage/index.css" rel="stylesheet" type="text/css">
	<link href="{themeurl}frontpage/inputs.css" rel="stylesheet" type="text/css">
	<script src="{themeurl}js/jquery.min.js"></script>
	<script type="text/javascript" src="{themeurl}js/register.js"></script>
	<link rel="icon" href="{themeurl}img/faviconn.png"/>
</head>
<body>
<div id="contenido">
	<img src="{themeurl}img/habbo_logo.png"><br>
	
	<!- IF ERROR ->
	<div id="contenido">
		<div id='box' style='background-color: #7B3D3D; margin-bottom: 10px;'>
			<center>
		<!- IF ERROR == 1 ->	Username nicht ausgef&uuml;llt
		<!- ELSEIF ERROR == 2 ->	Der Username oder das E-Mail existiert nicht bzw. sind nicht richtig
		<!- ELSEIF ERROR == 3 ->	Die E-Mail Nachricht wird versandt
		<!- ELSEIF ERROR == 4 ->	Das Passwort muss mindestens 6 Zeichen lang sein
		<!- ELSEIF ERROR == 5 ->	Die Passw&ouml;rter sind nicht gleich
		<!- ENDIF ->
			</center>
		</div>
	</div>
	<!- ENDIF ->
	
	<div id="box" style="border-top: 6px solid #00a8ec;" class="flash animated">
		<font style="float: right;"><a href="{url}">Zur&uuml;ck</a></font>
		<!- IF CODE ->
			<font size="5px">Neue Passwort</font><br>
			<p>Bitte geben Sie neue Passwort ein!</p>
		<!- ELSE ->
			<font size="5px">Passwort vergessen</font><br>
			<p>Bitte geben Sie ihr Username ein!</p>
		<!- ENDIF ->
		<div class="h-forget"></div>
		<form id="forgot" method="post">
		<!- IF CODE ->
			<input type="password" name="pw_passwort" id="pw_passwort" placeholder="Passwort"><br />
			<input type="password" name="pw_passwort2" id="pw_passwort2" placeholder="Passwort wiederholen"><br />
			<input type="submit" value="&Auml;ndern">
		<!- ELSE ->
			<input type="text" name="pw_username" id="pw_username" placeholder="Username"><br />
			<input type="text" name="pw_email" id="pw_email" placeholder="E-Mail"><br />
			<input type="submit" value="Senden">
		<!- ENDIF ->
		</form>
	</div>
	<div id="columna3">
		<div id="columna3">
			<div id="box" style="margin-bottom: 10px;height: 38px; background-repeat: no-repeat; background-position: 110px;">
				<img src="{themeurl}img/habbo_logo.png">
				<div style="float: right; color: #A0A0A0; text-shadow: 0px 1px 0px #000000;">{copyright}
				</div>
			</div>
		</div>
		<center>{footeradv}</center>
	</div>
</div>
</body>
</html>