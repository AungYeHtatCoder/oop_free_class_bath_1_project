<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\CategoryTable;

$data = [
 'category_name' => $_POST['category_name'],
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new CategoryTable(new MySQL());
$result = $table->InsertCategory($data);

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();
if($result)
{
 header('location: ../admin/category_index.php?success_insert=true');
}
else
{
 header('location: ../admin/category_index.php?error_insert=true');
}