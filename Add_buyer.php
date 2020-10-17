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
	echo "<form class='add_buyer_form' method='POST' action='Check_buyer.php'";
	if (isset($_GET["buyer"])){
	if ($_GET["buyer"] == "successful") {
		echo "<h4 class='warn'>Successfully Added User!</h4>";
	}else if($_GET["buyer"] == "duplicate"){
		echo "<h4 class='warn'>Buyer already exists. Please Enter Another Username and Password.</h4>";
	}
	}else{
		echo "<h4 class='warn'>Please add the Buyer's Username and Password</h4>";
		echo "<br>";
	}

	echo "<br>";
	echo "<label class='label'>Username: </label>";
	echo "<input class='text' type='text' name='username' placeholder='Username' />";
	echo "<br>";
	echo "<label class='label'>Password: </label>";
	echo "<input class='password' type='password' name='password' placeholder='Password' />";
	echo "<br>";
	echo "<input class='submit' type='submit' value='Add Buyer' />";
	echo "</form>"


	?>

</body>
</html>

