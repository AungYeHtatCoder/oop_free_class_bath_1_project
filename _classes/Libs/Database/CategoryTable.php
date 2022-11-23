<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class CategoryTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all roles
 public function GetAllCategory()
 {
  $statement = $this->db->prepare("SELECT * FROM categories ORDER BY id DESC");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows;
 }

 // insert Category
 public function InsertCategory($data)
 {
  $statement = $this->db->prepare("INSERT INTO categories (category_name, created_at) VALUES (:category_name, Now())");
  $statement->execute($data);
  return $statement->rowCount();
 }

 // get Category by id 
 public function GetCategoryById($id)
 {
  $statement = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
  $statement->execute(['id' => $id]);
  $row = $statement->fetch();
  return $row;
 }

 // Category update 
 public function UpdateCategory($data)
 {
  $statement = $this->db->prepare("UPDATE categories SET category_name = :category_name WHERE id = :id");
  $statement->execute($data);
  return $statement->rowCount();
 }


 // role categories
 public function DeleteCategory($id)
 {
  $statement = $this->db->prepare("DELETE FROM categories WHERE id = :id");
  $statement->execute(['id' => $id]);
  return $statement->rowCount();
 }
	
}