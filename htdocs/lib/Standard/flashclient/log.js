var dragobjekt = null;
var dragx = 0;
var dragy = 0;
var posx = 0;
var posy = 0;

function draginit() {
  document.onmousemove = drag;
  document.onmouseup = dragstop;
}


function dragstart(element) {
  dragobjekt = element;
  dragx = posx - dragobjekt.offsetLeft;
  dragy = posy - dragobjekt.offsetTop;
}


function dragstop() {
  dragobjekt=null;
}


function drag(ereignis) {
  posx = document.all ? window.event.clientX : ereignis.pageX;
  posy = document.all ? window.event.clientY : ereignis.pageY;
  if(dragobjekt != null) {
    dragobjekt.style.left = (posx - dragx) + "px";
    dragobjekt.style.top = (posy - dragy) + "px";
  }
}

function showAlt(x) {
    x.style.opacity = "0.3";
}

function normalAlt(x) {
    x.style.opacity = "1";
}

function dolog(type, id, logid)
    {
        switch (type)
        {
            case 'ban':
                $.post("http://www.panfu.us/lib/Standard/logtools/modlog/ban.php", {id: id, logid: logid});
                break;

            case 'follow':
                $.post("http://www.panfu.us/lib/Standard/logtools/modlog/follow.php", {id: id, logid: logid});
                break;
				
			case 'jail':
				$.post("http://www.panfu.us/lib/Standard/logtools/modlog/jail.php", {id: id, logid: logid});
				break;
        }

    }
 $(".mdlgevents").load("http://www.panfu.us/lib/Standard/logtools/modlog/index.php");

    setInterval(function () {
        $(".mdlgevents").load("http://www.panfu.us/lib/Standard/logtools/modlog/index.php");
    }, 3000);
	
	 $(".onlogevents").load("http://www.panfu.us/lib/Standard/logtools/onlinelog/index.php");

    setInterval(function () {
        $(".onlogevents").load("http://www.panfu.us/lib/Standard/logtools/onlinelog/index.php");
    }, 3000);