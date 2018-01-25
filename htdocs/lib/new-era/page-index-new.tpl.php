<!DOCTYPE html>
<html>
<head>
	<title>Hobba - {slogan}</title>
	<link type="text/css" rel="stylesheet" href="{themeurl}css/habbo.out.css">
	<script src="{themeurl}js/jquery.min.js"></script>
	<link rel="icon" href="{themeurl}img/faviconn.png"/>
</head>
<body>
<div id="habbo-hotel-image">
</div>
<form id="login" action="" method="post">
	<div class="logo"></div>
	
	<span class="title">Einloggen</span>
	<p>Bitte geben Sie ihre Daten ein!</p>
	
<!- IF ERROR ->
	<div class="message error vampire">
	<!- IF ERROR == 1 ->	Nicht alle ausgef&uuml;llt
	<!- ELSEIF ERROR == 2 ->	Die Daten stimmen nicht &uuml;berein
	<!- ELSEIF ERROR == 3 ->	Du bist gebannt! Der Grund lautet "{BANREASON}" und l&auml;uft noch bis zum {BANTIME}
	<!- ELSEIF ERROR == 4 ->	Erfolgreich ausgeloggt
	<!- ELSEIF ERROR == 5 ->	Passwort erfolgreich ge&auml;ndert
	<!- ENDIF ->
	</div>
<!- ENDIF ->

	<input type="text" name="l_username" placeholder="Username" class="active">
	<input type="password" name="l_passwort" placeholder="Passwort">
	<div class="help">
		<span class="title">Hilfe?</span>
		<a href="{url}/forget">Passwort vergessen</a><br />
		<a href="{url}/register">Registrieren</a>
	</div>
	<input class="btns green" type="submit" value="Einloggen">
</form>
</body>
</html>