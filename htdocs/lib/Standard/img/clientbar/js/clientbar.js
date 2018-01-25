function Naviaction() {
    $("#navi").fadeIn("slow", function() {});
    document.getElementById("tabbb").setAttribute("onClick", "Naviactiontwo()");
}

function Naviactiontwo() {
    $("#navi").fadeOut("slow", function() {});
    document.getElementById("tabbb").setAttribute("onClick", "Naviaction()");
}
document.getElementById("player").volume = 0.1;

function radiobuttons(button) {
    var button = button;


    switch (button) {
        case 'play':
            document.getElementById('player').play();
            $(".play").hide();
            $(".pause").show();
            break;

        case 'pause':
            document.getElementById('player').pause();
            $(".pause").hide();
            $(".play").show();
            break;

        case 'leiser':
            document.getElementById('player').volume -= 0.1;
            break;

        case 'lauter':
            document.getElementById('player').volume += 0.1;
            break;

        case 'mute':
            document.getElementById('player').volume = 0;
            $(".mute").hide();
            $(".unmute").show();
            break;

        case 'unmute':
            document.getElementById('player').volume = 0.5;
            $(".unmute").hide();
            $(".mute").show();
            break;

    }
}