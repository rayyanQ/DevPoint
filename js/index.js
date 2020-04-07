$(document).ready(function(){
	$(".cat").on("click",function(event){
		$('html, body').stop().animate({scrollTop:$($(this).attr('href')).offset().top-60},2000);event.preventDefault();
	});
	$("#log_in").on("click", function(){//works even after logged in(need to change that)
		$(".glass").fadeIn();
		$("#login_box").fadeIn();
	});
	$(".glass").on("click", function(){
		$(this).fadeOut();
		$("#login_box").fadeOut();
	});
	$("#login").on("submit", function(event){
		event.preventDefault();
		var email = $("input[name=email]").val();
		var password = $("input[name=password]").val();
		$.post('ajax/index.php',{email:email,password:password},function(data){
			if(data == "The email (or/and) password is incorrect."){
				$("#error").html(data);
			}
			else
			{
				$('#log_in').html(data);
				$(".glass").fadeOut();
				$("#login_box").fadeOut();
			}
		});
	});
});