<!DOCTYPE html>
<html>
<head>
	<title>Hobba Hotel - {SEITE}</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="{themeurl}css/style.css" rel="stylesheet" type="text/css">
	<script src="{themeurl}js/jquery.min.js"></script>
	<script src="{themeurl}jqueryui/jquery-ui.js"></script>
	<link type="text/css" rel="stylesheet" href="{themeurl}jqueryui/jquery-ui.css">
	<script src="{themeurl}js/mask/jquery.inputmask.js" type="text/javascript"></script>
	<script src="{themeurl}js/lightbox.min.js"></script>
	<link href="{themeurl}css/lightbox.css" rel="stylesheet" />
	<script type="text/javascript" src="{themeurl}js/stafflist.js"></script>
	<link rel="icon" href="{themeurl}img/faviconn.png"/>
<!- IF NEWS == 1 ->
	<script src="{themeurl}js/jquery.slides.min.js"></script>
	<script>
		$(function() {
		  $('#slides').slidesjs({
			width: 940,
			height: 528,
			navigation: {
			  effect: "fade"
			},
			pagination: {
			  effect: "fade"
			},
			effect: {
			  fade: {
				speed: 500
			  }
			},
			play: {
			  interval: 3000,
			  auto: true,
			  effect: "fade",
			  pauseOnHover: false,
			}
		  });
		});
	</script>
<!- ENDIF ->
</head>
<body>
	<nav id="navigation">
		<div id="left">
			<ul>
				<li>
					{USERNAME}
					<ul>
						<a href="{url}/me"><li>Startseite</li></a>
						<a href="{url}#"><li>Profilseite</li></a>
						<a href="{url}/account"><li>Einstellungen</li></a>
						<a href="{url}/support"><li>Hilfe!</li></a>
					</ul>
				</li>
				<li>
					Community
					<ul>
						<a href="{url}/community"><li>Community</li></a>
						<a href="{url}/community/staffs"><li>Mitarbeiter</li></a>
						<a href="{url}/community/topuser"><li>Topuser</li></a>
						<a href="{url}/community/lotto"><li>Lotto</li></a>
						<a href="{url}/community/social"><li>Soziales Netzwerk</li></a>
						<a href="{url}/community/rules"><li>Regeln</li></a>
					</ul>
				</li>
				<li>
					Shop
					<ul>
						<a href="{url}/shop/credits"><li>Taler</li></a>
						<a href="{url}/shop/dias"><li>Diamanten</li></a>
						<a href="{url}/shop/vip"><li>Hobba VIP</li></a>
						<a href="{url}/shop/badges"><li>Badges</li></a>
						<a href="{url}/shop/poll"><li>Umfrage</li></a>
						<a href="{url}/shop/rooms"><li>Räume</li></a>
					</ul>
				</li>
				<a href="{url}/news"><li>News</li></a>
				<li>Preisliste</li>
			</ul>
		</div>
		<div id="right">
			<ul>
				<a href="{url}/logout"><li>Ausloggen</li></a>
				<!- IF USERRANK >= hkrank -><a href="{url}{hkurl}"><li>Housekeeping</li></a><!- ENDIF ->
			</ul>
		</div>
	</nav>
	<header id="header">
		<div id="check">
			<a href="{url}/client"><div id="button">Ab ins Habbo!</div></a>
			<div id="online"><!- IF SERVERSTATUS == 0 -> Server ist offline!<!- ELSE -> {ONLINE} User online<!- ENDIF -></div>
		</div>
	</header>
	<section id="section">	
		<div id="column" style="width:100%">
			<!- IF WARTUNGSMODUSSTATUS == 1 ->
			<div id="content">
				<div id="warning" style="text-align: center;font-weight: bold;">
					Wartungsmodus ist aktiviert
				</div>
			</div>
			<!- ENDIF ->

			<!- IF sitealert != -/- ->
			<div id="content">
				<div id="warning" style="text-align: center;">
					{sitealert}
				</div>
			</div>
		</div>
		<!- ENDIF ->