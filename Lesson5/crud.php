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

$db_data = [
    "DB_HOST" => "localhost",
    "DB_USERNAME" => "root",
    "DB_PASSWORD" => "",
    "DB_NAME" => "e-commerce",
];

$db = new Database($db_data);
$mysql = $db->getConnection();

$res = "";

$data= ($db->getData("category"));
foreach ($data as $items) {
    foreach ($items as $key => $value) {
        $res .= $key == 'id'? $value : "";
        $res .= $key == 'category_name'? $value . "\n" : "";
    }
}
echo $res;
return $mysql;
// $db->getData("products");
// $db->insertData("products", $product);
// echo "</pre>";
