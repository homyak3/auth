<?php
session_start();
require 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_prof.css">
	<title>Profile</title>
</head>
<body>
<header>
	<nav class="header">
		<a href="index.php">Main</a>
		<a href="users.php">Users</a>
		<a href="logout.php">Logout</a>
	</nav>
</header>
<div class="profile">
<?
$id = $_GET['id'];
$query = "SELECT * from users WHERE id='$id'";
	$result = mysqli_query($connection, $query);
	$user = mysqli_fetch_assoc($result);
$happyb = date('Y', strtotime($user['hb']));
$usersOld = date('Y') - $happyb;
if (!empty($user)) {
	echo "<span class = 'profile__prof'>Profile:</span>";
	echo "<span class = 'profile__text'>Login: {$user['login']}</span>";
	echo "<span class = 'profile__text'>Name: {$user['name']}</span>";
	echo "<span class = 'profile__text'>Surname: {$user['surname']}</span>";
	echo "<span class = 'profile__text'>Years Old: {$usersOld}</span>";
}
?>
</div>
</body>
</html>
