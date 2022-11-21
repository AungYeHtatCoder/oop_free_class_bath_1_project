<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class RoleTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all roles
 public function GetAllRoles()
 {
  $statement = $this->db->prepare("SELECT * FROM roles");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows;
 }

 // insert role
 public function InsertRole($data)
 {
  $statement = $this->db->prepare("INSERT INTO roles (name, value) VALUES (:name, :value)");
  $statement->execute($data);
  return $statement->rowCount();
 }

 // get role by id 
 public function GetRoleById($id)
 {
  $statement = $this->db->prepare("SELECT * FROM roles WHERE id = :id");
  $statement->execute(['id' => $id]);
  $row = $statement->fetch();
  return $row;
 }

 // role update 
 public function UpdateRole($data)
 {
  $statement = $this->db->prepare("UPDATE roles SET name = :name, value = :value WHERE id = :id");
  $statement->execute($data);
  return $statement->rowCount();
 }


 // role delete
 public function DeleteRole($id)
 {
  $statement = $this->db->prepare("DELETE FROM roles WHERE id = :id");
  $statement->execute(['id' => $id]);
  return $statement->rowCount();
 }
	
}