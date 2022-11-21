<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\RoleTable;

$data = [
 'name' => $_POST['name'],
 'value' => $_POST['value']

];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$table = new RoleTable(new MySQL());

$result = $table->InsertRole($data);

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

if($result){
 header('location: ../admin/role_index.php?success_insert=role');
} else {
 header('location: ../admin/role_index.php?error_insert=role');
}