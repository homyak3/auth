<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
</head>
<body>
<header>
	<nav class="header">
		<a href="index.php">Main</a>
		<a href="logout.php">Logout</a>
	</nav>
</header>
<div class="main">
<?php
require "connection.php";

session_start();
if ($_SESSION['auth'] == true) {
	if (!empty($_POST)) {
$id = $_SESSION['id'];

$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);

$hash = $user['password'];

if (password_verify($_POST['password'], $hash)) {
	$query = "DELETE FROM users WHERE id = '$id'";
	$result = mysqli_query($connection, $query);
	if ($result == true) {
		$_SESSION['delete'] = 'You are delete your account!<br>';
		$_SESSION['auth'] = false;
		header("Location: index.php");
	}
}else{
	echo "<p style = color:red>It`s not your password</p>";
}
}
}
?>
<form action="" method="POST">
	<div class="main__del">Delete Account</div>
	<div class="main__text">Enter your password</div>
	<div class="main__text">
		<input type="password" name="password">
	</div>
	<div class="main__but">
		<button class="main__button">Delete</button>
	</div>
</form>
</div>
</body>
</html>