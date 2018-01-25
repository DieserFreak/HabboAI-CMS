<!DOCTYPE html>
<html>
<head>
	<title>Hobba - {slogan}</title>
	<link href="{themeurl}frontpage/index.css" rel="stylesheet" type="text/css">
	<link href="{themeurl}frontpage/inputs.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="{themeurl}img/faviconn.png"/>
</head>
<body>
<div id="contenido">
	<img src="{themeurl}img/habbo_logo.png"><br>
	<!- IF ERROR ->
	<div id="contenido">
		<div id='box' style='background-color: #7B3D3D; margin-bottom: 10px;'>
			<center>
		<!- IF ERROR == 1 ->	Nicht alle ausgef&uuml;llt
		<!- ELSEIF ERROR == 2 ->	Die Daten stimmen nicht &uuml;berein
		<!- ELSEIF ERROR == 3 ->	Du bist gebannt! Der Grund lautet "{BANREASON}" und l&auml;uft noch bis zum {BANTIME}
		<!- ELSEIF ERROR == 4 ->	Erfolgreich ausgeloggt
		<!- ELSEIF ERROR == 5 ->	Passwort erfolgreich ge&auml;ndert
		<!- ENDIF ->
			</center>
		</div>
	</div>
	<!- ENDIF ->
	<div id="columna_l" class="flash animated">
		<div id="box" style="border-top: 6px solid #00a8ec;padding-bottom:22px;">
			<font size="5px">Login</font> <small><a href="{url}/forget">Passwort vergessen?</a></small>
			<form action="" method="post">
			<input name="l_username" placeholder="Username" type="text">
			<input name="l_passwort" placeholder="Passwort" type="password">
			<input name="submit" value="EINLOGGEN" type="submit">
			</form>
		</div>
	</div>
	<div id="columna2">
		<div id="box" style="border-top: 6px solid #e74c3c;">
			<font size="4px">Warum HabboGT?</font><br>
			<p align="justify">HabboGT ist ein Hotel mit hohen Sicherheitsstandarts. Natürlich kommt der Spaß nicht zu kurz: tägliche Events, eine coole Community, ein organisiertes Team und die beste Technik bringen dir freude im Alltag.</p>
		</div>
		<div id="box" style="padding: 0;">
			<div class="ons">
			<b>{ONLINE}</b><br>ONLINE
			</div>
		</div>
	</div>
	<div id="columna3">
		<div id="box" style="padding: 0;">
			<div class="habbos">
				<input onclick="location.href='{url}/register'" value="KOSTENLOS REGISTRIEREN" type="submit">
			</div>
		</div>
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