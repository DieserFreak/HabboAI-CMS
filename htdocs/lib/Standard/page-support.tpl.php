<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_main ->
</div>
</div>
</div>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<div id="main" class="container_12 animated fadeInLeft">
		<!- IF INFO == 1 -><div class="box"><span class="message error vampire"><script>alert("Fehler! Bitte versuche es erneut.")</script></span></div><br />
		<!- ELSEIF INFO == 2 -><div class="box"><script>alert("Beschreibe dein Anliegen bitte mit mindestens 30 Zeichen.")</script></span></div><br />
		<!- ELSEIF INFO == 3 -><script>alert("Du hast bereits 5 Tickets erstellt.\rBitte warte bis deine Tickets bearbeitet werden, ehe du dir neue erstellst!")</script></span><br />
		<!- ELSEIF INFO == 4 -><script>alert("Dein Ticket wurde erfolgreich erstellt und an unser Support-Team gesendet.\rIn kürze wird sich ein Mitarbeiter mit dir in Kontakt setzen.")</script></span><br />
		<!- ENDIF ->

			<!- IF SUPOPEN == 1 ->
			
			<div class="container_12 animated fadeInLeft">
            <div class="grid_12">
                <div class="boxd" style="margin-top: 10px;width: 100%;">
                   <div class="boxhead" style="width: 95.7%;">
                        <div style="float: left;">{name} Support</div>
                    </div>
					<div class="boxdesc">
					<form id="support" action="" method="post">			
						<div class="boxdesc">Dein Username <input class="disabled" id="passwort" type="text" value="{USERNAME}" disabled="" style="float: right;"></div>
						<div class="boxdesc">Worum geht es bei deinem Problem? 
													<select name="topic" class="settings" style="width:auto;">
														<option value="Probleme mit Account oder Client">Probleme mit Account oder Client</option>
														<option value="Ideen bzw. Verbesserungsvorschl&auml;ge">Ideen bzw. Verbesserungsvorschl&auml;ge</option>
														<option value="Newsevent">Newsevent</option>
														<option value="Multiaccount anmelden">Multiaccount anmelden</option>
														<option value="Usernamen &auml;ndern">Username &auml;ndern</option>
														<option value="Beschwerde">Beschwerden einreichen</option>
														<option value="Fehler melden">Fehler melden</option>
														
													</select></div>
						<div class="boxdesc">Priorit&auml;t 
														<select name="prioritaet" class="settings" style="width:auto;">
															<option value="1">Niedrig</option>
															<option value="2">Mittel</option>
															<option value="3">Hoch</option>
														</select>
														</div>
						<div class="boxdesc">Schildere hier bitte ausf&uuml;hrlich dein Problem.<br>Nur so k&ouml;nnen wir dir helfen!<br>		
						</br><textarea name="text" rows="15" style="width:100%;font-family:Montserrat;"></textarea>
						</div>
						
						<div class="boxhead">Alles ausgef&uuml;llt?<input class="button" type="submit" name="submit" value="Senden" style="width:20%;float:right; margin-right:10px; margin-top:0px">
							</div>
					
					</form>
					
				</div>
					</div>
						</div>
							</div>
							
							<!- BEGIN usersupport ->
		
            <div class="container_12 animated fadeInLeft">
            <div class="grid_12">
                <div class="boxd" style="margin-top: 10px;width: 100%;">
                   <div class="boxhead">
                        <div style="float: left;">Antwort zu deinem Support-Ticket (#{usersupport.TICKETID})</div><div style="float:right">{usersupport.ANSWERDATE}</div>
                    </div>
					<div class="boxdesc" style="font-size:15px;"><p>Hallo {USERNAME}!<br>Dein Support-Ticket wurde von einem Mitarbeiter bearbeitet.<br><br>
					Thema: <b>{usersupport.TOPIC}</b><br>
					Status: <b style="color:red">geschlossen</b></t><br><br>
					</br><d><b>Antwort von einem HabboGY Staff</b> <br> <i>{usersupport.ANSWER}</i><br><br> Mit freundlichen Gr&uuml;&szlig;en,<br>Das Supportteam<br><br>
					
							</d>
							</div>
                </div>		
            </div>
			
<!- END usersupport ->
			
			<!- ELSE -> 
				<center>Tut uns leid, aber aktuell k&ouml;nnen keine Hilferufe entgegen genommen werden!</center>
			<!- ENDIF ->


<!- INCLUDE Standard/footer ->

</div>