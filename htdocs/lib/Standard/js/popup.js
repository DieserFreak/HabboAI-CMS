
var Popup = {
	Start: function(){
		$('#popup').fadeIn();
		setTimeout(function(){
		$('#popup').fadeOut();
		}, 2000);
	}
}

$('.btn.payment').click(function(){
	Popup.Start();

	// For testing purposes
    var R = Math.random();

	if(R > 0.5)
	{
		PopupPage.OpenError();
	} 
	else 
	{
		PopupPage.OpenSuccess();		
	}
});