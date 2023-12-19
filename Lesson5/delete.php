<?php
try {
    $mysql = require("crud.php");
} catch (\Throwable $e) {
    echo "ERROR Occurred: {$e->getMessage()} in line: {$e->getLine()}";
}

print_r($_GET);

$db->deleteData($_GET["id"]);
header("location: index.php");
?>