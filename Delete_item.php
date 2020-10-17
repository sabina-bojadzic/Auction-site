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
	echo "<form class='delete_item_form' method='POST' action='Check_delete_item.php'> ";
	
		if(isset ($_GET["item"])){
		if ($_GET["item"] == "no_item"){
		echo "<h2 class='warn'>That Item Does Not Exist.</h2>";
		echo "<br>";
		echo "<h2 class='warn'>Please Try Again</h1>";
		} else if($_GET["item"] == "deleted"){
		echo "<h2 class='warn'>Successfully Deleted Item!</h2>";
		}
	}else{
	echo "<h2 class='warn'>To Delete An Item Please Enter The Item Name</h2>";
	}

	echo "<br>";
	echo "<label for='item_name' style='width:95px;' class='label'>Item Name:</label>";
	echo "<input style='margin-right:10px;' class='text' type='text' name='item_name' placeholder='Item name' />";
	echo "<input class='submit' type='submit' value='Delete Item' />";
	echo "</form>";



?>

</body>
</html>



