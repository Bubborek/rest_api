<?php
class Database
{
   private $connection;
   public function __construct()
   {
       $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
       if ($this->connection->connect_error) {
           throw new Exception("Connection failed: " . $this->connection->connect_error);
       }
   }
   public function select($query, $params = [])
   {
       $stmt = $this->connection->prepare($query);
       if ($params) {
           $stmt->bind_param(...$params);
       }
       $stmt->execute();
       $result = $stmt->get_result();
       return $result->fetch_all(MYSQLI_ASSOC);
   }
   public function executeStatement($query, $params = [])
   {
       $stmt = $this->connection->prepare($query);
       if ($params) {
           $stmt->bind_param(...$params);
       }
       return $stmt->execute();
   }
}
