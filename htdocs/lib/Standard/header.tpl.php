<!DOCTYPE html>
<html>
<head>

	<title>Hebbo - {slogan}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<body oncontextmenu="return false">
	<link type="text/css" rel="stylesheet" href="{themeurl}dbox/rem/grid.css">
	<script src="/lib/standard/img/jquery.js"></script>
	<link rel="stylesheet" href="{themeurl}dbox/rem/hover.css" type="text/css" />
    <link rel="stylesheet" href="{themeurl}dbox/rem/animate.css" type="text/css" />
	<script src="{themeurl}js/jquery.min.js"></script>
	<script src="{themeurl}js/mask/jquery.inputmask.js" type="text/javascript"></script>
	<script src="{themeurl}js/lightbox.min.js"></script>
	<link href="{themeurl}dbox/rem/lightbox.css" rel="stylesheet" />
	<script type="text/javascript" src="{themeurl}js/stafflist.js"></script>
<link rel="icon" href="/favicon.ico"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="{themeurl}dbox/rem/b29e71b33c3c5b6ac85a204d795e64f3.css">
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

</script>
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

<script src="http://habbo.gy/snowstorm.js"></script>

    <header id="header_top">
        <div class="container_12">
             <div class="grid_4">
                <a href="/me.php"><div class="logo"></div></a>

					<div class="farbenspiel" style="background-image: url(/lib/standard/img/neu/farbenspiel/farbs4.png)"></div> 


               
                <div id="onlinecounter">Es sind <font id="useronline"><b>{ONLINE}</b></font> {name}s online!</div>
            </div>
                </div>
            <div class="grid_4">
            </div>
            <div class="grid_4">
			<div class="section" style="float: right;margin-right: -50px;margin-left: 115px;">
                   <a href="/client.php" target="_blank" style="text-decoration:none;color:#fff;"><div class="checkin" style="margin-top: 135px;">Einchecken</div></a>
                </div>
            </div>
        </div>
    </header>
<div id="navigator">
    <div class="dar">
        <div class="container_12">
            <div class="grid_12" style="height: 70px;">  
                <ul class="animated fadeInLeft">
                  
				  
				  <div id="navigation">
			<div class="dropdown">
				<a href="/me.php">
					<div class="nav_but">{USERNAME}<div class="me_p_arrowb"></div></div>
				</a>
				<div class="dropdown-content">
	<a href="{url}/me.php"><li>Ich</li></a>
	<a href="{url}/account.php"><li>Einstellungen</li></a>
	<a href="{url}/support.php"><li>Support</li></a>	
				</div>
			</div>
			
			<div class="dropdown">
				<a href="/community.php">
					<div class="nav_but">Community<div class="me_p_arrowb"></div></div>
				</a>
				<div class="dropdown-content">
		<a href="{url}/projektleitung.php"><li>Projektleitung</li></a>
		<a href="{url}/staffs.php"><li>Teammitglieder</li></a>
		<a href="{url}/werbeteam.php"><li>Werbeteam</li></a>
		<a href="{url}/topuser.php"><li>Top User</li></a>
		<a href="{url}/rules.php"><li>Regeln</li></a>
				</div>
			</div>
			
						<div class="dropdown">
				<a href="/news.php">
					<div class="nav_but">News<div class="me_p_arrowb"></div></div>
				</a>
				<div class="dropdown-content">
					<a href="{url}/news.php"><li>News</li></a>
				</div>
			</div>
			
			<script src="snowstorm.js"></script>
			
			<div class="dropdown">
				<a href="/credits.php">
					<div class="nav_but">Shop<div class="me_p_arrowb"></div></div>
				</a>
				<div class="dropdown-content">
					<a href="{url}/credits.php"><li>Taler</li></a>
	<a href="{url}/dias.php"><li>Diamanten</li></a>
	<a href="{url}/vip.php"><li>Zauberkisten</li></a>
	<a href="{url}/error.php"><li>Badgecreator</li></a>
	<a href="{url}/magicwired.php"><li>Magic Wired</li></a>
	<a href="{url}/poll.php"><li>NEU: Umfragensystem</li></a>

				</div>
			</div>
				  
                
                    <div style="float: right;">
                        <!- IF USERRANK >= hkrank -><a href="{url}{hkurl}"><li><i class="fa fa-wrench fa-lg"></i><font style="padding-left: 10px;">ACP</font></li></a><!- ENDIF ->
                        
                       <a href="/account.php"><li data-tooltip="Einstellungen"><i class="fa fa-gear fa-lg"></i></li></a>
                        <a href="{url}/logout.php"><li data-tooltip="Abmelden"><i class="fa fa-power-off fa-lg"></i></li></a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
 </div>
</div>
<div style="clear:both;"></div>

