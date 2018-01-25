<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_shop ->

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
 
<br>
<div id="content">
	<div id="right-column" class="badgeshop">
		<div class="box">
			<h1 class="lightblue">Wie funktioniert das?</h1>
			<p>
				Du kannst hier einem neuen Raummodel auswählen und als Raum erstellen! Du wirst dann direkt in deinem neuen Raum teleportierst, falls du im Client online bist.
				<br /><br /><b>Hinweis:</b><br />Pro Model kannst du nur bis zu 10 Räume erstellen.
			</p>
		</div>
	</div>
	<div id="left-column" class="badgeshop">
		<div class="box">
			<div class="credits-teaser" style="position:relative;">
				<img style="position:absolute;margin-left:-100px;" src="{themeurl}img/rooms/rooms.gif">
				<h1>Habbo R&auml;ume</h1>
				<p>
					Erstelle dir die neue Raummodelle und zeige deine neue Kreativität!
				</p>
			</div>
		</div>
		<div class="box">
			<h1>Raum erstellen</h1>
			<!- IF ERROR == 1 -><div class="message error vampire">Du musst im Client online sein!</div><br />
			<!- ELSEIF ERROR == 2 -><div class="message error vampire">Du hast dieses Modell leider schon 10 R&auml;ume erstellt.</div><br />
			<!- ELSEIF ERROR == 3 -><div class="message error vampire">Um einen Raum erstellen zu k&ouml;nnen, musst du einen Raumnamen eingeben (mindestens 3 Zeichen).</div><br />
			<!- ELSEIF ERROR == 4 -><div class="message error vampire">Der Raumnamen ist ung&uuml;ltig.</div><br />
			<!- ELSEIF ERROR == 5 -><div class="message error vampire">Dieses Raummodell existiert nicht.</div><br />
			<!- ELSEIF ERROR == 6 -><div class="message success">Der Raum wurde erstellt und du wirst direkt teleportierst!</div><br />
			<!- ENDIF ->
			<form method="post">
				
			<input name="caption" type="text" style="margin-left:1px; padding-left:4px;" placeholder="Gebe hier der Raumnamen ein...">
			<br />
			<div class="roombox">
					<center><img class="roomimg" id="modelimg" src="{themeurl}img/rooms/model_1.png"></center>
			</div>
			<br />
			<div id="slider"></div>
			<br />
			<input name="model" id="model" type="hidden" style="margin-left:1px; padding-left:4px;" value="1">
			<input type="submit" class="btns red" name="submit" value="Raum erstellen &raquo;" style="width:98%;">
			</form>
		</div>
	</div>
</div>

<!- INCLUDE new-era/footer ->