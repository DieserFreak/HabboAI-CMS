var jjLoader={'maxStep':0,'currentStep':1,'isInit':false,'interval':null,'init':function(_wrapperId,_maxStep,_imageUrl,_backgroundUrl){jjLoader.maxStep=_maxStep;var wrapper=document.getElementById(_wrapperId);wrapper.innerHTML+='<div id="wrapperLoader" style="background: #0E151C url('+_backgroundUrl+') center no-repeat; position: absolute; z-index: 9999999; top: 0; left: 0; width: 100%; height: 100%;">'+'<div style="width: 240px; height: 125px; padding: 35px; border-radius: 10px; background:  url('+_imageUrl+') center 15px no-repeat; position: absolute; left: 50%; top: 50%; margin-top: -65px; margin-left: -125px;">'+'<div id="wrapperLoaderText" style="margin-top: 70px; margin-bottom: 10px; text-align: center; font-family: Ubuntu; color: #FFFFFF; font-size: 15px;">Daten werden überprüft.. 0%</div>'+'<div style="border-radius: 10px; border: 3px solid #FFFFFF; background-color: rgba(0, 0, 0, 0.6); padding: 5px; margin-left: 20px; width: 200px; height: 17px">'+'<div id="wrapperLoaderProgress" style="background-color: #fff; height: 17px; width: 0; border-radius: 5px;">'+'<div style="background-color: #fff; height: 9px; width: 100%; border-radius: 5px;">'+'</div></div></div></div>';jjLoader.interval=window.setInterval(jjLoader.IntervalUpdate,100);jjLoader.isInit=true;return true;},'progressNow':0,'progress':0,'IntervalUpdate':function(){if(!jjLoader.isInit)
{return false;}
if(jjLoader.progressNow>=100)
{return;}
jjLoader.progressNow+=1;var wrapperLoaderProgress=document.getElementById('wrapperLoaderProgress');wrapperLoaderProgress.style.width=jjLoader.progressNow+'%';jjLoader.updateText();return true;},'updateText':function(_text){if(!jjLoader.isInit)
{return false;}
var text='';if(jjLoader.progressNow>0&&jjLoader.progressNow<30)
{text="Verbindung wird gepr&uuml;ft... ";document.getElementById('wrapperLoader').style.backgroundImage="url(/lib/Standard/img/)";}
else if(jjLoader.progressNow>29&&jjLoader.progressNow<67)
{text="Hervorragend! ";document.getElementById('wrapperLoader').style.backgroundImage="url(/lib/Standard/img/)";}
else if(jjLoader.progressNow>66&&jjLoader.progressNow<83)
{text="Panda wird geladen... ";}
else if(jjLoader.progressNow>82&&jjLoader.progressNow<90)
{text="Erfolgreich geladen! ";document.getElementById('wrapperLoader').style.backgroundImage="url(/lib/Standard/img/)";}
else if(jjLoader.progressNow>89&&jjLoader.progressNow<101)
{text="Viel spass! ";}
var wrapperLoaderText=document.getElementById('wrapperLoaderText');if(jjLoader.progressNow==100){jjLoader.finish();$('#responsecontainer').fadeOut('slow').load('../../../habblet/client/counter.php').fadeIn("slow");counter=0;}else{wrapperLoaderText.innerHTML=text+' '+jjLoader.progressNow+'%';}
return true;},'finish':function(){if(jjLoader.progressNow<100)
{return false;}
var wrapperLoader=document.getElementById('wrapperLoader');wrapperLoader.parentNode.removeChild(wrapperLoader);window.clearInterval(jjLoader.interval);return true;}};