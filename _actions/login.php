<?php 
session_start();
include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

// $data = [
//     'email' => $_POST['email'],
//     'password' => md5($_POST['password']),
//     //'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
//     //'password' => hash('sha256', $_POST['password']),
// ];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$email = $_POST['email'];
$password = md5($_POST['password']);

$table = new UsersTable(new MySQL);
$user = $table->UserLogin($email, $password);

// echo "<pre>";
// print_r($result);
// echo "</pre>";

if($user->value == 1){
    $_SESSION['user'] = $user;
    header('location: ../admin/admin_profile.php');
}else{
 echo "You are not admin";
}