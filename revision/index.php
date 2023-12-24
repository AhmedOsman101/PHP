<?php
header("Content-type: application/json");
// header("Access-Control-Allow-Origin:*");
spl_autoload_register(function ($class) {
    require("$class.php");
});

$db = new Database("localhost", "root", "crud", "");
$conn = $db->getConnection();

$data = json_decode(file_get_contents('php://input'), true);
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // echo ;
        echo ($db->View("products", $_GET["id"] ?? NULL));
        break;
    case 'POST':
        echo ($db->Add("products", $data));
        break;
    case 'PUT':
        echo ($db->Update("products", $_GET["id"] ?? NULL, $data));
        break;
    case 'DELETE':
        echo ($db->Delete("products", $_GET["id"] ?? NULL, $data));
        break;
    default:
        header('HTTP/1.1 401 Invalid Request', true, 401);
        echo json_encode([
            "ERROR" => "Invalid Request"
        ], JSON_PRETTY_PRINT);
        break;
}
