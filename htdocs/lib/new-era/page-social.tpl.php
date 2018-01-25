<!- INCLUDE new-era/header ->
	<div id="column" style="width:60%">
		<!- IF fbstatus == 1 ->
		<div id="content">
			<div id="boxtitle">Offizielle Facebook Seite</div>
			<div id="box">
				<a href="https://facebook.com/{fblink}" style="float:right;" target="_blank">Facebookseite &raquo;</a>
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Ffacebook.com%2F{fblink}&amp;width=500&amp;height=300&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:300px;" allowTransparency="true"></iframe>
			</div>
		</div>
		<!- ENDIF ->
		<!- IF twstatus == 1 ->
		<div id="content">
			<div id="boxtitle">Offizielle Twitter Seite</div>
			<div id="box">
				<a href="http://twitter.com/{twname}" target="_blank" style="float:right;">Twitterseite &raquo;</a>
				<div style="width:465px;font-size:8px;text-align:right;"><script type="text/javascript">
				document.write(unescape("%3Cscript src='http://twitterforweb.com/twitterbox.js?username={twname}&settings=1,0,1,450,400,f4f4f4,1,c4c4c4,ffffff,1,1,07cddb' type='text/javascript'%3E%3C/script%3E"));</script></div>
			</div>
		</div>
		<!- ENDIF ->
	</div>
	<div id="column" style="width:40%">
		<div id="content">
			<div id="boxtitle">Ofizielle Hobba Fanseite</div>
			<div id="box" style="text-align: center;">
				-/-
			</div>
			<div id="box" style="text-align: center;">
				-/-
			</div>
		</div>
	</div>
<!- INCLUDE new-era/footer ->