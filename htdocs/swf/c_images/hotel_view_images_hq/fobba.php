<?php
require '../../../x_habbo_servercore/MYSQL/[DB]-MYSQL.php';

header('Content-type: image/png');
$handle = imagecreatefrompng('reception/hotelview.png');
date_default_timezone_set('America/Bogota');

############################################################
$font = "font.ttf";
$fonts = 'font.ttf';
$fontbold = "fontbold.ttf";
$black = imagecolorallocate($handle, 0x00, 0x00, 0x00);
$white = imagecolorallocate($handle, 0xFF, 0xFF, 0xFF);
$trennung = imagecreatefrompng('icon/trennung.png');
$trennungv = imagecreatefrompng('icon/trennungv.png');
############################################################
## Logo ##
//$hotellogo = imagecreatefrompng('reception/reception_logo_drape.png');
//imagecopy($handle, $hotellogo, 0, 0, 0, 0, 145, 200);
## Top User ##
imagettftext($handle, 16, 0, 1250, 60, $white, $fontbold, "Top 5 User");
imagecopy($handle, $trennung, 1200, 70, 0, 0, 200, 1);
## Onlinezeit ##
$userstats_a = mysql_query("SELECT * FROM user_stats ORDER BY OnlineTime DESC Limit 1");
while($userstats = mysql_fetch_assoc($userstats_a)){
$row = mysql_fetch_assoc($row = mysql_query("SELECT * FROM users WHERE id = '".$userstats['id']."'"));
$time = 3600;
$zeit = round($userstats['OnlineTime'] / $time);
$name = $row['username'];
}
$onlineicon = imagecreatefromgif('icon/online.gif');
imagecopy($handle, $onlineicon, 1200, 80, 0, 0, 33, 36);

imagettftext($handle, 12, 0, 1250, 90, $white, $font, "$name");
imagettftext($handle, 10, 0, 1250, 110, $white, $fonts, "$zeit Stunden online");
imagecopy($handle, $trennung, 1200, 130, 0, 0, 200, 1);
## Aktivit�tspunkte ##
$userstats_a = mysql_query("SELECT * FROM user_stats ORDER BY AchievementScore DESC Limit 1");
while($userstats = mysql_fetch_assoc($userstats_a)){
$row = mysql_fetch_assoc($row = mysql_query("SELECT * FROM users WHERE id = '".$userstats['id']."'"));
$score = $userstats['AchievementScore'];
$name = $row['username'];
}
$scoreicon = imagecreatefromgif('icon/sorce.gif');
imagecopy($handle, $scoreicon, 1205, 143, 0, 0, 25, 31);

imagettftext($handle, 12, 0, 1250, 150, $white, $font, "$name");
imagettftext($handle, 10, 0, 1250, 170, $white, $fonts, "$score Aktivit�tspunkte");
imagecopy($handle, $trennung, 1200, 190, 0, 0, 200, 1);
## Lobe erhalten ##
$userstats_a = mysql_query("SELECT * FROM user_stats ORDER BY Respect DESC LIMIT 1");
while($userstats = mysql_fetch_assoc($userstats_a)){
$row = mysql_fetch_assoc($row = mysql_query("SELECT * FROM users WHERE id = '".$userstats['id']."'"));
$name = $row['username'];
$lobe = $userstats['Respect'];
}
$lobeicon = imagecreatefromgif('icon/lobe.gif');
imagecopy($handle, $lobeicon, 1210, 200, 0, 0, 25, 34);

imagettftext($handle, 12, 0, 1250, 210, $white, $font, "$name");
imagettftext($handle, 10, 0, 1250, 230, $white, $fonts, "$lobe Lobe erhalten");
imagecopy($handle, $trennung, 1200, 250, 0, 0, 200, 1);
## Geschenke erhalten ##
$userstats_a = mysql_query("SELECT * FROM user_stats ORDER BY GiftsReceived DESC LIMIT 1");
while($userstats = mysql_fetch_assoc($userstats_a)){
$row = mysql_fetch_assoc($row = mysql_query("SELECT * FROM users WHERE id = '".$userstats['id']."'"));
$name = $row['username'];
$gift = $userstats['GiftsReceived'];
}
$gifticon = imagecreatefromgif('icon/geschenk.gif');
imagecopy($handle, $gifticon, 1210, 265, 0, 0, 27, 25);

imagettftext($handle, 12, 0, 1250, 270, $white, $font, "$name");
imagettftext($handle, 10, 0, 1250, 290, $white, $fonts, "$gift Geschenke erhalten");
imagecopy($handle, $trennung, 1200, 310, 0, 0, 200, 1);
## Badges ##
$userstats_a = mysql_query("SELECT user_id, COUNT(user_id) AS anzahl FROM (SELECT * FROM user_badges WHERE EXISTS(SELECT * FROM users WHERE users.id = user_badges.user_id AND users.rank < '3')) anzahlbadges GROUP BY user_id ORDER BY anzahl DESC LIMIT 1");
while($userstats = mysql_fetch_assoc($userstats_a)){
$row = mysql_fetch_assoc($row = mysql_query("SELECT * FROM users WHERE id = '".$userstats['user_id']."'"));
$name = $row['username'];
$badges = $userstats['anzahl'];
}
$badgesicon = imagecreatefromgif('icon/badge.gif');
imagecopy($handle, $badgesicon, 1210, 320, 0, 0, 28, 29);

imagettftext($handle, 12, 0, 1250, 330, $white, $font, "$name");
imagettftext($handle, 10, 0, 1250, 350, $white, $fonts, "$badges Badges");
imagecopy($handle, $trennung, 1200, 370, 0, 0, 200, 1);
## Raumbesucher ##
$userstats_a = mysql_query("SELECT * FROM user_stats ORDER BY RoomVisits DESC LIMIT 1");
while($userstats = mysql_fetch_assoc($userstats_a)){
$row = mysql_fetch_assoc($row = mysql_query("SELECT * FROM users WHERE id = '".$userstats['id']."'"));
$name = $row['username'];
$rooms = $userstats['RoomVisits'];
}
$roomicon = imagecreatefromgif('icon/room.gif');
imagecopy($handle, $roomicon, 1210, 380, 0, 0, 30, 33);

imagettftext($handle, 12, 0, 1250, 390, $white, $font, "$name");
imagettftext($handle, 10, 0, 1250, 410, $white, $fonts, "$rooms R�ume besucht");
############################################################
### Neuigkeiten ###
imagettftext($handle, 16, 0, 720, 60, $white, $fontbold, "Neuigkeiten");
imagecopy($handle, $trennung, 540, 70, 0, 0, 500, 1);
imagecopy($handle, $trennungv, 770, 80, 0, 0, 1, 380);
## Text 1 ##
$text1 = mysql_fetch_object(mysql_query("SELECT * FROM hotelview WHERE art = '1' AND status = '1' ORDER BY id DESC LIMIT 1"));
#Titel#
imagettftext($handle, 14, 0, 540, 100, $white, $fontbold, "$text1->title");
#Text#
imagettftext($handle, 11, 0, 540, 130, $white, $fonts, "$text1->text");

## Text 2 ##
$text2 = mysql_fetch_object(mysql_query("SELECT * FROM hotelview WHERE art = '2' AND status = '1' ORDER BY id DESC LIMIT 1"));
#Titel#
imagettftext($handle, 14, 0, 780, 100, $white, $fontbold, "$text2->title");
#Text#
imagettftext($handle, 11, 0, 780, 130, $white, $fonts, "$text2->text");
############################################################
Imagepng($handle);
ImageDestroy ($handle);
?>