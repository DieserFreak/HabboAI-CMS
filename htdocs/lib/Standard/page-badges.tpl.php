<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_shop ->

<script type="text/javascript" src="{themeurl}js/badgeshop.js"></script>

<br>
<div id="content">
	<div id="right-column" class="badgeshop">
		<div class="box_new" style="height:230px;">
			<div class="content">
			<h4>Taler kaufen</h4><hr></hr>
			<p>
				Hast du nicht genug Taler? Dann kauf die Taler im Talershop oder warten bis morgen auf deiner Tagesbelohnung.
			</p>
			<a href="{url}/shop" style="float:right;margin-right:0px" class="btn medium green condensed">Taler kaufen &raquo;</a>
		</div></div>
		<div class="box_new">
			<div class="content">
			<h4>Wie funktioniert das?</h4><hr></hr>
			<p>
				Wenn du ein Badge kaufen m&ouml;chtest, musst du nur einfach auf ein gew&uuml;nschte Badge anklicken. So einfach ist es!
			</p>
		</div></div>
	</div>
	<div id="left-column" class="badgeshop">
		<div class="box">
			<div class="credits-teaser" style="position:relative;">
				<img style="position:absolute" src="{themeurl}img/habbo_credits_teaser.png">
				<h1>Hobba Badges</h1>
				<p>
					Badges kaufen für deinen Hobba. Ein Badge sagt viel über dich, so w&auml;hlst du auch ein gutes Stil!
				</p>
			</div>
		</div>
		<div class="box_new">
			<div class="content">
			<h4>Badges zum Verkaufen</h4><hr></hr>
			<div id="error"></div>
			<div id="badge-list" class="habbo-scroll" style="overflow-y:scroll">
			<!- BEGIN badgeshop ->
				<span class="badge-item" badgeid="{badgeshop.ID}">
					<img src="{url}/{badgesurl}{badgeshop.BADGE}.gif">
					<div>
						{badgeshop.NAME}
					</div>
					<span class="cost">
					<!- IF badgeshop.COSTTALER != 0 ->{badgeshop.COSTTALER} Taler<!- ENDIF -><!- IF badgeshop.COSTTALER != 0 AND badgeshop.COSTDIAS != 0 -> / <!- ENDIF -><!- IF badgeshop.COSTDIAS != 0 -> {badgeshop.COSTDIAS} Diamanten<!- ENDIF -> <br>
					<!- IF badgeshop.LIMITED == 1 ->
					<i>Limitiertes Badge - noch {badgeshop.LIMITEDSEL} von {badgeshop.LIMITEDMAX} verf&uuml;gbar!</i>
					<!- ENDIF ->
					</span>
				</span>
			<!- END ->
				</div>
			</div>
		</div>
	</div>
</div>

<!- INCLUDE Standard/footer ->