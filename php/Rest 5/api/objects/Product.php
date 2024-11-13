<?php
class Product {
   private $conn;
   private $table_name = "products";
   public $id;
   public $name;
   public $description;
   public $price;
   public $created;
   public function __construct($db) {
       $this->conn = $db;
   }
   public function read() {
       $query = "SELECT id, name, description, price, created FROM " . $this->table_name;
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt;
   }
   public function create() {
       $query = "INSERT INTO " . $this->table_name . " SET name=:name, description=:description, price=:price, created=:created";
       $stmt = $this->conn->prepare($query);
       $this->name = htmlspecialchars(strip_tags($this->name));
       $this->description = htmlspecialchars(strip_tags($this->description));
       $this->price = htmlspecialchars(strip_tags($this->price));
       $this->created = htmlspecialchars(strip_tags($this->created));
       $stmt->bindParam(":name", $this->name);
       $stmt->bindParam(":description", $this->description);
       $stmt->bindParam(":price", $this->price);
       $stmt->bindParam(":created", $this->created);
       if ($stmt->execute()) {
           return true;
       }
       return false;
   }
// Update és Delete metódusok hasonlóan készíthetők el
}
?>