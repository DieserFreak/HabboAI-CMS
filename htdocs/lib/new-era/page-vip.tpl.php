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
		<!- IF ERROR == 1 -><div class="message error vampire">Bitte eine gew&uuml;nschte Vip Dauer ausw&auml;hlen</div><br />
		<!- ELSEIF ERROR == 2 -><div class="message error vampire">Der PaySafeCard Code muss 16 Zahlen haben</div><br />
		<!- ELSEIF ERROR == 3 -><div class="message error vampire">Aktuell hast du schon ein Bestellung f&uuml;r Gold VIP gesendet - Hab bitte Geduld</div><br />
		<!- ELSEIF ERROR == 4 -><div class="message success">Die Bestellung wurde erfolgreich zugesandt - Bitte hab Geduld, da es 48h dauern kann</div><br />
		<!- ENDIF ->
		<div class="box">
			<h1 class="lightblue">Vorteile f&uuml;r VIP</h1>
			&rArr; Command :mimic <br />
			&rArr; Command :follow <br />
			&rArr; Command :push <br />
			&rArr; Command :pull <br />
			&rArr; Command :spush <br />
			&rArr; Command :moonwalk <br />
			&rArr; Command :pet <br />
			&rArr; Command :setspeed <br />
			&rArr; Command :myteleport (NEU)<br />
			&rArr; Command :raumalert (NEU)<br />
			&rArr; Du bekommst ein VIP-Badge <br />
			&rArr; vollen Raum betretbar <br />
			&rArr; VIP Katalog <br />
			</p>
		</div>
		<div class="box">
			<h1 class="lightblue">Achtung!</h1>
			<p>Frage immer zuerst deine Eltern oder Erziehungsberechtigten um Erlaubnis, bevor du Taler kaufst.</p>
		</div>
	</div>
	<div id="left-column">
	<form id="buycredits" method="post">
		<div class="box">
			<h1 class="lightblue">Verf&uuml;gbare VIP Dauer</h1>
			<p>Klick die gew&uuml;nschte VIP Dauer und gibt unten die PaySafeCard Code ein.</p>
			<!- BEGIN shopvip ->
			<input id="vip{shopvip.ID}" type="radio" name="shopid" value="{shopvip.ID}">  
			<label for="vip{shopvip.ID}"><span class="icon vip"></span><span class="cost">{shopvip.COST},- &euro; </span><span class="small">x</span>{shopvip.DAYS} Tage VIP</label>
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