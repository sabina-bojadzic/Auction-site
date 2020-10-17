<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php
	echo "<img id='logo' src='auction_logo.jpg' />";
	echo"<br>";
	echo "<form class='relogin_form' method='POST' action=''>";
	echo "<h4>Please Login Again</h4>";
	echo "<br>";
	echo "<label for='username' class='label'>Username: </label>";
	echo "<input type='text' name='username' class='text' />";
	echo "<br>";
	echo "<label for='password' class='label'>Password: </label>";
	echo "<input type='password' name='password' class='password' />";
	echo "<br>";
	echo "<input type='submit' class='submit' value='Sign In' />";
	echo "</form>";

	?>

</body>
</html>