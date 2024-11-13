<?php
class Item
{
   private $db;
   private $table = 'items';
   public function __construct($db)
   {
       $this->db = $db;
   }
   public function getAllItems()
   {
       $query = "SELECT * FROM " . $this->table;
       $stmt = $this->db->prepare($query);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   public function getItemById($id)
   {
       $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':id', $id);
       $stmt->execute();
       return $stmt->fetch(PDO::FETCH_ASSOC);
   }
   public function createItem($name, $description)
   {
       $query = "INSERT INTO " . $this->table . " (name, description) VALUES (:name, :description)";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':name', $name);
       $stmt->bindParam(':description', $description);
       return $stmt->execute();
   }
   public function updateItem($id, $name, $description)
   {
       $query = "UPDATE " . $this->table . " SET name = :name, description = :description WHERE id = :id";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':id', $id);
       $stmt->bindParam(':name', $name);
       $stmt->bindParam(':description', $description);
       return $stmt->execute();
   }
   public function deleteItem($id)
   {
       $query = "DELETE FROM " . $this->table . " WHERE id = :id";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':id', $id);
       return $stmt->execute();
   }
}
?>