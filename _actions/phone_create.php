<?php 
include('../vendor/autoload.php');
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$auth = Auth::check(); // user table and role table join

// echo "<pre>";
// print_r($auth);
// echo "</pre>";
$phone = $_POST['phone'];
$table = new UsersTable(new MySQL());

//$result = $table->NameUpdate($auth->id, $name);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
if($table)
{
    $table->PhoneUpdate($auth->id, $phone);
    $auth->phone = $phone;
    header("Location: ../admin/admin_profile.php?success_phone=update");
}else{
    header("Location: ../admin/admin_profile.php?error_phone=update");
}