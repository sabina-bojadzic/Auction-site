<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php

	echo "<ul>";
  	echo "<li><a class='active' href='Display_items.php'>Home</a></li>";
  	echo"<li><a href='Add_buyer.php'>Add Buyer</a></li>";
  	echo"<li><a href='Add_item.php'>Add Item</a></li>";
  	echo"<li><a href='Delete_item.php'>Delete Item</a></li>";
  	echo"<li><a class='logout button' href='Logout.php'>Logout</a></li>";
	echo"</ul>";

	echo "<table style='width:100%;'>";
	echo "<td style='width:180px;'>";
	echo "<img id='logo' src='auction_logo.jpg' />"; 
	echo "</td>";
	echo "<td>";
	echo "<p class='par'>Welcome to Auction Site</p>";
	echo "</td>";
	echo "</table>";
	echo "<br>";
	echo "<hr>";
	echo "<br>";
	echo "<form class='delete_buyer_form' action='Check_delete_buyer.php' method='POST'>";

	if (isset($_GET["buyer"])) {
		if ($_GET["buyer"] == "no_account") {
			echo "<h4 class='warn'>No Such User To delete</h4>";
			echo "<br>";
			echo "<h4 class='warn'>Please Try Again</h4>";
		}else if($_GET["buyer"] == "deleted"){
			echo "<h4 class='warn'>Successfully Deleted User!</h4>";
		}else if($_GET["buyer"] == "wrong_password"){
			echo "<h4 class='warn'>Wrong User And Password Combination</h4>";
			echo "<br>";
			echo "<h4 class='warn'>Please Try Again</h4>";

		}
	}else{
	echo "<h4 class='warn'>To Delete An Acount, Please Enter The Buyer's Username and Password</h4>";
	}
		
	echo "<br>";
	echo "<label class='label' for='username'>Username: </label>";
	echo "<input class='text' type='text' name='username' placeholder='Username' />";
	echo "<br>";
	echo "<label class='label' for='password'>Password: </label>";
	echo "<input class='password' type='text' name='password' placeholder='Password' />";
	echo "<br>";
	echo "<input class='submit' type='submit' name='submit' value='Delete User' />";
	echo "</form>";


	?>

</body>
</html>