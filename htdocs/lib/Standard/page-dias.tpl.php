<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_shop ->
</div>
</div>
</div>
<br>
<script type="text/javascript">
	$(document).ready(function(){
		$(":input").inputmask();
	});
</script>

<div id="main" class="container_12">

<!- IF ERROR == 1 -><div class="message error">Bitte eine gew&uuml;nschte Taleranzahl ausw&auml;hlen</div><br />
		<!- ELSEIF ERROR == 2 -><div class="message error">Der PaySafeCard Code muss 16 Zahlen haben</div><br />
		<!- ELSEIF ERROR == 3 -><div class="message error">Aktuell hast du schon ein Bestellung f&uuml;r Taler  gesendet - Hab bitte Geduld</div><br />
		<!- ELSEIF ERROR == 4 -><div class="message success">Die Bestellung wurde erfolgreich zugesandt - Bitte hab Geduld, da es 48h dauern kann</div><br />
		<!- ENDIF ->
	
	<div class="container_12 animated fadeInLeft">
	<form id="buycredits" method="post">
            <div class="grid_8">
                <div class="boxd" style="margin-top: 10px;">
                    <div class="title9" style="width: 92.5%;">Unsere Angebote</div>
					<!- BEGIN shopdias ->
					<div class="boxdesc" style="width: 93.5%;">
			<input id="dias{shopdias.ID}" type="radio" name="shopid" value="{shopdias.ID}">  
			<label for="dias{shopdias.ID}"><span class="cost">{shopdias.COST},- &euro; </span><span class="small">x</span><span>{shopdias.COUNT} Diamanten</span><div ng-class="'product-icon--' + ProductIconController.iconId" class="product-icon product-icon--4" style="background-position: -203px -277px;"></div></label>
			</div><!- END ->
					
					<div class="boxhead" style="width: 91.5%;">
					<input id="passwort" type="text" name="psc" placeholder="PaySafeCard Code" data-inputmask="'mask': '0999-9999-9999-9999'" style="float:left;">
					<input class="button" type="submit" name="submit" value="Kaufen" style="width:20%;float:right; margin-right:10px; margin-top:0px;">
					</div>
					
                </div>
            </div>
</form>
            <div class="grid_4">
                <div class="boxd" style="margin-left: -150px;width: 150%;margin-top: 10px;">
                    <div class="title9" style="width: 94.6%;">Informationen</div>
					<div class="boxdesc" style="width:87%;">
					Kaufe keine Diamanten ohne die Erlaubnis deiner Eltern!
					</div>
                </div>
            </div>
			
			
        </div>
	
	<!- INCLUDE Standard/footer ->
</div>