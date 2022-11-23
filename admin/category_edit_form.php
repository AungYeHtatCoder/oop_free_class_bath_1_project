<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\CategoryTable;

$table = new CategoryTable(new MySQL());

$categories = $table->GetCategoryById($_GET['id']);  // user table data , role table data all 

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
          <h4 class="card-title">Category Update Dashboard</h4>
         </div>
         <div class="card-body">
          <form action="../_actions/update_category.php" method="post">
           <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
           <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" name="category_name" value="<?= $categories->category_name?>">
           </div>

           <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Category Update">
           </div>
          </form>
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