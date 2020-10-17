<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php

session_start();

if (isset($_SESSION["username"])) {

$_SESSION = array();
session_destroy();

echo "<h1 id='exit_title'>Thanks for Coming!</h1>"; 
}else{
	header("Location:Login.php");
}
?>
</body>
</html>