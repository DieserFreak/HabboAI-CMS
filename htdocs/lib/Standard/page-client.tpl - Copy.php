
<style>
@import url(//fonts.googleapis.com/css?family=Ubuntu:400,500,300,700);

@import url(//fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic|Ubuntu+Condensed);
@import url(https://fonts.googleapis.com/css?family=Lobster);
@import url(https://fonts.googleapis.com/css?family=Varela+Round);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
</style>
<!DOCTYPE html>
<html>
<head>
	<title>{name} Hotel - {SEITE}: {USERNAME}</title>
	<script src="{themeurl}js/jquery.min.js"></script>

	<script src="{themeurl}flashclient/libs2.js" type="text/javascript"></script>
	<script src="{themeurl}flashclient/visual.js" type="text/javascript"></script>
	<script src="{themeurl}flashclient/libs.js" type="text/javascript"></script>
	<script src="{themeurl}flashclient/common.js" type="text/javascript"></script>
	<link rel="stylesheet" href="{themeurl}flashclient/style.css" type="text/css" />
	<link rel="stylesheet" href="{themeurl}flashclient/habboclient.css" type="text/css" />
	<link rel="stylesheet" href="{themeurl}flashclient/habboflashclient.css" type="text/css" />
	<link rel="stylesheet" href="{themeurl}websockets/css/style.css" type="text/css" />
	<script src="{themeurl}flashclient/habboflashclient.js" type="text/javascript"></script>
	<script type="text/javascript" src="{themeurl}flashclient/habboflashclient.js"></script>
	<script src="/lib/standard/js/parserIP3.js"></script>
	<script type="text/javascript" src="{themeurl}flashclient/loader_new.js"></script>
	<script type="text/javascript" src="{themeurl}js/jquery-2.1.3.min.js"></script>
	<script src="{themeurl}flashclient/websocket.js" type="text/javascript"></script>
	<link rel="icon" href="{themeurl}img/neu/favicon.ico"/>
	<style>
body {

    font: 0.8em Sans-Serif;
	-moz-user-select: none; 
    -khtml-user-select: none; 
    -webkit-user-select: none; 
    -o-user-select: none; 

	font-family:Ubuntu;

}
div#bz-tool:hover {
    opacity: 0.7;
}
div#bz-tool {
    height: 32px;
    width: 32px;
    position: absolute;
    background: url(../imgs/heart-beats.png?ab);
    background-size: 32px;
    transition: 150ms;
    right: 200px;
    top: 13%;
    z-index: 1;
    background-color: #24231e;
    padding: 5px;
    background-repeat: no-repeat;
    background-position: 5px 5px;
    border-radius: 3px;
    border: 2px solid #54524d;
    cursor: pointer;
}
div#g-admintool {
	position: absolute;
    right: 7px;
    top: 24px;
    color: #666666;
    background-image: linear-gradient(to bottom,#ffffff,#D9D9D9);
    font-size: 12px;
    cursor: pointer;
    font-weight: bold;
    height: 15px;
    text-align: center;
    width: 15px;
    box-shadow: 0px 0px 0px 1px #919191;
    line-height: 16px;
    border-radius: 4px;
}

div#g-admintoolicon {
    height: 15px;
    width: 15px;
    background-image: url(../imgs/my_5.gif);
    background-size: 11px;
    background-repeat: no-repeat;
    background-position: 50%;
}
.whog {
    font-weight: bold;
    font-size: 12px;
    text-align: center;
    position: relative;
    top: 15px;
}
div#g-sound {
    position: absolute;
    right: 27px;
    top: 5px;
    color: #666666;
    background-image: linear-gradient(to bottom,#ffffff,#D9D9D9);
    font-size: 12px;
    cursor: pointer;
    font-weight: bold;
    height: 15px;
    text-align: center;
    width: 15px;
    box-shadow: 0px 0px 0px 1px #919191;
    line-height: 16px;
    border-radius: 4px;
}

div#g-soundon {
    height: 15px;
    width: 15px;
    background-image: url(../imgs/toolbar_bb_01.gif);
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 14px;
}

div#bz_anfrage_text {
    text-align: left;
    font-size: 11px;
    position: relative;
    margin-top: 14px;
    left: 12px;
    color: #353535;
}
div#bz_ablehnen {
    margin-right: 10px;
}

.bz_a_bttn:hover {
  box-shadow: inset 0px 3px 0px 0px #f1dbf0, inset 0px -10px 0px 0px #c6afc5, 0px 0px 10px 0px rgba(0,0,0,0.1);
  cursor: pointer;
 }
.bz_a_bttn {
    margin-top: 12px;
    height: 25px;
    width: 80px;
    background: #e4cee3;
    border: 1px solid #b5a4b4;
    color: #5f2a51;
    border-radius: 4px;
    font-weight: bold;
    font-size: 11px;
    font-family: ubuntu;
    text-shadow: 0px 1px 0px white;
    box-shadow: inset 0px 3px 0px 0px #f1dbf0, inset 0px -10px 0px 0px #ceb9cd;
    line-height: 0;
    outline: 0;
    float: right;
    line-height: 27px;
}
div#bz_anfrage_avatar {
    height: 100px;
    width: 100px;
    border-radius: 100%;
    border: 2px dotted #505050;
    background-position: -20px -32px;
    position: relative;
    float: left;
    top: 5px;
    left: 0px;
}
div#heart1 {
    color: #ffffff;
    position: relative;
    top: -8.5px;
    color: #5F2A51;
    text-shadow: 0px 1px 0px white;
}
div#heart2 {
    color: #5F2A51;
    position: relative;
    top: -8.5px;
    text-shadow: 0px 1px 0px white;
}
div#bz_box {
    visibility: visible;
    position: absolute;
    height: auto;
    display: table;
    vertical-align: middle;
    left: 38%;
    background: rgb(226, 226, 226);
    border: 1px solid rgb(0, 0, 0);
    border-radius: 4px;
    text-align: center;
    color: black;
    padding: 10px;
    box-shadow: white 0px 3px 0px 0px inset, rgba(0, 0, 0, 0.2) 0px -4px 0px 0px inset, rgba(0, 0, 0, 0.4) 0px 0px 50px 0px;
    z-index: 10;
    top: 35%;
}

div#bz_anfrage {
    width: 300px;
    height: 150px;
}
div#bz_box {
    visibility: visible;
    position: absolute;
    height: auto;
    display: table;
    vertical-align: middle;
    left: 38%;
    background: #E4CEE3;
    border: 1px solid rgb(0, 0, 0);
    border-radius: 4px;
    text-align: center;
    color: white;
    padding: 10px;
    box-shadow: #f1dbf0 0px 3px 0px 0px inset, rgba(0, 0, 0, 0.2) 0px -4px 0px 0px inset, rgba(0, 0, 0, 0.4) 0px 0px 50px 0px;
    z-index: 10;
    top: 35%;
}

div#bz_anfrage {
    width: 300px;
    height: 150px;
}

div#bz_title {
    color: #5F2A51;
    font-weight: bold;
    position: relative;
    text-align: center;
    cursor:default;
    text-shadow: 0px 1px 0px white;
}

div#bz_title_s1 {
    height: 1px;
    width: 75px;
    background: #5F2A51;
    float: left;
    border-bottom: 1px solid white;
}

div#bz_title_s2 {
    height: 1px;
    width: 75px;
    background: #5F2A51;
    float: right;
    /* margin-right: 25px; */
    border-bottom: 1px solid white;
}

div#bz_title_style {
    position: relative;
    top: 8px;
}
div#g-soundoff {
    height: 15px;
    width: 15px;
    background-image: url(../imgs/toolbar_bb_00.gif);
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 14px;
}
div#bz_info {
    height: 160px;
}
div#bz_info_infos {
    text-align: left;
    position: relative;
    display: inline-block;
    top: -115px;
    color: #5F2A51;
    line-height: 16px;
    font-size: 11px;
    left: 116px;
    text-shadow: 0px 1px 0px white;
}
div#bz_info_bttns {
    float: right;
    position: relative;
    top: -33px;
    left: -44px;
    margin-right: -40px;
}
div#bz_info_1 {
    width: 115px;
    float: left;
    margin-left: 17px;
    margin-right: 5px;
}
div#bz_info_2 {
    float: left;
    margin-right: 5px;
}
.bz_info_avatar {
    height: 102px;
    width: 55px;
    background-position: 0px;
    float: left;
    margin-left: 6px;
}
div#bz_info_avatar2 {
    margin-left: -26px;
}

div#bz_info_avatars {
    width: 100px;
    height: 125px;
    margin-top: 10px;
    border-radius: 5px;
    overflow: hidden;
}
img.bz_info_img {
    float: right;
    margin-top: -141px;
    margin-left: -97px;
    position: relative;
    left: -15px;
    top: 17px;
}
div#bz_single {
    width: 170px;
    font-size: 10px;
}
div#bz_trennen:hover {
    opacity: 0.5;
}

div#bz_trennen {
    color: #653257;
    position: relative;
    top: 10px;
    cursor: pointer;
    font-size: 12px;
    text-shadow: 0px 1px 0px white;
}

.box_schließen:hover {
	opacity:0.5;
}

.box_schließen {
    position: absolute;
    width: 20px;
    height: 20px;
    top: 5px;
    right: 5px;
    color: #5f2a51;
    cursor: pointer;
    font-weight: bold;
    text-shadow: 0px 1px 0px white;
    font-size: 17px;
    z-index: 2;
}
div#bz-punkte {
    height: 11px;
    width: 156px;
    position: absolute;
    right: 24px;
    top: 160px;
    background: #24231e;
    z-index: 2;
    border: 2px solid #54524d;
    border-radius: 4px;
    font-family: ubuntu;
    line-height: 12px;
    font-size: 11px;
    padding: 5px;
    font-weight: bold;
    color: #b12727;
    text-shadow: 0px 1px 1px rgba(0, 0, 0, 0.69);
    box-shadow: 0px 0px 0px 1px black;
}

span#bz-pp {
    text-align: right;
    float: right;
    font-weight: bold;
    margin-right: 7px;
    color: white;
}

span#bz-tt {
    height: 23px;
    width: 23px;
    background: #b12727;
    top: -19px;
    display: inline-block;
    float: right;
    left: 27px;
    border: 2px solid rgb(230, 50, 50);
    border-radius: 4px;
    box-shadow: 0px 0px 0px 1px black;
    position: relative;
    clear: both;
}
span#bz-tt-icon {
    height: 23px;
    width: 24px;
    background: url(icon_heart.gif);
    float: right;
    z-index: 2;
    background-repeat: no-repeat;
    background-position: 50%;
}
div#current-ochats {
    height: 14px;
    width: 15px;
    background: rgb(172, 29, 25);
    border-radius: 100%;
    line-height: 15px;
    text-align: center;
    position: absolute;
    top: 273px;
    left: 57px;
    font-size: 9px;
    font-weight: bold;
    border: 2px solid #ed2823;
    position: absolute;
    z-index: 2;
}
div#bz-tool:hover {
    opacity: 0.7;
}
div#bz-tool {
    height: 32px;
    width: 32px;
    position: absolute;
    background: url(heart-beats.png?ab);
    background-size: 32px;
    transition: 150ms;
    right: 200px;
    top: 13%;
    z-index: 1;
    background-color: #24231e;
    padding: 5px;
    background-repeat: no-repeat;
    background-position: 5px 5px;
    border-radius: 3px;
    border: 2px solid #54524d;
    cursor: pointer;
} 
img.bz_love_brief {
    margin-top: 15px;
    margin-left: 10px;
}
div#bz_info_info {
    text-align: left;
    font-size: 11px;
    position: relative;
    text-shadow: 0px 1px 0px white;
    top: 20px;
    left: 0px;
    width: 245px;
    color: #6e3e61;
    float: right;
    margin-right: 15px;
}
div#bz_bg {
    height: 94%;
    width: 97%;
    position: absolute;
    background-image: url(info_bg.png);
    opacity: 0.05;
    background-size: 100%;
    background-repeat: no-repeat;
}
 div#bz_notification {
    background: white;
    width: 225px;
    height: 60px;
    position: fixed;
    bottom: 10%;
    right: 0px;
    z-index: 2;
    border-radius: 3px 0px 0px 3px;
    border-bottom: 3px solid #afafaf;
 }
 div#bz_notification {
    background: #24231e;
    width: 225px;
    height: 70px;
    position: fixed;
    bottom: 10%;
    right: 0px;
    z-index: 2;
    border-radius: 3px 0px 0px 3px;
    border-bottom: 3px solid #1b1b1b;
    box-shadow: 0px 0px 0px 1px #000000;
    color: white;
    text-shadow: 0px 1px 1px black;
}

div#bz_notification_logo {
    background-image: url('love_panda2.png');
    height: 57px;
    width: 44px;
    float: left;
    margin-left: 9px;
    margin-top: 7px;
    margin-right: 10px;
}

div#bz_notification_title {
    font-weight: bold;
    float: left;
    margin-top: 8px;
    font-size: 15px;
}

div#bz_notification_desc {
    float: left;
    font-size: 10px;
    margin-top: 5px;
    width: 140px;
}

ul#bz_ap {
    margin-top: 20px;
    text-align: left;
    color: #5f2a51;
}

ul#bz_ap li {
    height: 50px;
    background: rgba(0,0,0,0.1);
    padding: 2px;
    border-radius: 5px;
	margin-top:10px;
}

span#bz_ap_img_kiss {
    height: 50px;
    width: 50px;
    float: left;
    background-image: url(../imgs/KISS_HCCA.gif);
}

span#bz_ap_img_hug {
    height: 50px;
    width: 50px;
    float: left;
    background-image: url(../imgs/HUG_HHCA.gif);
}

span#bz_ap_img_time {
    height: 50px;
    width: 50px;
    float: left;
    background-image: url(../imgs/VSP01.gif);
    background-repeat: no-repeat;
    background-position: 50%;
}

span#bz_ap_title {
    font-weight: bold;
    display: block;
    margin-top: 8px;
}

span#bz_ap_desc {
    font-size: 11px;
    display: block;
    margin-top: 6px;
}
span#bz_ap_points {
    float: right;
    font-size: 12px;
    position: relative;
    top: -36px;
    right: 5px;
    font-weight: bold;
}

div#next_stufe {
    text-align: left;
    position: relative;
    text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);
    top: 20px;
    color: #5f2a51;
    left: 10px;
}
div#bz_vg_bttns {
    position: absolute;
    right: 10px;
    bottom: 20px;
}
div#next_stufe {
    text-align: left;
    position: relative;
    text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);
    top: 20px;
    color: #5f2a51;
    left: 15px;
    font-size: 12px;
}
img.nextbadge {
    position: absolute;
    right: 25px;
    top: 10px;
    padding: 6px;
    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.47);
    border-radius: 5px;
}
div#bz_notification_points {
    float: left;
    font-size: 10px;
    margin: 5px;
    color: #e04f5f;
    font-weight: bold;
}
.stack_change {
    float: left;
    height: 30px;
    width: 95px;
    transition: 200ms;
    color: white;
    cursor: pointer;
    border-top: 1px solid rgba(0,0,0,0.3);
    text-align: center;
    line-height: 30px;
    background: #cecece;
    font-size: 12px;
    color: black;
    font-weight: bold;
    text-shadow: 0px 1px 0px white;
}

input#magicVarAltitude {display: inline-block;height: 28px;text-align: center;width: 110px;border: none;outline: none;font-weight: bold;border-top: 1px solid rgba(0,0,0,0.3);}

div#stack_up {
    float: right;
    border-radius: 0px 0px 5px 0px;
}

div#stack_down {
    border-radius: 0px 0px 0px 5px;
}

#banksystem {
 display: none;
 position: fixed;
 z-index: 49;
 left: 50%;
 top: 50%;
 margin-left: -75px;
 margin-top: -75px;
 width: 150px;
 height: 170px;
 background: #e2e2e2;
 border: 2px solid #000;
 border-radius: 4px;
 text-align: center;
 box-shadow: inset 0px 3px 0px 0px #ffffff, inset 0px -3px 0px 0px #8c8c8c, 0 0 2em black;
 cursor: default;
}

#banksystem #überschrift {
 display: inline-block;
 margin-top: 5px;
 padding: 0;
 font-family: "segoe ui", "segoe ui lighter";
 font-size: 1em;
 color: #000000;
 font-weight: bold;
 text-shadow: 0px 1px 0px white;
}

#banksystem #schließen {
 position: absolute;
 display: inline-block;
 width: 18px;
 height: 18px;
 background-color: #e2e2e2;
 right: 6px;
 top: 6px;
 border: 1px solid black;
 border-radius: 5px;
 font-size: 14px;
 font-family: arial black;
 line-height: 18px;
 color: #444444;
 font-weight: bold;
 box-shadow: inset 0px 2px 0px 0px #ffffff, inset 0px -2px 0px 0px #afafaf;
}

#banksystem #schließen:hover {
opacity:0.75;
}


#banksystem #header { 
 width: 100%;
 height: 40px;
 background-color: black;
 margin-top: 8px;
 font-size: 14px;
 font-family: "segoe ui", "segoe ui lighter";
 line-height: 19px;
 text-align: right;
 opacity: 0.7;
}

#banksystem button.bank_menu {
 width: 110px;
 height: 25px;
 background: linear-gradient(to bottom, #d0d0d0 50%, #b3b3b3 51%);
 color: black;
 font-size: 13px;
 font-family: "segoe ui", "segoe ui lighter";
 border: 1px solid #000000;
 border-radius: 2px;
 text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);
 font-weight: bold;
 outline: 0;
}

button:focus {
 outline: none;
}

button::-moz-focus-inner {
 border: 0;
}

#banksystem button.bank_menu:hover {
 opacity:0.8;
}

#banksystem button.bank_menu:active { 
 opacity:1;
}

#banksystem #zurück {
 display: none;
 position: absolute;
 top: 10px;
 left: 10px;
 width: 10px;
 cursor: pointer;
 height: 11px;
 background-image: url(/gallery/imgs/arrow.gif);
}

#banksystem #zurück:hover {
 opacity: 0.7;
}

#banksystem #zurück:active {
 opacity: 1;
}

#banksystem #inhalt {
 margin-top: 12px;
}

#banksystem #inhalt #meldung { 
 display: inline;
 margin: 0;
 padding: 0;
 font-family: "segoe ui", "segoe ui lighter";
 font-size: 14px;
 color: black;
}

.stack_change:hover {
    opacity: 0.8;
}
div#next_stufe {
    text-align: left;
    position: relative;
    text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);
    top: 20px;
    color: #5f2a51;
    left: 15px;
    font-size: 12px;
}
</style>
	
	<script language="javascript" type="text/javascript">

  var dragEle = null;

  var eleX = 0;
  var eleY = 0;

  var mouseX = 0;
  var mouseY = 0;

  document.onmousemove = move;
  document.onmouseup   = dragStop;


  function dragStart(element)
  {

    dragEle = element;
    eleX = mouseX - dragEle.offsetLeft;
    eleY = mouseY - dragEle.offsetTop;

  }


  function dragStop()
  {

    dragEle=null;

  }


  function move(dragEvent)
  {

    mouseX = document.all ? window.event.clientX : dragEvent.pageX;
    mouseY = document.all ? window.event.clientY : dragEvent.pageY;

    if(dragEle != null)
    {

      dragEle.style.left = (mouseX - eleX) + "px";
      dragEle.style.top = (mouseY - eleY) + "px";

    }

  }

		var andSoItBegins = (new Date()).getTime();
		
		function sitealert(sitealert)
    {
        var sitealert = sitealert.replace(/ä/g,"ae").replace(/ö/g,"oe").replace(/ü/g,"ue").replace("Ä","Ae").replace(/Ö/g,"Oe").replace(/Ü/g,"Ue").replace("ß","ss").replace(/(<([^>]+)>)/ig,"");
        $("#clbar").append("<div id='sitealert' onClick='$(\"#sitealert\").remove()'>" + sitealert + "</div>");
        $("#sitealert").fadeOut(15000);
    
    }
	function openStapelFelder(itemid, hoehe)
    {
    var itemid = itemid;
    var hoehe = hoehe;

    if($("#Fenster-Stapelfelder").size())
    {
    $("#Fenster-Stapelfelder").remove();
    } else {

    var left = (($(window).width()/2)-(350/2));
    var top = (($(window).height()/2)-(250/2));

    $("#client-ui").append("<div id='Fenster-Stapelfelder' onmousedown='dragStart(this);' class='alert' onClick='makezindex(\"Stapelfelder\")' style='left: " + left + "px;top: " + top + "px;width: 350px;height: 250px;'></div>");
    $("#Fenster-Stapelfelder").load("{themeurl}websockets/loader/Stapelfelder/index.php?itemid=" + itemid + "&hoehe=" + hoehe).draggable({ containment: '#client-ui' });
    }
    }
   function loadGameCenter(game, width, height)
    {	
		var left = ($(window).width()/2)-200;
		var top = ($(window).height()/2)-320;
		$("#client-ui").append("<div id='Fenster-"+ game +"' onmousedown='dragStart(this);' class='alert' style='z-index:9999999;left: " + left + "px;top: " + top + "px;width:"+ width +"px;height:"+ height +"px;'></div>");
		$("#Fenster-"+ game +"").load("{themeurl}websockets/loader/"+ game +"/index.php").draggable({ containment: '#client-ui' });

	}
	function loadGameTop(game, width, height)
    {	
		var left = (($(window).width()/2)-(1210/2));
		var top = (($(window).height()/2)-(700/2));
		$("#client-ui").append("<div id='Fenster-"+ game +"' onmousedown='dragStart(this);' class='alert' style='z-index:9999999;left: " + left + "px;top: " + top + "px;width:"+ width +"px;height:"+ height +"px;'></div>");
		$("#Fenster-"+ game +"").load("{themeurl}websockets/loader/"+ game +"/index.php").draggable({ containment: '#client-ui' });

	}
	function openYTPlayer()
    {

    if($("#Fenster-Youtube").size())
    {
    $("#Fenster-Youtube").remove();
    } else {
    var left = (($(window).width()/2)-390);
    var top = (($(window).height()/2)-168);
    $("#client-ui").append('<div id="Fenster-Youtube" onClick="makezindex(\'Youtube\')" class="alert" style="left: ' + left + 'px;top: ' + top + 'px;background: #E9E9E1;width: 780px;height: 356px;"></div>');
    $("#Fenster-Youtube").load("{themeurl}/websockets/Youtube/Page.php").draggable({ containment: '#client-ui' });
    }


    }
	function updateLog()
    {	
		var leftpos = ($(window).width()/2)-150;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append('<div id="infobox"  onmousedown="dragStart(this);" style="width:500px;position: absolute;top: ' + toppos +'px;left: ' + leftpos + 'px;"></div>');
		$("#infobox").load("{themeurl}/websockets/loader/UpdateLog/index.php").draggable({ containment: '#client-ui' });
   }
   function tvStream()
    {	
		var leftpos = ($(window).width()/2)-150;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append(' <div id="infobox"  onmousedown="dragStart(this);" style="width:700px;height:400px;position: absolute;top: ' + toppos +'px;left: ' + leftpos + 'px;"></div>');
		$("#infobox").load("{themeurl}/websockets/loader/TvStream/index.php").draggable({ containment: '#client-ui' });
   }
	function developer()
    { 
     var left = (($(window).width()/2)-(350/2));
    var top = (($(window).height()/2)-(250/2));
 $("#client-ui").append("<div id='Fenster-Stapelfelder' onmousedown='dragStart(this);' class='alert' onClick='makezindex(\"Stapelfelder\")' style='left: " + left + "px;top: " + top + "px;width: 350px;height: 250px;'></div>");
    $("#Fenster-Stapelfelder").load("{themeurl}websockets/loader/dev/index.php").draggable({ containment: '#client-ui' });
     
   }
      function beziehung()
   {
	   
	   if($('#bz-noti')!= null){
		   
		   $('#bz-noti').remove();
	   }
	   if($("#bz_info") != null){
		   
		   $('#bz_info').remove();
	   }
	   
	   
	   var leftpos = ($(window).width()/2)-250;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append('<div id="bz-noti" onmousedown="dragStart(this);"><div id="bz_box"><div id="bz_info"></div></div>');
				$("#bz_info").load("{themeurl}/websockets/loader/beziehung/index.php").draggable({ containment: '#client-ui' });
  
	   
	   
	   
   }

   function GetBeziehung_info()
   {
	      var leftpos = ($(window).width()/2)-250;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append('<div id="bz_box" onmousedown="dragStart(this);"><div id="bz_info" style="height: 300px; width: 400px;"></div></div>');
				$("#bz_info").load("{themeurl}/websockets/loader/beziehung/info.php").draggable({ containment: '#client-ui' });
  
	   
	   
	   
   }
   
     function GetBeziehung_vg()
   {
	      var leftpos = ($(window).width()/2)-250;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append('<div id="bz_box" onmousedown="dragStart(this);"><div id="bz_info" style="height: 200px;"></div></div>');
				$("#bz_info").load("{themeurl}/websockets/loader/beziehung/belohnung.php").draggable({ containment: '#client-ui' });
  
	   
	   
	   
   }
   
   
    
     function GetBeziehung_trennen()
   {
	      var leftpos = ($(window).width()/2)-250;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append('<div id="bz_box" onmousedown="dragStart(this);"><div id="bz_anfrage"></div></div>');
				$("#bz_anfrage").load("{themeurl}/websockets/loader/beziehung/trennen.php").draggable({ containment: '#client-ui' });
  
	   
	   
	   
   }
   
   
        function Beziehung_anfrage(geilebitchwillwasvondir)
   {
	      var leftpos = ($(window).width()/2)-250;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append('<div id="bz_box" onmousedown="dragStart(this);"><div id="bz_anfrage"></div></div>');
				$("#bz_anfrage").load("{themeurl}/websockets/loader/beziehung/anfrage.php?geilebitch="+geilebitchwillwasvondir).draggable({ containment: '#client-ui' });
  
	   
	   
	   
   }
   
     function level_up(scheisslevel)
   {
	      if($("#bz_box") != null){
		   
		   $('#bz_box').remove();
	   }
	   
	   
	      var leftpos = ($(window).width()/2)-250;
		var toppos = ($(window).height()/2)-200;
		$("#client-ui").append('<div id="bz_box" onmousedown="dragStart(this);" style=" width:400px"><div id="bz_anfrage"></div></div>');
				$("#bz_anfrage").load("{themeurl}/websockets/loader/beziehung/belohnend.php?scheissbelohnung="+scheisslevel).draggable({ containment: '#client-ui' });
  
	   
	   
	   
   }
   
   
   function bz_notification(notification,bzpunkte,title){
	   bz_punkt();
	setTimeout(function(){
		 $("#bz_notification_title").html(title);
     $("#bz_notification_desc").html(notification);
     $("span.bz_not_points").html(bzpunkte);
	 $("#bz_notification_points").fadeIn();
     $("#bz_notification").fadeIn(1000); 
	 $("#bz_notification").animate({'right': '0'}, 800);
	 setTimeout(function(){
	  $("#bz_notification").animate({'right': '-150%'}, 800);
	  $("#bz_notification").fadeOut(0, function(){
	   $("#bz_notification_desc").empty();
	   $("span.bz_not_points").empty();
	   $("#bz_notification").css({'right': '-150%'});
	  });
	 }, 8000);
	});
   }
   
   function bz_notification2(title,notification){
	$('span#bz-pp').text("0");
	setTimeout(function(){
     $("#bz_notification_title").html(title);
     $("#bz_notification_desc").html(notification);
     $("#bz_notification_points").hide();
     $("#bz_notification").fadeIn(1000); 
	 $("#bz_notification").animate({'right': '0'}, 800);
	 setTimeout(function(){
	  $("#bz_notification").animate({'right': '-150%'}, 800);
	  $("#bz_notification").fadeOut(0, function(){
	   $("#bz_notification_desc").empty();
	   $("span.bz_not_points").empty();
	   $("#bz_notification").css({'right': '-150%'});
	  });
	 }, 8000);
	});
   }
   
    function bz_punkt(){
		 $.ajax({
           type: "GET",
           url: '{themeurl}/websockets/loader/beziehung/points.php',
		   success: function(result){
			if(result != 0 && $.isNumeric(result)) {
				$('span#bz-pp').fadeTo(700, 0, function(){
				$('span#bz-pp').text(result);
				$('span#bz-pp').fadeTo(700, 1);
				});
			}		
		}	   
	});
  }
  
window.onload = bz_punkt();
   


	</script>

	<script type="text/javascript">
		var habboReqPath = "";
		var habboImagerUrl = "http://www.habbo.it/habbo-imaging/";
		var habboDefaultClientPopupUrl = "{url}/client";
	</script>

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

	
	<script type="text/javascript">
		var flashvars = {
			"client.allow.cross.domain" : "1", 
			"client.notify.cross.domain" : "0", 
			"conection.info.host" : "185.11.146.223", 
			"conection.info.port" : "1338",
			"site.url" : "{url}/", 
			"url.prefix" : "{url}/", 
			"client.reload.url" : "{url}/client", 
			"client.fatal.error.url" : "{url}/client",
			"client.connection.failed.url" : "{url}/getrennt",
			"external.variables.txt" : "{url}/{base}/{external_vars}", 
			"external.texts.txt" : "{url}/{base}/{external_flash}", 
			"productdata.load.url" : "{url}/{base}/{productdata}", 
			"furnidata.load.url" : "{url}/{base}/{furnidata}",
			"use.sso.ticket" : "1", 
			"new.identity" : "0", 
			"sso.ticket" : "{USERAUTH}", 
			"processlog.enabled" : "0", 
			"account_id" : "{USERID}", 
			"client.starting" : "", 
			"client.hotel_view.image.url" : "{url}/{base}/c_images/hotel_view_images_hq/beta_hotelview.png", 
			"flash.client.url" : "{url}/{base}/gordon/", 
			"connection.info.port" : parser.p("=ADMwAzM"),
			"user.hash" : "{clienthash}", 
			"connection.info.host" : parser.p("=82cvoyL=EmYi9GavoyL0YTZzFmY"),
			"has.identity" : "1", 
			"flash.client.origin" : "popup" 
			
		};
		var params = {
			"base" : "{url}/{base}/gordon/",
			"allowScriptAccess" : "always",
			"menu" : "false",
			"bgcolor" : "#000",
			"wmode" : "opaque"        
		};


		FlashExternalInterface.signoutUrl = "{url}/logout";

		var clientUrl = "{url}/{base}/gordon/{habbo_swf}";

		swfobject.embedSWF(clientUrl, "flash-container", "100%", "100%", "10.0.0", "hhnewloader/expressInstall.swf", flashvars, params);
		window.onbeforeunload = unloading;
		function unloading() {
			var clientObject;
			if (navigator.appName.indexOf("Microsoft") != -1) {
				clientObject = window["flash-container"];
			} else {
				clientObject = document["flash-container"];
			}
			try {
				clientObject.unloading();
			} catch (e) {}
		}
		
		    function htmlEntities(str) {
   	 return String(str).replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace('Ö', '&Ouml;').replace('Ü', '&Uuml;').replace('Ä', '&Auml;').replace('ö', '&ouml;').replace('ü', '&uuml;').replace('ä', '&auml;').replace('ß', '&szlig;').replace(' ', '&nbsp;');
    }

	var volume = 50;
    function goRoomEvent(roomid, alertid)
    {
    	var roomid = roomid;	
    	var alertid = alertid;

    	$("#Fenster-Alert-" + alertid).remove();

    	ws.send("6|" + roomid);
    }

    function makezindex(fenster)
    {
    	if($("#Fenster-" + fenster).size())
    	{
    		zindex++;
    		$("#Fenster-" + fenster).css('z-index', zindex);
    	}
    }

	
			window.ws = new ReconnectingWebSocket('ws://0.0.0.0:8181/');

			ws.onopen = function(event) {
				console.log('Websocket Leitung wird geöffnet');
				ws.send("1|{USERAUTH}");
				console.log('SSO An Websockets geschickt');
    			};

			ws.onclose = function(event) {
				console.log('Websocket CLOSED: ', event);
			};

			ws.onmessage = function(event) {
				msg = event.data;
				console.log('Socket INCOMING: ' + msg);
				var text = msg.split('|');


				switch(text[0])	
				{
					case 'dev':
						developer();
						break;
					case 'updateLog':
						updateLog();
						break;
					case 'stream':
						tvStream();
						break;						
					case 'vouchergame':
						var count = text[1];
						var waehrung = text[2];
						var voucher = text[3];

						var leftpos = ($(window).width()/2)-150;
						var toppos = ($(window).height()/2)-200;
						$("#client-ui").append('<div id="infobox"  onmousedown="dragStart(this);" style="width:550px;position: absolute;top: ' + toppos +'px;left: ' + leftpos + 'px;"><div class="header rot">Sei der schnellste<div class="close" onclick="$(\'#infobox\').remove()"></div></div><div class="content" style="padding:0px;max-height:400px;padding:20px;"><img src="/lib/standard/websockets/images/frank/9.gif" style="float:left;"><img src="/lib/standard/websockets/images/frank/2.gif" style="float:right;"><center>Tippe den nachfolgenden Text schnellstm&ouml;glich in das Gutscheinfeld im Katalog ein und Gewinne ' + count + ' ' + waehrung + '<br><br><b>'+ voucher +'</b></center></div></div>');						
						break;
					case '4':
						loadGameCenter('Doodlejump','425','580');
						break;	
					case '5':
						var name = text[1];
						var leiter = text[2];
						var id = text[3];

						var fid = Math.floor((Math.random() * 155) + 1);

						var leftpos = ($(window).width()/2)-150;
						var toppos = ($(window).height()/2)-200;
						$("#client-ui").append("<div id='Fenster-Alert-" + fid + "' class='eventalert' onClick='makezindex(\"Alert-" + fid + "\")' style='position: absolute;top: " + toppos +"px;left: " + leftpos + "px;'></div>");
						$("#Fenster-Alert-" + fid).html('<div class="head"><div class="close" onclick="$(\'#Fenster-Alert-' + fid + '\').remove()"></div>Offizieller Eventstart</div><div class="inner">Es findet nun das Event <b>' + htmlEntities(name) + '</b> im Raum von <b>' + leiter + '</b> statt!</div><div class="goroom" onClick="goRoomEvent(\'' + id + '\', \'' + fid + '\')">Eventraum betreten</div><img src="{themeurl}/websockets/images/frank/5.png" style="margin-top: -22px;"><div style="display: none;"><audio controls autoplay><source src="{themeurl}/websockets/sounds/eventstart.mp3" type="audio/mpeg"></audio></div>').draggable({ containment: '#client-ui' });
						break;
							case 'beziehung':
						beziehung();
						break;
						
						case 'kisshug':
						var textxxx = text[1];
						var money = text[2];
						var ksktitle = text[3];
						bz_notification(textxxx,money,ksktitle);
						break;
						
						case 'textosteron':
							
						var titelxx = text[1];
						var textosteronxx = text[2];
						bz_notification2(titelxx,textosteronxx);
						break;
						
						case 'sexanfrage':
						var bitch = text[1];
						Beziehung_anfrage(bitch);
						break;
						
						case 'beschissenescheissbelohnung':
						var sex_level = text[1];
						level_up(sex_level);
						break;
					case '6':
						loadGameTop('Agario','1110','580');
						break;
					case '7':
						loadGameCenter('pacman','345','490');
						break;
					case '8':
						openYTPlayer();
						break;
					case '9':
						var itemid = text[1];
						var hoehe = text[2];
						openStapelFelder(itemid, hoehe);
						break;
	case '31':
    if(msg !== '31')
    {

    var itemid = text[1];
    var youtubevideo = text[2];
    var left = (($(window).width()/2)-(350/2));
    var top = (($(window).height()/2)-(270/2));
    if($("#Fenster-WiredYoutubeplayerSettings").size())
    {
    $("#Fenster-WiredYoutubeplayerSettings").remove();
    } else {
    $("#client-ui").append("<div id='Fenster-WiredYoutubeplayerSettings' class='alert' onClick='makezindex(\"WiredYoutubeplayerSettings\")' style='left: " + left + "px;top: " + top + "px;width: 350px;height: 270px;'></div>");
    $("#Fenster-WiredYoutubeplayerSettings").load("{themeurl}websockets/loader/WiredYoutubeplayerSettings/index.php?itemid=" + itemid + "&youtubevideo=" + youtubevideo).draggable({ containment: '#client-ui' });
    }
    } else {

    var left = (($(window).width()/2)-(1210/2));
    var top = (($(window).height()/2)-(700/2));
    if($("#Fenster-WiredYoutubeplayerSettings").size())

    {
    $("#Fenster-Agario").remove();
    } else {
    $("#client-ui").append("<div id='Fenster-Agario' class='alert' onClick='makezindex(\"Agario\")' style='left: " + left + "px;top: " + top + "px;width: 1210px;height: 700px;'></div>");
    $("#Fenster-Agario").load("{themeurl}websockets/loader/client/loadPage.php?page=Agario").draggable({ containment: '#client-ui' });
    }

    }

    break;

    case '32':
    var youtubevideo = text[1];
    var left = (($(window).width()/2)-(500/2));
    var top = (($(window).height()/2)-(450/2));
    if($("#Fenster-WiredYoutubeplayer").size())
    {
    $("#Fenster-WiredYoutubeplayer").remove();
    } else {
    $("#client-ui").append("<div id='Fenster-WiredYoutubeplayer' onmousedown='dragStart(this);' class='alert' onClick='makezindex(\"WiredYoutubeplayer\")' style='left: " + left + "px;top: " + top + "px;width: 500px;height: 450px;'></div>");
    $("#Fenster-WiredYoutubeplayer").load("{themeurl}websockets/loader/WiredYoutubeplayer/index.php?youtubevideo=" + youtubevideo).draggable({ containment: '#client-ui' });
    }
    break;
					case "55":
						var soundid = 0;
						switch(text[1])
						{
							case "sfx_taperec_breakbeat":
    								soundid = 5;
    							break;

    							case "sfx_onetwo":
    								soundid = 24;
    							break;

    							case "sfx_taperec_bassline":
    								soundid = 34;
    							break;

    							case "sfx_duck":
    								soundid = 57;
    							break;

    							case "sfx_lazer":
    								soundid = 237;	
    							break;

    							case "sfx_glass":
    								soundid = 386;
    							break;

    							case "sfx_bells":
    								soundid = 478;
    							break;

    							case "sfx_whistle":
    								soundid = 609;
    							break;

    							case "sfx_bass1":
    								soundid = 701;
    							break;

       							case "sfx_bass_dbl":
        							soundid = 702;
        						break;

        						case "sfx_funkhorn":
        							soundid = 703;
        						break;

        						case "sfx_pad1":
        							soundid = 706;
        						break;

        						case "sfx_pad2":
        							soundid = 707;
        						break;

        						case "sfx_pad3":
    	    							soundid = 708;
       							break;

        						case "sfx_xylo":
        							soundid = 714;
        						break;

        						case "sfx_xylo2":
        							soundid = 715;
        						break;

        						case "sfx_xylo_high":
        							soundid = 716;
        						break;

        						case "sfx_xylopattern":
        							soundid = 717;
        						break;

        						case "sfx_bigfinish_jamesbrown":
        							soundid = 718;
        						break;

        						case "sfx_drumloop":
        							soundid = 719;
        						break;

        						case "sfx_dubstep1":
        							soundid = 720;
        						break;

        						case "sfx_dubstep2":
        							soundid = 721;
        						break;	

        						case "sfx_dubstep3":
        							soundid = 722;
        						break;

        						case "sfx_dubstep3_2":
        							soundid = 723;
        						break;

        						case "sfx_highhatintro":
        							soundid = 724;
        						break;

        						case "sfx_jamesbrown_hey":
        							soundid = 725;
        						break;

        						case "sfx_sqrpad_dbldotted":
        							soundid = 726;
        						break;

        						case "sfx_strange_echoes_1":
        							soundid = 727;
        						break;

        						case "sfx_strange_echoes_2":
        							soundid = 728;
        						break;

        						case "sfx_strange_echoes_3":
        							soundid = 729;
        						break;

        						default:
       								soundid = 0;
							break;
        					}
        					if(soundid !== 0)
        					{
        						playSound('http://testit.holohotel.ws/r63/hof_furni/mp3/sound_machine_sample_' + soundid + '.mp3', text[1]);
        					}
        				break;

					case "56":
						volume = text[1];
					break;
					
					case "57":
        sitealert(text[1]);
    break;
				}
			};

			ws.onerror = function(event) {
				console.log('Websocket ERROR:', event);
			};
	
			//window.onresize = DoResize;
		window.onload = DoResize; 
	</script> 
</head>

<script type="text/javascript">
		window.onload = function(){
			var auto_refresh = setInterval(
			function ()
			{
				$('#useronline').html('');
				$('#useronline').load('{url}/inc/ajax/ajax.clientuser.php').fadeIn("slow");
			}, 60000);
		}
	</script>


<body id="client" class="flashclient">
<div style="position: absolute;top: 0px;right: 46%;padding: 8px 18px;border-radius: 0px 0px 3px 3px;border-top: none;background-color: rgb(50, 49, 46);border: 2px solid rgb(84, 82, 77);color: rgb(255, 255, 255);border-top: none;font-family: ubuntu;text-shadow: 0px 0px 1px rgb(113, 113, 113);font-size: 14px;z-index: 99999;">
		<center><b id="useronline">{ONLINE}</b> Spieler online</center>
		</div>
	<div id="bz-punkte">Beziehungspunkte<span id="bz-pp" style="opacity: 1;">0</span><span id="bz-tt"><span id="bz-tt-icon"></span></span></div>
		
			
	   <div id="bz_notification" style="display:none;right:-150%;">
  <div id="bz_notification_box">
  
  <div id="bz_notification_logo"></div>
  <div id="bz_notification_title">Beziehung</div>
  <div id="bz_notification_desc">Niclas hat dich geküsst</div>
  <div id="bz_notification_points">+<span class="bz_not_points">88</span> Punkte erhalten</div>
  </div>
  </div>
  

	
	<div id="onlineradio" style="position: absolute;top: 0px;right: 22%;padding: 1px 1px;border-radius: 0px 0px 3px 3px;background-color: rgb(50, 49, 46);border: 2px solid rgb(84, 82, 77);color: rgb(255, 255, 255);border-top: none;text-shadow: 0px 0px 1px rgb(113, 113, 113);z-index: 99999;">
<center>
<embed title="Hobba Radio!" type="application/x-shockwave-flash" src="/player.swf" style="undefined" id="mpl" name="mpl" quality="high" allowfullscreen="true" allowscriptaccess="always" volume="10" wmode="opaque" flashvars="file=http://streamplus54.leonex.de:12156/;stream.mp3&amp;type=sound&amp;stretching=fill&amp;autostart=true&amp;controlbar=bottom&amp;" height="23" width="220">
</center> 
</div>
	
<script type="text/javascript">
	jjLoader.init('client', 6, '	<?php
	$rnd_pic = rand(1,1);

  switch ($rnd_pic) {
		case '1':
		echo 'http://i.imgur.com/A0KGHZY.png';
            break;
    }?>', '{themeurl}/img/habbo_load.png '); // http://i.imgur.com/jh4yHN3.png
</script>


<div id="overlay"></div>
<div id="client-ui" >
	<div id="flash-wrapper">
		<div id="flash-container">
			<div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
				<div class="cbb clearfix">
					<h2 class="title">Bitte Adobe Flash Player auf die neueste Version upgraden</h2>
				</div>
			</div>
			<script type="text/javascript">
				$('content').show();
			</script>
			<noscript>
				<div style="width: 400px; margin: 20px auto 0 auto; text-align: center">
					<p>Wenn Sie nicht automatisch weitergeleitet werden, bitte <a href="/client/nojs">hier klicken</a></p>
				</div>
			</noscript>
		</div>
	</div>
	<div id="content" class="client-content"></div>
</div>
</body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85396186-1', 'auto');
  ga('send', 'pageview');

</script>