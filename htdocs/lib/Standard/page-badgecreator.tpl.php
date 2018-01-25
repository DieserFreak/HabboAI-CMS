
<!- INCLUDE Standard/header ->
<!- INCLUDE Standard/subheader_shop ->


<script type="text/javascript">
		window.onload = function(){
			var auto_refresh = setInterval(
			function ()
			{
				$('#useronline').html('');
				$('#useronline').load('{url}/inc/ajax/ajax.useronline.php').fadeIn("slow");
			}, 60000);
		}
	</script>

		<link rel="stylesheet" href="{themeurl}dbox/habbo.in.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{themeurl}dbox/style.php?style=extras.badgecreator" />
        <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.1.js" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.js" type="text/javascript"></script>
        <script src="{themeurl}js/badgecreator.js"></script>
		
<title>Habbo: Badgecreator</title>
           <style>
		   input[type="text"], 
input[type="password"],
input:-webkit-autofill
{
border: 0px;
-webkit-box-shadow: 0px;
-webkit-appearance: none;
border: 1px solid #CCC;
border-bottom: 1.5px solid #CCC;
height: 30px;
width: 100%;
margin-bottom: 10px;
padding-left: 5px;
border-radius: 3px;
}

.input {
border: 0px;
-webkit-box-shadow: 0px;
-webkit-appearance: none;
border: 1px solid #CCC;
border-bottom: 1.5px solid #CCC;
height: 30px;
width: 100%;
margin-bottom: 10px;
padding-left: 5px;
border-radius: 3px;
}


input[type="submit"], input:-webkit-autofill, .submit {
    -webkit-appearance: none;
    height: 35px;
    width: 100%;
    background: #3BA800;
    border-bottom: 2px solid #2C7E00;
    color: rgba(255, 255, 255, 1);
    cursor: pointer;
    text-align: center;
    display: block;
    text-decoration: none;
}

.submit {
    border: 0px;
    cursor: pointer;
    text-align: center;
    height: 30px;
    background: #3BA800;
    border-bottom: 2px solid #2C7E00;
    color: #FFF;
    width: 100%;
}

.submit.green {
background: #2AA12C;
border-bottom: 2px solid #218123;
}

.submit.red {
background: #B62B1C;
border-bottom: 2px solid #912216;
}
    #pixie {



    }


    #avatarbox {
        background: url('{themeurl}img/badgecreator/avatarbox_02.png');
        width: 143px;
        height: 188px;
        float: right;
    }

    .buttonc {
        float: left;
        width: 200px;
        height: 30px;
        line-height: 30px;
        color: #FFF;
        border-radius: 4px;
        margin-left: 10px;
    }

    .buttonc.back {
        background: url('{themeurl}img/badgecreator/back.png?rld') 50% 50% no-repeat;
        cursor: pointer;
        width: 50px;
        background-color: #49a3df;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        text-align: center;
		margin-top: 32px;
    }

    .buttonc.forward {
        background: url('{themeurl}img/badgecreator/forward.png?rld') 50% 50% no-repeat;
        cursor: pointer;
        width: 50px;
        background-color: #49a3df;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        text-align: center;
		margin-top: 32px;
    }

    .buttonc.pencil {
        background: url('{themeurl}img/badgecreator/pencil.png') 50% 50% no-repeat;
        cursor: pointer;
        width: 50px;
        background-color: #CCC;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        text-align: center;
        margin-left: 9px;
		margin-top: 32px;
    }

    .buttonc.filler {
        background: url('{themeurl}img/badgecreator/filler.png') 50% 50% no-repeat;
        background-size: 20px 20px;
        cursor: pointer;
        width: 50px;
        background-color: #9b59b6;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        text-align: center;
		margin-top: 32px;
    }

    .buttonc.pick {
        background: url('{themeurl}img/badgecreator/pickcolor.png?rld') 50% 50% no-repeat;
        background-size: 20px 20px;
        cursor: pointer;

        width: 50px;
        background-color: #f39c12;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        text-align: center;
		margin-top: 32px;
    }

    .buttonc.rubber {
        background: url('{themeurl}img/badgecreator/rubber.png?rld') 50% 50% no-repeat;
        background-size: 20px 20px;
        cursor: pointer;
        width: 50px;
        background-color: #e74c3c;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        text-align: center;
		margin-top: 32px;
    }

    .buttonc.color {
        background: url('{themeurl}img/badgecreator/colorpicker.png') 50% 50% no-repeat;
        background-size: 20px 20px;
        cursor: pointer;
        width: 50px;
        background-color: #000;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-bottom: 2px solid rgba(0, 0, 0, 0.2);
        text-align: center;
		margin-top: 32px;
    }

    .editor.pixie {

    }

    .editor.pixie .cursor_position {
        display: none;
    }
    .editor.pixie .opacity {

    }

    .pixie .viewport {
        width: 400px;
        height: 400px;
        cursor: crosshair;
        background: url('{themeurl}img/badgecreator/bg.png?rdld');
        border: 2px solid rgba(0, 0, 0, 0.5);
        margin: auto;
        margin-top: 50px;


        border: 1px solid #000;
    }

    .pixie .viewport .canvas .layer {
        position: absolute;

    }
    .pixie .actions {
        display: none
    }
    .pixie .left {
        display: none
    }
    .pixie .module {
        display: none
    }

.socialmedia-itemex {
    color: rgba(84, 82, 77, 0.77);
    font-family: Ubuntu Condensed;
    font-size: 18px;
    margin-bottom: 20px;
    overflow: auto;
    padding: 20px;
    background-color: #fff;
    z-index: 9990;
    float: left;
    width: 433px;
    background: #FFF;
    border: 1px solid rgba(0,0,0,0.2);
    border-bottom: 2px solid rgba(0,0,0,0.2);
    border-radius: 5px;
    margin-right: 20px;
}

    .preis {
        float: right;
        background: #24231E;
        width: 195px;
        height: 25px;
        line-height: 25px;
        padding-left: 10px;
        margin-right: 8px;
        margin-top: 8px;
        border-radius: 4px;
        border: 2px solid #54524D;
        -webkit-box-shadow: 0 0 0 1px #000;
        box-shadow: 0 0 0 1px #000;
        color: #fff;
    }

    .preis .icon {
        float: right;
        background: url({themeurl}img/badgecreator/6.png) no-repeat;
        background-position: 50% 50%;
        background-color: #A47D15;
        height: 25px;
        width: 25px;
        border-radius: 4px;
        border: 2px solid #e3c47c;
        margin-top: -2px;
        margin-right: -3px;
        -webkit-box-shadow: 0 0 0 1px #000;
        box-shadow: 0 0 0 1px #000;
    }


    .preis.du .icon {
        background: url({themeurl}img/badgecreator/5.png) no-repeat;
        background-position: 50% 50%;
        background-color: #A46615;
        border: 2px solid #E28D1D;
    }

    .preis.dia .icon {
        background: url({themeurl}img/badgecreator/8.png) no-repeat;
        background-position: 50% 50%;
        background-color: #875989;
        border: 2px solid #BA7CC2;
    }
	
	.socialmedia-itemne {
    color: rgba(84, 82, 77, 0.77);
    font-family: Ubuntu Condensed;
    font-size: 18px;
    margin-bottom: 20px;
    overflow: auto;
    padding: 20px;
    background-color: #fff;
    z-index: 9990;
    float: left;
    width: 468px;
    background: #FFF;
    border: 1px solid rgba(0,0,0,0.2);
    border-bottom: 2px solid rgba(0,0,0,0.2);
    border-radius: 5px;
    margin-right: 20px;
}
	
#containerr{width:1100px;margin:0px auto;}
#containerr{background-color:#eee;height:380px;width:525px;position:relative;}

</style>

<!- IF MSG != '' ->
	<!- IF FEHLER == 'true' ->

		<div class="btn medium red condensed" style="width:100%;text-align:center;margin-top:-20px;margin-bottom:20px;">{MSG}</div>
	
    <!- ELSE ->
        <div class="btn medium green condensed" style="width:100%;text-align:center;margin-top:-20px;margin-bottom:20px;">{MSG}</div>
	
   
	<!- ENDIF ->
<!- ENDIF ->

<div id="main" class="container_12">
			<div class="grid_6" style="margin-top: -8%;">
<div id="column" class="msg right error" style="width: 204%;text-align: center;margin-top: 67px;margin-bottom: -30px;box-shadow: rgba(0, 0, 0, 0.8) 0px 1px 1px 0px;color: rgb(255, 255, 255);background-color: rgb(43, 142, 0);border-radius: 0px;display: none;"></div>

<div id="content" style="width:1080px;">

<div class="sendbadge" style="display: none;">
		<h1 style="font-size: 18px;border: none;border-bottom: 5px solid rgba(0,0,0,0.08)!important;border-top-left-radius: 6px;border-top-right-radius: 6px;font-weight: bold;color: #fff;display: table-cell;background-color: #3c5a74;border-color: #3F3F3F;vertical-align: middle;text-align: center;width: 1%;float: none!important;padding: 8px 15px;margin: 4px;overflow: overlay;">Badge weitersenden</h1>
			<div class="socialmedia-item">

        <form action="" method="post">
            <div class="image" style="margin-top: 5px;margin-right: 5px;float: right;"></div>
            <b>Username</b><br>
            <input type="text" class="input" name="username" style="width: 430px;">
            <input type="hidden" name="badgeid" class="badgeid">
            <input type="submit" class="submit green" name="sendbadge" value="Senden">

        </form>       
        <center><br>
            <span style="font-size: 13px;">
                Um das Badge einem anderen Usern zu schicken, kostet <u>dich</u> das 2 Diamanten.
            </span>
        </center>
    </div>
	</div>
	
		<div id="right-column">
			<div class="box" style="background-color: rgba(255, 255, 255, 0);">
			<h1 style="border: none;display: table-cell;border-color: #3F3F3F;vertical-align: middle;overflow: overlay;width: 89%;background-color: #3d4847;border-bottom: 2px solid #1d2121;margin: 10px;padding: 10px;color: white;font-weight: 500;line-height: 11px;text-align: center;font-size: 14px;letter-spacing: 0.5px;position: absolute;margin-left: 16px;margin-top: 51px;">Informationen</h1>
			<div class="socialmedia-itemex" style="height: 266px;margin-top: 39px;overflow: hidden;font-size: 16px;color: #969696;margin-left: 15px;">
        <br><br>
            <div style="float: right;width: 230px;">
               			<div class="talerbz">
                <div class="icon" style=""></div><div class="left"></div><div class="mid" style="width:147px;"><div class="credits label"><b>5000</b> Taler</div><div class="amount"></div></div><div class="credits"></div></div>
				<p style="text-align:left;">
				
				
				
				
				
	      <div class="talerbz" style="background: #875989;border-color: #BA7CC2;">
                <div class="icon" style="border-color: #BA7CC2;background: url('/lib/standard/img/neu/incon/dWU2GpG.png')50% 50% no-repeat;"></div><div class="mid" style="width:147px;"><div class="credits label"><b>5</b> Diamanten</div><div class="amount"></div></div><div class="diamonds"></div></div><br />


            </div>

            Du wolltest schon immer mal der Pixel Picasso sein und dein eigenes Badge kreieren? <br>
            Dann bist du hier genau richtig! <br><br>Du kannst hier dein eigenes Badge pixeln oder ein kopiertes Bild einf&uuml;gen.

            <br><br>
            <span style="font-size: 14px;color: red;"><b>ACHTUNG: Badges werden jeden Abend um 23 Uhr bearbeitet.<br>Vorher wird kein Badge freigeschaltet!</b></span> 
            <br><br>
        </div></div>

		<div class="badgecreate">
			<div class="socialmedia-itemne" style="height: 252px;overflow: hidden;width: 433px;margin-left: 15px;">
			<h1 style="border: none;display: table-cell;border-color: #3F3F3F;vertical-align: middle;overflow: overlay;width: 454px;background-color: #3d4847;border-bottom: 2px solid #1d2121;margin: 10px;padding: 10px;color: white;font-weight: 500;line-height: 11px;text-align: center;font-size: 14px;letter-spacing: 0.5px;position: absolute;margin-left: -21px;margin-top: -10px;">Badge erstellen</h1>
			<br> <div id="avatarbox" style="margin-top: 10px;">
            <div class="uusername" style="font-size: 12px;margin-top: 13px;margin-left: 30px;color: #FFF;">{USERNAME}</div>
            <div class="aavatara" style="float: left;background: url('http://www.avatar-retro.com/habbo-imaging/avatarimage?figure={USERAVATAR}&direction=4&head_direction=3&action=wav') no-repeat;width: 60px;height: 120px;margin-left: 15px;margin-top: 10px;"></div>
            <div class="preview" style='float: left;margin-left: 15px;margin-top: 7px;'></div>


            </div>

            <h2 style="<div id=&quot;avatarbox&quot; style=&quot;margin-top: 10px;&quot;>;margin-top: 10px;color: rgba(84, 82, 77, 0.77);font-family: Ubuntu Condensed;font-size: 18px;">Badgename</h2>
            <input type="input" class="input" name="badgename" id="badgename" style="width: 210px;margin-top: 10px;">

            <b>Badgebeschriftung</b>
			<textarea class="input" id="badgedesc" style="width: 211px;height: 106px;max-height: 60px;max-width: 210px;margin-top: 0px;"></textarea>
<div class="submit green" onclick="send()" style="width: 210px;height: 30px;line-height: 30px;margin-top: -7px;color: white;font-size: 15px;">Badge kaufen</div>
                    </div>
    </div></div>
	<div id="left-column">
			<div class="designBadge">
			<div class="socialmedia-item" style="height: 538px;margin-top: -643px;overflow: hidden;">
<h1 style="border: none;display: table-cell;border-color: #3F3F3F;vertical-align: middle;overflow: overlay;width: 468px;background-color: #3d4847;border-bottom: 2px solid #1d2121;margin: 10px;padding: 10px;color: white;font-weight: 500;line-height: 11px;text-align: center;font-size: 14px;letter-spacing: 0.5px;position: absolute;margin-left: -21px;margin-top: -10px;">Vorschau deines Badges</h1>
            <div onclick="actionbutton('pencil')" class="buttonc pencil"></div>
			<div onClick="actionbutton('rubber')" class="buttonc rubber"></div>
            <div onClick="actionbutton('filler')" class="buttonc filler"></div>
            <div onCLick="actionbutton('color')" class="buttonc color"></div>
            <div onCLick="actionbutton('picker')" class="buttonc pick"></div>
            <input class="colorPicker" style="display: none;" onChange="actionbutton('pickerchange')">
            <div onCLick="actionbutton('back')" class="buttonc back"></div>
            <div onCLick="actionbutton('forward')"class="buttonc forward"></div>
<br>


            <section id='pixie'></section>
            <center><br>
                <span style="font-size: 12px;color: red;">Achtung: Wir akzeptieren keine Staff Badges oder Badges mit pornographischem Inhalt!</span>
            </center>
            <div id="picker" style="display: none;">
                <div ID="CP" class="wrapper"></div>
                <div id="containerr">
           <div onclick="actionbutton('colorclose')" class="submit green save" style="margin-top: 127px;width: 70%;margin-right: 146px;">Speichern</div>


                </div>
                <script type="text/javascript" src="{themeurl}js/colorpicker.js?rlxd"></script>
                <script type="text/javascript" language="javascript">
                        (function () {
                            var Event = YAHOO.util.Event, picker, hexcolor;

                            Event.onDOMReady(function () {
                                picker = new YAHOO.widget.ColorPicker("containerr", {
                                    showhsvcontrols: true,
                                    showhexcontrols: true,
                                    showwebsafe: false});
                                picker.skipAnim = true;
                                var onRgbChange = function (o) {
                                    setTimeout("document.getElementById('yui-picker-hex').select()", 50);
                                }
                                picker.on("rgbChange", onRgbChange);
                                Event.on("newcolor", "click", function (e) {
                                    hexcolor = cc(document.getElementById('startcolor').value);
                                    picker.setValue([HexToR(hexcolor), HexToG(hexcolor), HexToB(hexcolor)], false);
                                });
                            });
                        })();
                </script>
            </div>
        </div></div>
		
		
<div class="box" style="background-color: rgba(255, 255, 255, 0);">
		<h1 style="border: none;display: table-cell;border-color: #3F3F3F;vertical-align: middle;overflow: overlay;width: 161.5%;background-color: #3d4847;border-bottom: 2px solid #1d2121;margin: 10px;padding: 10px;color: white;font-weight: 500;line-height: 11px;text-align: center;font-size: 14px;letter-spacing: 0.5px;position: absolute;margin-left: 0px;margin-top: 10px;">Meine erstellen Badges</h1>
		<div class="socialmedia-item" style="width: 158%;">
        <table style="width: 100%;margin-top: 30px;">
            <tr>
                <td width="70px"></td>
                <td width="300px"><b>Name</b></td>
                <td width="250px"><b>Beschreibung</b></td>
                <td width="400px"><b>Datum</b></td>
                <td width="200px"><b>Aktionen</b></td>
            </tr>
			<!- BEGIN badgecreator ->
                            <tr>
                    <td><img src="data:image/gif;base64,{badgecreator.BIMAGE}"></td>
                    <td style="font-size: 13px;">{badgecreator.BTITLE}</td>
                    <td style="font-size: 13px;">{badgecreator.BDESC}</td>
                    <td style="font-size: 13px;">{badgecreator.BTIME} Uhr</td>
                    <td style="font-size: 13px;width: 280px;">
					<!- IF badgecreator.BSTATUS == 0 ->
					<div class="submit green" style="width: 150px;height: 30px;line-height: 30px;background: #49a3df;border-bottom: 2px solid #3a83b3;">Badge wird &uuml;berpr&uuml;ft</div>
					<!- ELSEIF badgecreator.BSTATUS == 3 ->
					<div class="submit green" style="width: 150px;height: 30px;line-height: 30px;background: #e74c3c;border-bottom: 2px solid #b93d30;">Badge wurde abgelehnt!</div>
					<!- ELSE ->
					<div class="submit green" style="width: 150px;height: 30px;line-height: 30px;">Badge akzeptiert!</div>
						<!- ENDIF ->
						</td>
                </tr>
				<!- END ->
            
        </table>
    </div></div>
		</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js" type="text/javascript"></script>

<script src="{themeurl}js/badgecreator.js" type="text/javascript"></script>
<script type='text/javascript'>
                    var sendit = 0;
                    function makeEvent(request, id, id2)
                    {
                        var request = request;

                        switch (request)
                        {
                            case 'sendbadge':
                                $(".designBadge").html($(".sendbadge").html());
                                $(".badgecreate").hide();
                                $(".badgeid").val(id);
                                $(".designBadge .image").html('<img src="{url}/swf/c_images/album1584/' + id2 + '.gif">');
                                break;
                        }


                    }

                    function send()
                    {
                        var badgetitle = $("#badgename").val();
                        var badgedesc = $("#badgedesc").val();
                        var badgeimage = pixie.toBase64();

                        var postIt = 'true';
                        if (sendit == 0)
                        {
                            if (badgetitle.length > 3 && badgedesc.length > 3)
                            {
                                $.post("{url}/inc/ajax/ajax.badgecreator.php", {title: badgetitle, desc: badgedesc, image: badgeimage})
                                        .done(function (data)
                                        {
                                            var data = data;

                                            if (data == 'erfolgreich')
                                            {
                                                sendit = 1;
                                                $(".msg").html('<div class="head">Du hat das Badge erfolgreich eingesendet.</div> Ein Moderator wird das Badge noch pr&uuml;fen!').removeClass('error').addClass('success').show();
                                            } else {
                                                $(".msg").html('Du hast leider zu wenig Guthaben, um dieses Badge zu kaufen!').removeClass('success').addClass('error').show();
                                            }

                                        });

                            } else {
                                $(".msg").html('Du musst in jedem Eingabefeld mindestens 4 Buchstaben angeben!').removeClass('success').addClass('error').show();
                            }
                        } else {
                            $(".msg").html('Du kannst dieses Badge nicht kaufen, da du es bereits gekauft hast!').removeClass('success').addClass('error').show();
                        }

                    }
                    function actionbutton(id)
                    {

                        $(".pencil").css('background-color', '#27ae60');
                        $(".rubber").css('background-color', '#e74c3c');
                        $(".filler").css('background-color', '#9B59B6');
                        $(".pick").css('background-color', '#F39C12');

                        switch (id)
                        {
                            case 'pencil':
                                $('.pencil').css('background-color', '#ccc');
                                var e = $.Event('keydown');
                                e.which = 49;
                                $(document).trigger(e);
                                return false;
                                break;

                            case 'rubber':
                                $('.rubber').css('background-color', '#ccc');

                                var e = $.Event('keydown');
                                e.which = 53;
                                $(document).trigger(e);
                                return false;

                                break;

                            case 'filler':
                                $('.filler').css('background-color', '#ccc');
                                var e = $.Event('keydown');
                                e.which = 54;
                                $(document).trigger(e);
                                return false;
                                break;

                            case 'color':
                                $("#picker").show();
                                $(".pixie").hide();



                                break;

                            case 'colorclose':
                                $("#picker").hide();
                                $(".pixie").show();



                                var color = $("#yui-picker-hex").val();
                                $(".buttonc.color").css('background-color', '#' + color);
                                $('.primary').css('backgroundColor', '#' + color);
                                actionbutton('pencil');
                                break;

                            case 'picker':
                                $('.pick').css('background-color', '#ccc');
                                var e = $.Event('keydown');
                                e.which = 52;
                                $(document).trigger(e);

                                break;

                            case 'pickerchange':
                                actionbutton('pencil');
                                var color = $(".colorPicker").css('background');

                                $(".color").css('background-color', color);

                                break;

                            case 'back':
                                actionbutton('pencil');
                                pixie.undo();
                                pixie.preview();
                                return false;

                                break;

                            case 'forward':
                                actionbutton('pencil');
                                pixie.redo();
                                pixie.preview();
                                return false;
                                break;
                        }
                    }

                    var pixie, postImage, postIt;
                    //<![CDATA[
                    (function () {

                        $("html").dropImageReader({
                            callback: function (_arg) {
                                var event, file;
                                file = _arg.file, event = _arg.event;
                                return canvas.fromDataURL(event.target.result);
                            }
                        });

                        $("html").pasteImageReader({
                            callback: function (_arg) {
                                var event, file;
                                file = _arg.file, event = _arg.event;
                                return canvas.fromDataURL(event.target.result);
                            }
                        });

                        (function ($) {
                            pixie = Pixie.Editor.Pixel.create({
                                width: 40,
                                height: 40,
                                pixelSize: 10,
                                initializer: function (canvas) {
                                    console.log(canvas);
                                    window.canvas = canvas;
                                    (function (frameData) {
                                        return canvas.setInitialState(frameData);
                                    })(null);
                                    if (false)
                                        canvas.replay(null, null);
                                    return window.onbeforeunload = function () {
                                        if (canvas.dirty() && !postIt) {
                                            return "Du hast dein Badge noch nicht gekauft, wenn du die Seite jetzt verlässt, wird es gelöscht.";
                                        }
                                    };
                                }
                            });
                            $("#pixie").replaceWith(pixie);
                            return window.currentComponent = pixie;
                        })(jQuery);

                    }).call(this);

                    //]]>
</script>
  
</div>