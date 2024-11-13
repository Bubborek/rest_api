<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once "../config/database.php";
include_once "../objects/Product.php";
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$data = json_decode(file_get_contents("php://input"));
$product->id = $data->id;
if ($product->delete()) {
   echo json_encode(["message" => "Product was deleted."]);
} else {
   echo json_encode(["message" => "Unable to delete product."]);
}
?>