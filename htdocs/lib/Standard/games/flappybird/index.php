<?php
include('../../../classes/Config.php');
include('../../../classes/Mysqli.php');
include('../../../classes/FunctionsManager.php');
include('../../../classes/UserManager.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Flappy Bird</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <!-- Style sheets -->
        <link href="<?php echo $path; ?>/public/games/flappybird/css_new/reset.css" rel="stylesheet">
        <link href="<?php echo $path; ?>/public/games/flappybird/css_new/main.css?RELOAD<?php echo date('hisdy'); ?>" rel="stylesheet">
    </head>
    <body>
        <div id="gamecontainer">
            <div id="gamescreen">
                <div id="sky" class="animated">
                    <div id="flyarea">
                        <div id="ceiling" class="animated"></div>
                        <!-- This is the flying and pipe area container -->
                        <div id="player" class="bird animated"></div>

                        <div id="bigscore"></div>

                        <div id="splash"></div>

                        <div id="scoreboard">
                            <div id="medal"></div>
                            <div id="currentscore"></div>
                            <div id="highscore"></div>
                            <div id="replay"><img src="<?php echo $path; ?>/public/games/flappybird/assets/replay.png" alt="replay"></div>
                        </div>

                        <div id="allhighscore">
                            <div style="text-align: center;margin-top: -30px;width: 100%;height: 30px;line-height: 20px;font-size: 20px;">Kabbo.LI Highscore</div>
                            <?php
                            $get_highscore = $mysqli->query("SELECT * FROM user_gamescore WHERE game_id = 'flappybird' ORDER BY score DESC LIMIT 5");
                            while ($row = $get_highscore->fetch_object()) {
                                ?>
                                <div style="width: 100%;height: 50px;">
                                    <a href="<?php echo $path; ?>/home!<?php echo UserIDDB($row->user_id, 'username'); ?>" target="_blank">
                                        <div style="background: url('<?php echo $path; ?>/public/games/flappybird/assets/avatarbg.png') no-repeat;width: 54px;height: 50px;float: left;">
                                            <div style="height: 50px;width: 54px; background: url('<?php echo $avatar.UserIDDB($row->user_id, 'look'); ?>&headonly=true') no-repeat; background-position: 50% -5px;"></div>                          
                                        </div>
                                    </a>
                                    <username style="width: 130px;float: left;font-size: 17px;color: #FC7858;margin-top: 5px;margin-left: 10px;"><?php echo UserIDDB($row->user_id, 'username'); ?></username>
                                    <score style="float: left;font-size: 15px;color: #FC7858;margin-top: 2px;margin-left: 10px;">Score: <?php echo $row->score; ?></score>
                                </div>


                            <?php } ?>
                        </div>
                        <!-- Pipes go here! -->
                    </div>
                </div>
                <div id="land" class="animated"><div id="debug"></div></div>
            </div>
        </div>
        <div id="footer">
            &copy; <?php echo date('Y'); ?> by Kabbo.LI
        </div>
        <div class="boundingbox" id="playerbox"></div>
        <div class="boundingbox" id="pipebox"></div>

        <script src="<?php echo $path; ?>/public/games/flappybird/js/jquery.min.js"></script>
        <script src="<?php echo $path; ?>/public/games/flappybird/js/jquery.transit.min.js"></script>
        <script src="<?php echo $path; ?>/public/games/flappybird/js/buzz.min.js"></script>
        <script src="<?php echo $path; ?>/public/games/flappybird/js/main.php?RLD"></script>
    </body>
</html>