<?php

// echo "<pre>";
spl_autoload_register(function ($class) {
    require(__DIR__ . DIRECTORY_SEPARATOR . "scripts" . DIRECTORY_SEPARATOR . "$class.php");
});

$db_data = [
    "DB_HOST" => "localhost",
    "DB_USERNAME" => "root",
    "DB_PASSWORD" => "",
    "DB_NAME" => "CRUD",
];

$db = new Database($db_data);
$mysql = $db->getConnection();


$product = new Product(
    "Iphone",
    "15000",
    "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste accusantium tempora totam ratione odit commodi. Veniam ab totam earum asperiores laudantium, temporibus quos qui, ea quidem nisi nobis repudiandae. Non!"
);

// $db->getData("products");
// $db->insertData("products", $product);
// echo "</pre>";
