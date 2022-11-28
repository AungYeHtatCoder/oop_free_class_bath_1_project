<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\AuthorTable;

$table = new AuthorTable(new MySQL());

$authors = $table->GetAllAuthor();  // user table data , role table data all 

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
       <strong>Success!</strong> Author has been Created.
      </div>
      <?php } else if(isset($_GET['error_insert']) && $_GET['error_insert'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Author has not been Created.
      </div>
      <?php } ?>


      <?php if(isset($_GET['success_update']) && $_GET['success_update'] == true){ ?>
      <div class="alert alert-rose">
       <strong>Success!</strong> Author has been Updated.
      </div>
      <?php } else if(isset($_GET['error_update']) && $_GET['error_update'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Author has not been Updated.
      </div>
      <?php } ?>

      <?php if(isset($_GET['success_delete']) && $_GET['success_delete'] == true){ ?>
      <div class="alert alert-rose">
       <strong>Success!</strong> Author has been Deleted.
      </div>
      <?php } else if(isset($_GET['error_delete']) && $_GET['error_delete'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Author has not been Deleted.
      </div>
      <?php } ?>
      <div class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
           <i class="material-icons">local_library</i>
          </div>
          <h4 class="card-title">Author List Dashboard
           <?php if($auth->value === 1) : ?>
           <span class="btn btn-rose btn-round" data-toggle="modal" data-target="#exampleModal">Create Author</span>
           <?php endif; ?>
          </h4>
         </div>
         <div class="card-body">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <thead>
            <tr>
             <th>ID</th>
             <th>Author Name</th>
             <th>Created At</th>
             <th>Updated At</th>
             <th class="disabled-sorting text-right">Actions</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
             <th>ID</th>
             <th>Author Name</th>
             <th>Created At</th>
             <th>Updated At</th>
             <th class="text-right">Actions</th>
            </tr>
           </tfoot>
           <tbody>
            <?php foreach ($authors as $author) : ?>
            <tr>
             <td><?= $author->id; ?></td>
             <td><?= $author->author_name; ?></td>
             <td><?= date('F j, Y', strtotime($author->created_at)); ?></td>
             <td><?= date('F j, Y', strtotime($author->updated_at)); ?></td>
             <td class="text-right">
              <?php if($auth->value === 1) : ?>
              <a href="author_edit_form.php?id=<?= $author->id; ?>"
               class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">edit</i></a>

              <?php endif; ?>

              <a href="author_detail.php?id=<?= $author->id; ?>" class="btn btn-link btn-warning btn-just-icon edit"><i
                class="material-icons">visibility</i></a>
              <?php if($auth->value === 1) : ?>
              <a href="../_actions/author_delete.php?id=<?= $author->id; ?>"
               class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
              <?php endif; ?>
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
       <h5 class="modal-title" id="exampleModalLabel">Create New Author</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="modal-body">
       <form action="../_actions/author_create.php" method="post">
        <div class="form-group">
         <label for="exampleInputEmail1">Author Name</label>
         <input type="text" class="form-control" name="author_name" id="exampleInputEmail1"
          aria-describedby="emailHelp">
        </div>

        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <input type="submit" class="btn btn-primary" value="New Author Create">
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