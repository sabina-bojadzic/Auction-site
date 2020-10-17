<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php

	$DBHOST = "localhost";
	$DBUSERNAME = "root";
	$DBPASS = "mysql";
	$DBNAME = "auction";

	$conn = new mysqli ($DBHOST, $DBUSERNAME, $DBPASS, $DBNAME);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}


	if (!isset($_POST["item_id"])) {
		header("Location: Display_items.php");
	}else{


	$item_id = $_POST["item_id"];
	session_start();


	$statement = "SELECT * FROM bid WHERE item_id=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $item_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	if($_SESSION["username"] == $row["username"])
	{
		echo"<p class='btext'>You are already the highest bidder." . "<br><br>" . "<a href='Display_items.php' type='button' name='button' class='btn'> Go Back </a> </p>";
	}else{

	$statement = "SELECT * FROM item WHERE item_id=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $item_id);
	$stmt->execute();

	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$bid = $_POST["bid"];
	$username = $_SESSION["username"];

	if($bid > $row["current_bid"])
	{
		$statement = "UPDATE item SET current_bid=? WHERE item_id=?";
		$stmt = $conn->prepare($statement);
		$stmt->bind_param("dd", $bid, $item_id);
		$stmt->execute();


	$statement = "UPDATE item SET bid_num=bid_num+1 WHERE item_id=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("d", $item_id);
	$stmt->execute();

	$statement = "INSERT INTO bid(username, item_id, bid_price) VALUES(?, ?, ?)";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("sid", $username, $item_id, $bid);
	$stmt->execute();


	$statement = "DELETE FROM bid WHERE bid_price<? AND item_id=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("dd", $bid, $item_id);
	$stmt->execute();

	echo "<p class='btext'>Congratulations, the current bid value is $" . $bid . "<br><br>" . "<a href='Display_items.php' type='button' name='button' class='btn'> Go Back </a></p>";


	}else{
		echo "<p class='btext'>Your bid must be greater than the current bid price." . "<br> <br>" . "<a href='Display_items.php' type='button' name='button' class='btn'> Go Back </a></p>";
	}
	}
	$conn->close();
}

	?>

</body>
</html>