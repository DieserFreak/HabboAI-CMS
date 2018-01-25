<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_shop ->

<br>
<div id="content">
	<div id="right-column" class="badgeshop">
		<div class="box">
			<h1 class="lightblue">Diamanten kaufen</h1>
			<p>
				Hast du nicht genug Diamanten? Dann kauf die Diamanten im Diamantenshop oder warten bis morgen auf deiner Tagesbelohnung.
			</p>
			<a href="{url}/shop/dias" style="float:right;margin-right:0px" class="btn medium green condensed">Diamanten kaufen &raquo;</a>
		</div>
		<div class="box">
			<h1 class="lightblue">Wie funktioniert das?</h1>
			<p>
				Wenn du eine Umfrage im Raum erstellen m&ouml;chtest, musst du nur einfach eine Frage und die zusätzliche Antworten aufschreiben und auf "Erstellen" klicken.<br /><br /><b>Hinweis:</b><br />Du musst in deinem Raum befinden!
			</p>
		</div>
	</div>
	<div id="left-column" class="badgeshop">
		<div class="box">
			<div class="credits-teaser" style="position:relative;">
				<img style="position:absolute;margin-left:-100px;margin-top:25px;" src="{themeurl}img/polls/survey.gif">
				<h1>Habbo Umfrage</h1>
				<p>
					Zeigt deine Umfrage in deinem Raum und lass dich wissen, welche Antworten die User auswählen!
				</p>
			</div>
		</div>
		<div class="box">
			<h1>Umfrage erstellen</h1>
			<!- IF ERROR == 1 -><div class="message error vampire">Um eine Umfrage erstellen zu k&ouml;nnen, ben&ouml;tigst du 2 Diamanten.</div><br />
			<!- ELSEIF ERROR == 2 -><div class="message error vampire">Du musst dich in einen deiner R&auml;ume befinden, um eine Umfrage erstellen zu k&ouml;nnen.</div><br />
			<!- ELSEIF ERROR == 3 -><div class="message error vampire">Um eine Umfrage erstellen zu k&ouml;nnen, musst du eine Frage eingeben (mindestens 5 Zeichen).</div><br />
			<!- ELSEIF ERROR == 4 -><div class="message error vampire">Um eine Umfrage erstellen zu k&ouml;nnen, ben&ouml;tigst du mindestens zwei Antwortm&ouml;glichkeiten!</div><br />
			<!- ELSEIF ERROR == 5 -><div class="message success">Die Umfrage erscheint in deinem aktuellen Raum!</div><br />
			<!- ENDIF ->
			<form method="post">
				
			<input name="question" type="text" style="margin-left:1px; padding-left:4px;" value="{QUESTION}" placeholder="Gebe hier die Frage f&uuml;r deine Umfrage ein...">
			<br>
			<input type="text" name="a" value="{ANSWER_A}" placeholder="Gebe hier eine Antwortm&ouml;glichkeit ein..." style="background-image:url('{themeurl}img/polls/a.png'); background-position:2px; padding-left:35px; background-repeat:no-repeat; border-radius:5px; border:none; border-width:0px; background-color:#d1d1d1; margin-bottom:3px; width:80%;"> 
			<input type="text" name="b" value="{ANSWER_B}" placeholder="Gebe hier eine Antwortm&ouml;glichkeit ein..." style="background-image:url('{themeurl}img/polls/b.png'); background-position:2px; padding-left:35px; background-repeat:no-repeat; border-radius:5px; border:none; border-width:0px; background-color:#d1d1d1; margin-bottom:3px; width:80%;"> 
			<input type="text" name="c" value="{ANSWER_C}" placeholder="Gebe hier eine Antwortm&ouml;glichkeit ein... (Optional)" style="background-image:url('{themeurl}img/polls/c.png'); background-position:2px; padding-left:35px; background-repeat:no-repeat; border-radius:5px; border:none; border-width:0px; background-color:#d1d1d1; margin-bottom:3px; width:80%;"> 
			<input type="text" name="d" value="{ANSWER_D}" placeholder="Gebe hier eine Antwortm&ouml;glichkeit ein... (Optional)" style="background-image:url('{themeurl}img/polls/d.png'); background-position:2px; padding-left:35px; background-repeat:no-repeat; border-radius:5px; border:none; border-width:0px; background-color:#d1d1d1; margin-bottom:3px; width:80%;"> 
			<input type="text" name="e" value="{ANSWER_D}" placeholder="Gebe hier eine Antwortm&ouml;glichkeit ein... (Optional)" style="background-image:url('{themeurl}img/polls/e.png'); background-position:2px; padding-left:35px; background-repeat:no-repeat; border-radius:5px; border:none; border-width:0px; background-color:#d1d1d1; margin-bottom:3px; width:80%;"> 

			<p>Mit dem Kauf einer Umfrage akzeptierst du unsere Regeln und die Geb&uuml;hr von <b>2 Diamanten</b> pro Umfrage. Die Umfrage erscheint in deinem Raum, in dem du dich derzeit <b>befindest</b>.</p>
			
			<input type="submit" class="btns red" name="submit" value="Umfrage erstellen &raquo;" style="width:98%;">
			</form>
		</div>
	</div>
</div>

<!- INCLUDE new-era/footer ->