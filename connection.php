<?php
$host = 'localhost';
$database = 'name_class';
$user = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = new mysqli($host, $user, $password, $database);
$connection->set_charset("utf8mb4");
if ($connection->connect_errno) {
    die("<p><strong>Ошибка подключения к БД</strong></p><p><strong>Код ошибки: </strong> " . $connection->connect_errno . " </p><p><strong>Описание ошибки:</strong> " . $connection->connect_error . "</p>");
}
?>