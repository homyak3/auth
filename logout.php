<?php
session_start();
$_SESSION['auth'] = null;
$_SESSION['flash_1'] = 'You exit your account';
header('Location: index.php');
?>
