<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_shop ->

<br>
<script type="text/javascript">
	$(document).ready(function(){
		$(":input").inputmask();
	});
</script>
<div id="content">
	<div id="right-column">
		<!- IF ERROR == 1 -><div class="message error vampire">Bitte eine gew&uuml;nschte Diamantenanzahl ausw&auml;hlen</div><br />
		<!- ELSEIF ERROR == 2 -><div class="message error vampire">Der PaySafeCard Code muss 16 Zahlen haben</div><br />
		<!- ELSEIF ERROR == 3 -><div class="message error vampire">Aktuell hast du schon ein Bestellung f&uuml;r Diamanten gesendet - Hab bitte Geduld</div><br />
		<!- ELSEIF ERROR == 4 -><div class="message success">Die Bestellung wurde erfolgreich zugesandt - Bitte hab Geduld, da es 48h dauern kann</div><br />
		<!- ENDIF ->
		<div class="box">
			<h1 class="lightblue">Was sind Diamanten?</h1>
			<p>Die Diamanten sind eines der wertvollsten Bestandteile des Hobba Hotels. Mit ihnen kannst du dir seltene M&ouml;bel und Ultra Rarit&auml;ten oder auch wertvolle Diamantw&auml;hrung als M&ouml;bel kaufen und dann mit ihnen Handeln.</p>
		</div>
		<div class="box" style="margin-top:-100px">
			<h1 class="lightblue">Achtung!</h1>
			<p>Frage immer zuerst deine Eltern oder Erziehungsberechtigten um Erlaubnis, bevor du Taler kaufst.</p>
		</div>
	</div>
	<div id="left-column">
	<form id="buycredits" method="post">
		<div class="box">
			<h1 class="lightblue">Verf&uuml;gbare Diamantenanzahl</h1>
			<p>Klick die gew&uuml;nschte Diamantenanzahl und gibt unten die PaySafeCard Code ein.</p>
			<!- BEGIN shopdias ->
			<input id="dias{shopdias.ID}" type="radio" name="shopid" value="{shopdias.ID}">  
			<label for="dias{shopdias.ID}"><span class="icon dias"></span><span class="cost">{shopdias.COST},- &euro; </span><span class="small">x</span>{shopdias.COUNT} Diamanten</label>
			<!- END ->
		</div>
		<div class="box" style="margin-top:30px">
			<h1 class="lightblue">PaySafeCard Code</h1>
			<p>Bitte hier die g&uuml;ltige PaySafeCard Code eingeben.</p>
			<input type="text" name="psc" placeholder="PaySafeCard Code" data-inputmask="'mask': '0999-9999-9999-9999'" style="margin-top:20px">
			<input class="btns red" type="submit" name="submit" value="Kaufen" style="width:20%;float:right; margin-right:10px; margin-top:10px">
		</div>
	</form>
	</div>
</div>

<!- INCLUDE new-era/footer ->