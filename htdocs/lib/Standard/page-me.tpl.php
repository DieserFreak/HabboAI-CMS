
<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_main ->
			</div>
        </div>
    </div>

<!doctype html>
<link rel="icon" href="{themeurl}img/neu/favicon.ico"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript" ></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

        <meta charset="UTF-8" />
    </head>

	<body>
	
<!- IF sitealert != -/- ->
<script>alert("Wichtige Mitteilung von der Projektleitung\r\r{sitealert}")</script>
<!- ENDIF ->

<!- IF CLIENTALERT == 1 ->
<script>alert("Das Hotel ist aus aktuellem Anlass nicht zugänglich.\r\rBitte schaue gleich wieder vorbei!")</script>
<!- ENDIF ->
	
<!- IF GETMONEYALERT == 1 ->
<script>alert("Deine Tagesbelohnung steht bereit!\r\rDeinem Konto wurden {getdailyvipcredits} Taler und {getdailyviprespect} Lobe welche du vergeben kannst gutgeschrieben.\r\rWir wünschen dir weiterhin einen angenehmen Aufenthalt!")</script>
<!- ELSEIF GETMONEYALERT == 2 ->
<script>alert("Deine Tagesbelohnung steht bereit!\r\rDeinem Konto wurden {getdailyvipcredits} Taler und {getdailyviprespect} Lobe welche du vergeben kannst gutgeschrieben.\r\rWir wünschen dir weiterhin einen angenehmen Aufenthalt!")</script>
<!- ENDIF ->

		<div class="container_12 animated fadeInLeft">
            <div class="grid_12">
                <div class="userbox animated fadeInLeft" style="margin-top: 10px;">
                    <div class="lang" style="border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                        <!--<div class="text">{USERNAME} ({USERID})</div>-->
                        <div class="img" style="background-image:url('http://avatar-retro.com/habbo-imaging/avatarimage?figure={USERAVATAR}
&size=l&direction=2&head_direction=2&action=wav&size=l&gesture=sml');"></div>
                    </div>

                    <div class="lang" style="float: right; border-top-right-radius: 4px; border-bottom-right-radius: 4px;">
                        <a href="/client" target="_blank">
                            <div class="icon"></div>
                            <div class="text" style="margin-top: 5px;">Einchecken</div>
                        </a>
                    </div>

					<div id="user_welcome">Hey, <b>{USERNAME}!</b> <br>
  						<div id="mission" style="font-size: 18px;">Mission: {USERMOTTO}</div>
					</div>
					
					
					<div id="monnaie">
					
							<div class="databox" style="margin-right:10px;float:left;"><div class="left"></div>
							<div class="mid" style="width:147px;"><div class="credits label">Taler</div><div class="amount">{USERCREDITS}</div></div>
							<div class="credits"></div></div>

					    	<div class="databox" style="margin-right:10px;float:left;"><div class="left"></div><div class="mid" style="width:147px;">
							<div class="duckets label">Enten</div>
							<div class="amount">{USERPIXEL}</div></div><div class="duckets"></div></div>


					    	 <div class="databox" style="float:left;"><div class="left"></div><div class="mid" style="width:147px;">
							 <div class="diamonds label">Diamanten</div>
							 <div class="amount">{USERDIAMANT}</div></div><div class="diamonds"></div></div>
						</div>
					
					<div id="remotebeste"></div>
                </div>
            </div>
			<div class="container_12 animated fadeInLef">
				<div class="grid_12" style="width: 960px;">
        <!- BEGIN artikel ->
				<div class="news" id="news" style="background-image:url('{artikel.IMAGE}');">                    
					<font style="font-size: 16px; font-weight: 700;"><i class="fa fa-newspaper-o fa-lg" aria-hidden="true" style="padding-right: 10px;"></i> {artikel.TITLE}</font><br>
                       <font style="font-size: 13px;">{artikel.DESC}</font><br><br>
                       <button target="_blank" onclick="window.open('{url}/news/{artikel.ID}');" id="buttonNews">Weiterlesen <img id="buttonImage" src="/lib/standard/img/neu/incon/Xi28DDk.png"></button>
						
				
						</div>
		<!- END artikel ->
		</div>
			</div>
			
					<div class="grid_5">
				<div class="boxd" style="margin-top: 10px;width: 100%;">
				    <div class="title9" style="width: 88%;">Kampagnen</div>
						<!- IF HOTROOMSR > 0 ->
				<!- BEGIN hotrooms ->
				    <div class="case" style="width: 89%;">
                        <div class="icon"></div>
                        <div class="name">{hotrooms.NAME}</div>
                        <div class="besitzer">Raum von {hotrooms.OWNER}</div>
				    </div>
					<!- END hotrooms ->
			<!- ELSE ->
				<div class="case" style="width: 98%;margin-left: 4px;">
				<a href="https://www.facebook.com/HabboGroup" style="display: block;cursor: pointer;margin-left: -10px;margin-bottom: 10px;width: 238px;padding-left: 180px;padding-top: 5px;background: url('/lib/standard/img/x.png') 10px 50% no-repeat;;color: #000;text-decoration: none;height: 65px;">
                <div style="font-size: 15px;letter-spacing: 0.5px;">Facebook</div>
                <div style="font-size: 12px;color: rgba(0, 0, 0, 0.7);">Hast du schon unsere Facebookseite gesehen?</div>
            </a>
			</div>
			<div class="case" style="width: 98%;margin-left: 4px;">
			<a href="/badgecreator.php" style="display: block;cursor: pointer;margin-left: -10px;margin-bottom: 10px;width: 238px;padding-left: 180px;padding-top: 5px;background: url('/lib/standard/img/hot_campaign_button_160x60_eventcal.gif') 10px 50% no-repeat;;color: #000;text-decoration: none;height: 65px;">
                <div style="font-size: 15px;letter-spacing: 0.5px;">Badgecreator</div>
                <div style="font-size: 12px;color: rgba(0, 0, 0, 0.7);">Hast du dir schon dein eigenes Badge erstellt?</div>
            </a></div>
				</div>
			<!- ENDIF ->
				    
				</div></div></div>

            <div id="main" class="container_12">
			<div class="grid_6">
				<div class="boxd" style="margin-top: 10px;width:117%;">
				 <div class="title9" style="width: 92%;background-color: #298a08;border: 1px solid #298a08;">Geplante Events</div>
						
				<!- BEGIN events ->
				<!- IF events.END > TIMENOWDATE ->
					<div class="case" style="width: 93%;">
                        <div class="icon"></div>
                        <div class="name">{events.NAME}</div>
                       <div class="besitzer" style="width: 150px;">{events.START} UHR</div>
				    </div>
				
			<!- ENDIF ->
			<!- END events ->
	</div>
	</div>
	    
			<!- INCLUDE Standard/footer ->
		</div>