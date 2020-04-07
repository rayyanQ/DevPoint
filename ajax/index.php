<?php
mysql_connect("mysql.serversfree.com","u357079875_dev","ahmed2000") or die(mysql_error());
mysql_select_db("u357079875_dev");
session_start();
if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$getting_salt = mysql_query("SELECT salt FROM users WHERE email='$email' AND deleted='0' LIMIT 1");
	$salting = mysql_fetch_assoc($getting_salt);
	$salt = $salting["salt"];
	$password = md5(md5(sha1($salt . $pass)));
	$userexist = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password' AND deleted='0' LIMIT 1");
	$userCount = mysql_num_rows($userexist);
	if ($userCount == 1) {
		while($row = mysql_fetch_array($userexist)){ 
			$id = $row["id"];
			$username = $row["username"];
			$first_name = $row["first_name"];
		}
		if($username == ""){
			$_SESSION["id"] = $id;
			$_SESSION["username"] = $first_name;
		}
		else
		{
			$_SESSION["id"] = $id;
			$_SESSION["username"] = $username;
		}
		echo $_SESSION["username"];
	}
	else
	{
		echo 'The email (or/and) password is incorrect.';
	}
}