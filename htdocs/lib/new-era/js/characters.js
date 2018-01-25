
var Selection = "";

var Characters = {

	doSelect: function(id)
	{
		$('#' + Selection).removeClass("selected");
		Selection = id;
		$('#' + id).addClass("selected");

		Characters.showButton();
	},

	showButton: function()
	{
		$('#play-btn').show();
	}
}


