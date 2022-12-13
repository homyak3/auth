<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_myprofile.css">
	<title>My Profile</title>
</head>
<body>
<header>
	<nav class="header">
		<a href="index.php">Main</a>
		<a href="logout.php">Logout</a>
	</nav>
</header>
<div class="profile">
<?php
require 'connection.php';
session_start();
if ($_SESSION['auth'] == true) {
$id = $_SESSION['id'];
$query = "SELECT * from users WHERE id = '$id'";
	$result = mysqli_query($connection, $query);
	$user = mysqli_fetch_assoc($result);
//$happyb = date('Y', strtotime($user['hb']));
$usersOld = date('Y') - $user['hb'];
 ?> <div class = 'profile__prof'>Profile:</div>
	<form action="" method="POST">
	<div class = 'profile__text'>
		Login: <? echo $user['login']; ?>
	</div>
	<div class = 'profile__text'>
		Name: <?php echo $user['name']; ?>
	</div>
	<div class = 'profile__text'>
		<input type="text" name="change_name">
	</div>
	<div class = 'profile__text'>
		Surname: <? echo $user['surname'];?>
	</div>
	<div class = 'profile__text'>
		<input type="text" name="change_surname">
	</div>
	<div class = 'profile__text'>
		Years Old: <? echo $usersOld; ?>
	</div>
	<div class = 'profile__text'>
		<input type="text" name="change_birthday">
	</div>
	<div class= 'profile__save'>
		<button class = "profile__button">Save</button>
	</div>
	</form><? 
	if (!empty($_POST['change_name'])) {
		$input = $_POST['change_name'];
		$query_name = "UPDATE users SET name = '$input' WHERE id = '$id'";
		mysqli_query($connection, $query_name);
	}
	if (!empty($_POST['change_surname'])) {
		$input = $_POST['change_surname'];
		$query_name = "UPDATE users SET surname = '$input' WHERE id = '$id'";
		mysqli_query($connection, $query_name);
	}
	if (!empty($_POST['change_birthday'])) {
		$input = $_POST['change_birthday'];
		$query_name = "UPDATE users SET hb = '$input' WHERE id = '$id'";
		mysqli_query($connection, $query_name);
	}
}
?>
</div>
</body>
</html>