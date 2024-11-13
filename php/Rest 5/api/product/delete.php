<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once "../config/database.php";
include_once "../objects/Product.php";
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$stmt = $product->read();
$num = $stmt->rowCount();
if ($num > 0) {
   $products_arr = [];
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       extract($row);
       $product_item = [
           "id" => $id,
           "name" => $name,
           "description" => $description,
           "price" => $price,
           "created" => $created
       ];
       array_push($products_arr, $product_item);
   }
   echo json_encode($products_arr);
} else {
   echo json_encode(["message" => "No products found."]);
}
?>