<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\RoleTable;

if(isset($_GET['id'])){
 $table = new RoleTable(new MySQL());
 $result = $table->DeleteRole($_GET['id']);
 if($result){
  header('location: ../admin/role_index.php?success_delete=role');
 } else {
  header('location: ../admin/role_index.php?error_delete=role');
 }
}