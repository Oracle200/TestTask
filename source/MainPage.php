<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: authenticate.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Добро пожаловать</title>
</head>
<body>
	<p>
		Здравствуйте <b><?php echo $_SESSION["username"]; ?></b>
	</p>
	<a href="logout.php">Выйти</a>
</body>
</html>