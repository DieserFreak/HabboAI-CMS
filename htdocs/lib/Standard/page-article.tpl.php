<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_news ->
</div>
</div>
</div>
</br></br>

	<div class="container_12 animated fadeInLeft">
            <div class="grid_12">
                <div class="boxd" style="margin-top: 10px;width: 100%;">
                    <div class="boxhead">
                        <div style="float: left;">{TITLE}</div>
                        <div style="float: right;">{DATE}</div>
                    </div>
                    <div class="boxdesc">{DESC}</div>
                    
                    <span style="line-height: 22px; margin-bottom: 15px;">
                        
                        {TEXT}
                    </span>
                    
                    <div class="boxautor">
                        <div style="float: left; opacity: 0.8;">
                            Artikel verfasst von <font color="#3498db">{AUTOR}</font>
                        </div>
                    </div>
                </div>
            </div>
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
			<p>Du hast bereits teilgenommen!</p>
			<!- ENDIF ->
		<!- ELSE ->
		<p>Der Wettbewerb ist abgelaufen.</p>
		<!- ENDIF ->
	<!- ELSE ->
		<p>Die Umfrage hat noch nicht gestartet!</p>
		<!- ENDIF ->
<!- ENDIF ->
		
		<!- INCLUDE Standard/footer ->
		</div></div>
	</div>
</div>


<div style="clear:both;"></div>
