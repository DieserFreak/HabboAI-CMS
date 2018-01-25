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

<!- IF ERROR == 1 -><div class="message error" style="margin-left: 10px;margin-top: 330px;margin-bottom: -36px;">Bitte eine gew&uuml;nschte Taleranzahl ausw&auml;hlen</div><br />
		<!- ELSEIF ERROR == 2 -><div class="message error" style="margin-left: 10px;margin-top: 330px;margin-bottom: -36px;">Der PaySafeCard Code muss 16 Zahlen haben</div><br />
		<!- ELSEIF ERROR == 3 -><div class="message error" style="margin-left: 10px;margin-top: 330px;margin-bottom: -36px;">Aktuell hast du schon ein Bestellung f&uuml;r Taler  gesendet - Hab bitte Geduld</div><br />
		<!- ELSEIF ERROR == 4 -><div class="message error" style="margin-left: 10px;margin-top: 330px;margin-bottom: -36px;">Die Bestellung wurde erfolgreich zugesandt - Bitte hab Geduld, da es 48h dauern kann</div><br />
		<!- ENDIF ->
	
	<div class="container_12 animated fadeInLeft">
	
	<div id="column" class="viphobba" style="">
    <div class="boxvip">
<img galleryimg="no" src="http://www.habbo.com/habbo-imaging/avatarimage?figure={USERAVATAR}&amp;size=l&amp;head_direction=3&amp;gesture=sad" align="left" style="margin-top: -69px;margin-left: -18px;height: 180px;">
            <b>{USERNAME}</b><br>
            <p>
                Du hast noch keine Zauberkiste gekauft!
            </p>
        
    </div>
</div>
	
	<form id="buycredits" method="post">
            <div class="grid_6">
                <div class="boxd" style="margin-top: 10px;">
                    <div class="title9" style="width: 95%;">Unsere Angebote</div>
					<!- BEGIN shopvip ->
					<div class="boxdesc" style="width: 93.5%;">
			<input id="{shopvip.ID}" type="radio" name="shopid" value="{shopvip.ID}"> 
			<label for="{shopvip.ID}"><span class="cost">{shopvip.COST},- &euro; </span><span class="small">x</span><span>{shopvip.DAYS} Zauberkisten</span><div ng-class="'product-icon--' + ProductIconController.iconId" class="product-icon product-icon--4"></div> </label>
			</div><!- END ->
					
					<div class="boxhead" style="width: 91.5%;">
					<input id="passwort" type="text" name="psc" placeholder="PaySafeCard Code" data-inputmask="'mask': '0999-9999-9999-9999'" style="float:left;margin-top: 0px;margin-left: 0px;">
					<input class="button" type="submit" name="submit" value="Kaufen" style="width: 30%;float:right;margin-right: 11px;margin-top: -1px;border-radius: 3px;">
					</div>
					
                </div>
            </div>

            <div class="grid_4">
                <div class="boxd" style="margin-left: -1px;width: 154%;">
                    <div class="title9" style="width: 95%;">Informationen</div>
					<div class="boxdesc" style="width:87%;">
					Der Zauberer Frank hat im Lager eine Menge Zauberkisten stehen.<br><br> In jeder Kiste befindet eine exklusive Rare, welche Kiste du bekommst ist unklar.<br><br>Eins aber ist sicher, diese Rares sind einmalig!
					</div>
                </div>
            </div>
			
			 <div class="grid_4">
                <div class="boxd" style="width: 461px;">
                    <div class="title9" style="width: 95%;">Wie bekomm ich Zauberkisten?</div>
					 <div class="boxdesc" style="width:87%;height: 93px;">
	Du bekommst bereits ab 5 Euro Zauberkisten.<br/><br/> Bezahlt wird das Ganze mit einer PaySafeCard, die es sogut wie an jeder Tankstelle und an jedem Kiosk zu kaufen gibt.
					</div>
                </div>
            </div>
			</form>
        </div>
	
	<!- INCLUDE Standard/footer ->
</div>