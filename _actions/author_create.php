<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\AuthorTable;

$data = [
 'author_name' => $_POST['author_name'],
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new AuthorTable(new MySQL());
$result = $table->InsertAuthor($data);

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();
if($result)
{
 header('location: ../admin/author_index.php?success_insert=true');
}
else
{
 header('location: ../admin/author_index.php?error_insert=true');
}