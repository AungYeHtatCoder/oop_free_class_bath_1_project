<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\PublisherTable;

if(isset($_GET['id'])){
 $table = new PublisherTable(new MySQL());
 $result = $table->DeletePublisher($_GET['id']);
 if($result){
  header('location: ../admin/publisher_index.php?success_delete=publisher');
 } else {
  header('location: ../admin/publisher_index.php?error_delete=publisher');
 }
}