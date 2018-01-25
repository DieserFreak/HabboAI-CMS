<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_shop ->

<script>
  $(function() {
    $( "#slider" ).slider({
      value: 1,
      min: 1,
      max: 15,
      step: 1,
      slide: function( event, ui ) {
		$("#modelimg").attr("src","{themeurl}img/rooms/model_" + ui.value + ".png");
		$("#model").val( ui.value );
      }
    });
  });
</script>
 
<br><br>
<div class="boxd" style="margin-top: 40px;float: right;margin-right: -2px;width: 47.8%;">
				    <div class="title9">Information</div>
<div id="main" style="margin-bottom:20px;">
	<div id="right-column" class="badgeshop">
			<div class="boxdesc" style="width:91%;">
				Dein Raumname darf keine Sonderzeichen, Leerzeichen oder Umlaute enthalten.<br><br> Beachte auch, dass du im Client eingeloggt bist!
					</div>
	</div></div></div>
<div class="boxd" style="margin-top: 40px;">
				    <div class="title9">Raum erstellen</div>
	<div id="left-column" class="badgeshop">
		<div class="box_1">
<div class="boxdesc" style="width: 91%;">
						<p>
					Hier kannst du dir exklusive Raummodels f&uuml;r deinen Raum auszusuchen.<br>Das Management erstellt stetig neue Raummodels, also halte die Augen offen und schau zwischendurch vorbei! <br><br><b>Preis: 5 Taler</b>
				</p>
			</div>
		</div>
		<div class="boxdesc" style="width: 91%;">
		<div class="header">Raum erstellen:</div>
		<div class="content">
			<!- IF ERROR == 1 -><div class="message error " style="margin-bottom: -23px;margin-top: -107px;width: 93%;">Du kannst nur 10 Räume mit diesem Raumlayout besitzen!</div><br />
			<!- ELSEIF ERROR == 2 -><div class="message error " style="margin-bottom: -23px;margin-top: -107px;width: 93%;">Du kannst nur 10 R&auml;ume mit diesem Raumlayout besitzen!</div><br />
			<!- ELSEIF ERROR == 3 -><div class="message error " style="margin-bottom: -23px;margin-top: -107px;width: 93%;">Um einen Raum erstellen zu k&ouml;nnen, musst du einen Raumnamen eingeben (mindestens 3 Zeichen).</div><br />
			<!- ELSEIF ERROR == 4 -><div class="message error " style="margin-bottom: -23px;margin-top: -107px;width: 93%;">Der Raumnamen ist ung&uuml;ltig.</div><br />
			<!- ELSEIF ERROR == 5 -><div class="message error " style="margin-bottom: -23px;margin-top: -107px;width: 93%;">Dieses Raumlayout existiert nicht.</div><br />
			<!- ELSEIF ERROR == 6 -><div class="message success " style="margin-bottom: -23px;margin-top: -107px;width: 93%;right: 30px;bottom: 30px;background-color: #2aa12c;height: auto;padding: 15px;color: #fff;text-align: center;font-size: 14px;border-radius: 2px;transition: all 300ms;z-index: 100;">Dein neuer Raum wurde gebaut und du wurdest teleportiert!</div><br />
			<!- ENDIF ->
			<form method="post">
			<input name="caption" type="text" style="padding-left:4px;height: 32px;margin-top: 10px;background-color: #ffffff;box-shadow: 0px 3px 0px 0px rgba(0,0,0,0.3);z-index: -1;padding: 5px;font-weight: bold;color: #20b2aa;border: 1px solid rgba(0,0,0,0.2);border-radius: 3px;width: 100%;" placeholder="Gebe hier der Raumnamen ein...">				
			<br />
			<div class="roombox">
					<center><img galleryimg="no" class="roomimg" id="modelimg" src="http://hobba.st/lib/standard/img/rooms/model_1.png" style="margin-top: 15px;"></center>
			</div>
			<br />
			<br />
			<div id="slider"></div>
			<input name="model" id="model" type="hidden" style="margin-left:1px; padding-left:4px;" value="1">
			<input type="submit" class="btns red" name="submit" value="Raum erstellen»" style="width: 100%;float: left;background-color: #2C3E50;color: white;font-size: 14px;padding: 10px;padding-top: 10px;padding-bottom: 10px;margin-top: 10px;text-transform: uppercase;font-weight: 700;background: #2AA12C;border: 0px;border-bottom: 2px solid #218123;">
			</form>
		</div>
		</div>
	</div>
</div>
</div>
		<span id="footer"> 
		
<div id="column" class="footer" style="margin-bottom: 20px;margin-top: 663px;width: 95.9%;margin-left: 0px;">
    <div class="big" style="color: #808080;">&copy; 2016 Hobba Hotel</div>
    <a class="link" style="padding-left: 0px;border: 0px;color: #808080;" href="http://hobba.st/community/rules">Regeln</a>
    <a class="link" style="padding-left: 0px;border: 0px;color: #808080;" href="http://hobba.st/support">Support</a>
    <a class="link" style="padding-left: 0px;border: 0px;color: #808080;" href="http://help.hobba.st/impressum">Impressum</a>
</div></div>
         </div>
</div></div>
</div><span>