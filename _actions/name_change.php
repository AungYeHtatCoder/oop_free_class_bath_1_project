<?php 
include('../vendor/autoload.php');
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$auth = Auth::check(); // user table and role table join

// echo "<pre>";
// print_r($auth);
// echo "</pre>";
$name = $_POST['name'];
$table = new UsersTable(new MySQL());

//$result = $table->NameUpdate($auth->id, $name);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
if($table)
{
    $table->NameUpdate($auth->id, $name);
    $auth->name = $name;
    header("Location: ../admin/admin_profile.php?success_name=update");
}else{
    header("Location: ../admin/admin_profile.php?error_name=update");
}