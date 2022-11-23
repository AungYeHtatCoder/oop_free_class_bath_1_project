<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\CategoryTable;

if(isset($_GET['id'])){
 $table = new CategoryTable(new MySQL());
 $result = $table->DeleteCategory($_GET['id']);
 if($result){
  header('location: ../admin/category_index.php?success_delete=category');
 } else {
  header('location: ../admin/category_index.php?error_delete=category');
 }
}