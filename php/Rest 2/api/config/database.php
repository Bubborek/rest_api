<?php
$host = 'localhost';
$db_name = 'your_database_name';
$username = 'your_username';
$password = 'your_password';
try {
   $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo 'Connection Error: ' . $e->getMessage();
}
?>