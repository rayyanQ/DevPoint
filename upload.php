<!doctype html>
<html>
	<head>
		<title>Upload</title>
		<link rel="stylesheet" type="text/css" href="css/upload.css">
		<script type="text/javascript" src="js/upload.js"></script>
	</head>
	<body>
		<header>
			<a href="index.php" id="logo">Dev Point</a>
			<span class="sub_txt" id="username"></span>
		</header>
		<?php
		session_start();
		$username = $_SESSION["username"];
		mysql_connect("mysql.serversfree.com","u357079875_dev","password") or die(mysql_error());
		mysql_select_db("u357079875_dev");
		if (isset($_FILES['app']) === true & isset($_POST['app_name']) === true & isset($_POST['price']) === true & isset($_POST['category']) === true & isset($_POST['description']) === true){
			if (@$_FILES["app"]["size"] < 10484760000){//1000mb
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$rand_dir = substr(str_shuffle($chars), 0, 15);
				$category = $_POST['category'];
				mkdir("apps/$category/$rand_dir");

				if (file_exists("apps/$category/$rand_dir/".@$_FILES["app"]["name"]))
				{
					echo @$_FILES["app"]["name"]."Already exists";
				}
				else
				{
					move_uploaded_file(@$_FILES["app"]["tmp_name"],"apps/$category/$rand_dir/".$_FILES["app"]["name"]);
					//echo "Uploaded and stored in: userdata/user_photos/$rand_dir_name/".@$_FILES["profilepic"]["name"];
					$date = date("Y-m-d");
					$app = @$_FILES["app"]["name"];
					$app_name = $_POST["app_name"];
					$version = $_POST["version"];
					$price = $_POST["price"];
					$category = $_POST["category"];
					$description = $_POST['description'];
					$website = $_POST["website"];
					$email = $_POST["email"];
					$address = $_POST["address"];
					$size = @$_FILES["app"]["size"];
					$uid = substr(str_shuffle($chars), 0, 20);
					$upload_app = mysql_query("INSERT INTO apps VALUES('','$app_name','http://www.devpoint.tk/apps/$category/$rand_dir/$app','$version','$date','0','$price','0','$category','$description','','','$username','$size','$website','$email','$address','$uid')");
				}
			}
			else
			{
				echo "Invalid File! Your file must be no larger than 1000MB. Compress and try again.";
			}
		}
		?>
		<div id="body">
				<h2>Upload an App</h2>
				<p id="error"></p>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<input type="text" class="txt" name="app_name" placeholder="App Name*"><br><br>
					Upload your App*: <input type="file" name="app"><br><br>
					<input type="number" name="version" class="txt" placeholder="Version"><br><br>
					<input type="number" name="price" class="txt" placeholder="Price*"><br><br>
					Operating System*: 
					<select name="category">
						<option value="windows">Windows</option>
						<option value="mac">Mac</option>
						<option value="ios">iOS</option>
						<option value="android">Android</option>
						<option value="web_app">Website/Web App</option>
					</select><br><br>
					<textarea name="description" placeholder="Description* (200 words only)"></textarea><br><br>
					Upload your app's pics: <input type="file" name="pics"><br><br>
					<input type="url" name="website" placeholder="Your website" class="txt"><br><br>
					<input type="email" class="txt" placeholder="Email" name="email"><br><br>
					<textarea name="address" placeholder="Your company's address"></textarea><br>
					<input type="submit" name="submit" value="Submit" class="but">
					<br><br>
				</form>
		</div>
		<footer>
		</footer>
	</body>
</html>