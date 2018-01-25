<!DOCTYPE html>
<html>
    
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<head>
        <title>{name}: Deine virtuelle Welt!</title>
        <link rel="shortcut icon" href="lib/standard/index/lib/standard/index/public/images/favicond1bd.ico?2.0" type="image/vnd.microsoft.icon">
        <meta charset="UTF-8">
        <meta name="author" content="Revue">
        <meta name="viewport" content="width=device-width, initial-scale=0.5">
        <meta name="google-site-verification" content="fuYJa8ZlSaoo8xN0G0Eoz5b5djsBSNSk-7U6E6rBJWo" />
		<meta property="og:image" content="http://habbo.gy/lib/standard/img/facebookmeta.png" />
		<meta name="title" content="Habbo.gy">
		<meta name="description" content="Habbo ist eine virtuelle Welt für Kinder und Jugendliche. Treffe neue und alte Freunde, baue tolle Räume und werde berühmt!">

        <script src="/lib/standard/index/public/js/jquery-1.6.1.js" type="text/javascript"></script>
        <script src="/lib/standard/index/public/js/jquery-ui.js" type="text/javascript"></script>
		<link rel="stylesheet" href="/lib/standard/css/animate.css">


       <meta name="rccount" content="{ONLINE}" />


        <meta name="title" content="{name} Hotel">
        <meta name="description" content="{name}: Deine virtuelle Welt! Registriere dich kostenlos und knüpfe neue Freundschaften.">
        <meta name="language" content="de">
        <meta name="robots" content="index, follow">


        <style>
            @import url(http://fonts.googleapis.com/css?family=Ubuntu:400,500,300,700);
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800);


            body {
                
				background: url(/lib/standard/img/neu/incon/bg_rooms.png);
				background-repeat: no-repeat;
				background-position: right bottom;
				background-attachment: fixed;
				background-color: #ecebeb;

                font-family: Open Sans;
                margin: 0px;
                margin-top: 20px;
                width: 100%;
            }

            body section {
                width: 900px;
                height: 600px;
                margin: 0px auto;
            }

            body section error {
                display: block;
                width: calc(100% - 20px);
                margin-bottom: 10px;
                padding: 10px;
                border-radius: 4px;
                border-bottom: 2px solid rgba(0, 0, 0, 0.2);
                text-align: center;
            }

            body section error.error {
                background: #c0392b;
                color: #FFF;
                font-size: 13px;
            }

            body section error.success {
                background: #27ae60;
                color: #FFF;
                font-size: 13px;

            }

            body section header {
                width: 100%;
                height: 105px;
                background: #FFF;

                border-radius: 5px;
                border-bottom: 3px solid #E4E4E4;
            }

            body section header #logo {
               width: 210px;
                height: 100px;
                background: url(/sprite.fd8a8fba.png) 50% 50% no-repeat;
				margin-left: 10px;
            }

            body section header #login {
                float: right;

                width: 600px;
                height: 82px;
                background: #F4F4F4;

                margin-top: 10px;
                padding-top: 3px;
                margin-right: 10px;
                border-radius: 4px;
                border-bottom: 2px solid rgba(0, 0, 0, 0.05);

            }

            body section header #login table {
                width: calc(100% - 20px);
                height: 80px;
                margin-left: 10px;
            }

            body section header #login table tr td {
                font-size: 14px;
            }

            input.form-control,
            body section header #login table input.input {
                height: 30px;
                background: #FFF;
                border-radius: 4px;
                border: 1px solid #E4E4E4;
                border-bottom: 1px solid #E4E4E4;
                width: 200px;
                padding-left: 10px;
            }

            input.form-control {
                margin-bottom: 20px;
            }

            .lead.text-muted  {
                font-size: 13px;
            }

            button.btn,
            body section header #login table input.submit {
                width: 130px;
                height: 33px;
                margin-top: 19px;

                color: #FFF;
                border-radius: 4px;
                background: #3498DB;
                border: 0px;
                border-bottom: 2px solid rgba(0, 0, 0, 0.2);
                font-size: 13px;
                cursor: pointer;
            }

            button.btn {
                margin-top: 0px;
                width: 170px;
            }

            body section main#register #box {
                background: #FFF;
                float: left;

                padding: 10px;
                margin-right: 10px;
                margin-top: 10px;


                border-radius: 5px;
                border-bottom: 3px solid #E4E4E4;
                font-size: 14px;
            }

            body section main#register #box .title {
                font-size: 18px;
                height: 50px;
                line-height: 50px;
            }

            body section main#register #box input.input,
            body section main#register #box select.input {
                height: 30px;
                background-color: #FFF;
                border-radius: 4px;
                border: 1px solid #E4E4E4;
                border-bottom: 1px solid #E4E4E4;
                width: calc(100% - 30px);
                padding-left: 30px;
            }

            body section main#register #box select.input {
                width: 100%;
                height: 35px;
                padding-left: 20px;
            }

            body section main#register #box input.submit {
                width: 130px;
                height: 33px;
                float: right;

                color: #FFF;
                border-radius: 4px;
                background: #27ae60;
                border: 0px;
                border-bottom: 2px solid rgba(0, 0, 0, 0.2);
                font-size: 13px;
                cursor: pointer;
            }

            .info {
                font-size: 12px;
            }

            .listening {
                width: calc(100% - 10px);
                padding: 15px;
                margin-left: -10px;
            }

            .listening.even {
                background: #F4F4F4;
            }

            .listening.even.border-bottom {
                border-radius: 0px 0px 3px 3px;
                margin-bottom: -10px;
            }

            .listening.even.border-bottom.fixed {
                height: 30px;
            }

            .listening.even.border-bottom.swal {
                margin-bottom: -20px;
                margin-left: -20px;
                width: calc(100% + 20px);
            }

            .listening b {
                font-size: 13px;
            }


            body section main#register #box input.input.good {
                background: url('lib/standard/index/public/images/register/check.gif') 10px 50% no-repeat;
                background-color: #FFF;
            }

            body section main#register #box input.input.bad {
                background: url('lib/standard/index/public/images/register/del.gif') 10px 50% no-repeat;
                background-color: #FFF;
            }


            body section main#login {
                width: calc(100% - 20px);
                height: 410px;

                margin-top: 10px;
                background: #FFF;
                border-radius: 5px;
                border-bottom: 3px solid #E4E4E4;

                padding: 10px;
            }

            body section main #bg {
                width: 100%;
                height: 100%;
                background: url("http://i.imgur.com/gB1YtEz.png") 70% 80% no-repeat;
                border-radius: 4px;
            }


            body section main .count{
                float: left;
                width: 120px;
                height: 90px;

                padding-top: 30px;

                border-radius: 500px;

                background: #FFF;
                -webkit-box-shadow: 0 0 0 8px rgba(0,0,0,0.5);
                box-shadow: 0 0 0 8px rgba(0,0,0,0.5);

                text-align: center;
                font-size: 14px;

                margin-left: 90px;
                margin-top: 150px;
            }

            body section main .count b {
                font-weight: bold;
                font-size: 22px;
            }

            body section main .graybox {
                width: 300px;
                height: 250px;

                background: rgba(0, 0, 0, 0.4);
                margin-top: 95px;
            }

            body section main .graybox.right {
                float: right;
                border-radius: 4px 0px 0px 4px;
            }

            body section main .graybox.right .title {
                color: #FFF;
                padding: 5px;
                font-size: 12px;
                text-align: center;
                background: rgba(0, 0, 0, 0.4);
            }

            body section main .graybox.right .title b{
                font-size: 15px;
            }

            body section main .graybox.right .icon {
                width: 100%;
                height: 160px;

                background: url("lib/standard/index/public/images/index/img_1.png") 50% 50% no-repeat;
            }

            body section main .graybox.left {
                float: left;

                border-radius: 0px 4px 4px 0px;
            }

            body section main .graybox.left .register {
                height: 100px;
                width: 230px;   
                background: #0aa000; /* Old browsers */
                background: #3BA800;
                background: -moz-linear-gradient(#3BA800 50%, #2C7E00 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(50%,#3BA800), color-stop(100%,#2C7E00));
                background: -webkit-linear-gradient(#3BA800 50%, #2C7E00 100%);
                background: -o-linear-gradient(#3BA800 50%, #2C7E00 100%);
                background: -ms-linear-gradient(#3BA800 50%, #2C7E00 100%);
                background: linear-gradient(to bottom, #3BA800 0%,#3BA800 50%,#2C7E00 51%,#2C7E00 100%);
                border: 3px solid #2C7E00;
                cursor: pointer;
                color: white;
                text-shadow: 0px -1px 0px black;
                font-family: Ubuntu;
                font-weight: bold;
                line-height: 35px;
                text-align: center;
                font-size: 24px;
                box-shadow: 0px 0px 3px 1px rgba(0,0,0,0.5);
                border-radius: 5px;
                float: left;
                margin-left: 30px;
                margin-top: 55px;
                padding-top: 30px;
            }

            body section main .graybox.left .register:hover {
                background: #45CB00;
                background: -moz-linear-gradient(#45CB00 50%, #339D00 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(50%,#45CB00), color-stop(100%,#339D00));
                background: -webkit-linear-gradient(#45CB00 50%, #339D00 100%);
                background: -o-linear-gradient(#45CB00 50%, #339D00 100%);
                background: -ms-linear-gradient(#45CB00 50%, #339D00 100%);
                background: linear-gradient(to bottom, #45CB00 0%,#45CB00 50%,#339D00 51%,#339D00 100%); 
                border: 3px solid #339D00;
            }


            body section footer {
                width: calc(100% - 20px);
                height: 20px;
                line-height: 20px;

                margin-top: 10px;
                background: #FFF;
                border-radius: 5px;
                border-bottom: 3px solid #E4E4E4;

                padding: 10px;
                font-size: 12px;
            }

            body section footer div.right {
                float: right;
            }

            body section footer div.right a {
                color: #000;
                text-decoration: none;
                margin-left: 5px;
                margin-right: 5px;
            }


            body div.bgbottomleft {
                position: fixed;
                left: 0px;
                bottom: 0px;
                width: 845px;
                height: 115px;

                background: url('lib/standard/index/public/images/design/xmas16/bg_lefte4da.png?5');
                z-index: -10;
            }   

            body div.bgbottomright {
                position: fixed;
                right: 0px;
                bottom: 0px;
                width: 484px;
                height: 482px;

                background: url('lib/standard/index/public/images/design/xmas16/bg_rightc81e.png?2');
                z-index: -10;
            } 



        </style>


        <script>
            $(document).ready(function () {
               
            });
        </script>
    </head>
    <body>
	
	<!- IF ERROR ->

		<!- IF ERROR == 1 ->		<script>alert("Du hast keine Anmeldedaten angegeben!")</script>
		<!- ELSEIF ERROR == 2 ->	<script>alert("Username oder Passwort falsch")</script>
		<!- ELSEIF ERROR == 3 ->	<script>alert("Dein Spieleraccount wurde aufgrund eines Regelverstoßes gesperrt!\r\rGrund: {BANREASON}\rDauer: {BANTIME}\rGebannt von: {BANSTAFF}\r")</script>
		<!- ELSEIF ERROR == 4 ->	<script>alert("Deine Sitzung wurde erfolgreich beendet.")</script>
		<!- ELSEIF ERROR == 5 ->	<script>alert("Passwort aktualisiert!\rBitte melde dich neu an.")</script>
		<!- ENDIF ->
	<!- ENDIF ->
	
	
<section>
        <header>
        <div id="login">
		<form action="index.php" method="post">
                <table>
                    <tr>
                        <td valign='top'>
                            <b>Username</b><br>
                            <input type="text" class="input" name="l_username" autofocus>
                        </td>

                        <td valign='top'>
                            <b>Passwort</b><br>
                            <input type="password" class="input" name="l_passwort"><br>
                            <small onClick="ResetPWAlert()" style="cursor: pointer;">Passwort vergessen?</small>
                        </td>

                        <td valign='top'>
                            <input type="submit" name="submit" class="submit" value="Einloggen">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

						
        <div id="logo"></div>
    </header>

    <main id="login">
        <div id="bg">
            <div class="graybox right">

                <div class="icon"></div>

                <div class="title">
                    <b>Dein Habbo Retro</b><br><br>Das {name} ist ein Habbo Retro. Du kannst hier gratis Habbo spielen und startest mit vielen Talern

                </div>
            </div>

            <div class="graybox left">
                <a href="/register.php" style="text-decoration: none;">
                    <div class="register">
                        Jetzt im {name}<br>
                        registrieren!
                    </div> 
                </a>
            </div>


            <div class="count">
                <b>{ONLINE}</b><br>
                Habbos online
            </div>


        </div>
    </main>

    <footer>
        <div class="right">
            <a href="ts3server://ts.habbo.ai?port=9987" target="_blank">Teamspeak</a>
            <a href="https://facebook.com/Habboai/">Facebook</a>
            <a href="#">Updatelog</a>
            <a href="#">Impressum</a>

        </div>
        &hearts; Thanks to Revue    </footer>
</section>

<div class='bgbottomleft'></div>
<div class='bgbottomright'></div>


<script>
            $(document).ready(function () {
                startchanger();

            });

            function startchanger()
            {
                var i = 1;
                var title = 0;

                setInterval(function ()
                {
                    if (i < 7)
                    {
                        i++;
                    } else {
                        i = 1;
                    }


                    switch (i)
                    {

                        case 1:
                            title = "<b>Rarit&auml;ten</b><br>Handle, verkaufe oder tausche mit unseren exklusiven M&ouml;beln!";
                            break;

                        case 2:
                            title = "<b>Aktueller Katalog</b><br>Das {name} Hotel hat immer die aktuellsten Möbel im Katalog! Schau doch selbst nach!";
                            break;

                        case 3:
                            title = "<b>Wired SFX</b><br>Kreire deine eigene Musik und zeige sie deinen besten Freunden!";
                            break;

                        case 4:
                            title = "<b>Stapelfelder</b><br>Staple ohne Probleme deine Räume mit einem Stapelfeld.";
                            break;

                        case 5:
                            title = "<b>Youtube WIRED</b><br>Spiele {name} und hör paralell deine Lieblingsmusik im Client ab!";
                            break;

                        case 6:
                            title = "<b>Eigene Wireds</b><br>Baue grössere und schönere Räume mit unseren selbstgemachten Wireds!";
                            break;

                        case 7:
                            title = " <b>Rarit&auml;ten</b><br>Handle, verkaufe oder tausche mit unseren exklusiven M&ouml;beln!";
                            break;

                    }
                    $(".icon").css('background', 'url(./lib/standard/index/public/images/index/img_' + i + '.png) 50% 50% no-repeat');
                    $(".title").html(title);
                }, 5000);
            }
        </script>
		
		
		<!-- Start Cookie Plugin -->
<script type="text/javascript">
  window.cookieconsent_options = {
  message: 'Habbo benutzt Cookies, um bestmögliche Funktionalität bieten zu können. Obwohl das jede Webseite macht, sind wir dazu verpflichtet darauf hinzuweisen.',
  dismiss: 'Verstanden!',
  learnMore: '',
  link: 'http://habbo.ai/register/accept.php',
  theme: 'dark-top'
 };
</script>
<script type="text/javascript" src="//s3.amazonaws.com/valao-cloud/cookie-hinweis/script.js"></script>
<!-- Ende Cookie Plugin -->
		
</body>

</html>