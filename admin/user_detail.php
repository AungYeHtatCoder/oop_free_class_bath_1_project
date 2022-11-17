<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());
$id = $_GET['id'];
$users = $table->getUserById($id);  // user table data , role table data all 

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
      <div class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
           <i class="material-icons"></i>
          </div>
          <h4 class="card-title">User detail Dashboard <span><a href="user_index.php"
             class="btn btn-primary btn-round">Back</a></span></h4>
         </div>
         <div class="card-body">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <tr>
            <th>ID</th>
            <td><?=  $users->id ?></td>
           </tr>

           <th>Name</th>
           <td><?=  $users->name ?></td>
           </tr>
           <th>Email</th>
           <td><?=  $users->email ?></td>
           </tr>
           <th>Phone</th>
           <td><?=  $users->phone ?></td>
           </tr>
           <th>Bio</th>
           <td><?=  $users->bio ?></td>
           </tr>
           <tr>
            <th>User Profile</th>
            <td>
             <img src="../_actions/profile/<?= $users->profile ?>" alt="" width="200" height="200px">
            </td>
           </tr>
           <tr>
            <th>Role</th>
            <td><?=  $users->role ?></td>
           </tr>
           <tr>
            <!-- date by month - year -->

            <th>Created At</th>
            <td><?= $users->created_at ?></td>
           </tr>
           <tr>
            <th>Updated At</th>
            <td><?= $users->updated_at ?></td>
           </tr>
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