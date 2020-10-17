<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php

	session_start();

	if(!isset($_GET["item_id"]) || !isset($_SESSION["username"]))
	{
		header("Location: Display_items.php");
	}else{

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


	$username = $_SESSION["username"];

	$DBHOST = "localhost";
	$DBUSERNAME = "root";
	$DBPASS = "mysql";
	$DBNAME = "auction";

	$conn = new mysqli($DBHOST, $DBUSERNAME, $DBPASS, $DBNAME);
	if ($conn->connect_error) 
	{
	die("Connection failed: " . $conn->connect_error);	
	}

	$statement = "SELECT * FROM item WHERE item_id=?";
	$iid = $_GET["item_id"];
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $iid);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$iid = $row["item_id"];
	$iname = $row["item_name"];
	$i_desc = $row["item_desc"];
	$iiprice = $row["init_bid"];
	$end = $row["endtime"];
	$bid_num = $row["bid_num"];
	$icprice = $row["current_bid"];
	$iimg = "item/";
	$iimg = $iimg.$row["item_pic"];

	echo "<div style='display: flex; justify-content: center;'>";
	echo "<div class='item'>";
	echo "<div class='item_row'>Item Id: $iid</div>";
	echo "<div class='item_row'>Item Name: $iname</div>";
	echo "<img style='padding-left: 23px;' src='$iimg' class='item_img' alt='image' />";
	echo "<div class='item_row'>Item Description: $i_desc</div>";
	echo "<div class='item_row'>End Time: $end</div>";
	echo "<div class='item_row'>Number of Bids: $bid_num</div>";
	echo "<div class='item_row'>Current Bid: $$icprice</div>";
	echo "<form action='Bid.php' method='POST' >";
	echo "<input type='hidden' name='item_id' value='$iid' />";
	echo "<input type='hidden' name='username' value='$username' />";
	echo "<select style='margin-left:5px; margin-right:5px;' name='bid'>";
	for($i=0; $i<10; $i++){
		$j = $i*10;
		echo "<option value='$j'>$$j</options>";
	}


	echo"</select>";
	echo "<input type='submit' class='bidb' value='Bid'>";

	echo "</form>";
	echo"</div>";
	echo"</div>";
	$conn->close();
}
	?>

</body>
</html>