$(document).ready(function(){
	$("#pw_username").change(function(){
	var username=$("#pw_username").val();
	  $.ajax({
			type:"post",
			url:"../../../inc/ajax/ajax.forget_username.php",
			data:"username="+username,
				success:function(data){
				var check = data;
				var arr = check.split('#');
				if(arr[0] == 0){
					$("#message_name").addClass('message error vampire');
					$("#message_name").html(arr[1]);
					document.getElementById('pw_username').style.borderColor = "#E06666";
				} else {
					$("#message_name").removeClass('message error vampire');
					$("#message_name").html(arr[1]);
					document.getElementById('pw_username').style.borderColor = "#00CC66";
				}
			}
		 });
	});
	$("#pw_passwort").change(function(){
	var pass=$("#pw_passwort").val();
		if(pass.length < 6){
			$("#message_password").addClass('message error vampire');
			$("#message_password").html('Das Passwort muss mindestens 6 Zeichen lang sein');
			document.getElementById('pw_passwort').style.borderColor = "#E06666";
		} else {
			$("#message_password").removeClass('message error vampire');
			$("#message_password").html('');
			document.getElementById('pw_passwort').style.borderColor = "#00CC66";
		}
	});
	$("#pw_passwort2").change(function(){
	var pass=$("#pw_passwort").val();
	var passw=$("#pw_passwort2").val();
		if(pass != passw){
			$("#message_password").addClass('message error vampire');
			$("#message_password").html('Die Passw&ouml;rter sind nicht gleich');
			document.getElementById('pw_passwort2').style.borderColor = "#E06666";
		} else {
			$("#message_password").removeClass('message error vampire');
			$("#message_password").html('');
			document.getElementById('pw_passwort2').style.borderColor = "#00CC66";
		}
	});
});