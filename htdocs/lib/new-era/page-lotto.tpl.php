<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_community ->

<script>
(function($){
    $.fn.extend({
        numAnim: function(options) {
            if ( ! this.length)
                return false;
            
            this.defaults = {
                endAt: 2560,
                numClass: 'autogen-num',
                duration: 5,   // seconds
                interval: 90  // ms
            };
            var settings = $.extend({}, this.defaults, options);

            var $num = $('<span/>', {
                'class': settings.numClass 
            });

            return this.each(function() {
                var $this = $(this);

                // Wrap each number in a tag.
                var frag = document.createDocumentFragment(),
                    numLen = settings.endAt.toString().length;
                for (x = 0; x < numLen; x++) {
                    var rand_num = Math.floor( Math.random() * 10 );
                    frag.appendChild( $num.clone().text(rand_num)[0] )
                }
                $this.empty().append(frag);

                var get_next_num = function(num) {
                    ++num;
                    if (num > 9) return 0;
                    return num;
                };

                // Iterate each number.
                $this.find('.' + settings.numClass).each(function() {
                    var $num = $(this),
                        num = parseInt( $num.text() );

                    var interval = setInterval( function() {
                        num = get_next_num(num);
                        $num.text(num);
                    }, settings.interval);

                    setTimeout( function() {
                        clearInterval(interval);
                    }, settings.duration * 1000 - settings.interval);
                });
                
                setTimeout( function() {
                    $this.text( settings.endAt.toString() );
                }, settings.duration * 1000);
            });
        }
    });
})(jQuery);


$("#number").numAnim({
    endAt: 97855,
    duration: 3
});
</script>
<br>
<div id="content">
	<div id="right-column" class="badgeshop">
		<div class="box">
			<h1 class="lightblue">Wie funktioniert das?</h1>
			<p>
				Du kannst hier einem neuen Raummodel auswählen und als Raum erstellen! Du wirst dann direkt in deinem neuen Raum teleportierst, falls du im Client online bist.
				<br /><br /><b>Hinweis:</b><br />Pro Model kannst du nur bis zu 10 Räume erstellen.
			</p>
		</div>
	</div>
	<div id="left-column" class="badgeshop">
		<div class="box">
			<div class="credits-teaser" style="position:relative;">
				<img style="position:absolute;margin-left:-100px;" src="{themeurl}img/rooms/rooms.gif">
				<h1>Habbo Lotto</h1>
				<p>
					Nimm Lotto teil und gewinne die sagenhafte Jackpot. Jetzt oder nie!
				</p>
			</div>
		</div>
		<div class="box">
			<h1>Lotto teilnehmen</h1>
			<!- IF ERROR == 1 -><div class="message error vampire">Du musst im Client online sein!</div><br />
			<!- ELSEIF ERROR == 2 -><div class="message error vampire">Du hast dieses Modell leider schon 10 R&auml;ume erstellt.</div><br />
			<!- ELSEIF ERROR == 3 -><div class="message error vampire">Um einen Raum erstellen zu k&ouml;nnen, musst du einen Raumnamen eingeben (mindestens 3 Zeichen).</div><br />
			<!- ELSEIF ERROR == 4 -><div class="message error vampire">Der Raumnamen ist ung&uuml;ltig.</div><br />
			<!- ELSEIF ERROR == 5 -><div class="message error vampire">Dieses Raummodell existiert nicht.</div><br />
			<!- ELSEIF ERROR == 6 -><div class="message success">Der Raum wurde erstellt und du wirst direkt teleportierst!</div><br />
			<!- ENDIF ->
			<form method="post">
				
				<span id="number"></span>
			xxx
			<input name="model" id="model" type="hidden" style="margin-left:1px; padding-left:4px;" value="1">
			<input type="submit" class="btns red" name="submit" value="Zahlen absenden &raquo;" style="width:98%;">
			</form>
		</div>
	</div>
</div>

<!- INCLUDE new-era/footer ->