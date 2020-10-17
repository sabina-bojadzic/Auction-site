<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
if (!empty($_POST["item_name"])) {

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

	$statement = "SELECT * FROM item WHERE item_name=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $iname);
	$stmt->execute();

	$result = $stmt->get_result();
	if ($result->num_rows <=0) {
		
		$value = "no_item";
		header("Location: Delete_item.php?item=$value");
	}else{
			$statement = "DELETE FROM item WHERE item_name=?";
			$stmt = $conn->prepare($statement);
			$stmt->bind_param("s", $iname);
			$stmt->execute();
			$value = "deleted";
			header("Location: Delete_item.php?item=$value");
	}
	$conn->close();
}else{
	header("Location: Delete_item.php");
}

?>
</body>
</html>