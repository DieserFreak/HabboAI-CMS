<!DOCTYPE html>
<html>
<head>
	<title>Hobba Hotel - {SEITE}: {USERNAME}</title>
	<script src="{themeurl}js/jquery.min.js"></script>

	<script src="{themeurl}flashclient/libs2.js" type="text/javascript"></script>
	<script src="{themeurl}flashclient/visual.js" type="text/javascript"></script>
	<script src="{themeurl}flashclient/libs.js" type="text/javascript"></script>
	<script src="{themeurl}flashclient/common.js" type="text/javascript"></script>
	<link rel="stylesheet" href="{themeurl}flashclient/style.css" type="text/css" />
	<link rel="stylesheet" href="{themeurl}flashclient/habboclient.css" type="text/css" />
	<link rel="stylesheet" href="{themeurl}flashclient/habboflashclient.css" type="text/css" />
	<script src="{themeurl}flashclient/habboflashclient.js" type="text/javascript"></script>
	<script type="text/javascript" src="{themeurl}flashclient/habboflashclient.js"></script>
	<script type="text/javascript" src="{themeurl}flashclient/loader_new.js"></script>
	<script type="text/javascript" src="{themeurl}js/jquery-2.1.3.min.js"></script>
	
	<link rel="icon" href="{themeurl}img/faviconn.png"/>
	
	<script type="text/javascript">
		var andSoItBegins = (new Date()).getTime();
	</script>

	<script type="text/javascript">
		var habboReqPath = "";
		var habboImagerUrl = "http://www.habbo.it/habbo-imaging/";
		var habboDefaultClientPopupUrl = "{url}/client";
	</script>

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

	<script type="text/javascript">
		var flashvars = {
			"client.allow.cross.domain" : "1", 
			"client.notify.cross.domain" : "0", 
			"connection.info.host" : "{ip}", 
			"connection.info.port" : "{port}",
			"site.url" : "{url}/", 
			"url.prefix" : "{url}/", 
			"client.reload.url" : "{url}/client", 
			"client.fatal.error.url" : "{url}/client/error",
			"client.connection.failed.url" : "{url}/client/error",
			"external.variables.txt" : "{url}/{base}/{external_vars}", 
			"external.texts.txt" : "{url}/{base}/{external_flash}", 
			"productdata.load.url" : "{url}/{base}/{productdata}", 
			"furnidata.load.url" : "{url}/{base}/{furnidata}",
			"use.sso.ticket" : "1", 
			"new.identity" : "0", 
			"sso.ticket" : "{USERAUTH}", 
			"processlog.enabled" : "0", 
			"account_id" : "{USERID}", 
			"client.starting" : "Bitte warten {USERNAME}! Hobba Hotel wird geladen...", 
			"client.hotel_view.image.url" : "{url}/{base}/c_images/hotel_view_images_hq/habbogt.gif", 
			"flash.client.url" : "{url}/{base}/gordon/", 
			"user.hash" : "{clienthash}", 
			"has.identity" : "1", 
			"flash.client.origin" : "popup" 
		};
		var params = {
			"base" : "{url}/{base}/gordon/",
			"allowScriptAccess" : "always",
			"menu" : "false",
			"bgcolor" : "#000",
			"wmode" : "opaque"        
		};


		FlashExternalInterface.signoutUrl = "{url}/logout";

		var clientUrl = "{url}/{base}/gordon/{habbo_swf}";

		swfobject.embedSWF(clientUrl, "flash-container", "100%", "100%", "10.0.0", "hhnewloader/expressInstall.swf", flashvars, params);
		window.onbeforeunload = unloading;
		function unloading() {
			var clientObject;
			if (navigator.appName.indexOf("Microsoft") != -1) {
				clientObject = window["flash-container"];
			} else {
				clientObject = document["flash-container"];
			}
			try {
				clientObject.unloading();
			} catch (e) {}
		}
			//window.onresize = DoResize;
		window.onload = DoResize; 
	</script> 
</head>

<body id="client" class="flashclient">
<div style="width:100%;height:45px;background-image: url('{themeurl}/img/client_bar.png');">
	<div style="padding: 10px 7px 7px 7px;font-family:Impact;font-size:19px;color: #FFFFFF;text-shadow: 0 0 5px #fff;">
		<div style="width:33%;float:left;">
			<div style="float:left;padding-left:5px;width:64px;height:64px;margin-bottom:-8px;margin-top:-30px;margin-left:-8px;background: url(https://www.habbo.com/habbo-imaging/avatarimage?figure={USERAVATAR}&direction=2&head_direction=3&gesture=sml&action=stand);"></div>Willkommen, {USERNAME}
		</div>
		<div style="width:33%;float:left;">
		<center><b id="useronline">{ONLINE}</b> User online</center>
		</div>
		<div style="width:33%;float:left;text-align:right;">
			<!- IF USERRANK > 8 -><a href="#gbox"><img src="{themeurl}img/gbox.png" style="margin-top:-5px;"></a><!- ENDIF ->
			
			<script type="text/javascript" src="{themeurl}/js/radio.js"></script>
			<script type="text/javascript">
			MRP.insert({
			'url':'http://sc1.mirco-d.de:8500/;stream.nsv&amp;type=mp3&amp;autostart=true',
			'codec':'mp3',
			'volume':50,
			'autoplay':true,
			'buffering':1,
			'title':'LiveRadio',
			'bgcolor':'#23201B',
			'skin':'ffmp3-substream',
			'width':180,
			'height':30
			});
			</script>
		</div>
	</div>
</div>
	
<script type="text/javascript">
	jjLoader.init('client', 6, '{themeurl}/img/habbo_logopng', '{themeurl}/img/habbo_load.png');
</script>

<!- IF USERRANK > 8 ->
<div id="gbox">
	<div class="modal-content">
		<div class="header">
			<h2>Grußbox</h2>
			<a href="#" class="btn" style="margin-top:-40px;">Schließen</a>
		</div>
		<div class="copy">
			<p>Grußbox folgt ...</p>
		</div>
		<div class="cf footer"></div>
	</div>
	<div class="overlay"></div>
</div>
<!- ENDIF ->
<?php /*
<div class="jbox"> onclick="document.getElementById('alert-info').style.display = 'block'"
	<div id="alert-info" class="alert">
		<div class="titel">Nachricht vom Hotelmanagement</div>
		<div onclick="document.getElementById('alert-info').style.display = 'none'" class="close"></div>
		<div id="AlertTxt" class="text">
			Text
		</div>
		<div onclick="document.getElementById('alert-info').style.display = 'none'" class="button">Fenster schlie&szlig;en</div>
	</div>
</div>

<div class="jbox"> onclick="document.getElementById('alert-event').style.display = 'block'"
	<div id="alert-event" class="event">
		<div class="titel">Eventalert</div>
		<div onclick="document.getElementById('alert-event').style.display = 'none'" class="close"></div>
		<div style="clear: both;"></div>
		<div class="figur"></div>
		<div id="EventTxt" class="text">
			Text
		</div>
		<div class="brk"></div>
		<div onclick="document.getElementById('alert-event').style.display = 'none'; $.get('link', function(data) {})" class="input">
			<div class="input-text">Event teilnehmen</div>
		</div>
		<div onclick="document.getElementById('alert-event').style.display = 'none'" class="input">
			<div class="input-text">Schlie&szlig;en</div>
		</div>
	</div>
</div>
*/ ?>

<div style="position:absolute;left: 50%;">
	<div style="position: relative; left: -50%;z-index:5;"> <?php // border-style: dashed;border-color:#000000;border-width: 0px 1px 1px 1px;width:468px;height:60px; ?>
		<center>
		<!-- Werbung ab HIER -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Homepage Kleine Leader -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:468px;height:60px"
			 data-ad-client="ca-pub-6306576350171350"
			 data-ad-slot="9507835623"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<!-- Werbung ENDE -->
		</center>
	</div>
</div>
<div id="overlay"></div>
<div id="client-ui" >
	<div id="flash-wrapper">
		<div id="flash-container">
			<div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
				<div class="cbb clearfix">
					<h2 class="title">Bitte Adobe Flash Player auf die neueste Version upgraden</h2>
				</div>
			</div>
			<script type="text/javascript">
				$('content').show();
			</script>
			<noscript>
				<div style="width: 400px; margin: 20px auto 0 auto; text-align: center">
					<p>Wenn Sie nicht automatisch weitergeleitet werden, bitte <a href="/client/nojs">hier klicken</a></p>
				</div>
			</noscript>
		</div>
	</div>
	<div id="content" class="client-content"></div>            
</div>
</body>