<?php

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) die("valid email is required");
if (strlen($_POST["password"]) < 9) die("password is not valid");

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysql = require(__DIR__ . "/db/database.php");

$sql = "INSERT INTO `customers`(`name`, `email`, `password`, `phone_number`, `Gender`, `age`, `address_1`, `address_2`, `created_at`, `updated_on`) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )";

// var_export($mysql);
