$(document).ready(function(){
	$(".UserStats").click(function(){
		var userid = $(this).attr('userid');
		$.ajax({
			type:"post",
			url:"../../../inc/ajax/ajax.staffpage_user.php",
			data:"userid="+userid,
				success:function(data){
					$("#userinfobox").removeAttr("style");
					$("#userinfobox").html(data);
			}
		});
	});
});