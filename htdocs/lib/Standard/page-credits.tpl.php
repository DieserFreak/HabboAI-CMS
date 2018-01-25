<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_shop ->
</div>
</div>
</div>


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
                <div class="boxd">
                    <div class="title9">Unsere Angebote</div>
					<!- BEGIN shopcredits ->
					<div class="boxdesc" style="width: 93.5%;">
			<input id="credits{shopcredits.ID}" type="radio" name="shopid" value="{shopcredits.ID}">  
			<label for="credits{shopcredits.ID}"><span class="cost">{shopcredits.COST},- &euro; </span><span class="small">x</span><span>{shopcredits.COUNT} Taler</span><div ng-class="'product-icon--' + ProductIconController.iconId" class="product-icon product-icon--4" style="background-position: -398px 3px;"></div></label>
			</div><!- END ->
					
					<div class="boxhead" style="width: 91.5%;">
					<input id="passwort" type="text" name="psc" placeholder="PaySafeCard Code" data-inputmask="'mask': '0999-9999-9999-9999'" style="float:left;margin-top: 3px;margin-left: 0px;">
					<input class="button" type="submit" name="submit" value="Kaufen" style="width:20%;float:right; margin-right:10px; margin-top:0px;">
					</div>
					
                </div>
            </div>

            <div class="grid_4">
				<div class="boxd" style="margin-left: -150px;width: 150%;">
                    <div class="title9" style="width: 94.5%;">Informationen</div>
					<div class="boxdesc" style="width:87%;">
					Im {name} erh&auml;ltst du st&uuml;ndlich kostenlose Taler und Aktivit&auml;tspunkte.<br><br>
					Wenn du das ganze aber lieber beschleunigen m&ouml;chtest, kannst du dir hier <b>kostenpflichtig</b> Taler bestellen.<br><br>
					<i>Frage vorher immer deine Eltern bevor du dir etwas kostenpflichtiges bestellst!</i>
					</div>
                </div>
            </div>
			</form>
        </div>
	
	<!- INCLUDE Standard/footer ->
</div>

