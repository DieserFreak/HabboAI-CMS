<!- INCLUDE new-era/header ->

<br>
<div id="content">
	<div id="right-column">
		<div class="box">
			<h1>Oops ... !</h1>
				<img src="{themeurl}/img/frank/frank_23.gif" style="float:left;margin-right:10px;">
				Oops ... ! Irgendetwas ist wohl schief gelaufen. Wir bitten um Entschuldigung! Falls es um Fehler handeln, kontaktieren Sie die Mitarbeiter.
		</div>
	</div>
	<div id="left-column">
		<div class="box">
			<!- IF ERROR == 1 ->
			<h1>Client Error</h1>
			<img src="{themeurl}/img/frank/frank_14.gif" style="float:left;margin-right:10px;">
			Huch ... ?! Was ist da wohl passiert? Bitte laden Sie die Client erneut, vielleicht funktioniert es n&auml;chstes mal wieder! Falls es aber immer noch nicht funktioniert, dann kontaktieren Sie die Mitarbeiter. Wir k&uuml;mmern uns daran!<br /><br /><i>Hobba Team</i>
			<!- ELSE ->
			<h1>Error</h1>
			<img src="{themeurl}/img/frank/frank_14.gif" style="float:left;margin-right:10px;">
			Huch ... ?! Was ist da wohl passiert? Wahrscheinlich existiert die ausgew&auml;hlte Seite überhaupt nicht. Falls das nicht das Problem ist, dann kontaktieren Sie die Mitarbeiter. Wir k&uuml;mmern uns daran!<br /><br /><i>Hobba Team</i>
			<!- ENDIF ->
		</div>
	</div>
</div>

<!- INCLUDE new-era/footer ->