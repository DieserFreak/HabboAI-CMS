
<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_community ->
</div>
</div>
</div>

<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


<div id="main" class="container_12">

<div class="container_12 animated fadeInLeft">
	
	<div id="column" class="viphobba" style="background: url(http://i.imgur.com/7FrGnZr.png);">
 
    </div>
</div>


			<div class="grid_6">
				<div class="boxd" style="margin-top: 10px;">
				    <div class="title9" style="
					background-color: #1B6CA2;
					border: 1px solid #1B6CA2;">Die beliebtesten R&auml;ume</div>
						<!- IF HOTROOMSR > 0 ->
				<!- BEGIN hotrooms ->
				    <div class="case">
                        <div class="icon"></div>
                        <div class="name" style="font-family:Ubuntu;font-size:12px;">{hotrooms.NAME}</div>
                        <div class="besitzer" style="font-family:Ubuntu;">Raum von <b>{hotrooms.OWNER}</b></div>
				    </div>
					<!- END hotrooms ->
			<!- ELSE ->
				<div class="case">
				<div class="name">Alle R&auml;ume sind leer.<br><br></div>
				</div>
			<!- ENDIF ->
				    
				</div>
				
				<div class="boxd" style="margin-top: 10px;">
				    <div class="title9" style="
					background-color: #9e2d2d;
					border: 1px solid #9e2d2d;
					">Habbo Statistiken</div>
					
					<div class="boxdesc" id="table" style="width:91%;height:auto;margin:0;">
					Heutiger Userrekord <div style="float:right;"><b><?php  
						$onlinedb = dbSelect('*', 'online_statistik', "WHERE FROM_UNIXTIME(timestamp, '%d.%m') = '".date('d.m')."' ORDER BY useronline DESC LIMIT 1");
						$online = $onlinedb->fetch_assoc();
						if($onlinedb->num_rows <= 0){
							$onlineres = 0;
						} else {
							$onlineres = $online['useronline'];
						}
						echo $onlineres; 
					?></div></b><br>
					
					Allgemeiner Userrekord <div style="float:right;"><b><?php  
						$onlinedb = dbSelect('*', 'system_stats', "WHERE id = '1'");
						$online = $onlinedb->fetch_assoc();
						if($onlinedb->num_rows <= 0){
							$onlineres = 0;
						} else {
							$onlineres = $online['users'];
						}
						echo $onlineres; 
					?></div></b><br>
					
					
					Registrierte User <div style="float:right;"><b><?php echo dbSelectNumRows('*', 'users'); 
?></div></b><br>
					
					Gesperrte User <div style="float:right;"><b><?php echo dbSelectNumRows('*', 'bans'); 
?> </div></b><br>
					Sprechblasen <div style="float:right;"><b><?php echo dbSelectNumRows('*', 'chatlogs'); 
?></div></b><br>
					
					M&ouml;bel <div style="float:right;"><b><?php echo dbSelectNumRows('*', 'items'); 
?></div></b><br>

					Erstellte R&auml;ume <div style="float:right;"><b><?php echo dbSelectNumRows('*', 'rooms'); 
?></div></b><br>
					
					</div>
				</div>
            </div>
			
            <div class="grid_6">
                <div class="boxd" style="margin-top: 10px;height: 284px;">
				    <div class="title9" style="
					background-color: #298a08;
					border: 1px solid #298a08;
					">Die neusten Habbos</div>
						
					<div style="margin-left: 0px;">
					<!- BEGIN premiums ->
						<div class="circle2" data-tooltip="{premiums.USERNAME}">
							<div class="avatar" style="<!- IF premiums.USERONLINE == 1 ->opacity:1;<!- ELSE ->opacity:0.5;<!- ENDIF ->background-image:url('http://avatar-retro.com/habbo-imaging/avatarimage?figure={premiums.USERLOOK}&size=b&head_direction=3&gesture=sml&action=wlk');"></div>
						</div>
					<!- END premiums ->
					
					</div>
				</div>
            </div>
			
			<div class="grid_6" style="margin-top: 0px;">
			<div class="boxd">
			<div class="title9" style="
				background-color: #ff8000;
				border: 1px solid #ff8000;
			">Benachrichtigungen</div>
			<div class="boxdesc" id="table" style="width:91%;height:auto;margin:0;height: 154px;overflow:auto;">
			
			
			<!-- BEGIN UPDATES -->
	
			
			<div style="float:left;">
			<div style="margin-left:7px;">
			<img src="http://i.imgur.com/gZLwruQ.png" style="margin-left:7px;">
		</div></div>

			<b style="margin-top:5px;margin-left:15px;">Dienstag, 10.01.2017</b>
			<br>
			<font style="font-size:10px;margin-top:0px;margin-left:15px;">
			<b>Client fehler Beheben.</b></font>
			<br><br>
			
			<hr><br>
			
			<div style="opacity:0.5;"><div style="float:left;">
			<img src="http://i.imgur.com/gZLwruQ.png" style="margin-left:7px;"></div>

			<b style="margin-top:5px;margin-left:15px;">Platzhalter</b>
			<br>
			<font style="font-size:10px;margin-top:0px;margin-left:15px;">
			<b>Benachrichtigung</b></font>
			<br></div>
			
			
			
			
			
			
		
			<!-- END UPDATES -->
			
			</div>
			</div></div>
			
		<!- INCLUDE Standard/footer -> 