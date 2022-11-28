<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class AuthorTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all roles
 public function GetAllAuthor()
 {
  $statement = $this->db->prepare("SELECT * FROM authors ORDER BY id DESC");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows;
 }

 // insert Category
 public function InsertAuthor($data)
 {
  $statement = $this->db->prepare("INSERT INTO authors (author_name, created_at) VALUES (:author_name, Now())");
  $statement->execute($data);
  return $statement->rowCount();
 }

 // get Category by id 
 public function GetAuthorById($id)
 {
  $statement = $this->db->prepare("SELECT * FROM authors WHERE id = :id");
  $statement->execute(['id' => $id]);
  $row = $statement->fetch();
  return $row;
 }

 // Category update 
 public function UpdateAuthor($data)
 {
  $statement = $this->db->prepare("UPDATE authors SET author_name = :author_name WHERE id = :id");
  $statement->execute($data);
  return $statement->rowCount();
 }


 // role categories
 public function DeleteAuthor($id)
 {
  $statement = $this->db->prepare("DELETE FROM authors WHERE id = :id");
  $statement->execute(['id' => $id]);
  return $statement->rowCount();
 }
	
}