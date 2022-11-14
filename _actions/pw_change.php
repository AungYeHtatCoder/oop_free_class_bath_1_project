<?php 
include('../vendor/autoload.php');
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$auth = Auth::check(); // user table and role table join

// echo "<pre>";
// print_r($auth);
// echo "</pre>";
$password = md5($_POST['password']);
$table = new UsersTable(new MySQL());

//$result = $table->NameUpdate($auth->id, $name);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
if($table)
{
    $table->PasswordUpdate($auth->id, $password);
    $auth->password = $password;
    header("Location: ../admin/admin_profile.php?success_password=update");
}else{
    header("Location: ../admin/admin_profile.php?error_password=update");
}