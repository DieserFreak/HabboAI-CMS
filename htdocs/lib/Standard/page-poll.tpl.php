<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_shop ->
</br>
</br>
		
<style>
input{
	height:30px;
	padding-top:1%;
	font-family: Open Sans;
	font-weight:300;
	padding-left:10px;
	color:#fff;
}
</style>
<div id="main" class="container_12 animated fadeInLeft">
<!- IF ERROR == 1 -><div class="message error" style="margin-top: 10px;margin-bottom: -43px;">Um eine Umfrage erstellen zu k&ouml;nnen, ben&ouml;tigst du 2 Diamanten.</div><br />
					<!- ELSEIF ERROR == 2 -><div class="message error" style="margin-top: 10px;margin-bottom: -43px;">Du musst dich in einen deiner R&auml;ume befinden, um eine Umfrage erstellen zu k&ouml;nnen.</div><br />
					<!- ELSEIF ERROR == 3 -><div class="message error" style="margin-top: 10px;margin-bottom: -43px;">Um eine Umfrage erstellen zu k&ouml;nnen, musst du eine Frage eingeben (mindestens 5 Zeichen).</div><br />
					<!- ELSEIF ERROR == 4 -><div class="message error" style="margin-top: 10px;margin-bottom: -43px;">Um eine Umfrage erstellen zu k&ouml;nnen, ben&ouml;tigst du mindestens zwei Antwortm&ouml;glichkeiten!</div><br />
					<!- ELSEIF ERROR == 5 -><div class="message success"  style="margin-top: 10px;margin-bottom: -43px;">Die Umfrage erscheint in deinem aktuellen Raum!</div><br />
					<!- ENDIF ->
				<div class="boxd" style="height:430px;width: 98%;margin-top: 30px;">
					<div class="title9" style="width: 97.4%;">Umfrage erstellen</div>
					<div id="content" style="margin-top: 15px;">
					
						<form method="post">
							<input name="question"  type="text" style="margin-left: 1px;background-position: 2px;padding-left: 35px;background-repeat: no-repeat;border-radius: 0 0 4px 4px;border: none;border-width: 0px;margin-bottom: 3px;background-color: #F4F4F4;width: 50%;color: #969696;font-size: 13px;margin-top: 1%;border-radius: 3px;" value="{QUESTION}" placeholder="Gebe hier die Frage f&uuml;r deine Umfrage ein..."></br>
							<input type="text" name="a" value="{ANSWER_A}" placeholder="(A) Gebe hier eine Antwortm&ouml;glichkeit ein..." style="margin-left: 1px;background-position: 2px;padding-left: 35px;background-repeat: no-repeat;border-radius: 0 0 4px 4px;border: none;border-width: 0px;margin-bottom: 3px;background-color: #F4F4F4;width: 50%;color: #969696;font-size: 13px;border-radius: 3px;"> 
							<input type="text" name="b" value="{ANSWER_B}" placeholder="(B) Gebe hier eine Antwortm&ouml;glichkeit ein..." style="margin-left: 1px;background-position: 2px;padding-left: 35px;background-repeat: no-repeat;border-radius: 0 0 4px 4px;border: none;border-width: 0px;margin-bottom: 3px;background-color: #F4F4F4;width: 50%;color: #969696;font-size: 13px;border-radius: 3px;"> 
							<input type="text" name="c" value="{ANSWER_C}" placeholder="(C) Gebe hier eine Antwortm&ouml;glichkeit ein... (Optional)" style="margin-left: 1px;background-position: 2px;padding-left: 35px;background-repeat: no-repeat;border-radius: 0 0 4px 4px;border: none;border-width: 0px;margin-bottom: 3px;background-color: #F4F4F4;width: 50%;color: #969696;font-size: 13px;border-radius: 3px;"> 
							<input type="text" name="d" value="{ANSWER_D}" placeholder="(D) Gebe hier eine Antwortm&ouml;glichkeit ein... (Optional)" style="margin-left: 1px;background-position: 2px;padding-left: 35px;background-repeat: no-repeat;border-radius: 0 0 4px 4px;border: none;border-width: 0px;margin-bottom: 3px;background-color: #F4F4F4;width: 50%;color: #969696;font-size: 13px;border-radius: 3px;"> 
							<input type="text" name="e" value="{ANSWER_D}" placeholder="(E) Gebe hier eine Antwortm&ouml;glichkeit ein... (Optional)" style="margin-left: 1px;background-position: 2px;padding-left: 35px;background-repeat: no-repeat;border-radius: 0 0 4px 4px;border: none;border-width: 0px;margin-bottom: 3px;background-color: #F4F4F4;width: 50%;color: #969696;font-size: 13px;border-radius: 3px;"> 
							
							</br>
							Absofort kannst du eine Umfrage f&uuml;r nur <b>2 Diamanten</b> in deinem eigenen Raum starten.
							<input type="submit" class="button red" name="submit" value="Umfrage erstellen &raquo;" style="width: 100%;height:40px;">
		              	</form>
						
				
					</div>
				</div>
			</div>
		

			
	<div style="clear:both;"></div><div class="grid_12 animated fadeInLeft">
	<div class="container_12">
		<span id="footer"> 

<center><div style="margin-left: 470px;" class="footer_remote">
<span class="corners-top"><span></span></span>
<table cellspacing="5" style="float:right;" id="socialnetwork"><tbody><tr>
<td style="font-family: Ubuntu; font-size: 25px; text-transform: uppercase; text-shadow: 0px -1px #093E74; color: white;">Folge uns: </td><td>
<td><a target="_blank" href="https://www.facebook.com/">
<img src="/lib/standard/img/neu/incon/2XA27.png"></a></td>
<td><a target="_blank" href="https://www.instagram.com/">
<img src="/lib/standard/img/neu/incon/5INSTA6.png"></a></td>
<table style="float: left; margin-top: 5px;"><tbody><tr><td><a name="bottom" class="copyright" href="/#" rel="follow" target="_top" title="" style="line-height: 35px;font-size: 13px;">&copy; 2017 HabboGY</a></td>
           
