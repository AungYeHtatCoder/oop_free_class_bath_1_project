<?php 
include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\BookTable;
use Helpers\Auth;
$auth = Auth::check();

$filename = $_FILES['cover_image']['name'];
$tmp = $_FILES['cover_image']['tmp_name'];
$errors = $_FILES['cover_image']['error'];
$type = $_FILES['cover_image']['type'];

$data = [
 'title' => $_POST['title'],
 'category_id' => $_POST['category_id'],
 'author_id' => $_POST['author_id'],
 'publisher_id' => $_POST['publisher_id'],
 'publish_date' => $_POST['publish_date'],
 'edition' => $_POST['edition'],
 'volume' => $_POST['volume'],
 'isnb' => $_POST['isnb'],
 'price' => $_POST['price'],
 'description' => $_POST['description'],
 'cover_image' => $filename,
 'user_id' => $auth->id,
 'book_status' => 1,
 
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new BookTable(new MySQL());
//$result = $table->InsertBook($data);

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

if($errors)
{
    header("Location: ../admin/book_create.php?=error");
}
if($type === "image/jpeg" or $type === "image/png")
{
    $table->InsertBook($data);
    move_uploaded_file($tmp, "cover_image/$filename");
    header("Location: ../admin/book_index.php?success=book created successfully");
}else{
    header("Location: ../admin/book_index.php?error=book not created");
}