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
$product->name = $data->name;
$product->description = $data->description;
$product->price = $data->price;
if ($product->update()) {
   echo json_encode(["message" => "Product was updated."]);
} else {
   echo json_encode(["message" => "Unable to update product."]);
}
?>