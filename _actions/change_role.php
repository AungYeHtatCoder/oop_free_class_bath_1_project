<?php 
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$id = $_POST['id'];
$role_id = $_POST['role_id'];

$table = new UsersTable(new MySQL());
if($table)
{
    $table->updateRole($id, $role_id);
    header("Location: ../admin/user_index.php?success_ch_role=1");
}
else
{
    header("Location: ../admin/user_index.php?error_ch_role=1");
}