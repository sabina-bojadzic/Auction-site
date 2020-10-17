<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	
	session_start();
	if (!isset($_SESSION["username"])) 
	{
		header("Location: Login.php");
	}else{

	$DBHOST = "localhost";
	$DBUSERNAME = "root"; 
	$DBPASS = "mysql";
	$DBNAME = "auction";

	$conn = new mysqli($DBHOST, $DBUSERNAME, $DBPASS, $DBNAME);
	if ($conn->connect_error) 
	{
	die("Connection failed: " . $conn->connect_error);	
	}

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

	$statement = "SELECT * FROM item";
	$result = $conn->query($statement);

	while($row = $result->fetch_assoc())
	{
		$iid = $row['item_id'];
		$iname = $row['item_name'];
		$ipic = $row['item_pic'];
		$icurrentp = $row['current_bid'];
		$iimg = "item/".$row['item_pic'];
		$link = 'Item_details.php?item_id=';
		$item_details = $link.$iid;
		echo "<div class='item'>";
		echo "<div class='item_row'>Item Id: $iid</div>";
		echo "<div class='item_row'>Item Name: $iname </div>";
		echo "<img style='padding-left: 25px;' class='item_img' src='$iimg' alt='image' />";
		echo "<div class='item_row'>Current Bid: $$icurrentp</div>";
		echo "<div class='item_row'><a style='font-weight:bold;' class='link' href='$item_details'>Item Details</a></div>";
		echo "</div>";
	}
	$conn->close();
}


?>
</body>
</html>