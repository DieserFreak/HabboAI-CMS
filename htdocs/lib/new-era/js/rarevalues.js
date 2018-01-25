var CurrentCategory = "no_category";

var RareValues = {

    Init: function () {
        $.each(Categories, function (i, category) {

            var id = category["id"];
            var name = category["name"];

            $('#rarevalues-list')
                .append("<span class='ca' id='cat-" + id + "' onclick='RareValues.OpenCategory(this.id)'><i class='caret right'></i>" + name + "</span>");
        });

        $.each(InnerCategories, function (i, category) {

            var id = category["id"];
            var name = category["name"];
            var parent = category["parent"];

            $("#cat-" + parent).after("<span id='incat-" + id + "' onclick='RareValues.FetchItems(this.id)' class='in cat-" + parent + "'>" + name + "</span>");

        });
    },

    FetchItems: function (id) {
    	$('#item-preview center').html("");
        $('#item-name').html("Select an Item");
        $('#item-description').html("To view its details.");

    	$('#category-items span').each(function(i, obj) {
    		$(obj).remove();
		});

        var data = {
            "items_by_id": id
        }

        $.ajax({
            dataType: "json",
            url: "ajax/getItems.php",
            data: data,
            success: function (Items) {
                $.each(Items, function (i, item) {

                    var id = item["id"];
                    var parent = item["parent"];
                    var small_image = item["small_image"];

                    $('#category-items')
                        .append("<span id='item-" + id + "' onclick='RareValues.GetItemDetails(this.id)'><img class='category-item' src='" + small_image + "'></span>");
                });
            }
        });
    },

    OpenCategory: function (id) {
    	$('#item-preview center').html("");
    	$('.ca').removeClass("active");
    	$('#' + id).addClass("active");
    	$('#category-items span').each(function(i, obj) {
    		$(obj).remove();
		});

        RareValues.CloseCategory(CurrentCategory);
        CurrentCategory = id;
        RareValues.OpenCaret(id);

        $('#item-name').html("Choose a Subcategory");
        $('#item-description').html("To view all available items.");
        $('.' + id).each(function (i, obj) {
            $(obj).css("display", "block");
        });
    },

    GetItemDetails: function (id)
    {
        var data = {
            "item_id": id
        }

 		$.ajax({
            dataType: "json",
            url: "ajax/getItemDetails.php",
            data: data,
            success: function (Item) {
            	var big_image = Item["big_image"];
                $('#item-name').html(Item["name"]);
                $('#item-description').html(Item["desc"]);
                $('#item-preview center').html("<img src='" + big_image + "'>");
            }
        });    	
    },

    SearchItem: function (name)
    {
 
        var data = {
        	"item_name": name
        }
		$.ajax({
            dataType: "json",
            url: "ajax/searchItem.php",
            data: data,
            success: function (Item) {
            	if(Item == "")
            	{
            		RareValues.ShowError("We couldn't find that item. Please try again.");
            	} else {

            	var big_image = Item["big_image"];
                $('#item-name').html(Item["name"]);
                $('#item-description').html(Item["desc"]);
                $('#item-preview center').html("<img src='" + big_image + "'>");
            	}
            }
        });  	
    },

    CloseCategory: function (id) {
        if (id != "no_category") {
            RareValues.CloseCaret(id);
        }

        $('.' + id).each(function (i, obj) {
            $(obj).css("display", "none");
        });
    },

    ShowError: function (text)
    {
		$('#message-space').html('<div class="message error">' + text + '</div>');
    },

    OpenCaret: function (id) {
        $('#' + id + ' .caret').removeClass("right").addClass("down");
    },

    CloseCaret: function (id) {
        $('#' + id + ' .caret').removeClass("down").addClass("right");
    }
}

RareValues.Init();

$('#search-item').keypress(function (e) {
  if (e.which == 13) {
    RareValues.SearchItem(document.getElementById('search-item').value);
  }
});