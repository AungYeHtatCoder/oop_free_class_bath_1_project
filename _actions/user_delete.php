<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
$id = $_GET['id'];
$table = new UsersTable(new MySQL());

// user delete 
if(isset($_GET['id'])){
    $table->deleteUserById($id);
    header('location: ../admin/user_index.php?user_delete=success');
}else{
 echo "User not deleted";
}