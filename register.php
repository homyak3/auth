<?php
require 'connection.php';
require "reg.php";
if (!empty($_POST)) {
if (!empty(trim($_POST['login'])) and !empty(trim($_POST['password'])) and !empty(trim($_POST['email'])) and !empty(trim($_POST['hb'])) and !empty(trim($_POST['name'])) and !empty(trim($_POST['surname']))) {
	if ($_POST['password'] == $_POST['password_sr']) {
	
	$reg = "#^[A-Za-z\d]+$#";
	if (preg_match($reg, $_POST['login'])) {

	if (strlen($_POST['login']) >= 4 AND strlen($_POST['login']) <=10) {

	if (strlen($_POST['password']) >=6 AND strlen($_POST['password']) <=12) {

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

		function validateDate($date, $format = 'd-m-Y')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
    if (validateDate($_POST['hb'])) {

	$login = $_POST['login'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$email = $_POST['email'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$hb = $_POST['hb'];
	$happyb = date('Y-m-d', strtotime($hb));

	$query1 = "SELECT * FROM users WHERE login = '$login'";
	$user = mysqli_fetch_assoc(mysqli_query($connection, $query1));

		if (!empty($user)) {
			echo "This login already exists, input new login!";
		}else{

	$query = "INSERT INTO users SET login = '$login', password = '$password', email = '$email', hb = '$happyb', name = '$name', surname = '$surname', status = 'user'";
	$result = mysqli_query($connection, $query);


	if ($result == true) {
		session_start();
		$_SESSION['reg'] = 'You are registration!<br>';
		$_SESSION['auth'] = true;
		$_SESSION['login'] = $login;

		$id = mysqli_insert_id($connection);
		$_SESSION['id'] = $id;
		header("Location: index.php");
	}
}
}else{
	$ok = true;
}

}else{
	$ok2 = true;
}

}else{
	$ok3 = true;
}

}else{
	$ok4 = true;
}

}else{
	echo "Input correct login!";

}

}else{
	echo "Input similar password";
}

}else{
	echo "Input all column";
}
}
?>