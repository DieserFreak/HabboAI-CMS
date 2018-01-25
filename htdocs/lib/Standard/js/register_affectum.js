$(document).ready(function(){
	$("#registration_name").change(function(){
	var username=$("#registration_name").val();
	  $.ajax({
			type:"post",
			url:"../../../inc/ajax/ajax.register_username.php",
			data:"username="+username,
				success:function(data){
				var check = data;
				var arr = check.split('#');
				if(arr[0] == 0){
					$("#message_name").addClass('message error');
					$("#message_name").html(arr[1]);
					document.getElementById('registration_name').style.borderColor = "#E06666";
				} else {
					$("#message_name").removeClass('message error');
					$("#message_name").html(arr[1]);
					document.getElementById('registration_name').style.borderColor = "#00CC66";
				}
			}
		 });
	});
	$("#registration_mail").change(function(){
	var email=$("#registration_mail").val();
	  $.ajax({
			type:"post",
			url:"../../../inc/ajax/ajax.register_email.php",
			data:"email="+email,
				success:function(data){
				var check = data;
				var arr = check.split('#');
				if(arr[0] == 0){
					$("#message_email").addClass('message error');
					$("#message_email").html(arr[1]);
					document.getElementById('registration_mail').style.borderColor = "#E06666";
				} else {
					$("#message_email").removeClass('message error');
					$("#message_email").html(arr[1]);
					document.getElementById('registration_mail').style.borderColor = "#00CC66";
				}
			}
		 });
	});
	$("#registration_pass").change(function(){
	var pass=$("#registration_pass").val();
		if(pass.length < 6){
			$("#message_password").addClass('message error ');
			$("#message_password").html('Das Passwort muss mindestens 6 Zeichen lang sein');
			document.getElementById('registration_pass').style.borderColor = "#E06666";
		} else {
			$("#message_password").removeClass('message error ');
			$("#message_password").html('');
			document.getElementById('registration_pass').style.borderColor = "#00CC66";
		}
	});
	$("#registration_passw").change(function(){
	var pass=$("#registration_pass").val();
	var passw=$("#registration_passw").val();
		if(pass != passw){
			$("#message_password").addClass('message error ');
			$("#message_password").html('Die Passw&ouml;rter sind nicht gleich');
			document.getElementById('registration_passw').style.borderColor = "#E06666";
		} else {
			$("#message_password").removeClass('message error ');
			$("#message_password").html('');
			document.getElementById('registration_passw').style.borderColor = "#00CC66";
		}
	});
	$("#registration_gender").change(function(){
	var gender=$("#registration_gender").val();
		if(gender.length < 1){
			$("#message_gender").addClass('message error ');
			$("#message_gender").html('Du hast kein richtiges Geschlecht ausgewählt');
			document.getElementById('registration_gender').style.borderColor = "#E06666";
		} else {
			$("#message_gender").removeClass('message error ');
			$("#message_gender").html('');
			document.getElementById('registration_gender').style.borderColor = "#00CC66";
		}
	});
});

$(document).ready(function(){
 $('#inshotelbtn').click(function(){
 $('.se-pre-con').css({'display': 'block', 'background': 'url(../img/bg.png) center center', 'background-size': 'cover', 'opacity': '0'});
  $('.se-pre-con').animate({'opacity': '1'}, 2500);
  
  $('body').animate({'margin-top':'-100%'}, 2500, function(){
    window.location.href = '#';
  });
 });

});
function validEmail(email) {

  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";

  var regex = new RegExp(strReg);

  return(regex.test(email));

}
$(document).ready(function(){
$("#nextbtn").click(function(){
	if (document.forms[0].registration_name.value==""){
		 $(".errorname").slideToggle();
  return(false);
	};
	if (!validEmail(document.forms[0].registration_mail.value)){
		 $(".errormail").slideToggle();
  return(false);
	};
		if (document.forms[0].registration_pass.value==""){
		$(".errorpw").slideToggle();		 
  return(false);
	};
	if (document.forms[0].registration_pass.value.length<5){
		 $(".errorpw1").slideToggle();
  return(false);
	};
	if (document.forms[0].registration_pass.value!=document.forms[0].registration_passw.value){
		 $(".errorpw2").slideToggle();
  return(false);
	};
	
$(".regi1").slideToggle();
$(".regi2").slideToggle();
});
});

$(document).ready(function(){
$(".next").click(function(){
	if (document.forms[0].registration_gender.value==""){
		  $(".errorgender").slideToggle();
  return(false);
	};
	if (document.forms[0].registrationBean_day.value==""){
		  $(".errorday").slideToggle();
  return(false);
	};
	if (document.forms[0].registrationBean_month.value==""){
		  $(".errormonth").slideToggle();
  return(false);
	};
	if (document.forms[0].registrationBean_year.value==""){
		  $(".erroryear").slideToggle();
  return(false);
	};
	
$(".regi2").slideToggle();
$(".regi3").slideToggle();
});
});

