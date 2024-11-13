<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once "../config/database.php";
include_once "../objects/Product.php";
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$data = json_decode(file_get_contents("php://input"));
$product->name = $data->name;
$product->description = $data->description;
$product->price = $data->price;
$product->created = date('Y-m-d H:i:s');
if ($product->create()) {
   echo json_encode(["message" => "Product was created."]);
} else {
   echo json_encode(["message" => "Unable to create product."]);
}
?>