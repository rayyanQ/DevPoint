$(document).ready(function(){
	$("#about").on("submit", function(event){
		event.preventDefault();
		var fname=$("input[name=fname]").val();
		var lname=$("input[name=lname]").val();
		var gender=$("input[name=gender]:checked").val();
		var bday=$("input[name=bday]").val();
		var email = $("input[name=email]").val();
		var pass = $("input[name=password]").val();
		var captcha = $("#g-recaptcha-response").val();
		if(!gender){
			gender = "N.M";
		}
		if(pass.length>4){
			if(captcha){
				$.post('ajax/sign_up.php',{fname:fname,lname:lname,gender:gender,bday:bday,email:email,pass:pass,captcha:captcha},function(data){
					if(data != "Success"){
						grecaptcha.reset();
						$('#error').html(data);
					}
					else{
						$('#error').html("<br><br><br>");
						$("#about").html("<h2>An email has been sent to your email address for confirmation.</h2><br><br><br><a href='index.php' id='submit' class='but'>Continue</a>");
					}
				});
			}else{$('#error').html("Please fill the captcha");}
		}else{$('#error').html("Your password must contain atleast 5 characters.");}
	});
});