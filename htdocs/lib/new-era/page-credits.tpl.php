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
		<!- IF ERROR == 1 -><div class="message error vampire">Bitte eine gew&uuml;nschte Taleranzahl ausw&auml;hlen</div><br />
		<!- ELSEIF ERROR == 2 -><div class="message error vampire">Der PaySafeCard Code muss 16 Zahlen haben</div><br />
		<!- ELSEIF ERROR == 3 -><div class="message error vampire">Aktuell hast du schon ein Bestellung f&uuml;r Taler  gesendet - Hab bitte Geduld</div><br />
		<!- ELSEIF ERROR == 4 -><div class="message success">Die Bestellung wurde erfolgreich zugesandt - Bitte hab Geduld, da es 48h dauern kann</div><br />
		<!- ENDIF ->
		<div class="box">
			<h1 class="lightblue">Was sind Taler?</h1>
			<p>Die Taler sind eines der wichtigsten Bestandteile des Hobba Hotels. Mit ihnen kannst du dir M&ouml;bel und Rarit&auml;ten oder anderes kaufen und dann mit ihnen Handeln.</p>
		</div>
		<div class="box" style="margin-top:-120px">
			<h1 class="lightblue">Achtung!</h1>
			<p>Frage immer zuerst deine Eltern oder Erziehungsberechtigten um Erlaubnis, bevor du Taler kaufst.</p>
		</div>
	</div>
	<div id="left-column">
	<form id="buycredits" method="post">
		<div class="box">
			<h1 class="lightblue">Verf&uuml;gbare Taleranzahl</h1>
			<p>Klick die gew&uuml;nschte Taleranzahl und gibt unten die PaySafeCard Code ein.</p>
			<!- BEGIN shopcredits ->
			<input id="credits{shopcredits.ID}" type="radio" name="shopid" value="{shopcredits.ID}">  
			<label for="credits{shopcredits.ID}"><span class="icon coins"></span><span class="cost">{shopcredits.COST},- &euro; </span><span class="small">x</span>{shopcredits.COUNT} Taler</label>
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