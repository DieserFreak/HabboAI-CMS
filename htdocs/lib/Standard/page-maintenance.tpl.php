
  <head>
    <title>Habbo:: Wartungsarbeit</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
<style>body {margin:0;text-align:center;color:white;font-family:'Roboto';}#body_bg{background-color:#e74c3c;animation: bg_color 30s infinite;-webkit-animation: bg_color 30s infinite;}@-webkit-keyframes bg_color {0% { background-color: #693030; }12% { background-color: #654e32; }24% { background-color: #59582f; }36% { background-color: #446734; }48% { background-color: #306348; }60% { background-color: #336165; }72% { background-color: #282f4d; }84% { background-color: #45315d; }96% { background-color: #5d2c51; }100% { background-color: #693030; }}@keyframes bg_color {0% { background-color: #693030; }12% { background-color: #654e32; }24% { background-color: #59582f; }36% { background-color: #446734; }48% { background-color: #306348; }60% { background-color: #336165; }72% { background-color: #282f4d; }84% { background-color: #45315d; }96% { background-color: #5d2c51; }100% { background-color: #693030; }}body .wrapper {position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;width: 1000px;height: 300px;}body .wrapper .logo {position: relative;margin: auto;background-image: url(https://habboo-a.akamaihd.net/habbo-web/america/de/assets/images/sprite.fd8a8fba.png);background-position: 0 0;width: 197px;height: 73px;}</style>
  <body id="body_bg">
    <section class="wrapper">
      <section class="logo"></section>
      <p style="font-size: 30px;">| #Wartungsarbeit</p>
    </section>
  </body><embed src="musik.mp3" autostart="true" loop="true" hidden="true" height="0" width="0">
</html>
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