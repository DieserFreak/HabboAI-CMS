var jjLoader={'maxStep':0,'currentStep':1,'isInit':false,'interval':null,'init':function(_wrapperId,_maxStep,_imageUrl,_backgroundUrl){jjLoader.maxStep=_maxStep;var wrapper=document.getElementById(_wrapperId);wrapper.innerHTML+='<div id="wrapperLoader" style="background: #000 url('+_backgroundUrl+') center no-repeat; position: absolute; z-index: 9999999; top: 0; left: 0; width: 100%; height: 100%;">'+'<div style="width: 240px; height: 125px; padding: 5px; border-radius: 10px; background: rgba(0, 0, 0, 0.7) url('+_imageUrl+') center 15px no-repeat; position: absolute; left: 50%; top: 50%; margin-top: -65px; margin-left: -125px;">'+'<div id="wrapperLoaderText" style="margin-top: 70px; margin-bottom: 10px; text-align: center; font-family: Arial; color: #FFFFFF; font-size: 10px;">Daten werden überprüft.. 0%</div>'+'<div style="border-radius: 1px; border: 1px solid #FFFFFF; background-color: rgba(0, 0, 0, 0.6); padding: 1px; margin-left: 20px; width: 200px; height: 17px">'+'<div id="wrapperLoaderProgress" style="background-color: #8CA1AD; height: 17px; width: 0;">'+'<div style="background-color: #BACAD3; height: 9px; width: 100%;">'+'</div></div></div></div>';jjLoader.interval=window.setInterval(jjLoader.IntervalUpdate,100);jjLoader.isInit=true;return true;},'progressNow':0,'progress':0,'IntervalUpdate':function(){if(!jjLoader.isInit)
{return false;}
if(jjLoader.progressNow>=100)
{return;}
jjLoader.progressNow+=1;var wrapperLoaderProgress=document.getElementById('wrapperLoaderProgress');wrapperLoaderProgress.style.width=jjLoader.progressNow+'%';jjLoader.updateText();return true;},'updateText':function(_text){if(!jjLoader.isInit)
{return false;}
var text='';if(jjLoader.progressNow>0&&jjLoader.progressNow<30)
{text="Habbo wird geladen..";document.getElementById('wrapperLoader').style.backgroundImage="url(http://habbogt.de/lib/Standard/img/habbo_load.png)";}
else if(jjLoader.progressNow>29&&jjLoader.progressNow<67)
{text="Habbo wird geladen..";document.getElementById('wrapperLoader').style.backgroundImage="url(http://habbogt.de/lib/Standard/img/habbo_load.png)";}
else if(jjLoader.progressNow>66&&jjLoader.progressNow<83)
{text="Verbindung wird aufgebaut..";}
else if(jjLoader.progressNow>82&&jjLoader.progressNow<90)
{text="Verbindung erfolgreich!";document.getElementById('wrapperLoader').style.backgroundImage="url(http://habbogt.de/lib/Standard/img/habbo_load.png)";}
else if(jjLoader.progressNow>89&&jjLoader.progressNow<101)
{text="Willkommen im Habbo Hotel!";}
var wrapperLoaderText=document.getElementById('wrapperLoaderText');if(jjLoader.progressNow==100){jjLoader.finish();$('#responsecontainer').fadeOut('slow').load('../../../habblet/client/counter.php').fadeIn("slow");counter=0;}else{wrapperLoaderText.innerHTML=text+' '+jjLoader.progressNow+'%';}
return true;},'finish':function(){if(jjLoader.progressNow<100)
{return false;}
var wrapperLoader=document.getElementById('wrapperLoader');wrapperLoader.parentNode.removeChild(wrapperLoader);window.clearInterval(jjLoader.interval);return true;}};