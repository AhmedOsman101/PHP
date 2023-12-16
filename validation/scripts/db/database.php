<?php
require_once 'F:/Apps/xampp/htdocs/Othman/PHP/vendor/autoload.php';
echo "<pre>";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USERNAME'];
$db_password = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_NAME'];

$mysql = new mysqli(
    hostname: $db_host,
    username: $db_user,
    password: $db_password,
    database: $db_name
);

if ($mysql->connect_error) die("an error occured" . $mysql->connect_error);
// echo  "<br>";
echo "</pre>";
return $mysql;
