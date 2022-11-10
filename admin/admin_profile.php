<?php 
include('../vendor/autoload.php');
use Helpers\Auth;

$auth = Auth::check();

// echo "<pre>";
// print_r($auth);
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
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header card-header-icon card-header-rose">
         <div class="card-icon">
          <i class="material-icons">perm_identity</i>
         </div>
         <h4 class="card-title">Edit Profile -
          <small class="category">Complete your profile</small>
         </h4>
        </div>
        <div class="card-body">
         <form>
          <div class="row">
           <div class="col-md-5">
            <div class="form-group">
             <label class="bmd-label-floating">Company (disabled)</label>
             <input type="text" class="form-control" disabled>
            </div>
           </div>
           <div class="col-md-3">
            <div class="form-group">
             <label class="bmd-label-floating">Username</label>
             <input type="text" class="form-control">
            </div>
           </div>
           <div class="col-md-4">
            <div class="form-group">
             <label class="bmd-label-floating">Email address</label>
             <input type="email" class="form-control">
            </div>
           </div>
          </div>
          <div class="row">
           <div class="col-md-6">
            <div class="form-group">
             <label class="bmd-label-floating">Fist Name</label>
             <input type="text" class="form-control">
            </div>
           </div>
           <div class="col-md-6">
            <div class="form-group">
             <label class="bmd-label-floating">Last Name</label>
             <input type="text" class="form-control">
            </div>
           </div>
          </div>
          <div class="row">
           <div class="col-md-12">
            <div class="form-group">
             <label class="bmd-label-floating">Adress</label>
             <input type="text" class="form-control">
            </div>
           </div>
          </div>
          <div class="row">
           <div class="col-md-4">
            <div class="form-group">
             <label class="bmd-label-floating">City</label>
             <input type="text" class="form-control">
            </div>
           </div>
           <div class="col-md-4">
            <div class="form-group">
             <label class="bmd-label-floating">Country</label>
             <input type="text" class="form-control">
            </div>
           </div>
           <div class="col-md-4">
            <div class="form-group">
             <label class="bmd-label-floating">Postal Code</label>
             <input type="text" class="form-control">
            </div>
           </div>
          </div>
          <div class="row">
           <div class="col-md-12">
            <div class="form-group">
             <label>About Me</label>
             <div class="form-group">
              <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat
               Lambo.</label>
              <textarea class="form-control" rows="5"></textarea>
             </div>
            </div>
           </div>
          </div>
          <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
          <div class="clearfix"></div>
         </form>
        </div>
       </div>
      </div>
      <div class="col-md-4">
       <div class="card card-profile">
        <div class="card-avatar">
         <a href="#pablo">
          <img class="img" src="../_actions/profile/<?= $auth->profile ?>" />
         </a>
        </div>
        <div class="card-body">
         <h4 class="card-category text-gray">User Name : &nbsp; &nbsp; <span
           class="badge badge-primary"><?= $auth->name ?></span></h4>
         <h4 class="card-title">User Role : &nbsp; &nbsp; <span class="badge badge-info"><?= $auth->role ?></span></h4>
         <h4 class="card-description">
          User Email : &nbsp; &nbsp; <span class="badge badge-warning"><?= $auth->email ?></span>
         </h4>
         <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
        </div>
       </div>

       <!-- profile update start -->

       <div class="card card-profile mt-5">
        <div class="col-md-4 col-sm-4">
         <h4 class="title text-center">Profile Update</h4>
         <form action="../_actions/admin_profile_update.php" method="POST" enctype="multipart/form-data">
          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
           <div class="fileinput-new thumbnail">
            <img src="../../assets/img/image_placeholder.jpg" alt="...">
           </div>
           <div class="fileinput-preview fileinput-exists thumbnail"></div>
           <div>
            <span class="btn btn-rose btn-round btn-file">
             <span class="fileinput-new">Select image</span>
             <span class="fileinput-exists">Change</span>
             <input type="file" name="profile" />
            </span>
            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
              class="fa fa-times"></i> Remove</a>
           </div>

           <div class="mb-3">
            <input type="submit" class="btn btn-primary btn-round" value="Profile Update">
           </div>
          </div>
         </form>
        </div>
       </div>
       <!-- profile udate end -->
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