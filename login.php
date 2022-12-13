<?php
require 'connection.php';

if (!empty($_POST['password']) and !empty($_POST['login'])) {
	$login = $_POST['login'];

	$query = "SELECT * from users WHERE login = '$login'";
	$result = mysqli_query($connection, $query);
	$user = mysqli_fetch_assoc($result);

	if (!empty($user)) {
		$hash = $user['password'];
		if (password_verify($_POST['password'], $hash)) {
			session_start();
		$_SESSION['login'] = $login;
		$_SESSION['status'] = $user['status'];
		$_SESSION['auth'] = true;
		$_SESSION['id'] = $user['id'];
		header('Location: index.php');
		}else{
			echo "Login or password not correct";
			require "auth.html";
		}
	}else{
		echo "Login or password not correct";
		require "auth.html";
	}
}else { require "auth.html"; }
?>

