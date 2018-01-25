<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */
 
header('Content-Type: text/html; charset=UTF-8');
require ('../../inc/base.inc.php');
require ('../../inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['commands']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

$active = 'commands';
$headtitle = 'Commandliste';
$toptitle = 'Housekeeping <small>Commandliste</small>';
$title = 'Housekeeping </li><li class="active">Commandliste</li>';
require ('./header.php');
?>
<section class="content">
	<div class="row">
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
			<li class="active"><a href="#wired" data-toggle="tab">STAFF Wired</a></li>
			<li><a href="#1" data-toggle="tab">User</a></li>
			<li><a href="#2" data-toggle="tab">VIP</a></li>
			<li><a href="#3" data-toggle="tab">Sponsor</a></li>
			<li><a href="#4" data-toggle="tab">eXperte & GameX</a></li>
			<li><a href="#5" data-toggle="tab">DJ</a></li>
			<li><a href="#6" data-toggle="tab">Moderatorion</a></li>
			<li><a href="#7" data-toggle="tab">Event Management</a></li>
			<li><a href="#8" data-toggle="tab">Community Management</a></li>
			<li><a href="#9" data-toggle="tab">Hotelmanagement</a></li>
			<li><a href="#10" data-toggle="tab">Entwickler</a></li>
			<li><a href="#planung" data-toggle="tab">Commands in Planung</a></li>
		</ul>
			  <div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="wired">
				  <p><h2>STAFF Wired (nicht alle hast du Zugriff, es ist vom Rank abhängig)</h2></p>
				  <div class="row">
				  <div class="col-lg-6">
						<b>STAFF WIRED: Effekt - Anleitung (Beispiel: "badge:ADM" - ohne Leerzeichen benutzen!)</b><br/><br/>
						<table width='100%' cellspacing='0' cellpadding='5' align='center' border='0' class="table table-bordered table-hover tablesorter">
						<thead><tr>
						<th width='5%'>Befehl</th>
						<th width='15%'>Value</th>
						<th width='80%'>Info</th>
						</tr></thead><tbody>
						<tr><td width='5%' valign='middle'>badge:</td><td class='tablerow2'  width='15%' valign='middle'>(-)CODE</td><td class='tablerow2'  width='80%' valign='middle'>Badge geben (abziehen)</td></tr>
						<tr><td width='5%' valign='middle'>effect:</td><td class='tablerow2'  width='15%' valign='middle'>EFFECTID</td><td class='tablerow2'  width='80%' valign='middle'>Effect geben</td></tr>
						<tr><td width='5%' valign='middle'>send:</td><td class='tablerow2'  width='15%' valign='middle'>RAUMID</td><td class='tablerow2'  width='80%' valign='middle'>in anderen Raum teleportieren</td></tr>
						<tr><td width='5%' valign='middle'>send:</td><td class='tablerow2'  width='15%' valign='middle'>0</td><td class='tablerow2'  width='80%' valign='middle'>User kicken</td></tr>
						<tr><td width='5%' valign='middle'>credits:</td><td class='tablerow2'  width='15%' valign='middle'>(-)ANZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Taler geben (abziehen)</td></tr>
						<tr><td width='5%' valign='middle'>pixels:</td><td class='tablerow2'  width='15%' valign='middle'>(-)ANZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Pixels geben (abziehen)</td></tr>
						<tr><td width='5%' valign='middle'>points:</td><td class='tablerow2'  width='15%' valign='middle'>(-)ANZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Diamanten geben (abziehen)</td></tr>
						<tr><td width='5%' valign='middle'>handitem:</td><td class='tablerow2'  width='15%' valign='middle'>HANDID</td><td class='tablerow2'  width='80%' valign='middle'>Handitem geben (z.B. Kaffee, Cola, Wein usw.)</td></tr>
						<tr><td width='5%' valign='middle'>dance:</td><td class='tablerow2'  width='15%' valign='middle'>DANCEID</td><td class='tablerow2'  width='80%' valign='middle'>User zum Tanzen bringen (1: Standardtanz / 2: Hap Hop / 3: Duck Funk / 4: Pogo Mogo)</td></tr>
						<tr><td width='5%' valign='middle'>alert:</td><td class='tablerow2'  width='15%' valign='middle'>Text</td><td class='tablerow2'  width='80%' valign='middle'>Ein Alert senden</td></tr>
						</tbody></table>
						<b>STAFF WIRED: Effekt - Optionen (Beispiel: "alert:Hallo #USERNAME#!")</b><br/><br/>
						<table width='100%' cellspacing='0' cellpadding='5' align='center' border='0' class="table table-bordered table-hover tablesorter">
						<thead><tr>
						<th width='5%'>Option</th>
						<th width='80%'>Info</th>
						</tr></thead><tbody>
						<tr><td width='5%' valign='middle'>#USERNAME#</td><td class='tablerow2'  width='80%' valign='middle'>zeigt die gezielte User an</td></tr>
						<tr><td width='5%' valign='middle'>#USERID#</td><td class='tablerow2'  width='80%' valign='middle'>zeigt die gezielte User ID an</td></tr>
						<tr><td width='5%' valign='middle'>#ROOMNAME#</td><td class='tablerow2'  width='80%' valign='middle'>zeigt die gezielte Raumname an</td></tr>
						<tr><td width='5%' valign='middle'>#ROOMID#</td><td class='tablerow2'  width='80%' valign='middle'>zeigt die gezielte Raum ID an</td></tr>
						<tr><td width='5%' valign='middle'>#ONLINECOUNT#</td><td class='tablerow2'  width='80%' valign='middle'>zeigt die Useronline an</td></tr>
						<tr><td width='5%' valign='middle'>#ROOMSLOADED#</td><td class='tablerow2'  width='80%' valign='middle'>zeigt die insgesamte Raum geladen an</td></tr>
						</tbody></table>
					</div>
					<div class="col-lg-6">
						<b>STAFF WIRED: Bedingung - Anleitung (Beispiel: "userhasbadge:ADM" - ohne Leerzeichen benutzen!)</b><br/><br/>
						<table width='100%' cellspacing='0' cellpadding='5' align='center' border='0' class="table table-bordered table-hover tablesorter">
						<thead><tr>
						<th width='5%'>Befehl</th>
						<th width='15%'>Value</th>
						<th width='80%'>Info</th>
						</tr></thead><tbody>
						<tr><td width='5%' valign='middle'>userhasbadge:</td><td class='tablerow2'  width='15%' valign='middle'>CODE</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User Badge "CODE" hat, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userhasntbadge:</td><td class='tablerow2'  width='15%' valign='middle'>CODE</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User kein Badge "CODE" hat, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userhaseffect:</td><td class='tablerow2'  width='15%' valign='middle'>EFFECTID</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User Effekt "ID" tr&auml;gt, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userhasnteffect:</td><td class='tablerow2'  width='15%' valign='middle'>EFFECTID</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User kein Effekt "ID" tr&auml;gt, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>carrying:</td><td class='tablerow2'  width='15%' valign='middle'>HANDID</td><td class='tablerow2'  width='80%' valign='middle'>Wenn User auf der Hand "HANDID" hat, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>notcarrying:</td><td class='tablerow2'  width='15%' valign='middle'>HANDID</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User nicht auf der Hand "HANDID" hat, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>wearing:</td><td class='tablerow2'  width='15%' valign='middle'>CLOTHESID</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User "CLOTHESID" tr&auml;gt, dann ... (z.B.: hd-180-1.ch-210-66.lg-270-82.sh-290-91.hr-100-)</td></tr>
						<tr><td width='5%' valign='middle'>notwearing:</td><td class='tablerow2'  width='15%' valign='middle'>CLOTHESID</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User nicht "CLOTHESID" tr&auml;gt, dann ... (z.B.: hd-180-1.ch-210-66.lg-270-82.sh-290-91.hr-100-)</td></tr>
						<tr><td width='5%' valign='middle'>userisingroup:</td><td class='tablerow2'  width='15%' valign='middle'>GROUPID</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User in Gruppe "ID" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userhasvip:</td><td class='tablerow2'  width='15%' valign='middle'>USERNAME</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User VIP Mitglied ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userhasntvip:</td><td class='tablerow2'  width='15%' valign='middle'>USERNAME</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User kein VIP Mitglied ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userrankeq:</td><td class='tablerow2'  width='15%' valign='middle'>RANKNR</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User Rank gleich "RANKNR" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userranklte:</td><td class='tablerow2'  width='15%' valign='middle'>RANKNR</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User Rank kleiner oder gleich als "RANKNR" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>userrankmte:</td><td class='tablerow2'  width='15%' valign='middle'>RANKNR</td><td class='tablerow2'  width='80%' valign='middle'>Wenn der User Rank gr&ouml;&szlig;er oder gleich als "RANKNR" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>roomuserseq:</td><td class='tablerow2'  width='15%' valign='middle'>ZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Wenn die Anzahl Raumuser gleich "ZAHL" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>roomuserslte:</td><td class='tablerow2'  width='15%' valign='middle'>ZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Wenn die Anzahl Raumuser kleiner oder gleich als "ZAHL" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>roomusersmte:</td><td class='tablerow2'  width='15%' valign='middle'>ZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Wenn die Anzahl Raumuser gr&ouml;&szlig;er oder gleich als "ZAHL" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>useronlineeq:</td><td class='tablerow2'  width='15%' valign='middle'>ZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Wenn die Anzahl Useronline gleich "ZAHL" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>useronlinelte:</td><td class='tablerow2'  width='15%' valign='middle'>ZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Wenn die Anzahl Useronline kleiner oder gleich als "ZAHL" ist, dann ...</td></tr>
						<tr><td width='5%' valign='middle'>useronlinemte:</td><td class='tablerow2'  width='15%' valign='middle'>ZAHL</td><td class='tablerow2'  width='80%' valign='middle'>Wenn die Anzahl Useronline gr&ouml;&szlig;er oder gleich als "ZAHL" ist, dann ...</td></tr>
						</tbody></table>
					</div>
					</div>
				</div>
				
			<?php
				$ranks = dbSelectS('*', 'ranks', "ORDER BY id DESC");
				while ($row = $ranks->fetch_array()) {
			?>
				<div class="tab-pane fade" id="<?php echo $row['id']; ?>">
				  <p><h2><?php echo $row['name']; ?></h2></p>
				  <?php if($user->UserData('rank') >= $row['id']){ ?>
				  <table width='50%' cellspacing='0' class="table table-hover tablesorter">
				<?php
					$permissions = dbSelect('*', 'permissions_ranks', "WHERE rank = '" . $row['id'] . "' LIMIT 1");
					while ($rowpermissions = $permissions->fetch_array()) {
				?>

					<?php if($rowpermissions['cmd_coords'] == 1){ ?><tr><td width='30%'>:coords</td><td>zeigt die aktuelle Koordinaten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_enable'] == 1){ ?><tr><td width='30%'>:enable [ID]</td><td>aktiviert ein Effekt</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_lay'] == 1){ ?><tr><td width='30%'>:lay</td><td>sich hinlegen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_handitem'] == 1){ ?><tr><td width='30%'>:handitem [ID]</td><td>aktiviert ein Handitem (Kaffee, Popcorn, etc.)</td></tr><?php } ?>
					<tr><td width='30%'>:pickall</td><td>nimmt alle M&ouml;bel im Raum auf</td></tr>
					<tr><td width='30%'>:unload</td><td>l&auml;dt den Raum neu</td></tr>
					<tr><td width='30%'>:disablediagonal</td><td>verbietet das Laufen des Diagonals</td></tr>
					<tr><td width='30%'>:setmax [ZAHL]</td><td>&auml;ndert die maximale Anzahl an Usern in einem Raum</td></tr>
					<tr><td width='30%'>:redeemcredits</td><td>l&ouml;st alle Taler im Inventar als W&auml;hrung ein</td></tr>
					<tr><td width='30%'>:redeempixel</td><td>l&ouml;st alle Pixel im Inventar als W&auml;hrung ein</td></tr>
					<tr><td width='30%'>:ride [NAME]</td><td>reitet auf einer Pferd</td></tr>
					<tr><td width='30%'>:buy [ZAHL]</td><td>mehrere M&ouml;bel im Katalog gleichzeitig kaufen </td></tr>
					<tr><td width='30%'>:emptypets</td><td>l&ouml;scht alle deine Haustiere im Inventar</td></tr>
					<tr><td width='30%'>:emptyitems</td><td>l&ouml;scht alle deine M&ouml;bel im Inventar</td></tr>
					<?php if($rowpermissions['cmd_mimic'] == 1){ ?><tr><td width='30%'>:mimic [USERNAME]</td><td>kopiert die Habbo Style</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_follow'] == 1){ ?><tr><td width='30%'>:follow [USERNAME]</td><td>verfolgt ein User</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_push'] == 1){ ?><tr><td width='30%'>:push [USERNAME]</td><td>schubst einen User von dir weg</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_pull'] == 1){ ?><tr><td width='30%'>:pull [USERNAME]</td><td>zieht einen User zu dir</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_moonwalk'] == 1){ ?><tr><td width='30%'>:moonwalk</td><td>r&uuml;ckw&auml;rts gehen</td></tr><?php } ?>
				  	<?php if($rowpermissions['cmd_setspeed'] == 1){ ?><tr><td width='30%'>:setspeed [ZAHL]</td><td>&auml;ndert die Geschwindigkeit des Rollers im Raum</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_spush'] == 1){ ?><tr><td width='30%'>:spush [USERNAME]</td><td>schubst einen User von dir weg</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_spull'] == 1){ ?><tr><td width='30%'>:spull [USERNAME]</td><td>zieht einen User zu dir</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_bans'] == 1){ ?><tr><td width='30%'>:update_bans</td><td>updatet die Bannliste</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_spull'] == 1){ ?><tr><td width='30%'>:spull [USERNAME]</td><td>zieht einen USer zu dir</td></tr><?php } ?>
				    <?php if($rowpermissions['cmd_update_bots'] == 1){ ?><tr><td width='30%'>:update_bots</td><td>Bots updaten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_userinfo'] == 1){ ?><tr><td width='30%'>:userinfo [USERNAME]</td><td>zeigt die Informationen einen User</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roommute'] == 1){ ?><tr><td width='30%'>:roommute</td><td>l&auml;sst alle User im Raum muten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roomkick'] == 1){ ?><tr><td width='30%'>:roomkick [GRUND]</td><td>kickt alle User im Raum</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roomalert'] == 1){ ?><tr><td width='30%'>:roomalert [TEXT]</td><td>schickt ein Alert an alle User im Raum</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_mute'] == 1){ ?><tr><td width='30%'>:mute [USERNAME]</td><td>ein User mute</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_unmute'] == 1){ ?><tr><td width='30%'>:unmute [USERNAME]</td><td>ein User entmute</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_alert'] == 1){ ?><tr><td width='30%'>:alert [USERNAME] [TEXT]</td><td>ein Alert an einen User schicken</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_kick'] == 1){ ?><tr><td width='30%'>:kick [USERNAME] [GRUND]</td><td>ein User kicken</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_vipha'] == 1){ ?><tr><td width='30%'>:vipha [TEXT]</td><td>schickt ein Hotelalert</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_teleport'] == 1){ ?><tr><td width='30%'>:teleport</td><td>l&auml;sst dich im Raum teleportieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_ban'] == 1){ ?><tr><td width='30%'>:ban [USERNAME] [DAUER IN SEKUNDENZAHL] [GRUND]</td><td>bannt ein User f&uuml;r bestimmten Dauer (Sekundenzahl)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_superban'] == 1){ ?><tr><td width='30%'>:superban [USERNAME] [GRUND]</td><td>bannt ein User dauerhaft</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_filter'] == 1){ ?><tr><td width='30%'>:update_filter</td><td>Filter aktualisieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_coins'] == 1){ ?><tr><td width='30%'>:coins [USERNAME] [ANZAHL]</td><td>gibt an einen User Anzahl Taler</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_pixels'] == 1){ ?><tr><td width='30%'>:pixels [USERNAME] [ANZAHL]</td><td>gibt an einen User Anzahl Pixel</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roombadge'] == 1){ ?><tr><td width='30%'>:roombadge [CODE]</td><td>gibt alle User im Raum ein Badge</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_givebadge'] == 1){ ?><tr><td width='30%'>:givebadge [USERNAME] [CODE]</td><td>gibt an einen User ein Badge</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_removebadge'] == 1){ ?><tr><td width='30%'>:removebadge [USERNAME] [CODE]</td><td>zieht ein Badge von einem User</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_ha'] == 1){ ?><tr><td width='30%'>:ha [TEXT]</td><td>schickt ein Hotelalert</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_dance'] == 1){ ?><tr><td width='30%'>:dance [USERNAME]</td><td>l&auml;sst ein User zum Tanzen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_sitdown'] == 1){ ?><tr><td width='30%'>:sitdown</td><td>alle User im Raum sitzen lassen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roomeffect'] == 1){ ?><tr><td width='30%'>:roomeffect [ID]</td><td>alle User im Raum Effekt aktivieren lassen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_startquestion'] == 1){ ?><tr><td width='30%'>:startquestion [ID]</td><td>startet eine Umfrage (mehr Infos siehe Men&uuml; "Client" => "Umfrage")</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_freeze'] == 1){ ?><tr><td width='30%'>:freeze [USERNAME]</td><td>macht ein User bewegungsunf&auml;hig</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_massbadge'] == 1){ ?><tr><td width='30%'>:massbadge [CODE]</td><td>gibt jeder User ein Badge</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_masscredits'] == 1){ ?><tr><td width='30%'>:masscredits [ANZAHL]</td><td>gibt jeder User Anzahl Taler</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_masspixels'] == 1){ ?><tr><td width='30%'>:masspixels [ANZAHL]</td><td>gibt jeder User Anzahl Pixel</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_motd'] == 1){ ?><tr><td width='30%'>:motd [USERNAME] [TEXT]</td><td>schickt ein besonderes Alert an einen User (mit Scrollbar)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_hal'] == 1){ ?><tr><td width='30%'>:hal [LINK] [TEXT]</td><td>schickt ein Hotelalert mit einer Verlinkung</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_summon'] == 1){ ?><tr><td width='30%'>:summon [USERNAME]</td><td>schickt ein User zu dir</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_disconnect'] == 1){ ?><tr><td width='30%'>:disconnect [USERNAME]</td><td>ein User aus Client kicken</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roll'] == 1){ ?><tr><td width='30%'>:roll</td><td>???</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_rave'] == 1){ ?><tr><td width='30%'>:rave</td><td>alle User im Raum zum Tanzen bringen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_control'] == 1){ ?><tr><td width='30%'>:control [USERNAME]</td><td>ein User die Bewegung kontrollieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_points'] == 1){ ?><tr><td width='30%'>:points [USERNAME] [ANZAHL]</td><td>gibt an einen User Anzahl Diamanten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_masspoints'] == 1){ ?><tr><td width='30%'>:masspoints [ANZAHL]</td><td>gibt jeder User Anzahl Diamanten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_empty'] == 1){ ?><tr><td width='30%'>:empty [USERNAME]</td><td>ein User die Inventar KOMPLETT (Ausnahme: Haustiere) leeren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_items'] == 1){ ?><tr><td width='30%'>:update_items</td><td>Items aktualisieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_achievements'] == 1){ ?><tr><td width='30%'>:update_achievements</td><td>Achievements aktualisieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_catalogue'] == 1){ ?><tr><td width='30%'>:update_catalogue</td><td>Katalog aktualisieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_texts'] == 1){ ?><tr><td width='30%'>:update_texts</td><td>Texts aktualisieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_navigator'] == 1){ ?><tr><td width='30%'>:update_navigator</td><td>Navigator aktualisieren</td></tr><?php } ?>
				    <?php if($rowpermissions['cmd_update_permissions'] == 1){ ?><tr><td width='30%'>:update_permissions</td><td>Rank Rechte updaten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_update_settings'] == 1){ ?><tr><td width='30%'>:update_settings</td><td>Client Einstellungen updaten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_override'] == 1){ ?><tr><td width='30%'>:override</td><td>über Möbel gehen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_invisible'] == 1){ ?><tr><td width='30%'>:invisible</td><td>als unsichtbar machen (Bug!)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_shutdown'] == 1){ ?><tr><td width='30%'>:shutdown</td><td>Emulator ausschalten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_award'] == 1){ ?><tr><td width='30%'>:award [USERNAME] [ID]</td><td>ein Bonusbadge an einen User geben</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_ipban'] == 1){ ?><tr><td width='30%'>:ipban [USERNAME]</td><td>ein User per IP bannen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_makesay'] == 1){ ?><tr><td width='30%'>:makesay [USERNAME] [TEXT]</td><td>mit eigene Text an einen User reden lassen</td></tr><?php } ?>
					
					<tr><td width='30%'><b>NEU</b></td><td></td></tr>
					<?php if($rowpermissions['cmd_myteleport'] == 1){ ?><tr><td width='30%'>:myteleport</td><td>teleportiert dich im eigenen Raum</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_pet'] == 1){ ?><tr><td width='30%'>:pet [ID]</td><td>verwandelt sich als Haustier (Haustierliste: ":pet help")</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_raumalert'] == 1){ ?><tr><td width='30%'>:raumalert [TEXT]</td><td>schickt ein Raumalert an alle User im eigenen Raum</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roomdc'] == 1){ ?><tr><td width='30%'>:roomdc</td><td>alle User im Raum aus Client kicken</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_makesayall'] == 1){ ?><tr><td width='30%'>:makesayall [TEXT]</td><td>alle User im Raum mit eigene Text reden lassen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roomaward'] == 1){ ?><tr><td width='30%'>:roomaward [ID]</td><td>alle User im Raum ein Bonusbadge verteilen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_massaward'] == 1){ ?><tr><td width='30%'>:massaward [ID]</td><td>alle User im Hotel ein Bonusbadge verteilen</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_summonall'] == 1){ ?><tr><td width='30%'>:summonall</td><td>alle User zu sich teleportieren (Achtung: m&ouml;glicherweise verursacht bei viele User laggs)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_raumkick'] == 1){ ?><tr><td width='30%'>:raumkick [GRUND]</td><td>kickt alle User im Raum</td></tr><?php } ?>
					<tr><td width='30%'>:kiss [USERNAME]</td><td>k&uuml;sst ein User</td></tr>
					<tr><td width='30%'>:sellroom [TALER]</td><td>verkauft ein Raum f&uuml;r bestimmten Betrag an Taler</td></tr>
					<tr><td width='30%'>:buyroom</td><td>kauft ein Raum ein</td></tr>
					<tr><td width='30%'>:room</td><td>zeigt an, ob der Raum verkauft wird und wie viel</td></tr>
					<tr><td width='30%'>:werber [USERNAME]</td><td>meldet ein Werber direkt an die Staffs</td></tr>
					<tr><td width='30%'>:staff</td><td>zeigt alle Mitarbeiter, die gerade online sind</td></tr>
					<?php if($rowpermissions['cmd_roompoints'] == 1){ ?><tr><td width='30%'>:roompoints [ANZAHL]</td><td>gibt jeder User im Raum Anzahl Diamanten</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_summonstaff'] == 1){ ?><tr><td width='30%'>:summonstaff</td><td>alle Mitarbeiter zu sich teleportieren</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_antiwerber'] == 1){ ?><tr><td width='30%'>:antiwerber</td><td>schaltet das AntiWerber System ein/aus</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roomfreeze'] == 1){ ?><tr><td width='30%'>:roomfreeze</td><td>macht alle User im Raum bewegungsunf&auml;hig</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roomcredits'] == 1){ ?><tr><td width='30%'>:roomcredits [ANZAHL]</td><td>gibt jeder User im Raum Anzahl Taler</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_roompixels'] == 1){ ?><tr><td width='30%'>:roompixels [ANZAHL]</td><td>gibt jeder User im Raum Anzahl Pixel</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_verwarnung'] == 1){ ?><tr><td width='30%'>:verwarnung [USERNAME] [GRUND]</td><td>verwarnt ein User</td></tr><?php } ?>
				    <?php if($rowpermissions['cmd_antiwerberreset'] == 1){ ?><tr><td width='30%'>:antiwerberreset [USERNAME]</td><td>setzt die Verwarnungen von AntiWerber System auf 0 ein (hilfreich, falls es um Fehlmeldung handelt)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_timermute'] == 1){ ?><tr><td width='30%'>:timermute [USERNAME] [ZEIT IN SEKUNDEN]</td><td>mutet ein User mit Zeit (maximal 600 Sekunden)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_timermuteroom'] == 1){ ?><tr><td width='30%'>:timermuteroom [ZEIT IN SEKUNDEN]</td><td>muten alle User im Raum mit Zeit (maximal 300 Sekunden)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_timermuteall'] == 1){ ?><tr><td width='30%'>:timermuteall [ZEIT IN SEKUNDEN]</td><td>muten alle User im Hotel mit Zeit (maximal 300 Sekunden)</td></tr><?php } ?>
					<?php if($rowpermissions['cmd_staffpicks'] == 1){ ?><tr><td width='30%'>:staffpicks</td><td>Raum im Navigator einfügen plus Bonusbadge "Empfohlen vom Staff" (NUR BEI USER!)</td></tr><?php } ?>
				<?php
					}
				?>	
				 </table>
				  <?php }else{ ?>
					<p>Zugriff verweigert</p>
				  <?php } ?>
				</div>
			<?php
				}
			?>
				<div class="tab-pane fade" id="planung">
				  <p><h3>Commands in Planung (keine 100%ig Garantie!)</h3></p>
				  <?php if($user->UserData('rank') >= 10){ ?>
				  <table width='50%' cellspacing='0' class="table table-hover tablesorter">
					<tr><td width='30%'>:roomitems [ITEMID]</td><td>alle User im Raum Item geben</td></tr>
				  </table>
				  <?php }else{ ?>
					<p>Zugriff verweigert</p>
				  <?php } ?>
				</div>
			  </div>
		</div>
	</div>
</div>
<?php require ('./footer.php'); ?>