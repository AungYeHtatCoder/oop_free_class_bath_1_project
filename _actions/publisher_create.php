<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\PublisherTable;

$data = [
 'publisher_name' => $_POST['publisher_name'],
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new PublisherTable(new MySQL());
$result = $table->InsertPublisher($data);

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();
if($result)
{
 header('location: ../admin/publisher_index.php?success_insert=true');
}
else
{
 header('location: ../admin/publisher_index.php?error_insert=true');
}