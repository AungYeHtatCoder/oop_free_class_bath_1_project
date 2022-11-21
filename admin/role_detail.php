<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\RoleTable;
$table = new RoleTable(new MySQL());
$roles = $table->GetRoleById($_GET['id']);  // user table data , role table data all 
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
          <h4 class="card-title">Role Detail Dashboard</h4>
         </div>
         <div class="card-body">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <tr>
            <th>Id</th>
            <td><?= $roles->id; ?></td>
           </tr>
           <tr>
            <th>Name</th>
            <td><?= $roles->name; ?></td>
           </tr>
           <tr>
            <th>Value</th>
            <td><?= $roles->value; ?></td>
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