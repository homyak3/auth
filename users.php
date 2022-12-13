<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_users.css">
	<title>Users</title>
</head>
<body>
<header>
	<nav class="header">
		<a href="index.php">Main</a>
		<a href="logout.php">Logout</a>
	</nav>
</header>
<div class="users">
<?php
require 'connection.php';

$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
for ($array = []; $row = mysqli_fetch_assoc($result); $array[] = $row);

foreach ($array as $elem) {
echo "<div class = 'users__prof'><a href=\"profile.php?id={$elem['id']}\"> {$elem['login']} </a></div>".'<br>';
}
?>
</div>
</body>
</html>