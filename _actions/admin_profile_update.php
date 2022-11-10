<?php 
include('../vendor/autoload.php');
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;


$auth = Auth::check();
$table = new UsersTable(new MySQL());

// profile image upload
$filename = $_FILES['profile']['name'];
$error = $_FILES['profile']['error'];
$tmp = $_FILES['profile']['tmp_name'];
$type = $_FILES['profile']['type'];


if($error)
{
    header("Location: ../admin/admin_profile.php?=error");
}
if($type === "image/jpeg" or $type === "image/png")
{
    $table->ProfileUpdate($auth->id, $filename);
    move_uploaded_file($tmp, "profile/$filename");
    $auth->profile_image = $filename;
    if($auth->value == 1)
    {
        header("Location: ../admin/admin_profile.php?success_profile=update");
    }else{
        header("Location: ../admin/admin_profile.php?success_profile=update");
    }
}