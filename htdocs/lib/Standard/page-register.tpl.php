<!DOCTYPE html>
<html>
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <title>Habbo.GY - Das kostenlose Habbo Retro Hotel für Jugendliche - Melina Sophie & Lea Braun</title>

        <link rel="shortcut icon" href="public/images/favicond1bd.ico?2.0" type="image/vnd.microsoft.icon">
        <meta charset="UTF-8">
        <meta name="author" content="Revue">
        <meta name="viewport" content="width=device-width, initial-scale=0.5">
        <meta name="google-site-verification" content="fuYJa8ZlSaoo8xN0G0Eoz5b5djsBSNSk-7U6E6rBJWo" />
        <meta name="msvalidate.01" content="149E7B32C17848D86D0608DBAB98B8AE" />

        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.1.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.js" type="text/javascript"></script>
        <link rel="stylesheet" href="public/css/sweetalert.css">

        <meta name="rcuser" content="140">
        <meta name="rcrooms" content="39">
        <meta name="title" content="Habbo Hotel">
        <meta name="description" content="Hier im Habbo Hotel für Teenager gibt es kostenlose Taler und Rares! Neben den Talern gibt es viele coole Events, damit das Habbo Hotel auch Spaß macht.">
        <meta name="language" content="de">
        <meta name="robots" content="index, follow">


        <style>
            @import url(http://fonts.googleapis.com/css?family=Ubuntu:400,500,300,700);
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800);


            body {
                background: url(http://habbo.ai/lib/standard/img/neu/incon/bg_rooms.png);
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
                height: 105px;
                background: url("/sprite.fd8a8fba.png") 50% 50% no-repeat;
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
                background: url('public/images/register/check.gif') 10px 50% no-repeat;
                background-color: #FFF;
            }

            body section main#register #box input.input.bad {
                background: url('public/images/register/del.gif') 10px 50% no-repeat;
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
                background: url("public/images/design/xmas16/bgindex.png") 70% 80% no-repeat;
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

                background: url("public/images/index/img_1.png") 50% 50% no-repeat;
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

                background: url('public/images/design/xmas16/bg_lefte4da.png?5');
                z-index: -10;
            }   

            body div.bgbottomright {
                position: fixed;
                right: 0px;
                bottom: 0px;
                width: 484px;
                height: 482px;

                background: url('public/images/design/xmas16/bg_rightc81e.png?2');
                z-index: -10;
            } 



        </style>
 </head>
 
 <script type="text/javascript">
		$(document).ready(function() {
			var a = 100;
			if(location.hash == "#registration") {
				$("#loginForm").fadeOut("", function() {
					$("#registerForm").fadeIn();
				});
			}
			$(window).on("hashchange", function() {
				if(location.hash == "#registration") {
					$("#loginForm").fadeOut("", function() {
						$("#registerForm").fadeIn();
					});
				} else {
					if(location.hash == "#home" || location.hash == "") {
						$("#registerForm").fadeOut("", function() {
							$("#loginForm").fadeIn();
						});
					}
				}
			});
		});
	</script>
 
 
    <body>
	<section>
        <header>
        <div id="login" style="background: url('http://habboo-a.akamaihd.net/c_images/article_images_hq/article_image_newyear.gif') 100% 20% no-repeat;background-color: #F4F4F4;"></div>

        <div id="logo"></div>
    </header>

	<!- IF ERROR ->

		<!- IF ERROR == 1 ->		<script>alert("Du hast keine Daten angegeben!")</script>
		<!- ELSEIF ERROR == 2 ->	<script>alert("Dein Username ist nicht akzeptabel.")</script>
		<!- ELSEIF ERROR == 3 ->	<script>alert("Dein Username darf nur 3-12 Zeichen beinhalten!")</script>
		<!- ELSEIF ERROR == 4 ->	<script>alert("Dein Username ist leider bereits registriert.")</script>
		<!- ELSEIF ERROR == 5 ->	<script>alert("Deine E-Mail Adresse ist ungültig.")</script>
		<!- ELSEIF ERROR == 6 ->	<script>alert("Deine E-Mail Adresse wird im Hotel bereits verwendet.")</script>
		<!- ELSEIF ERROR == 7 ->	<script>alert("Das Passwort muss mindestens 6 Zeichen lang sein.")</script>
		<!- ELSEIF ERROR == 8 ->	<script>alert("Die beiden Passwörter sind nicht identisch!")</script>
		<!- ELSEIF ERROR == 9 ->	<script>alert("Bist du ein Junge oder ein Mädchen?\rBitte ergänze!")</script>
		<!- ELSEIF ERROR == 10 ->	<script>alert("Wann hast du Geburtstag?\rBitte ergänze!")</script>
		<!- ELSEIF ERROR == 11 ->	<script>alert("Der Sicherheitscode ist falsch")</script>
		<!- ENDIF ->

	<!- ENDIF ->
	
	
	
	<!- IF CLONCHECK ->
	<script>alert("Dein Accountlimit ist ausgeschöpft.\rBitte logge dich mit bereits registrierten Accounts ein, ehe du dir neue erstellst.")</script>
	<meta http-equiv="refresh" content="0; URL=/">
	<!- ENDIF ->
	
	<!- IF IPBAN ->
	<script>alert("Du wurdest dauerhaft aus dem Habbo Hotel ausgeschlossen.")</script>
	<meta http-equiv="refresh" content="0; URL=/">
	<!- ENDIF ->
	
	
    <main id="register">
                        <div id="box" style="width: 532px;margin-bottom: 100px;">    
                    <div class="title">
                        <div style="float: right;">Seite 1 von 2</div>
                       Habbo erstellen
                    </div>

                    <form id="registration" action="" method="post">
                        <div class="listening even">
                            <label for="usernameRegister"><b>Dein Username</b><br></label>
                            <input type="text" id="registration_name" name="registration_name" class="input">
                            <div class="info">Verwende keine Sonder oder Leerzeichen in deinem Namen</div>

                        </div>

                        <div class="listening">
                            <label for="emailRegister"><b>Gib deine E-Mail Adresse an</b><br></label>
                            <input type="text" id="registration_mail" name="registration_mail" class="input">
                            <div class="info">Gebe deine <b>echte</b> E-Mail Adresse ein</div>  

                        </div>
						
						 <div class="listening even">
                           <label for="passwordRegister"><b>Dein Passwort</b><br></label>
                            <input type="password" name="registration_pass" id="registration_pass" class="input">
                            <div class="info">W&auml;hle ein <b>sicheres</b> Passwort aus!</div>

                        </div>
						
						<div class="listening">
                            <label for="passwordConfirmRegister"><b>Passwort best&auml;tigen</b><br></label>
                            <input type="password" name="registration_passw" id="registration_passw" class="input">
                            <div class="info">Um Tippfehler auszuschlie&szlig;en</div>  

                        </div>
						
						 
                        <div class="listening even">
                            <label for="usernameRegister"><b>Dein Geburtstag</b><br></label>
					<select name="registrationBean_day" id="registrationBean_day" class="input" style="width:20%;">
						<option value="">Tag</option>
						<option value="01" <!- IF BITHDAY == 1 ->selected<!- ENDIF ->>1</option>
						<option value="02" <!- IF BITHDAY == 2 ->selected<!- ENDIF ->>2</option>
						<option value="03" <!- IF BITHDAY == 3 ->selected<!- ENDIF ->>3</option>
						<option value="04" <!- IF BITHDAY == 4 ->selected<!- ENDIF ->>4</option>
						<option value="05" <!- IF BITHDAY == 5 ->selected<!- ENDIF ->>5</option>
						<option value="06" <!- IF BITHDAY == 6 ->selected<!- ENDIF ->>6</option>
						<option value="07" <!- IF BITHDAY == 7 ->selected<!- ENDIF ->>7</option>
						<option value="08" <!- IF BITHDAY == 8 ->selected<!- ENDIF ->>8</option>
						<option value="09" <!- IF BITHDAY == 9 ->selected<!- ENDIF ->>9</option>
						<option value="10" <!- IF BITHDAY == 10 ->selected<!- ENDIF ->>10</option>
						<option value="11" <!- IF BITHDAY == 11 ->selected<!- ENDIF ->>11</option>
						<option value="12" <!- IF BITHDAY == 12 ->selected<!- ENDIF ->>12</option>
						<option value="13" <!- IF BITHDAY == 13 ->selected<!- ENDIF ->>13</option>
						<option value="14" <!- IF BITHDAY == 14 ->selected<!- ENDIF ->>14</option>
						<option value="15" <!- IF BITHDAY == 15 ->selected<!- ENDIF ->>15</option>
						<option value="16" <!- IF BITHDAY == 16 ->selected<!- ENDIF ->>16</option>
						<option value="17" <!- IF BITHDAY == 17 ->selected<!- ENDIF ->>17</option>
						<option value="18" <!- IF BITHDAY == 18 ->selected<!- ENDIF ->>18</option>
						<option value="19" <!- IF BITHDAY == 19 ->selected<!- ENDIF ->>19</option>
						<option value="20" <!- IF BITHDAY == 20 ->selected<!- ENDIF ->>20</option>
						<option value="21" <!- IF BITHDAY == 21 ->selected<!- ENDIF ->>21</option>
						<option value="22" <!- IF BITHDAY == 22 ->selected<!- ENDIF ->>22</option>
						<option value="23" <!- IF BITHDAY == 23 ->selected<!- ENDIF ->>23</option>
						<option value="24" <!- IF BITHDAY == 24 ->selected<!- ENDIF ->>24</option>
						<option value="25" <!- IF BITHDAY == 25 ->selected<!- ENDIF ->>25</option>
						<option value="26" <!- IF BITHDAY == 26 ->selected<!- ENDIF ->>26</option>
						<option value="27" <!- IF BITHDAY == 27 ->selected<!- ENDIF ->>27</option>
						<option value="28" <!- IF BITHDAY == 28 ->selected<!- ENDIF ->>28</option>
						<option value="29" <!- IF BITHDAY == 29 ->selected<!- ENDIF ->>29</option>
						<option value="30" <!- IF BITHDAY == 30 ->selected<!- ENDIF ->>30</option>
						<option value="31" <!- IF BITHDAY == 31 ->selected<!- ENDIF ->>31</option>
					</select>
					<select name="registrationBean_month" id="registrationBean_month" class="input" style="width:20%;">
						<option value="">Monat</option>
						<option value="01" <!- IF BITHMONTH == 1 ->selected<!- ENDIF ->>Januar</option>
						<option value="02" <!- IF BITHMONTH == 2 ->selected<!- ENDIF ->>Februar</option>
						<option value="03" <!- IF BITHMONTH == 3 ->selected<!- ENDIF ->>M&auml;rz</option>
						<option value="04" <!- IF BITHMONTH == 4 ->selected<!- ENDIF ->>April</option>
						<option value="05" <!- IF BITHMONTH == 5 ->selected<!- ENDIF ->>Mai</option>
						<option value="06" <!- IF BITHMONTH == 6 ->selected<!- ENDIF ->>Juni</option>
						<option value="07" <!- IF BITHMONTH == 7 ->selected<!- ENDIF ->>Juli</option>
						<option value="08" <!- IF BITHMONTH == 8 ->selected<!- ENDIF ->>August</option>
						<option value="09" <!- IF BITHMONTH == 9 ->selected<!- ENDIF ->>September</option>
						<option value="10" <!- IF BITHMONTH == 10 ->selected<!- ENDIF ->>Oktober</option>
						<option value="11" <!- IF BITHMONTH == 11 ->selected<!- ENDIF ->>November</option>
						<option value="12" <!- IF BITHMONTH == 12 ->selected<!- ENDIF ->>Dezember</option>
					</select>
					<select name="registrationBean_year" id="registrationBean_year" class="input" style="width:20%;">
					<option value="" >Jahr</option>
					<option value="2008"  <!- IF BITHYEAR == 2008 ->selected<!- ENDIF ->>2008</option>
					<option value="2007"  <!- IF BITHYEAR == 2007 ->selected<!- ENDIF ->>2007</option>
					<option value="2006"  <!- IF BITHYEAR == 2006 ->selected<!- ENDIF ->>2006</option>
					<option value="2005"  <!- IF BITHYEAR == 2005 ->selected<!- ENDIF ->>2005</option>
					<option value="2004"  <!- IF BITHYEAR == 2004 ->selected<!- ENDIF ->>2004</option>
					<option value="2003"  <!- IF BITHYEAR == 2003 ->selected<!- ENDIF ->>2003</option>
					<option value="2002"  <!- IF BITHYEAR == 2002 ->selected<!- ENDIF ->>2002</option>
					<option value="2001"  <!- IF BITHYEAR == 2001 ->selected<!- ENDIF ->>2001</option>
					<option value="2000"  <!- IF BITHYEAR == 2000 ->selected<!- ENDIF ->>2000</option>
					<option value="1999"  <!- IF BITHYEAR == 1999 ->selected<!- ENDIF ->>1999</option>
					<option value="1998"  <!- IF BITHYEAR == 1998 ->selected<!- ENDIF ->>1998</option>
					<option value="1997"  <!- IF BITHYEAR == 1997 ->selected<!- ENDIF ->>1997</option>
					<option value="1996"  <!- IF BITHYEAR == 1996 ->selected<!- ENDIF ->>1996</option>
					<option value="1995"  <!- IF BITHYEAR == 1995 ->selected<!- ENDIF ->>1995</option>
					<option value="1994"  <!- IF BITHYEAR == 1994 ->selected<!- ENDIF ->>1994</option>
					<option value="1993"  <!- IF BITHYEAR == 1993 ->selected<!- ENDIF ->>1993</option>
					<option value="1992"  <!- IF BITHYEAR == 1992 ->selected<!- ENDIF ->>1992</option>
					<option value="1991"  <!- IF BITHYEAR == 1991 ->selected<!- ENDIF ->>1991</option>
					<option value="1990"  <!- IF BITHYEAR == 1990 ->selected<!- ENDIF ->>1990</option>
					<option value="1989"  <!- IF BITHYEAR == 1989 ->selected<!- ENDIF ->>1989</option>
					<option value="1988"  <!- IF BITHYEAR == 1988 ->selected<!- ENDIF ->>1988</option>
					<option value="1987"  <!- IF BITHYEAR == 1987 ->selected<!- ENDIF ->>1987</option>
					<option value="1986"  <!- IF BITHYEAR == 1986 ->selected<!- ENDIF ->>1986</option>
					<option value="1985"  <!- IF BITHYEAR == 1985 ->selected<!- ENDIF ->>1985</option>
					<option value="1984"  <!- IF BITHYEAR == 1984 ->selected<!- ENDIF ->>1984</option>
					<option value="1983"  <!- IF BITHYEAR == 1983 ->selected<!- ENDIF ->>1983</option>
					<option value="1982"  <!- IF BITHYEAR == 1982 ->selected<!- ENDIF ->>1982</option>
					<option value="1981"  <!- IF BITHYEAR == 1981 ->selected<!- ENDIF ->>1981</option>
					<option value="1980"  <!- IF BITHYEAR == 1980 ->selected<!- ENDIF ->>1980</option>
					<option value="1979"  <!- IF BITHYEAR == 1979 ->selected<!- ENDIF ->>1979</option>
					<option value="1978"  <!- IF BITHYEAR == 1979 ->selected<!- ENDIF ->>1978</option>
					<option value="1977"  <!- IF BITHYEAR == 1978 ->selected<!- ENDIF ->>1977</option>
					<option value="1976"  <!- IF BITHYEAR == 1977 ->selected<!- ENDIF ->>1976</option>
					<option value="1975"  <!- IF BITHYEAR == 1976 ->selected<!- ENDIF ->>1975</option>
					<option value="1974"  <!- IF BITHYEAR == 1975 ->selected<!- ENDIF ->>1974</option>
					<option value="1973"  <!- IF BITHYEAR == 1974 ->selected<!- ENDIF ->>1973</option>
					<option value="1972"  <!- IF BITHYEAR == 1973 ->selected<!- ENDIF ->>1972</option>
					<option value="1971"  <!- IF BITHYEAR == 1972 ->selected<!- ENDIF ->>1971</option>
					<option value="1970"  <!- IF BITHYEAR == 1971 ->selected<!- ENDIF ->>1970</option>
					</select>
                            <div class="info">Gebe bitte dein richtiges Geburtsdatum an</div>

                           

                        </div>
						
						<div class="listening">
                            <label for="usernameRegister"><b>Geschlecht</b><br></label>
                             <select name="registration_gender" id="registration_gender" class="input" style="width:61%;">
						<option value="">Geschlecht</option>
						<option value="1"  <!- IF GESCHLECHT == 1 ->selected<!- ENDIF ->>M&auml;nnlich</option>
						<option value="2"  <!- IF GESCHLECHT == 2 ->selected<!- ENDIF ->>Weiblich</option>
						</select>
                            <div class="info">Gebe dein Geschlecht an</div>  

                        </div>
						
			
                        <div class="listening even border-bottom fixed">
                            <input type="submit" class="submit" name="register" value="Weiter">

                            <a href="/">Abbrechen</a>
                        </div>
                    </form>
                </div>

                <div id="box" style="width: 318px;margin-right: 0px;">
                    <div class="listening">
                        <b>Username</b><br><br>
                        Im ersten Schritt hast du die Möglichkeit, dir einen Usernamen auszusuchen, mit welchem du im Hotel unterwegs sein wirst.<br><br>
                    </div>

                    <div class="listening even border-bottom">
                        <b>E-Mail Adresse</b><br><br>
                        Zudem musst du deine E-Mail Adresse im entsprechenden Feld angeben, welche benötigt wird, um dein Passwort zurück zu setzen, solltest du es einmal vergessen.<br><br>
                    </div>
					
					 <div class="listening"><br>
                        <b>Passwort</b><br><br>
                        Dein Passwort ist der Schl&uuml;ssel zu deinem Account!
						Niemand ausser du darf dein Passwort wissen, daher solltest du ganz bedacht w&auml;hlen und dir dein Passwort ganz gut merken!<br><br>
                    </div>
					
					<div class="listening even border-bottom">
                        <b>Alles ausgef&uuml;llt?</b><br><br>
                        Dann kannst du deine Habbo Karriere starten!<br>Viele weitere Habbos warten bereits auf dich!<br><br>
                    </div>
					
                </div>

               
                    </main>

</body>


</html>