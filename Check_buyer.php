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
die ("Connection failed: " . $conn->connect_error);	
}


$username = $_POST["username"];
$password = $_POST["password"];

$hashed = password_hash($password, PASSWORD_DEFAULT);

$statement = "SELECT * FROM buyer WHERE username =?";

$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>=1) {
	$value = "duplicate";
	$conn->close();
	header("Location: Add_buyer.php?buyer=$value");
}else{
	$statement = "INSERT INTO buyer(username, password) VALUES(?,?)";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("ss", $username, $hashed);
	$stmt->execute();

	$value = "successful";
	$conn->close();
	header("Location:Add_buyer.php?buyer=$value");
}

$stmt->close();

}else{
header("Location:Add_buyer.php");
}


?>

</body>
</html>