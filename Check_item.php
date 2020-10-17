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

	$conn = new mysqli($DBHOST, $DBUSERNAME, $DBPASS, $DBNAME);
	if ($conn->connect_error) 
	{
	die("Connection failed: " . $conn->connect_error);	
	}

	$iname = $_POST["item_name"];
	$idesc = $_POST["item_description"];
	$iipic = $_FILES["item_pic"]["name"];
	$endtime = $_POST["endtime"];

	$statement = "SELECT * FROM item WHERE item_name=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $iname);
	$stmt->execute();

	$result = $stmt->get_result();
	if ($result->num_rows>=1) {
		$value = "duplicate";
		$conn->close();
		header("Location:Add_item.php?item=$value");
	}else {
		$statement = "INSERT INTO item (item_name, item_desc, item_pic, endtime) VALUES (?,?,?,?)";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("ssss", $iname, $idesc, $iipic, $endtime);
	$stmt->execute();

	$value = "successful";
	$conn->close();
	header("Location:Add_item.php?item=$value");

	}
	

	?>

</body>
</html>
