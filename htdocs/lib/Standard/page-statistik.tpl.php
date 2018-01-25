<html>
<head>
<title>Hobba Statistiken</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<style>
	body { 
	font-family: 'Open Sans', sans-serif;
	line-height: 1.4em;
	font-size: 1em;
}

#wrapper {
	width: 100%;
	padding-top: 1em;
}

img {
	display: block; 
	max-width: 100%;
	margin: 0 auto;
}

.content {
	width: 1000px;
	margin: 0 auto;
	text-align: center;
}

h1 { 
	font-family: 'Open Sans', sans-serif;
font-weight: 400;
	font-size: 1.8em;
	color: #333;
	line-height: 1.2em;
	  
}

p { 
	font-family: 'Open Sans', sans-serif;
	font-size: 1.2em;
	font-weight: 300;
	color: #333;
	line-height: 1.2em;
	margin-bottom: 1.5em;

}

b { 
	color: #333; 
	text-decoration: none; 
	font-weight: 400;
}
</style>
<script type="text/javascript">
		window.onload = function(){
			var auto_refresh = setInterval(
			function ()
			{
				$('#useronline').html('');
				$('#useronline').load('{url}/inc/ajax/ajax.useronline.php').fadeIn("slow");
			}, 60000);
		}
	</script>
</head>
    <body>
        <div id="wrapper">
        <div class="content">
			<h1>HobbaIN Statistiken</h1>
                <p style="margin-bottom: 0px;">
					Hey, {USERNAME} herzlich willkommen auf der Hobba Übersicht. Hier findest du alles was im Hotel so geschieht. Sei es wie viele Taler, Duckets oder Diamanten im Umlauf sind oder, wer als letztes von welchem Staff verbannt wurde. Das alles findest du hier, in einer kleinen Übersicht.</br></br>
					
					Derzeit sind <b id="onlinecount">{ONLINE}</b> User im Hobba unterwegs. Heute haben sich außerdem haben sich bereits <b><?php 
						echo dbSelectNumRows('*', 'cms_login_logs', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m')."'");
					?></b> Hobbas im Hotel eingeloggt. Der User Rekord für heute beträgt <b><?php  
						$onlinedb = dbSelect('*', 'online_statistik', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m')."' ORDER BY useronline DESC LIMIT 1");
						$online = $onlinedb->fetch_assoc();
						if($onlinedb->num_rows <= 0){
							$onlineres = 0;
						} else {
							$onlineres = $online['useronline'];
						}
						echo $onlineres; 
					?></b> User!</br>
					Zudem sind bereits <b><?php echo dbSelectNumRows('*', 'users'); 
					?></b> User im Hobba Registriert und es wurden <b><?php echo dbSelectNumRows('*', 'rooms'); 
					?></b> Räume gefunden!  </br>
					Insgesamt wurden bereits <b><?php echo dbSelectNumRows('*', 'chatlogs'); 
					?></b> Nachrichten, im gesamten Hobba Hotel versendet!
					
					</br></br>
					Es sind bereits <b><?php echo dbSelectNumRows('*', 'users'); 
					?></b> Taler im Umlauf.</br>
					
					
				
				</p>
        </div>
        </div>

</body>
</html>