<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\CategoryTable;

$data = [
 'id' => $_POST['id'],
 'category_name' => $_POST['category_name'],
];

$table = new CategoryTable(new MySQL());
$result = $table->UpdateCategory($data);

if($result)
{
 header('location: ../admin/category_index.php?success_update=true');
}
else
{
 header('location: ../admin/category_index.php?error_update=true');
}