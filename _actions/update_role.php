<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\RoleTable;

$data = [
 'id' => $_POST['id'],
 'name' => $_POST['name'],
 'value' => $_POST['value']
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$table = new RoleTable(new MySQL());

$result = $table->UpdateRole($data);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();
if($result){
 header('location: ../admin/role_index.php?success_update=role');
} else {
 header('location: ../admin/role_index.php?error_update=role');
}