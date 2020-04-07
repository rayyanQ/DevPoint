<header>
	<a href="home.html" id="logo">Dev Point</a>	
	<?php
	if (!isset($_SESSION["username"])) {
		echo '<span class="sub_txt" id="log_in">Log In</span>';
	}
	else
	{
		echo '<span class="sub_txt">' + $_SESSION["username"] + '</span>';
	}
	?>
</header>