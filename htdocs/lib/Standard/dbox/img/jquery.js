$(document).ready(function() {
	$("#closeError").click(function() {
		$(".error").fadeOut("fast");
	});
});

/*function showInfo(id){
	var id = id;
	if(parseInt(id)) {
		var info = $("#info");
        if(info.css('display') == 'none'){
		  info.css('display', 'block');
        }
		info.load('web/ajax/community/info.php?id='+id);
	}
}

function closeInfo(){
    var info = $("#info");
    if(info.css('display') == 'block'){
        info.css('display', 'none');
    }   
}

function addVoting(choice, user, article){ 
    var choice = choice;
    var user = user;
    var article = article;
    
    $.ajax({
        type: "POST",
        url: "web/ajax/news/voting.php",
        data: "choice="+choice+"&user="+user+"&article="+article,
        success: function(){
            $("#voting").html("<center><img src='web/img/progress_habbos.gif'></center>").load("web/ajax/news/getvoting.php?article="+article+"&user="+user);
        }
    });
}*/

$(document).ready(function() {
    $("#sidepanel").click(function() {
        $("#sdpl_box").show("slide",{direction: "right"},500);
        $("#sdpl_menu").show(500);
        $("#sdpl_ico").fadeOut("fast");
        $("#sdpl_user").addClass("active");
        $(".sidepanel #user_search").fadeIn("fast");
    });
    
    $("#sidepanel_c").click(function() {
        $("#sdpl_box").hide("slide",{direction: "right"},500);
        $("#sdpl_ico").fadeIn(1300);
        $("#sdpl_menu").fadeOut("fast");
        $(".sidepanel #notifications").fadeOut("fast");
        $("#sdpl_ntfc").removeClass("active");
    });
});

$(document).ready(function() {
    $("#sdpl_user").click(function() {
        $("#sdpl_user").addClass("active");
        $("#sdpl_ntfc").removeClass("active");
        $(".sidepanel #user_search").fadeIn("fast");
        $(".sidepanel #notifications").fadeOut("fast");
        
    });
    $("#sdpl_ntfc").click(function() {
        $("#sdpl_user").removeClass("active");
        $("#sdpl_ntfc").addClass("active");
        $(".sidepanel #notifications").fadeIn("fast");
        $(".sidepanel #user_search").fadeOut("fast");
    });
});

$(document).ready(function() {
    $("#usercircle").mouseenter(function() {
        $("#usercbox").fadeIn(300);
        $("#userhover").fadeIn(300);
        $("#userhover").css("background-color", "rgba(0,0,0,0.5)");
    });
    $("#usercircle").mouseleave(function() {
        $("#usercbox").fadeOut(300);
        $("#userhover").fadeOut(300);
        $("#userhover").css("background-color", "none");
    });
});

function feathover(that){
    $(that).find(".feathvr").fadeIn(300);
    
    $(that).mouseleave(function() {
        $(that).find(".feathvr").fadeOut(300);
    });
}

function staffhover(that){
    $(that).find("#staffhvr").fadeIn(300);
    
    $(that).mouseleave(function() {
        $(that).find("#staffhvr").fadeOut(300);
    });
}

/* ############################################################################################ */

$(document).ready(function() {
    $("#srt1b").click(function() {
		$("#reg1").hide("fast");
        $("#reg2").fadeIn("slow");
        $("#srt1").css("color", "#27ae60");
        $("#srt1").removeClass("fa fa-circle-o").addClass("fa fa-check-circle-o");
        $("#regtitle").html('Schritt 2: <font color="#B43838">E-Mail</font> eintragen');
	});
    
    $("#srt2b").click(function() {
		$("#reg2").hide("fast");
        $("#reg3").fadeIn("slow");
        $("#srt2").css("color", "#27ae60");
        $("#srt2").removeClass("fa fa-circle-o").addClass("fa fa-check-circle-o");
        $("#regtitle").html('Schritt 3: <font color="#B43838">Geschlecht</font> angeben');
	});
    
    $("#srt3b").click(function() {
		$("#reg3").hide("fast");
        $("#reg4").fadeIn("slow");
        $("#srt3").css("color", "#27ae60");
        $("#srt3").removeClass("fa fa-circle-o").addClass("fa fa-check-circle-o");
        $("#regtitle").html('Schritt 4: <font color="#B43838">Passwort</font> angeben');
	});
});

$(document).ready(function() {
	$("#logout").click(function() {
		$(".alertbg").fadeIn("fast");
	});
	$("#close").click(function() {
		$(".alertbg").fadeOut("fast");
	});
});

$(document).ready(function() {
	$("#news1").mouseenter(function() {
		$("#news2").css("width", "267px");
		$("#news2 .transparent").css("width", "227px");
		$("#news3").css("width", "267px");
		$("#news3 .transparent").css("width", "227px");
		$("#news1").css("width", "375px");
		$("#news1 .transparent").css("width", "335px");
        
        $(this).find(".transparent").show(500);
        $(this).find(".newstitle").hide(300);
	});
    $("#news1").mouseleave(function() {
        $("#news2").css("width", "375px");
		$("#news2 .transparent").css("width", "335px");
		$("#news3").css("width", "267px");
		$("#news3 .transparent").css("width", "227px");
		$("#news1").css("width", "267px");
		$("#news1 .transparent").css("width", "227px");
        
        $(this).find(".transparent").hide(300);
        $(this).find(".newstitle").show(500);
    });
});

$(document).ready(function() {
	$("#news2").mouseenter(function() {
		$("#news1").css("width", "267px");
		$("#news1 .transparent").css("width", "227px");
		$("#news3").css("width", "267px");
		$("#news3 .transparent").css("width", "227px");
		$("#news2").css("width", "375px");
		$("#news2 .transparent").css("width", "335px");
        
        $(this).find(".transparent").show(500);
        $(this).find(".newstitle").hide(300);
	});
    $("#news2").mouseleave(function() {
        $("#news2").css("width", "375px");
		$("#news2 .transparent").css("width", "335px");
		$("#news3").css("width", "267px");
		$("#news3 .transparent").css("width", "227px");
		$("#news1").css("width", "267px");
		$("#news1 .transparent").css("width", "227px");
        
        $(this).find(".transparent").hide(300);
        $(this).find(".newstitle").show(500);
    });
});

$(document).ready(function() {
	$("#news3").mouseenter(function() {
		$("#news2").css("width", "267px");
		$("#news2 .transparent").css("width", "227px");
		$("#news1").css("width", "267px");
		$("#news1 .transparent").css("width", "227px");
		$("#news3").css("width", "375px");
		$("#news3 .transparent").css("width", "335px");
        
        $(this).find(".transparent").show(500);
        $(this).find(".newstitle").hide(300);
	});
    $("#news3").mouseleave(function() {
        $("#news2").css("width", "375px");
		$("#news2 .transparent").css("width", "335px");
		$("#news3").css("width", "267px");
		$("#news3 .transparent").css("width", "227px");
		$("#news1").css("width", "267px");
		$("#news1 .transparent").css("width", "227px");
        
        $(this).find(".transparent").hide(300);
        $(this).find(".newstitle").show(500);
    });
});
