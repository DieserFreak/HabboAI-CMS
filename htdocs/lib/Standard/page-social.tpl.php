<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_community ->

<br>
<div id="content">
	<div id="right-column">
		<div class="box">
			<h1>Ofizielle Hobba Fanseite</h1>
			<div class="socialmedia-item">
				<h2>Platzhalter</h2>
				<br>
				Text ....
			</div>
			<div class="socialmedia-item">
				<h2>Platzhalter</h2>
				<br>
				Text ....
			</div>
		</div>
	</div>
	<div id="left-column">
		<div class="box">
			<h1>Offizielle soziales Netzwerk f&uuml;r Hobba Hotel</h1>
			<!- IF fbstatus == 1 ->
			<div class="socialmedia-item">
				<a href="https://facebook.com/{fblink}" style="float:right;" target="_blank" class="btn medium green condensed">Facebookseite &raquo;</a>
				<h2>Facebook</h2>
				<br>
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Ffacebook.com%2F{fblink}&amp;width=465&amp;height=300&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:465px; height:300px;" allowTransparency="true"></iframe>
			</div>
			<!- ENDIF ->
			<!- IF twstatus == 1 ->
			<div class="socialmedia-item">
				<a href="http://twitter.com/{twname}" target="_blank" style="float:right;" class="btn medium green condensed">Twitterseite &raquo;</a>
				<h2>Twitter</h2>
				<br>
				<div style="width:465px;font-size:8px;text-align:right;"><script type="text/javascript">
				document.write(unescape("%3Cscript src='http://twitterforweb.com/twitterbox.js?username={twname}&settings=1,0,1,450,400,f4f4f4,1,c4c4c4,ffffff,1,1,07cddb' type='text/javascript'%3E%3C/script%3E"));</script></div>
			</div>
			<!- ENDIF ->
		</div>
	</div>
</div>

<!- INCLUDE Standard/footer ->