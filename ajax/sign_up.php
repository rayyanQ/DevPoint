<?php
mysql_connect("mysql.serversfree.com","u357079875_dev","ahmed2000") or die(mysql_error());
mysql_select_db("u357079875_dev");
if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["gender"]) && isset($_POST["bday"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["captcha"])){
	$first_name = $_POST["fname"];
	$last_name = $_POST["lname"];
	$gender = $_POST["gender"];
	$bday = $_POST["bday"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$captcha = $_POST["captcha"];
	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGFR4TAAAAAGYcxXuyAQ6o9jWiZoT0damkExmN&response=". $captcha);
	$verify = json_decode($response);
		$emailCheck = mysql_query("SELECT email FROM users WHERE email='$email'");
		$emailCount = mysql_num_rows($emailCheck);
		if($emailCount == 0){
			$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.";
			$salt = substr(str_shuffle($char), 0, 15);
			$password = md5(md5(sha1($salt . $pass)));
			$date = date("Y-m-d");
			if($verify->success){//reload when the user makes an error
				$registering = mysql_query("INSERT INTO users VALUES ('', '', '$first_name', '$last_name', '$email', '$gender', '$bday', '$password', '$salt', '0', '', '$date', '0')");
				echo "Success";
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.";
			    $act = substr(str_shuffle($char), 0, 25);
				$message = "
				Hi ".$first_name."!
				Welcome to Devzone.
				Click on the link below to confirm your email address.
				http://www.devpoint.tk/activate.php?uid=$act
				Or paste this url in the search bar.

				Happy developing :)
				";
				$headers = "From:rayyanmaster@gmail.com";
				mail($email, "Devzone|confirmation link", $message, $headers);//not working
				session_start();
				$_SESSION["username"] = $first_name;
			}
		}
		else{
			echo "An account is already registered with this email.";
		}
}
?>