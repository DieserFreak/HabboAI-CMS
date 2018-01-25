<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_community ->


<div id="main" class="container_12 animated fadeInLeft">


            <div class="container_12" style="margin-left: -11px;">
  
			 <div id="column" class="viphobba" style="background: url(http://i.imgur.com/vj4SNZS.png);margin-top:30px;">
		</div>
	
			<div class="grid_6" style="float: left;">
			<div class="boxd" style="margin-top: 20px;width: 100%;height: 482px;">
			<div class="title9" style="width: 93.5%;background: #474747;border-bottom: 2px solid rgba(0,0,0,0.2);margin-top: 10px;">Marketing Leitung</div>																																																
				
						
						
						
			<!- BEGIN userstaff ->
			<!- IF userstaff.USERNAME == 'Hazed' ->
                           <div class="boxd" onmouseenter="staffhover(this)" style=" margin-left: 11px;    margin-right: 5px;width: 208px;height: 180px; margin-top: 16px; background-image:url('/lib/standard/img/neu/staff_bild5.jpg'); -webkit-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); -moz-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); cursor: pointer;">
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
		<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 5 ->
                           <div class="boxd" onmouseenter="staffhover(this)" style=" margin-left: 11px;    margin-right: 5px;width: 208px;height: 180px; margin-top: 16px; background-image:url('/lib/standard/img/neu/staff_bild5.jpg'); -webkit-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); -moz-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); cursor: pointer;">
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
		

                    </div></center>
				
					
</div>
					
				<div class="grid_6" style="float: right;">
<div class="boxd" style="margin-top: 20px;width: 100%;height: 482px;">
				   <div class="title9" style="width: 93.5%;background: #474747;border-bottom: 2px solid rgba(0,0,0,0.2);margin-top: 10px;">{name} Werbeteam</div>																																																
				<!- BEGIN userstaff ->
			<!- IF userstaff.USERRANK == 4 ->
                           <div class="boxd" onmouseenter="staffhover(this)" style=" margin-left: 11px;    margin-right: 5px;width: 208px;height: 180px; margin-top: 16px; background-image:url('/lib/standard/img/neu/staff_bild5.jpg'); -webkit-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); -moz-box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); box-shadow: 0px 0px 0px 2px rgb(233, 233, 233); cursor: pointer;">
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
                 

                    </div></center>
				
					
</div>

<!- INCLUDE Standard/footer ->			