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

	$conn = new mysqli ($DBHOST, $DBUSERNAME, $DBPASS, $DBNAME);
	if ($conn->connect_error) 
	{
	die("Connection failed: " . $conn->connect_error);
	}

	$username = $_POST["username"];

	$statement = "SELECT * FROM buyer WHERE username=?";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	$row = $result->fetch_assoc();
	$hash = $row["password"];

	if (password_verify($_POST["password"], $hash)) {

		echo "Successfully Loged In.";
		session_start();
		$_SESSION["username"] = $_POST["username"];
		$conn->close();
		header("Location: Display_items.php");
	}else{
		$conn->close();
		header("Location: Relogin.php");
	}
	
}else{
	header("Location: Login.php");

}

	?>

</body>
</html>