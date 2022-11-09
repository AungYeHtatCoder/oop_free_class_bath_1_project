<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class UsersTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function UserRegister($data)
 {
  try {
   $query = "INSERT INTO users (name, email, password, role_id, created_at) VALUES (:name, :email, :password, :role_id, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}