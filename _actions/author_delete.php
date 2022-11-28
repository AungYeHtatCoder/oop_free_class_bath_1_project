<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\AuthorTable;

if(isset($_GET['id'])){
 $table = new AuthorTable(new MySQL());
 $result = $table->DeleteAuthor($_GET['id']);
 if($result){
  header('location: ../admin/author_index.php?success_delete=author');
 } else {
  header('location: ../admin/author_index.php?error_delete=author');
 }
}