<?php

// echo "<pre>";
spl_autoload_register(function ($class) {
    require("$class.php");  
});

$db_data = [
    "DB_HOST" => "localhost",
    "DB_USERNAME" => "root",
    "DB_PASSWORD" => "",
    "DB_NAME" => "CRUD",
];

$db = new Database($db_data);
$mysql = $db->getConnection();


return $mysql;
// $db->getData("products");
// $db->insertData("products", $product);
// echo "</pre>";
