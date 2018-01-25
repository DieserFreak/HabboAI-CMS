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

if($user->UserData('rank') < $_CONFIG['housekeeping']['rank']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(!empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/home');
}

if(isset($_POST['submit'])){
	$password = $filter->FilterText($user->encode($_POST['password']));
	$secretcode = $filter->FilterText($_POST['secretcode']);

	if(strlen($password) < 1 || strlen($secretcode) < 4){
		$error = 'Bitte Daten eingeben!';
	} else if(!$housekeeping->Login($user->UserData('id'), $password, $secretcode, $remoteip)){
		$housekeeping->hkLogs('Login', 'Einloggen fehlgeschlagen', $user->UserData('id'), $remoteip);
		$error = 'Passwort oder Sicherheitscode falsch!';
	}
}

?>



<style>@import url(https://fonts.googleapis.com/css?family=Ubuntu);</style>
<!DOCTYPE html>
<html class="lockscreen">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_CONFIG['housekeeping']['name']; ?> - Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="center">            
			<div class="headline text-center" id="time" style="font-family:Ubuntu;"></div>
            <div class="lockscreen-name"><font style="font-family:Ubuntu;color:#fff;font-size:20px;">Hallo <?php echo $user->UserData('username'); ?>!<br>
			Um das ACP betreten zu k&ouml;nnen, musst du dich identifizieren.</font></div>
            <div class="lockscreen-item">
                <div class="lockscreen-image">
                    <img src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $user->UserData('look'); ?>&direction=3&head_direction=3&gesture=sml&action=stand">
                </div>
                <div class="lockscreen-credentials">   
				<form method="post">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Accountpasswort" style="font-family:Ubuntu;" />
                    </div>
					<div class="input-group">
                        <input type="password" class="form-control" name="secretcode" placeholder="Identifikationscode" style="font-family:Ubuntu;" />
                        <div class="input-group-btn">
                            <button class="btn btn-flat" name="submit"><i class="fa fa-arrow-right text-muted"></i></button>
                       	
						</div>
                    </div>
				</form>
				<?php if(!empty($error)){ echo $error; } ?>
                </div>
            </div>
            <div class="lockscreen-link">
				<font style="font-family:Ubuntu;color:#fff;">Identifikationscode vergessen?<br>Klick <a href="/support">hier.</a></font>
            </div>            
        </div>

        <script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'];?>/js/bootstrap.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                startTime();
                $(".center").center();
                $(window).resize(function() {
                    $(".center").center();
                });
            });

            /*  */
            function startTime()
            {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();

                // add a zero in front of numbers<10
                m = checkTime(m);
                s = checkTime(s);

                //Check for PM and AM
                var day_or_night = (h > 11) ? "PM" : "AM";

                //Convert to 24 OR 12 hours system
                if (h > 24)
                    h -= 24;

                //Add time to the headline and update every 500 milliseconds
                $('#time').html(h + ":" + m + ":" + s + " Uhr");
                setTimeout(function() {
                    startTime()
                }, 500);
            }

            function checkTime(i)
            {
                if (i < 10)
                {
                    i = "0" + i;
                }
                return i;
            }

            /* CENTER ELEMENTS IN THE SCREEN */
            jQuery.fn.center = function() {
                this.css("position", "absolute");
                this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                        $(window).scrollTop()) - 30 + "px");
                this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                        $(window).scrollLeft()) + "px");
                return this;
            }
        </script>
    </body>
</html>