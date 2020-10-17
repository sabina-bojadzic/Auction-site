<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	echo "<img id='logo' src='auction_logo.jpg' />";
	echo "<br>";
	echo "<form class='login_form' method='POST' action='Check_login.php'>";
	echo "<h4>Please Login</h4>";
	echo "<br>";
	echo "<label class='label' for='username'>Username: </label>";
	echo "<input type='text' name='username' placeholder='Username' />";
	echo "<br>";
	echo "<br>";
	echo "<label class='label' for='password'>Password: </label>";
	echo "<input type='password' name='password' placeholder='Password' />";
	echo "<br>";
	echo "<input class='submit' type='submit' value='Sign In' />";
	echo "</form>";


?>
</body>
</html>