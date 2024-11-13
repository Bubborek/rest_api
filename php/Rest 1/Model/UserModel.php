<?php
class UserModel extends Database
{
   public function getUsers($limit)
   {
       return $this->select("SELECT * FROM users LIMIT ?", ["i", $limit]);
   }
}