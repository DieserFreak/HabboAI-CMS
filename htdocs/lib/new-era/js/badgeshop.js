$(document).ready(function(){
	$(".badge-item").click(function(){
		var badgeid = $(this).attr('badgeid');
		$.ajax({
			type:"post",
			url:"../../../inc/ajax/ajax.badgeshop.php",
			data:"badgeid="+badgeid,
				success:function(data){
					$("#error").removeAttr("style");
					$("#error").html(data);
			}
		});
	});
});