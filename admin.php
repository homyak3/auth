<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Adminka</title>
</head>
<body>
<header>
	<nav class="header">
		<a href="index.php">Main</a>
		<a href="logout.php">Logout</a>
	</nav>
</header>
<div class="main">
<form action="" method="POST">
<?php
require 'connection.php';
session_start();
if (!empty($_SESSION['auth']) and ($_SESSION['status'] ?? 'admin')) {

$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
for ($array = []; $row = mysqli_fetch_assoc($result); $array[] = $row);
echo "<div class='main__del'>ALL ACCOUNTS</div>";
echo "<div class='main__text'><table><tr><td>Login</td><td>Status</td></tr>";
foreach ($array as $elem) {
echo "<tr><td>{$elem['login']}</td><td>{$elem['status']}</td><td><input type = 'submit' name = '{$elem['login']}' value = 'Delete'></td></tr>".'<br>';
}
echo "</table></div>";
if (!empty($_POST)) {
	foreach ($_POST as $key => $value){
	$query = "DELETE FROM users WHERE login = '$key'";
}
	$result = mysqli_query($connection, $query);
}
}
?>
</form>
</div>
</body>
</html>