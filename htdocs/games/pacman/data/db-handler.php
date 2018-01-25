<?Php

include('../../../../classes/Config.php');
include('../../../../classes/Mysqli.php');
include('../../../../classes/FunctionsManager.php');
include('../../../../classes/UserManager.php');


$user_id = protect($_POST['user_id']);
$score = protect($_POST['score']);
$game = protect($_POST['game']);
$token = protect($_POST['token']);

if ($user_id !== $user->id) {
    exit;
}

if($score > 120)
{
    $mysqli->query("INSERT INTO hp_modlog (user_id, action, bemerkung, timestamp) VALUES ('" . $user->id . "', 'flappyfaked', '" . $score. "', '" . time() . "') ");
        
    exit;
}
if ($token !== $_SESSION['token']) {
    exit;
}

switch ($game) {
    case 'pacman':
        $check = $mysqli->query("SELECT * FROM user_gamescore WHERE user_id = '" . $user->id . "' ");
        if ($check->num_rows > 0) {
            $row = $check->fetch_object();

            if ($row->score < $score) {
                $mysqli->query("UPDATE user_gamescore SET score = '" . $score . "' WHERE user_id = '" . $user->id . "' ");
            }
        } else {
            $mysqli->query("INSERT INTO user_gamescore (user_id, game_id, score, timestamp) VALUES ('" . $user->id . "', '" . $game . "', '" . $score . "', '" . time() . "') ");
        }
        break;

    default:
        exit;
        break;
}
print_r($_POST);
?>
 