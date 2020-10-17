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
	
	echo "<form action='Check_item.php' method='post' class='add_item_form' enctype='multipart/form-data'>";
	
	if (isset($_GET['item'])) {

	if ($_GET['item'] == 'duplicate') 
	{
	echo "<h4 class='warn'>Already entered this item</h4>";
	echo "<br>";
	echo "<h4 class='warn'>Please try again</h4>";
	}else if($_GET['item'] == 'successful'){
	echo "<h4 class='warn'>Successfully added an item!</h4>";
	}
	}else{
		echo"<h4 class='warn'>Please add an item</h4>";
	}
	

	echo "<label class='label' for='item_name'>Item Name: </label>";
	echo "<input class='text' type='text' name='item_name' placeholder='Item name' required=true />";
	echo "<br>";
	
	echo "<label class='label' for='item_description'>Item Description: </label>";
	echo "<input class='text' type='text' name='item_description' placeholder='Item Description' required=true />";
	echo "<br>";
	
	echo "<label class='label'  for='endtime'>Ending Bid Time: </label>";
	echo "<input class='text' type='text' name='endtime' placeholder='Ending Bid Time' required=true />";
	echo "<br>";

	echo "<label class='label'  for='item_pic'>Item Picture: </label>";
	echo "<input class='text' type='file' name='item_pic' value='item_pic' required=true />";
	echo "<br>";

	echo "<input class='submit' type='submit' value='Add Item' />";
	echo "</form>";

	?>

</body>
</html>