<!DOCTYPE html>
<?php
include('../../../classes/Config.php');
include('../../../classes/Mysqli.php');
include('../../../classes/FunctionsManager.php');
include('../../../classes/UserManager.php');
?>
<!--<html lang="en">-->
<html lang="en" manifest="cache.manifest">
<head>
	<meta charset="utf-8" />
	<title>Pacman in Kabbo</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="pacman-canvas.css">
	
	<!-- SEO Stuff -->
    <meta name="description" content="Kabbo.LI Pacman" />
    <link rel="canonical" href="http://pacman.kabbo.li/" />
    <meta name="author" content="Kabbo.LI" />
    <meta name="publisher" content="Kabbo.LI" />
    <meta name="copyright" content="&copy; Copyright (c) Kabbo.LI" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="content-language" content="de">
    <meta name="language" content="de">
    <meta name="page-topic" content="Games/Arcade" />

    <meta content="National" name="distribution" />
    <meta content="pacman.platzh1rsch.ch" name="target" />

   	<!-- Facebook Open Graph Information -->
	<meta property="og:image" content="http://pacman.platzh1rsch.ch/img/Icon-200x200.png"/>
    <meta property="og:title" content="Pacman Canvas in HTML5" />
	<meta property="og:description" content="Play Pacman Canvas for free on your desktop or mobile. This whole game is open source an was created in HTML5." />
    <meta property="og:url" content="http://pacman.platzh1rsch.ch/" />
    <meta property="og:site_name" content="Pacman Canvas in HTML5" />
	<meta property="og:locale" content="en_US" />

	<!-- site icons -->
	<link rel="shortcut icon" href="img/Icon-130x130.png" />
	<link rel="apple-touch-icon" href="img/Icon-130x130.png" />

    <meta property="og:image" content="http://kabbo.li/img/Icon-130x130.png"/>

	<!-- AppsFuel verification code -->
	<meta name="appsfuel_code" content="83d3cedc1050a5c"/>
	
	<!-- Mobile Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	
	<!-- Apple Mobile Web Capability -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<!-- Script -->
	<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.hammer.min.js" type="text/javascript"></script>
	
	
</head>

<body>

<div class="container">
<div class="main">


<!-- Display this message if Javascript is disabled -->
<noscript>
<h2>Enable Javascript!</h2>
<p>This HTML 5 app requires Javascript to run. Please check that Javascript is enabled in your browser.</p>
</noscript>

<!-- Highscore -->
<div class="content" id="highscore-content">
	<div class="button" id="back">&lt; back</div>
	<div>
		<h1>Highscore</h1>
		<p>
				 <div id="highscore-list">
                            <div style="text-align: center;margin-top: -30px;width: 100%;height: 30px;line-height: 20px;font-size: 20px;">Kabbo.LI Highscore</div>
                            <?php
                            $get_highscore = $mysqli->query("SELECT * FROM user_gamescore WHERE game_id = 'pacman' ORDER BY score DESC LIMIT 5");
                            while ($row = $get_highscore->fetch_object()) {
                                ?>
                                <div style="width: 100%;height: 50px;">
                                    <a href="<?php echo $path; ?>/home!<?php echo UserIDDB($row->user_id, 'username'); ?>" target="_blank">
                                        <div style="background: url('<?php echo $path; ?>/public/games/flappybird/assets/avatarbg.png') no-repeat;width: 54px;height: 50px;float: left;">
                                            <div style="height: 50px;width: 54px; background: url('<?php echo $avatar.UserIDDB($row->user_id, 'look'); ?>&headonly=true') no-repeat; background-position: 50% -5px;"></div>                          
                                        </div>
                                    </a>
                                    <username style="width: 130px;float: left;font-size: 17px;color: #FC7858;margin-top: 5px;margin-left: 10px;"><?php echo UserIDDB($row->user_id, 'username'); ?></username>
                                    <score style="float: left;font-size: 15px;color: #FC7858;margin-top: 2px;margin-left: 10px;">Score: <?php echo $row->score; ?></score>
                                </div>


                            <?php } ?>
							</div>
		</p>
	</div>
</div>




<!-- main game content -->
<div class="content" id="game-content">

	
	
	<!-- main game content -->
	<div class="game wrapper">
	
		<div class="score">Score:</div>
		<div class="level">Lvl:</div>
		<div class="lives">Leben: </div>
		
		<div class="controlSound">
			<img src="img/audio-icon-mute.png" id="mute">
		</div>
		<!-- canvas is splitted into 18x13 fields -->
		<div id="canvas-container">
			<div id="canvas-overlay-container">
				<div id="canvas-overlay-content">
					<div id="title">Kabbo Pacman</div>
					<div><p id="text">Click to Play</p></div>
				</div>
			</div>
			<canvas id="myCanvas" width="540" height="390">
			<p>Pacman not supported</p>
			</canvas>
		</div>

		<div class="controls" id="game-buttons">
		<!-- Will be moved to Instructions 
		<p class="nomobile">Use W-A-S-D keys to navigate Pac-Man</p>
		-->
		
			<!-- OLD Buttons -->
			<div>
				<span id="up" class="controlButton">&uarr;</span>
			</div>
			<div>
				<span id="left" class="controlButton">&larr;</span>
				<span id="down" class="controlButton">&darr;</span>
				<span id="right" class="controlButton">&rarr;</span>
			</div>
			
		</div>
		<!-- inGame Controls End -->
		
		<!-- Game Menu -->		
		<div class="controls" id="menu-buttons">
			<ul>
				<li class="button" id="newGame">New Game</li>
				<li class="button" id="highscore">Highscore</li>
			</ul>
			
		</div>
		<!-- Game Menu End -->
		
	</div>
		
		
		<span id="audio">
			<audio id="theme" preload="auto">
				<source src="wav/theme.wav" type="audio/wav">
				<source src="mp3/theme.mp3" type="audio/mpeg">
			</audio>
			<audio id="waka" preload="auto">
				<source src="wav/waka.wav" type="audio/wav">
				<source src="mp3/waka.mp3" type="audio/mpeg">
			</audio>
			<audio id="die" preload="auto">
				<source src="wav/die.wav" type="audio/wav">
				<source src="mp3/die.mp3" type="audio/mpeg">
			</audio>
			<audio id="powerpill" preload="auto">
				<source src="wav/powerpill.wav" type="audio/wav">
				<source src="mp3/powerpill.mp3" type="audio/mpeg">
			</audio>
		</span>
		
		
	</div>

</div>
</div>
</div>

	<script src="pacman-canvas.js" type="text/javascript"></script>


</body>
</html>
