<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\RoleTable;

$table = new RoleTable(new MySQL());

$roles = $table->GetAllRoles();  // user table data , role table data all 

// echo "<pre>";
// print_r($roles);
// echo "</pre>";

// die();
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
      <?php if(isset($_GET['success_insert']) && $_GET['success_insert'] == true){ ?>
      <div class="alert alert-success">
       <strong>Success!</strong> Role has been Created.
      </div>
      <?php } else if(isset($_GET['error_insert']) && $_GET['error_insert'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Role has not been Created.
      </div>
      <?php } ?>


      <?php if(isset($_GET['success_update']) && $_GET['success_update'] == true){ ?>
      <div class="alert alert-rose">
       <strong>Success!</strong> Role has been Updated.
      </div>
      <?php } else if(isset($_GET['error_update']) && $_GET['error_update'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Role has not been Updated.
      </div>
      <?php } ?>

      <?php if(isset($_GET['success_delete']) && $_GET['success_delete'] == true){ ?>
      <div class="alert alert-rose">
       <strong>Success!</strong> Role has been Deleted.
      </div>
      <?php } else if(isset($_GET['error_delete']) && $_GET['error_delete'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Role has not been Deleted.
      </div>
      <?php } ?>
      <div class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
           <i class="material-icons"></i>
          </div>
          <h4 class="card-title">Role List Dashboard <span class="btn btn-rose btn-round" data-toggle="modal"
            data-target="#exampleModal">Create Role</span></h4>
         </div>
         <div class="card-body">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <thead>
            <tr>
             <th>ID</th>
             <th>Role Name</th>
             <th>Role Value</th>
             <th class="disabled-sorting text-right">Actions</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
             <th>ID</th>
             <th>Role Name</th>
             <th>Role Value</th>
             <th class="text-right">Actions</th>
            </tr>
           </tfoot>
           <tbody>
            <?php foreach ($roles as $role) : ?>
            <tr>
             <td><?= $role->id; ?></td>
             <td><?= $role->name; ?></td>
             <td><?= $role->value; ?></td>
             <td class="text-right">
              <a href="role_edit_form.php?id=<?= $role->id; ?>" class="btn btn-link btn-warning btn-just-icon edit"><i
                class="material-icons">edit</i></a>

              <a href="role_detail.php?id=<?= $role->id; ?>" class="btn btn-link btn-warning btn-just-icon edit"><i
                class="material-icons">visibility</i></a>

              <a href="../_actions/role_delete.php?id=<?= $role->id; ?>"
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


   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="modal-body">
       <form action="../_actions/create_role.php" method="post">
        <div class="form-group">
         <label for="exampleInputEmail1">Role Name</label>
         <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
         <label for="exampleInputPassword1">Role Value</label>
         <input type="number" class="form-control" name="value" id="exampleInputPassword1">
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <input type="submit" class="btn btn-primary" value="Role Create">
        </div>
       </form>
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