var jjLoader={'maxStep':0,'currentStep':1,'isInit':true,'interval':null,'init':function(_wrapperId,_maxStep,_imageUrl,_backgroundUrl){jjLoader.maxStep=_maxStep;var wrapper=document.getElementById(_wrapperId);wrapper.innerHTML+='<div id="wrapperLoader" style="background: #014F66 url('+_backgroundUrl+') center no-repeat; position: absolute; z-index: 9999999; top: 0px; left: 0px; width: 100%; height: 100%;background: url("http://Habbo.gy/lib/standard/img/bg.png") 50% 50% no-repeat #565656;position: absolute; z-index: 9999999; top: 0; left: 0; width: 100%; height: 100%;">'+'<div style="width: 500px;height: 440px;padding: 5px;border-radius: 10px;background: rgba(0, 118, 169, 0) url(http://Habbo.gy/public/images/loader_bild.png) no-repeat;position: absolute;left: 50%;top: 50%;margin-top: -285px;margin-left: -13%; ">'+'<div id="wrapperLoaderText" style="margin-left: -55px;margin-top: 380px; margin-bottom: 15px; text-align: center; font-family: Ubuntu; color: #FFFFFF;font-weight: bold;font-size: 27px;">Daten werden &uuml;berpr&uuml;ft..</div>'+'<div style="border-radius: 4px 4px 4px 4px; border: 2px solid #FFFFFF; background-color: rgba(0, 0, 0, 0.6); padding: 2px; margin-left: 3.5%; width: 370px; height: 20px">'+'<div id="wrapperLoaderProgress" style="background-color: #fff; height: 20px; width: 0;border-radius:4px 4px 4px 4px">'+'<div style="background-color: #fff; height: 5px; width: 0%;">'+'</div></div></div></div>';jjLoader.interval=window.setInterval(jjLoader.IntervalUpdate,100);jjLoader.isInit=true;return true;},'progressNow':0,'progress':0,'IntervalUpdate':function(){if(!jjLoader.isInit)
{return false;}
if(jjLoader.progressNow>=100)
{return;}
jjLoader.progressNow+=1;var wrapperLoaderProgress=document.getElementById('wrapperLoaderProgress');wrapperLoaderProgress.style.width=jjLoader.progressNow+'%';jjLoader.updateText();return true;},'updateText':function(_text){if(!jjLoader.isInit)
{return false;}
var text='';if(jjLoader.progressNow>0&&jjLoader.progressNow<30)
{text="Hotel wird Geladen";document.getElementById('wrapperLoader').style.backgroundImage="url(http://Habbo.gy/public/images/loader_bild.png)";}
else if(jjLoader.progressNow>29&&jjLoader.progressNow<67)
{text="HabboGY Unsere Welt";document.getElementById('wrapperLoader').style.backgroundImage="url(http://Habbo.gy/public/images/loader_bild.png)";}
else if(jjLoader.progressNow>66&&jjLoader.progressNow<83)
{text="HabboGY";}
else if(jjLoader.progressNow>82&&jjLoader.progressNow<90)
{text="Juhuuu!! ";document.getElementById('wrapperLoader').style.backgroundImage="url(http://Habbo.gy/public/images/loader_bild.png)";}
else if(jjLoader.progressNow>89&&jjLoader.progressNow<101)
{text="Juhuu!!   ";}
var wrapperLoaderText=document.getElementById('wrapperLoaderText');if(jjLoader.progressNow==100){jjLoader.finish();$('#responsecontainer').fadeOut('slow').load('../../../habblet/client/counter.php').fadeIn("slow");counter=0;}else{wrapperLoaderText.innerHTML=text+' '+jjLoader.progressNow+'%';}
return true;},'finish':function(){if(jjLoader.progressNow<100)
{return false;}
var wrapperLoader=document.getElementById('wrapperLoader');wrapperLoader.parentNode.removeChild(wrapperLoader);window.clearInterval(jjLoader.interval);return true;}};