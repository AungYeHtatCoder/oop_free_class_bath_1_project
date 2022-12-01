<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\CategoryTable;
use Libs\Database\AuthorTable;
use Libs\Database\PublisherTable;
use Libs\Database\BookTable;

$book_table = new BookTable(new MySQL());
$books = $book_table->GetAllBook();

// echo "<pre>";
// print_r($books);
// echo "</pre>";
// die();

$publisher_table = new PublisherTable(new MySQL());
$publishers = $publisher_table->GetAllPublisher();

$author_table = new AuthorTable(new MySQL());
$authors = $author_table->GetAllAuthor();

$table = new CategoryTable(new MySQL());

$categories = $table->GetAllCategory();  // user table data , role table data all 

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
      <?php if(isset($_GET['success']) && $_GET['success'] == true){ ?>
      <div class="alert alert-success">
       <strong>Success!</strong> Book has been Created.
      </div>
      <?php } else if(isset($_GET['error']) && $_GET['error'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Book has not been Created.
      </div>
      <?php } ?>


      <?php if(isset($_GET['success_update']) && $_GET['success_update'] == true){ ?>
      <div class="alert alert-rose">
       <strong>Success!</strong> Book has been Updated.
      </div>
      <?php } else if(isset($_GET['error_update']) && $_GET['error_update'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Book has not been Updated.
      </div>
      <?php } ?>

      <?php if(isset($_GET['success_delete']) && $_GET['success_delete'] == true){ ?>
      <div class="alert alert-rose">
       <strong>Success!</strong> Book has been Deleted.
      </div>
      <?php } else if(isset($_GET['error_delete']) && $_GET['error_delete'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> Book has not been Deleted.
      </div>
      <?php } ?>
      <div class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
           <i class="material-icons">local_library</i>
          </div>
          <h4 class="card-title">Books List Dashboard
           <?php if($auth->value === 1) : ?>
           <span class="btn btn-rose btn-round" data-toggle="modal" data-target="#exampleModal">Create New Book</span>
           <?php endif; ?>
          </h4>
         </div>
         <div class="card-body">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <thead>
            <tr>
             <th>ID</th>
             <th>Book Title</th>
             <th>Category</th>
             <th>Author</th>
             <th>Publisher</th>
             <th>Price</th>
             <th>Book Status</th>
             <th>Created At</th>
             <th class="disabled-sorting text-right">Actions</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
             <th>ID</th>
             <th>Book Title</th>
             <th>Category</th>
             <th>Author</th>
             <th>Publisher</th>
             <th>Price</th>
             <th>Book Status</th>
             <th>Created At</th>
             <th class="disabled-sorting text-right">Actions</th>
            </tr>
           </tfoot>

           <tbody>
            <tr>
             <?php foreach($books as $book) : ?>
             <td><?= $book->id?></td>
             <td><?= $book->title?></td>
             <td><?= $book->category_name?></td>
             <td><?= $book->author_name?></td>
             <td><?= $book->publisher_name?></td>
             <td><?= $book->price?></td>
             <td><?= $book->book_status?></td>
             <td><?= $book->created_at?></td>
             <td>
              <a href="book_edit.php?id=<?= $book->id?>" class="btn btn-link btn-success btn-just-icon edit"><i
                class="material-icons">dvr</i></a>
              <a href="book_delete.php?id=<?= $book->id?>" class="btn btn-link btn-danger btn-just-icon remove"><i
                class="material-icons">close</i></a>
             </td>
            </tr>
            <?php endforeach ?>
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
       <h5 class="modal-title" id="exampleModalLabel">Create New Bool</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="modal-body">
       <form action="../_actions/book_create.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
         <label for="exampleInputEmail1">Book Title Name</label>
         <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
         <select name="category_id" class="selectpicker" data-size="7" data-style="btn btn-primary"
          title="Choose Book Category">
          <?php foreach($categories as $category) : ?>
          <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
          <?php endforeach; ?>
         </select>
        </div>

        <div class="form-group">
         <select name="author_id" class="selectpicker" data-size="7" data-style="btn btn-info" title="Choose Author">
          <?php foreach($authors as $author) : ?>
          <option value="<?= $author->id ?>"><?= $author->author_name ?></option>
          <?php endforeach; ?>
         </select>
        </div>

        <div class="form-group">
         <select name="publisher_id" class="selectpicker" data-size="7" data-style="btn btn-warning"
          title="Choose Publisher">
          <?php foreach($publishers as $publisher) : ?>
          <option value="<?= $publisher->id ?>"><?= $publisher->publisher_name ?></option>
          <?php endforeach; ?>
         </select>
        </div>
        <div class="form-group">
         <label for="publish_date">Publish Date</label>
         <input name="publish_date" type="text" class="form-control datepicker" value="10/06/2018">
        </div>
        <div class="form-group">
         <label for="Book Edition">Book Edititon</label>
         <input type="text" name="edition" id="" class="form-control">
        </div>
        <div class="form-group">
         <label for="Book Volume">Book Volume</label>
         <input type="text" name="volume" id="" class="form-control">
        </div>
        <div class="form-group">
         <label for="Book Price">Book ISBN</label>
         <input type="text" name="isnb" id="" class="form-control">
        </div>
        <div class="form-group">
         <label for="price"> Book Price</label>
         <input type="number" class="form-control" name="price">
        </div>
        <div class="form-group">
         <label for="Book Description">Book Description</label>
         <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="col-md-4 col-sm-4">
         <h4 class="title">Book Cover</h4>
         <div class="fileinput fileinput-new text-center" data-provides="fileinput">
          <div class="fileinput-new thumbnail">
           <img src="../../assets/img/image_placeholder.jpg" alt="...">
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail"></div>
          <div>
           <span class="btn btn-rose btn-round btn-file">
            <span class="fileinput-new">Select Cover</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="cover_image" />
           </span>
           <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
             class="fa fa-times"></i> Remove</a>
          </div>
         </div>
        </div>

      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="submit" class="btn btn-primary" value="Category Create">
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

 <script>
 $(document).ready(function() {
  // initialise Datetimepicker and Sliders
  md.initFormExtendedDatetimepickers();
  if ($('.slider').length != 0) {
   md.initSliders();
  }
 });
 </script>