function main() {
	var article = 1;
	var articles = 4;
	var pferd_item;
	var spins = 0;
	var lastItem = -1;
	var changeTimer = false;
	
	this.searchUserByTag = function() {
		if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function() {
			$("#erg").html("<center><img src=\"../public/default/Images/loading.gif\">");
			$.ajax({
				async: true,
				cache: false,
				url: currentUrl() + "ajax/user_search.php",
				type: "POST",
				data: { tag:$("#stag").val()},
				success:function (data) {	
					$("#erg").hide().html(data).fadeIn(200);
				}
			});
            changeTimer = false;
        }, 300);
	}
	
	this.save = function(site) {
		$(".loading").show();
		switch(site) {
			case 1:
				var hide_online = $("#hide_online").val();
				var hide_inroom = $("#hide_inroom").val();
				var block_newfriends = $("#block_newfriends").val();
				$.ajax({
					url: currentUrl() + "ajax/save.php",
					type: "POST",
					data: {site:site, language:$("#language").val(), home_room:$("#home_room").val(), visibility:$("#visibility").val(), hide_inroom:($("#hide_inroom").is(':checked')?'on':'off'), block_newfriends:($("#block_newfriends").is(':checked')?'on':'off'),friend_stream_enabled:($("#friend_stream_enabled").is(':checked')?'on':'off'),accept_trading:($("#accept_trading").is(':checked')?'on':'off')},
					success: function(data) {
						obj = JSON.parse(data);
						var aa = "<div class='alert error'>" + obj.text + "</div>";
						if(obj.saved == "true") {
							var aa = "<div class='alert success'>" + obj.text + "</div>";
						}
						$("#ajax").html(aa);
						$(".loading").hide();
					}
				});
				break;
			case 2: // look
				$.ajax({
					url: currentUrl() + "ajax/save.php",
					type: "POST",
					data: {site:site},
					success: function(data) {
						obj = JSON.parse(data);
						var aa = "<div class='alert error'>" + obj.text + "</div>";
						if(obj.saved == "true") {
							var aa = "<div class='alert success'>" + obj.text + "</div>";
						}
						$("#ajax").html(aa);
						$(".loading").hide();
					}
				});
				break;
			case 3: // badges
				$.ajax({
					url: currentUrl() + "ajax/save.php",
					type: "POST",
					data: {site:site},
					success: function(data) {
						obj = JSON.parse(data);
						var aa = "<div class='alert error'>" + obj.text + "</div>";
						if(obj.saved == "true") {
							var aa = "<div class='alert success'>" + obj.text + "</div>";
						}
						$("#ajax").html(aa);
						$(".loading").hide();
					}
				});
				break;
			case 4: // effects
				$.ajax({
					url: currentUrl() + "ajax/save.php",
					type: "POST",
					data: {site:site},
					success: function(data) {
						obj = JSON.parse(data);
						var aa = "<div class='alert error'>" + obj.text + "</div>";
						if(obj.saved == "true") {
							var aa = "<div class='alert success'>" + obj.text + "</div>";
						}
						$("#ajax").html(aa);
						$(".loading").hide();
					}
				});
				break;
			case 6:
				$.ajax({
					url: currentUrl() + "ajax/save.php",
					type: "POST",
					data: {site:site, profile_visibility:$("#profile_visibility").val(), show_badges:($("#show_badges").is(':checked')?'on':'off'), show_friends:($("#show_friends").is(':checked')?'on':'off'), show_inventar:($("#show_inventar").is(':checked')?'on':'off'), show_email:($("#show_email").is(':checked')?'on':'off'), show_profile_stats:($("#show_profile_stats").is(':checked')?'on':'off'), real_name:$("#real_name").val(),gender:$("#gender").val(),motto:$("#motto").val(),profile_wp:$("#profile_wp").val()},
					success: function(data) {
						obj = JSON.parse(data);
						var aa = "<div class='alert error'>" + obj.text + "</div>";
						if(obj.saved == "true") {
							var aa = "<div class='alert success'>" + obj.text + "</div>";
						}
						$("#ajax").html(aa);
						$(".loading").hide();
					}
				});
				break;
			default:
				var oldpw = $("#oldpw").val();
				var email = $("#email").val();
				var newpw = $("#newpw").val();
				var newpwc = $("#newpwc").val();
				$.ajax({
					url: currentUrl() + "ajax/save.php",
					type: "POST",
					data: {site:site, oldpw:oldpw, email:email, newpw:newpw, newpwc:newpwc,secretcode:$("#secretcode").val()},
					success: function(data) {
						obj = JSON.parse(data);
						var aa = "<div class='alert error'>" + obj.text + "</div>";
						if(obj.saved == "true") {
							$("#oldpw").val("");
							$("#newpw").val("");
							$("#newpwc").val("");
							$("#email").val(obj.email);
							var aa = "<div class='alert success'>" + obj.text + "</div>";
						}
						$("#ajax").html(aa);
						$(".loading").hide();
					}
				});
		}
	}
	
	this.addTag = function() {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/tag.php",
			type: "POST",
			data: { tag:$("#tag").val() },
			success:function (data) {	
				$("#msg").hide().html(data).fadeIn();
			}
		});
	}
	this.removeTag = function(t) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/tag.php",
			type: "POST",
			data: { tag:t, mode:'redeem' },
			success:function (data) {	
				$("#msg").hide().html(data).fadeIn();
			}
		});
	}
	this.commentArticle = function(a) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/comment_article.php",
			type: "POST",
			data: { article:a, comment:$("#comment").val() },
			success:function (data) {	
				$("#msg").hide().html(data).fadeIn();
			}
		});
	}
	this.commentTicket = function(t) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/comment_ticket.php",
			type: "POST",
			data: { ticket:t, comment:$("#comment").val() },
			success:function (data) {	
				$("#msg").hide().html(data).fadeIn();
			}
		});
	}
	this.addBot = function() {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/bot_add.php",
			type: "POST",
			data: { room_id:$("#room_id").val(), name:$("#name").val(), motto:$("#motto").val(), x:$("#x").val(), y:$("#y").val(), z:$("#z").val(), text1:$("#text1").val(), text2:$("#text2").val(), text3:$("#text3").val(), text4:$("#text4").val(), text5:$("#text5").val() },
			success:function (data) {	
				$("#msg").hide().html(data).fadeIn();
			}
		});
	}
	this.giveBadge = function(b) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/buybadge.php",
			type: "POST",
			data: { badge:b, type:$("#type").val(), username:$("#username").val(), price:$("#price").val() },
			success:function (data) {	
				$("#bmsg").hide().html(data).fadeIn();
			}
		});
	}
	this.saveBadge = function(p) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/buybadge.php",
			type: "POST",
			data: { mode:"saveBadge", parent:p, title:$("#stitle").val(), description:$("#sdescription").val() },
			success:function (data) {	
				var obj = jQuery.parseJSON(data);
				$("#bmsg").hide().html('<div class="alert ' + obj.action + '">' + obj.message + '</div>').fadeIn(250);
			}
		});
	}
	this.getBadge = function(i) {
		if(lastItem == i) return;
		
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/buybadge.php",
			type: "POST",
			data: { mode:"getBadge", id:i },
			success:function (data) {	
				var obj = JSON.parse(data);
				$("#stitle").attr("value", obj.title);
				$("#sdescription").attr("value", obj.description);
			}
		});
		$("#infoText").hide();
		$("#eBadge").hide().fadeIn();
		lastItem = i;
	}
	this.redeemBadge = function(u, b) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/buybadge.php",
			type: "POST",
			data: { mode:"redeem", badge:b, username:u },
			success:function (data) {	
				$("#bmsg").hide().html(data).fadeIn();
			}
		});
	}
	this.selectBadge = function(o, b) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/save.php",
			type: "POST",
			data: { mode:'selectBadge', order_id:o, badge_id:b },
			success:function (data) {	
				obj = JSON.parse(data);
				if(obj.saved == "true") {
					$("#badge" + o).html(obj.text);
				}
			}
		});
	}
	this.unselectBadge = function(o, b) {
		$.ajax({
			async: true,
			cache: false,
			url: currentUrl() + "ajax/save.php",
			type: "POST",
			data: { mode:'unselectBadge', order_id:o, badge_id:b },
			success:function (data) {	
				obj = JSON.parse(data);
				if(obj.saved == "true") {
					$("#badge" + o).html(obj.text);
				}
			}
		});
	}
	
	this.RandomArticles = function() {
		for(var i = 1; i < (articles + 1); i++) {
			$(".article_" + i).hide();
			$(".article_link_" + i).removeClass("active");
		}
		$(".article_" + article).fadeIn();
		$(".article_link_" + article).addClass("active");
		article++;
		if(article == 4) { article = 1; }
	}
	
	this.switchArticle = function(a) {
		for(var i = 1; i < (articles + 1); i++) {
			$(".article_" + i).hide();
			$(".article_link_" + i).removeClass("active");
		}
		$(".article_" + a).fadeIn();
		$(".article_link_" + a).addClass("active");
	}
	
	this.buyCredits = function(p) {
		var psc1 = $("#psc1").val();
		var psc2 = $("#psc2").val();
		var psc3 = $("#psc3").val();
		var psc4 = $("#psc4").val();
		$.ajax({
			url: currentUrl() + "ajax/buycredits.php",
			type: "POST",
			data: {price:p, psc1:psc1, psc2:psc2, psc3:psc3, psc4:psc4},
			success: function(data) {
				$(".ajax").hide().html(data).fadeIn(200);
			}
		});
	}
	
	this.buyVip = function(t) {
		$.ajax({
			url: currentUrl() + "ajax/buyvip.php",
			type: "POST",
			data: {vip_type:t},
			success: function(data) {
				$(".ajax").hide().html(data).fadeIn(200);
			}
		});
	}
	this.addSupportTicket = function() {
		$.ajax({
			url: currentUrl() + "ajax/support.php",
			type: "POST",
			data: { mode:'addTicket', category:$("#category").val(), priority:$("#priority").val(), subject:$("#subject").val(), message:$("#message").val()},
			success: function(data) {
				$("#msg").hide().html(data).fadeIn(200);
			}
		});
	}
	this.nominateUser = function(e) {
		$.ajax({
			url: currentUrl() + "ajax/election.php",
			type: "POST",
			data: { mode:'nominate', username:$("#username").val(), election:e},
			success: function(data) {
				$("#msg").hide().html(data).fadeIn(200);
			}
		});
	}
	this.voteUsers = function(e, v) {
		$.ajax({
			url: currentUrl() + "ajax/election.php",
			type: "POST",
			data: { mode:'vote', election:e, votes:v},
			success: function(data) {
				$("#msg").hide().html(data).fadeIn(200);
			}
		});
	}
	
	this.loginBankAcc = function() {
		$.ajax({
			url: currentUrl() + "ajax/bank.php",
			type: "POST",
			data: { mode:'login',bank_id:$("#bank_id").val(),bank_pin:$("#bank_pin").val()},
			success: function(data) {
				$(".ajax").hide().html(data).fadeIn(200);
			}
		});
	}
	this.addBankAcc = function() {
		$.ajax({
			url: currentUrl() + "ajax/bank.php",
			type: "POST",
			data: { mode:'add', pin:$("#pin").val(), pin2:$("#pin2").val(), password:$("#password").val()},
			success: function(data) {
				$(".ajax").hide().html(data).fadeIn(200);
			}
		});
	}
	this.payBank = function() {
		var reload = false;
		$.ajax({
			url: currentUrl() + "ajax/bank.php",
			type: "POST",
			data: { mode:'pay', pay_type:$("#pay_type").val(), credits:$("#credits").val(), pixels:$("#pixels").val(), coins:$("#coins").val(), bank_pin:$("#bank_pin").val()},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				$("#msg").hide().html('<div class="alert ' + obj.action + '">' + obj.message + '</div>').fadeIn(250);
				
				if(obj.action == 'success') {
					this.reload = true;
				}
			}
		});
		if(reload) {
			this.getBankLogs(1, 0, true);
		}
	}
	this.sendBank = function() {
		var reload = false;
		$.ajax({
			url: currentUrl() + "ajax/bank.php",
			type: "POST",
			data: { mode:'send', bank_id:$("#bank_id").val(), credits:$("#credits2").val(), pixels:$("#pixels2").val(), coins:$("#coins2").val(), bank_pin:$("#bank_pin2").val()},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				$("#msg2").hide().html('<div class="alert ' + obj.action + '">' + obj.message + '</div>').fadeIn(250);
				
				if(obj.action == 'success') {
					reload = true;
				}
			}
		});
		if(reload) {
			this.getBankLogs(1, 0, true);
		}
	}
	this.getBankLogs = function(s, o, a) {
		$.ajax({
			url: currentUrl() + "ajax/bank.php",
			type: "POST",
			data: { mode:'logs', site:s, order:o},
			success: function(data) {
				if(a == false) {
					$("#erg").html(data);
				} else {
					$("#erg").hide().html(data).fadeIn(200);
				}
			}
		});
	}
	this.login = function() {
		$(".loadinglogin").show();
		var username = $("#usernamel").val();
		var password = $("#passwordl").val();
		$.ajax({
			url: currentUrl() + "ajax/login.php",
			type: "POST",
			data: {username:username, password:password},
			success: function(data) {
				if(data == "true") {
					window.location = siteUrl() + "account/index";
				} else {
					$(".loadinglogin").hide();
					$(".ajax").html('<div style="font-family:open sans;margin-bottom:-10px;border-radius: 5px; margin-bottom: 10px; padding: 10px; border: 1px solid grey; border-bottom: 2px solid grey; background: rgba(217, 7, 7, .85); border-color: rgba(217, 7, 7, .94); color: #FFFFFF;">' + data + '</div>');
				}
			}
		});
	}
	
	this.buyHorse = function() {
		$("#buyHorse").fadeOut();
		var name = $("#horseName").val();
		var item = pferd_item;
		
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/buyhorse.php",
			type: "POST",
			data: {item:item, name:name},
			success:function (data) {	
				$("#horsemsg").html(data);
				$("#buyHorse").fadeIn();
			}
		});
	}
	
	this.buyCase = function(c) {
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/buycase.php",
			type: "POST",
			data: {item:'case', case_id:c},
			success:function (data) {	
				$("#casemsg" + c).html(data);
			}
		});
	}
	
	this.getGroupMembers = function(g, s) {
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/group.php",
			type: "POST",
			data: {mode:'getMembers', group:g, site:s},
			success:function (data) {	
				var obj = JSON.parse(data);
				
				$("#gmembers").hide().html(obj.members).fadeIn();
				$("#pagination").html(obj.pages);
			}
		});
	}
	
	this.addGroup = function(c) {
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/group.php",
			type: "POST",
			data: {mode:'add', name:$("#name").val(), description:$("#name").val(), joining_state:$("#joining_state").val()},
			success:function (data) {
				var obj = JSON.parse(data);
				
				$("#msg").hide().html("<div class=\"alert "+ obj.action +"\">"  + obj.message + "</div>").fadeIn();
			}
		});
	}
	
	this.staffInfo = function(i) {
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/staffinfo.php",
			type: "POST",
			data: {id:i},
			success:function (data) {	
				$("#staffinfo").html(data);
			}
		});
	}
	
	this.addApplication = function() {
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/application.php",
			type: "POST",
			data: {team_id:$("#team_id").val(), text1:$("#text1").val(), text2:$("#text2").val(), text3:$("#text3").val(), text4:$("#text4").val(), text5:$("#text5").val()},
			success:function (data) {	
				$("#msg").html(data);
			}
		});
	}
	
	this.unbanRequest = function() {
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/unbanrequest.php",
			type: "POST",
			data: {text:$("#requestText").val()},
			success:function (data) {	
				$("#requestmsg").html(data);
			}
		});
	}
	
	this.buyLotto = function() {
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/buylotto.php",
			type: "POST",
			data: {lotto1:$('input[name="lotto1"]').val(),lotto2:$('input[name="lotto2"]').val(),lotto3:$('input[name="lotto3"]').val(),lotto4:$('input[name="lotto4"]').val(),lotto5:$('input[name="lotto5"]').val(),lotto6:$('input[name="lotto6"]').val()},
			success:function (data) {	
				switch(data) {
					case 'ERROR:CREDITS':
						$("#lottomsg").html('<div class="alert error">Du hast nicht genug Taler.</div>');
						break;
					case 'ERROR:NUMBERS':
						$("#lottomsg").html('<div class="alert error">Bitte gib alle sechs Zahlen an.</div>');
						break;
					case 'SUCCESS':
						$("#lottomsg").html('<div class="alert success">Du hast dir einen Lottoschein gekauft.</div>');
						$("#lottoJackpot").html((parseInt($("#lottoJackpot").text()) + 1000));
						$("#lottoTickets").html((parseInt($("#lottoTickets").text()) + 1));
						$("#myTickets").html((parseInt($("#myTickets").text()) + 1));
						break;
				}
			}
		});
	}
							
	this.selectHorse = function(item, name) {
		$("#horseimg").hide();
		$("#horseimg").hide();
		$("#horsename").hide();
		$("#horsename").html(name);
		pferd_item = item;
		
		$.ajax({
			async: false,
			cache: false,
			url: currentUrl() + "ajax/horse.php",
			type: "POST",
			data: {item:item},
			success:function (data) {	
				$('#horseimg').attr('src', currentUrl() + 'Images/horses/' + item + ".png");
				$("#horseprice").html(data);
				$("#horseprice").fadeIn();
				$("#horseimg").fadeIn();
				$("#horsename").fadeIn();
			}
		});
	}
	
	this.register = function(l) {
		var username = $("#username").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var password_confirm = $("#password_confirm").val();
		$.ajax({
			url: currentUrl() + "ajax/register.php",
			type: "POST",
			data: {username:username, email:email, password:password, password_confirm:password_confirm, look:l, cap:$("#cap").val()},
			success: function(data) {
				obj = JSON.parse(data);
				
				$("#regmsg").hide().html("<div class=\"alert "+ obj.action +"\">"  + obj.message + "</div>").fadeIn();
				
				if(obj.action == "success") {
					$("#usernamel").val(username);
					$("#passwordl").val(password);
					new main().login();
				}
			}
		});
	}
}

var mainObj = new main();