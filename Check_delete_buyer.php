<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php
	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
		
	$DBHOST = "localhost";
	$DBUSERNAME = "root";
	$DBPASS = "mysql";
	$DBNAME = "auction";

	$conn = new mysqli($DBHOST, $DBUSERNAME, $DBPASS, $DBNAME);
	if ($conn->connect_error) 
	{
	die("Connection failed: " . $conn->connect_error);
	}

	$username = $_POST["username"];
	$password = $_POST["password"];
	$statement = "SELECT * FROM buyer WHERE username=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $username);
	$stmt->execute();

	$result = $stmt->get_result();
	if ($result->num_rows<1) {
		$value = "no_account";
		header("Location: Delete_buyer.php?buyer=$value");
	}else{
		$row = $result->fetch_assoc();
		if (password_verify($password, $row["password"])) {
			$statement = "DELETE FROM buyer WHERE username=?";
			$stmt = $conn->prepare($statement);
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$value = "deleted";
			header("Location: Delete_buyer.php?buyer=$value");
		}else{
			$value = "wrong_password";
			
			header("Location: Delete_buyer.php?buyer=$value");
		}
	}
	$conn->close();
}else{
	header("Location: Delete_buyer.php");
}

	?>

</body>
</html>