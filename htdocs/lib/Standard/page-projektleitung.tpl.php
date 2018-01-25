
<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_community ->


<div id="main" class="container_12 animated fadeInLeft">


            <div class="container_12" style="margin-left: -11px;">
  
			 <div id="column" class="viphobba" style="background: url(http://i.imgur.com/eJXmETL.png);margin-top:30px;">
		</div>
	
			<div class="grid_6" style="float: left;">
			<div class="boxd" style="margin-top: 20px;width: 100%;height: 482px;">
			<div class="title9" style="width: 90%;border-bottom: 2px solid rgba(0,0,0,0.2);margin-top: 10px;">{name} Projektleitung</div>																																																
				
						
						
						
			<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 10 ->
                           <div class="boxd" onmouseenter="staffhover(this)" style=" margin-left: 11px;    margin-right: 5px;width: 208px;height: 180px; margin-top: 16px; background-image:url('/lib/standard/img/neu/staff_bild3.jpg'); -webkit-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); -moz-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); cursor: pointer;<!- IF userstaff.USERONLINE == 1 ->background-position: -50px 150px;background-image: url(http://i.imgur.com/74SJE4V.png);<!- ELSE ->background-image: url(http://i.imgur.com/74SJE4V.png); background-position: -852px 136px;<!- ENDIF ->">
                            <div class="staffavatar" style="<!- IF userstaff.USERONLINE == 1 ->opacity:1;<!- ELSE ->opacity:0.5;<!- ENDIF ->background-image:url('http://avatar-retro.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&action=wlk&gesture=sml&direction=2&head_direction=3&size=l&img_format=png<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->');"></div>
                            <div class="stafftitle">{userstaff.USERNAME}</div>
                            <div class="staffhover" id="staffhvr">
								<!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></br>
                                <b>Motto: </b><i>{userstaff.USERMOTTO}</i></br>
								<b></b> {userstaff.USERWORKING}
                            </div>
                        </div>
						<!- ENDIF ->
						<!- END userstaff ->
						
						<!- IF USERRANK >= hkrank ->
						<!- BEGIN userstaff ->
			<!- IF userstaff.USERNAME == 'Schniki' ->
                           <div class="boxd" onmouseenter="staffhover(this)" style=" margin-left: 11px;    margin-right: 5px;width: 208px;height: 180px; margin-top: 16px; background-image:url('/lib/standard/img/neu/staff_bild3.jpg'); -webkit-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); -moz-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); cursor: pointer;<!- IF userstaff.USERONLINE == 1 ->background-position: -50px 150px;background-image: url(http://i.imgur.com/74SJE4V.png);<!- ELSE ->background-image: url(http://i.imgur.com/74SJE4V.png); background-position: -852px 136px;<!- ENDIF ->">
                            <div class="staffavatar" style="<!- IF userstaff.USERONLINE == 1 ->opacity:1;<!- ELSE ->opacity:0.5;<!- ENDIF ->background-image:url('http://avatar-retro.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&gesture=sml&direction=2&head_direction=3&size=l&img_format=png<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->');"></div>
                            <div class="stafftitle">{userstaff.USERNAME}</div>
                            <div class="staffhover" id="staffhvr">
								<!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></br>
                                <b>Motto: </b><i>{userstaff.USERMOTTO}</i></br>
								<b></b> {userstaff.USERWORKING}
                            </div>
                        </div>
						<!- ENDIF ->
						<!- END userstaff ->
						<!- ENDIF ->
				
                 

                    </div></center>
				
					
</div>
					
				<div class="grid_6" style="float: right;">
<div class="boxd" style="margin-top: 20px;width: 100%;height: 482px;">
				   <div class="title9" style="width: 90%;margin-top: 10px;background-color: #9e2d2d;border: 1px solid #9e2d2d;">Habbo Hotelmanagement</div>																																																
				<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 9 ->
                           <div class="boxd" onmouseenter="staffhover(this)" style=" margin-left: 11px;    margin-right: 5px;width: 208px;height: 180px; margin-top: 16px; background-image:url('/lib/standard/img/neu/staff_bild3.jpg'); -webkit-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); -moz-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); cursor: pointer;<!- IF userstaff.USERONLINE == 1 ->background-position: -50px 150px;background-image: url(http://i.imgur.com/74SJE4V.png);<!- ELSE ->background-image: url(http://i.imgur.com/74SJE4V.png); background-position: -852px 136px;<!- ENDIF ->">
                            <div class="staffavatar" style="<!- IF userstaff.USERONLINE == 1 ->opacity:1;<!- ELSE ->opacity:0.5;<!- ENDIF ->background-image:url('http://avatar-retro.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&action=wlk&gesture=sml&direction=2&head_direction=3&size=l&img_format=png<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->');"></div>
                            <div class="stafftitle">{userstaff.USERNAME}</div>
                            <div class="staffhover" id="staffhvr">
								<!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></br>
                                <b>Motto: </b><i>{userstaff.USERMOTTO}</i></br>
								<b></b> {userstaff.USERWORKING}
                            </div>
                        </div>
						<!- ENDIF ->
						<!- END userstaff ->
						
						<!- IF USERRANK >= hkrank ->
						<!- BEGIN userstaff ->
			<!- IF userstaff.USERNAME == 'flyemirates' ->
                           <div class="boxd" onmouseenter="staffhover(this)" style=" margin-left: 11px;    margin-right: 5px;width: 208px;height: 180px; margin-top: 16px; background-image:url('/lib/standard/img/neu/staff_bild3.jpg'); -webkit-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); -moz-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); cursor: pointer;<!- IF userstaff.USERONLINE == 1 ->background-position: -50px 150px;background-image: url(http://i.imgur.com/74SJE4V.png);<!- ELSE ->background-image: url(http://i.imgur.com/74SJE4V.png); background-position: -852px 136px;<!- ENDIF ->">
                            <div class="staffavatar" style="<!- IF userstaff.USERONLINE == 1 ->opacity:1;<!- ELSE ->opacity:0.5;<!- ENDIF ->background-image:url('http://avatar-retro.com/habbo-imaging/avatarimage?figure={userstaff.USERLOOK}&gesture=sml&direction=2&head_direction=3&size=l&img_format=png<!- IF userstaff.USERONLINE == 0 ->eyb<!- ELSE ->sml<!- ENDIF ->');"></div>
                            <div class="stafftitle">{userstaff.USERNAME}</div>
                            <div class="staffhover" id="staffhvr">
								<!- IF userstaff.USERONLINE == 0 ->{userstaff.USERLONLINE} Online <!- ELSE -> <b style="color:green">Jetzt online</b><!- ENDIF -></br>
                                <b>Motto: </b><i>{userstaff.USERMOTTO}</i></br>
								<b></b> {userstaff.USERWORKING}
                            </div>
                        </div>
						<!- ENDIF ->
						<!- END userstaff ->
						<!- ENDIF ->
                 

                    </div></center>
				
					
</div>

<!- INCLUDE Standard/footer ->			