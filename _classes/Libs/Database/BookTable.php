<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class BookTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // insert into books 
 public function InsertBook($data)
 {
  $statement = $this->db->prepare("INSERT INTO books (title, category_id, author_id, publisher_id, publish_date, edition, volume, isnb, price, description, cover_image, user_id, book_status, created_at) VALUES (:title, :category_id, :author_id, :publisher_id, :publish_date, :edition, :volume, :isnb, :price, :description, :cover_image, :user_id, :book_status, Now())");
  $statement->execute($data);
  return $statement->rowCount();
 }


 // get all books with category, author, publisher and user
 public function GetAllBook()
 {
  $statement = $this->db->prepare("SELECT books.*, categories.category_name, authors.author_name, publishers.publisher_name, users.name, users.profile, users.email FROM books LEFT JOIN categories ON books.category_id = categories.id LEFT JOIN authors ON books.author_id = authors.id LEFT JOIN publishers ON books.publisher_id = publishers.id LEFT JOIN users ON books.user_id = users.id ORDER BY books.id DESC");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows;
 }

 
	
}