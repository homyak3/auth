<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_main.css">
	<title>Shop</title>
</head>
<body>
	<header>
	<nav class="header">
<?php  
session_start();
if (!empty($_SESSION['reg'])) {
	echo $_SESSION['reg'];
	unset($_SESSION['reg']);
}
if (!empty($_SESSION['delete'])) {
	echo $_SESSION['delete'];
	unset($_SESSION['delete']);
}
if (!empty($_SESSION['flash_1'])) {
	echo $_SESSION['flash_1'];
	unset($_SESSION['flash_1']);
}
if (!empty($_SESSION['auth']) and ($_SESSION['status'] == 'admin')) {
	echo "<a href=\"admin.php\">ADMIN</a>";
}
if (!empty($_SESSION['auth'])) {
?>
		<a href="personalProfile.php">Profile</a>
	   <a href="change_password.php">Change the password</a>
	   <a href="delete_account.php">Delete account</a>
	   <a href="users.php">Users</a> <?

?><a href="logout.php">Logout</a></nav>
</header><?

}else{
	echo "You are not authenteficate <br>";
	?><a href="login.php">Authenteficate</a><br>
	  <a href="register.php">Registration</a><? 
}
?>
</body>
</html>