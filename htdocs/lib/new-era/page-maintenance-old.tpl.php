<!DOCTYPE html>
<html>
<head>
<title>Hobba - {slogan}</title>
<link type="text/css" rel="stylesheet" href="{themeurl}css/habbo.out.css">
<link rel="icon" href="{themeurl}img/faviconn.png"/>
</head>
<body>
<div id="habbo-hotel-image">
</div>
<form id="login" action="" method="post">
	<div class="logo"></div>
	
	<span class="title">Wartungsarbeit</span>
	<p>{REASON}</p>
	
<!- IF ADMLOGIN == 1 ->
	<br /><br /><br /><br /><br />
	<!- IF ERROR ->
	<div class="message error vampire">
	<!- IF ERROR == 1 ->	Nicht alle ausgef&uuml;llt!
	<!- ELSEIF ERROR == 2 ->	Die Daten stimmen nicht &uuml;berein!
	<!- ELSEIF ERROR == 3 -> Nur Mitarbeiter k&ouml;nnen einloggen!
	<!- ENDIF ->
	</div>
	<!- ENDIF ->
	<p>Nur die Mitarbeiter haben Zugang!</p>
	<input type="text" name="ml_username" placeholder="Username" class="active">
	<input type="password" name="ml_passwort" placeholder="Passwort">
	<input class="btns green" type="submit" value="Einloggen">
<!- ENDIF ->
</form>
</body>
</html>