<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class PublisherTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all roles
 public function GetAllPublisher()
 {
  $statement = $this->db->prepare("SELECT * FROM publishers ORDER BY id DESC");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows;
 }

 // insert Category
 public function InsertPublisher($data)
 {
  $statement = $this->db->prepare("INSERT INTO publishers (publisher_name, created_at) VALUES (:publisher_name, Now())");
  $statement->execute($data);
  return $statement->rowCount();
 }

 // get Category by id 
 public function GetPublisherById($id)
 {
  $statement = $this->db->prepare("SELECT * FROM publishers WHERE id = :id");
  $statement->execute(['id' => $id]);
  $row = $statement->fetch();
  return $row;
 }

 // Category update 
 public function UpdatePublisher($data)
 {
  $statement = $this->db->prepare("UPDATE publishers SET publisher_name = :publisher_name WHERE id = :id");
  $statement->execute($data);
  return $statement->rowCount();
 }


 // role categories
 public function DeletePublisher($id)
 {
  $statement = $this->db->prepare("DELETE FROM publishers WHERE id = :id");
  $statement->execute(['id' => $id]);
  return $statement->rowCount();
 }
	
}