var jjLoader={'maxStep':0,'currentStep':1,'isInit':false,'interval':null,'init':function(_wrapperId,_maxStep,_imageUrl,_backgroundUrl){jjLoader.maxStep=_maxStep;var wrapper=document.getElementById(_wrapperId);wrapper.innerHTML+='<div id="wrapperLoader" style="background: #0E151C url('+_backgroundUrl+') center no-repeat; position: absolute; z-index: 9999999; top: 0; left: 0; width: 100%; height: 100%;">'+'<div style="width: 485px; height: 395px; padding: 5px; border-radius: 10px; background: rgb(14, 21, 28) url('+_imageUrl+') center 15px no-repeat; position: absolute; left: 50%; top: 50%; margin-top: -285px; margin-left: -13%;">'+'<div id="wrapperLoaderText" style="margin-left: -10%;margin-top: 400px; margin-bottom: 15px; text-align: center; font-family: Ubuntu; color: #FFFFFF; font-size: 27px;">Habbo wird aktualisiert</div>'+'<div style="border-radius: 2px; border: 1px solid #FFFFFF; background-color: rgba(0, 0, 0, 0.6); padding: 3px; margin-left: 5%; width: 370px; height: 19px">'+'<div id="wrapperLoaderProgress" style="background-color: #8CA1AD; height: 19px; width: 0;">'+'<div style="background-color: #BACAD3; height: 9px; width: 100%;">'+'</div></div></div></div>';jjLoader.interval=window.setInterval(jjLoader.IntervalUpdate,100);jjLoader.isInit=true;return true;},'progressNow':0,'progress':0,'IntervalUpdate':function(){if(!jjLoader.isInit)
{return false;}
if(jjLoader.progressNow>=100)
{return;}
jjLoader.progressNow+=1;var wrapperLoaderProgress=document.getElementById('wrapperLoaderProgress');wrapperLoaderProgress.style.width=jjLoader.progressNow+'%';jjLoader.updateText();return true;},'updateText':function(_text){if(!jjLoader.isInit)
{return false;}
var text='';if(jjLoader.progressNow>0&&jjLoader.progressNow<30)
{text="Umgebung wird generiert.  ";document.getElementById('wrapperLoader').style.backgroundImage="url(/lib/Standard/img/black.png)";}
else if(jjLoader.progressNow>29&&jjLoader.progressNow<67)
{text="Outfits werden geladen.  ";document.getElementById('wrapperLoader').style.backgroundImage="url(/lib/Standard/img/black.png)";}
else if(jjLoader.progressNow>66&&jjLoader.progressNow<83)
{text="Haustiere werden geweckt.  ";}
else if(jjLoader.progressNow>82&&jjLoader.progressNow<90)
{text="Sprechblasen werden geladen.	  ";document.getElementById('wrapperLoader').style.backgroundImage="url(/lib/Standard/img/black.png)";}
else if(jjLoader.progressNow>89&&jjLoader.progressNow<101)
{text="Willkommen im Pixeluniversum!	  ";}
var wrapperLoaderText=document.getElementById('wrapperLoaderText');if(jjLoader.progressNow==100){jjLoader.finish();$('#responsecontainer').fadeOut('slow').load('../../../habblet/client/counter.php').fadeIn("slow");counter=0;}else{wrapperLoaderText.innerHTML=text+'';}
return true;},'finish':function(){if(jjLoader.progressNow<100)
{return false;}
var wrapperLoader=document.getElementById('wrapperLoader');wrapperLoader.parentNode.removeChild(wrapperLoader);window.clearInterval(jjLoader.interval);return true;}};