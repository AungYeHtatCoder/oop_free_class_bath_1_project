<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\AuthorTable;

$data = [
 'id' => $_POST['id'],
 'author_name' => $_POST['author_name'],
];

$table = new AuthorTable(new MySQL());
$result = $table->UpdateAuthor($data);

if($result)
{
 header('location: ../admin/author_index.php?success_update=true');
}
else
{
 header('location: ../admin/author_index.php?error_update=true');
}