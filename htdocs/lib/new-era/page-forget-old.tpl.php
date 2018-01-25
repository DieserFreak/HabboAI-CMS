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
<form id="forgot" action="" method="post">
	<div class="logo"></div>

<!- IF CODE ->
	<span class="title">Neue Passwort</span>
	<p>Bitte geben Sie neue Passwort ein!</p>
<!- ELSE ->
	<span class="title">Passwort vergessen</span>
	<p>Bitte geben Sie ihr Username und E-Mail ein!</p>
<!- ENDIF ->

<!- IF ERROR ->
	<div class="message error vampire">
	<!- IF ERROR == 1 ->	Username nicht ausgef&uuml;llt
	<!- ELSEIF ERROR == 2 ->	Der Username oder das E-Mail existiert nicht bzw. sind nicht richtig
	<!- ELSEIF ERROR == 3 ->	Die E-Mail Nachricht wird versandt
	<!- ELSEIF ERROR == 4 ->	Das Passwort muss mindestens 6 Zeichen lang sein
	<!- ELSEIF ERROR == 5 ->	Die Passw&ouml;rter sind nicht gleich
	<!- ENDIF ->
	</div>
<!- ENDIF ->

<!- IF CODE ->
	<div id="message_password"></div> 
	<input type="password" name="pw_passwort" id="pw_passwort" placeholder="Passwort" class="active">
	<input type="password" name="pw_passwort2" id="pw_passwort2" placeholder="Passwort wiederholen">
	<input class="btns green" type="submit" value="&auml;ndern">
<!- ELSE ->
	<div id="message_name"></div> 
	<input type="text" name="pw_username" id="pw_username" placeholder="Username" class="active">
	<input type="text" name="pw_email" id="pw_email" placeholder="E-Mail" class="active">
	<input class="btns green" type="submit" value="Senden">
<!- ENDIF ->
</form>
</body>
</html>