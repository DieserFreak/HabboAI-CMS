<!- INCLUDE new-era/header ->
	<div id="column" style="width:35%">
		<div id="content">
			<div id="boxtitle">Letzte News</div>
			<div id="box">
			<ul class="stories-list">
			<!- BEGIN newslist ->
<!- IF newslist.ID == NEWSGET->
<li><a href="{url}/news/{newslist.ID}" style="text-decoration: underline;">{newslist.TITLE} &raquo;</a></li>
	<!- ELSE ->
<li><a href="{url}/news/{newslist.ID}">{newslist.TITLE} &raquo;</a></li>	
<!- ENDIF ->
<!- END newslist ->
			</ul>
			</div>
		</div>
	</div>
	
	<div id="column" style="width:65%">
		<div id="content">
			<div id="boxtitle">{TITLE}</div>
			<div id="box">
			<span class="article-date">{DATE} - {CATEGORY}</span><br />
			<p>{TEXT}</p>
			<span class="article-author">{AUTOR}</span>
			<!- IF IMAGES ->
			<hr class="article-hr">
			<!- BEGIN newsimages ->
			<a class="lightbox-image-link" href="{newsimages.IMGURL}" data-lightbox="news{NEWSID}" title="Newsbilder"><img class="lightbox-image" src="{newsimages.IMGURL}" style=""></a>
			<!- END newsimages ->
			<!- ENDIF ->

			<!- IF SURVEY == 1 ->
			<hr class="article-hr">
				<!- IF SURVEYSTARTTI < TIMENOW ->
					<!- IF SURVEYENDTIME > TIMENOW ->
						<!- IF SURVEYCHECK < 1 ->
							<!- IF SURVEYART == 1 ->
							<p>{SURVEYQUESTION}</p>
							<form id="survey" action="" method="post">
							<input type="text" name="answer" placeholder="" class="active">
							<input class="btns green" type="submit" value="Absenden" style="width:20%;">
							<br /><br /><br />
							</form>
							<!- ELSEIF SURVEYART == 2 ->
							<p>{SURVEYQUESTION}</p>
							<form id="survey" action="" method="post">
							
							<select name="answer" class="dateselector">
								<option value="">Antwort w&auml;hlen</option>
								<!- BEGIN surveyop ->
								<option value="{surveyop.OPTIONID}">{surveyop.OPTION}</option>
								<!- END surveyop ->
							</select>
							
							<input class="btns green" type="submit" value="Absenden" style="width:20%;">
							<br /><br /><br />
							</form>
							<!- ENDIF ->
						<!- ELSE ->
						<p><center>Du hast dich bereits teilgenommen!</center></p>
						<!- ENDIF ->
					<!- ELSE ->
					<p><center>Der Wettbewerb ist abgelaufen.</center></p>
					<!- ENDIF ->
				<!- ELSE ->
					<p><center>Die Umfrage ist noch nicht gestartet!</center></p>
					<!- ENDIF ->
			<!- ENDIF ->
			</div>
		</div>
	</div>
<!- INCLUDE new-era/footer ->