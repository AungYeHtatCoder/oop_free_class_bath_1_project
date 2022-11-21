<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());

$users = $table->getAllUsers();  // user table data , role table data all 

// echo "<pre>";
// print_r($users);
// echo "</pre>";
?>

<?php
include('layouts/head.php');
?>

<body class="">
 <div class="wrapper ">
  <?php include('layouts/sidebar.php'); ?>
  <div class="main-panel">
   <!-- Navbar -->
   <?php include('layouts/navbar.php') ?>
   <!-- End Navbar -->
   <div class="content">
    <div class="content">
     <div class="container-fluid">
      <?php if(isset($_GET['user_delete']) && $_GET['user_delete'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Success!</strong> User has been Deleted.
      </div>
      <?php } else if(isset($_GET['error_name']) && $_GET['error_name'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> User has not been Deleted.
      </div>
      <?php } ?>
      <div class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
           <i class="material-icons"></i>
          </div>
          <h4 class="card-title">User List Dashboard</h4>
         </div>
         <div class="card-body">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <thead>
            <tr>
             <th>ID</th>
             <th>UserName</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Role</th>
             <th class="disabled-sorting text-right">Actions</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
             <th>ID</th>
             <th>UserName</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Role</th>
             <th class="text-right">Actions</th>
            </tr>
           </tfoot>
           <tbody>
            <?php foreach ($users as $user) : ?>
            <tr>
             <td><?= $user->id; ?></td>
             <td><?= $user->name; ?></td>
             <td><?= $user->email; ?></td>
             <td><?= $user->phone; ?></td>

             <td class="text-right">
              <a href="user_edit_form.php?id=<?= $user->id; ?>" class="btn btn-link btn-warning btn-just-icon edit"><i
                class="material-icons">edit</i></a>

              <a href="user_detail.php?id=<?= $user->id; ?>" class="btn btn-link btn-warning btn-just-icon edit"><i
                class="material-icons">visibility</i></a>

              <a href="../_actions/user_delete.php?id=<?= $user->id; ?>"
               class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
             </td>
            </tr>
            <?php endforeach; ?>
           </tbody>

          </table>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <?php include('layouts/footer.php') ?>
  </div>
 </div>
 <?php include('layouts/right_sidebar.php') ?>
 <!--   Core JS Files   -->
 <?php include('layouts/script.php') ?>