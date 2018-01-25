$(document).ready(function(){updateusers();});function updateusers()
{setInterval(function(){$("user").load("https://holohotel.ws/public/loader/users.php",function(done){var done=done;if(done=='1')
{$("desc").html('Holo online');}else{$("desc").html('Holos online');}});},60000);}
function LogoutMe()
{swal({title:"Bist Du dir sicher?",text:"Sobald du dich ausloggst, wirst du automatisch aus dem Client abgemeldet und musst dich auf der Startseite neu anmelden!",type:"warning",showCancelButton:true,confirmButtonClass:"btn-danger",confirmButtonText:"Ausloggen!",cancelButtonText:"Nein, angemeldet bleiben",closeOnConfirm:false,closeOnCancel:false},function(isConfirm){if(isConfirm){swal("Anfrage abgeschickt!","Deine Anfrage für den Usernamewechsel wurde erfolgreich abgeschickt!","success");window.location="https://holohotel.ws/logout/0144712dd81be0c3d9724f5e56ce6685";}else{swal("Abgebrochen!","Du wurdest nicht ausgeloggt.","error");}});}
function goLink(link,newtab)
{var link=link;var newtab=newtab;if(newtab=='blank')
{window.open(link);}else{if(event.ctrlKey){window.open(link);}else{window.location=link;}}}
function popup(width,height,url)
{var width=width;var height=height;var url=url;$("body").append('<div id="popup"></div>');$("#popup").append('<div id="makeblack"></div>');$("#popup").append('<div id="alert" style="width: '+ width+'px;height: '+ height+'px;"></div>');$("#popup #alert").load(url);}
function HabboBlocked()
{$("#column.footer .big").load("https://holohotel.ws/public/loader/HabboAvatarAPIBlocked.php");}