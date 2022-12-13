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
if (!empty($_POST)) {
	if ($_POST['new_password'] == $_POST['same_password']) {
session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);

$hash = $user['password'];

if (password_verify($_POST['old_password'], $hash)) {
	$newPasswordHash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
	$query_newPassword = "UPDATE users SET password = '$newPasswordHash' WHERE id = '$id'";
	mysqli_query($connection, $query_newPassword);
}else{
	echo "<p style = color:red>Input same new password</p>";
}
}else{
	echo "<p style = color:red>It`s not your old password</p>";
}
}
?>
<form action="" method="POST">
	<div class="main__del">Ghange the password</div>
	<div class="main__text">Old password:</div>
	<div class="main__text">
		<input type="password" name="old_password">
	</div>
	<div class="main__text">New password:</div>
	<div class="main__text">
		<input type="password" name="new_password">
	</div>
	<div class="main__text">Repeat new password:</div>
	<div class="main__text">
		<input type="password" name="same_password">
	</div>
	<div class="main__but">
		<button class="main__button">Change</button>
	</div>
</form>
</div>
</body>
</html>