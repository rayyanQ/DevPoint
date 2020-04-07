<!doctype html>
<html>
	<head>
		<title>Store</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</head>
	<body>
		<header>
			<a href="home.html" id="logo">Dev Point</a>	
			<?php
			session_start();
			$user = $_SESSION["username"];
			if (!isset($_SESSION["username"])) {
				echo '<span class="sub_txt" id="log_in">Log In</span>';
			}
			else
			{
				echo '<span class="sub_txt" id="username">'.$user.'</span>';
			}
			?>
		</header>
		<div class="glass"></div>
		<center id="login_box">
			<span>Log In</span><br>
			<p id="error"> &nbsp;</p>
			<form method="post" id="login">
				<input class="txt" name="email" type="email" placeholder="Email *" required="required"><br>
				<input class="txt" name="password" type="password" placeholder="Password *" required="required"><br>
				<input class="but" type="submit" value="Submit"><br>
				<a class="links" href="sign_up.html">Sign Up</a>
				<a class="links" href="forgot_pass.php">Forgot Password</a>
				<hr>
				<img src="img/fb.png">
				<img src="img/gp.png">
			</form>
		</center>
		<div id="body">
			<div id="filter">
				<center class="filter_head">
					Categories
				</center>
				<span class="filter_item">Computer programs</span><br>
				<span class="filter_item">Web Apps</span><br>
				<span class="filter_item">Mobile Apps</span><br>
				<span class="filter_item">Games</span><br>
			</div>
			<div id="search">
				<input type="text" class="txt" placeholder="Search">
			</div>
			<center id="apps">
				<div class="app"></div>
				<div class="app"></div>
				<div class="app"></div>
				<div class="app"></div>
				<div class="app"></div>
				<div class="app"></div>
				<div class="app"></div>
				<div class="app"></div>
				<div class="app"></div>
			</center>
		</div>
		<footer><a id="logo">Dev Point</a></footer>
	</body>
</html>