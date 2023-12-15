<?php
$db_host = "localhost";
$db_name = "e-commerce";
$db_user = "root";
$db_password = "";

$mysql = new mysqli(
    hostname: $db_host,
    database: $db_name,
    username: $db_user,
    password: $db_password
);
if ($mysql->connect_error) die("an error occured" . $mysql->connect_error);
// var_export($mysql);
// echo  "<br>";
return $mysql;
