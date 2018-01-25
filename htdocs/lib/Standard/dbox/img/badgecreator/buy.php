<?php

include('../../../classes/Config.php');
include('../../../classes/Mysqli.php');
include('../../../classes/MusManager.php');
include('../../../classes/FunctionsManager.php');
include('../../../classes/UserManager.php');

$title = protect(umlautenew($_POST['title']));
$desc = protect(umlautenew($_POST['desc']));
$image = protect($_POST['image'], 'hi');

if ($user->credits >= 5000 && $user->vip_points >= 10) {
    $mysqli->query("UPDATE users SET credits = credits-5000, vip_points = vip_points-10 WHERE id = '" . $user->id . "' ");
    $mysqli->query("INSERT INTO user_ownbadge (badge_title, badge_desc, badge_image, user_id, timestamp, status) VALUES ('" . $title . "', '" . $desc . "', '" . $image . "', '" . $user->id . "', '" . time() . "', '0') ");
    
    $getownbadge = $mysqli->query("SELECT * FROM user_ownbadge WHERE badge_title = '".$title."' AND user_id = '".$user->id."' ");
    if($getownbadge->num_rows > 0)
    {
        $badge = $getownbadge->fetch_object();
    }
    
    MUS('updatepoints', $user->id);
    MUS('updatecredits', $user->id);
    aktivitaetenstream($user->id, 'createbadge', '', '');
    $mysqli->query("INSERT INTO hp_modlog (user_id, action, bemerkung, timestamp) VALUES ('" . $user->id . "', 'createbadge', '', '" . time() . "') ");
    $mysqli->query("INSERT INTO hp_mcp (user_id, action, extra_data, extra_data2, timestamp, bearbeitet, status) VALUES ('" . $user->id . "', 'createbadge', '".$badge->id."', '', '" . time() . "', '0', '0') ");
    echo 'erfolgreich';
    exit;
} else {
    echo 'wenigmoney';
    exit;
}
?>