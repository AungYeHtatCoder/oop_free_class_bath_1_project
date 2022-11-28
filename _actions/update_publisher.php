<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\PublisherTable;

$data = [
 'id' => $_POST['id'],
 'publisher_name' => $_POST['publisher_name'],
];

$table = new PublisherTable(new MySQL());
$result = $table->UpdatePublisher($data);

if($result)
{
 header('location: ../admin/publisher_index.php?success_update=true');
}
else
{
 header('location: ../admin/publisher_index.php?error_update=true');
}