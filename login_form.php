<?php include('includes/head.php') ?>

<body class="off-canvas-sidebar">
 <!-- Navbar -->
 <?php include('includes/navbar.php') ?>
 <!-- End Navbar -->
 <div class="wrapper wrapper-full-page">
  <div class="page-header lock-page header-filter" style="background-image: url('../../assets/img/lock.jpg')">
   <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
   <div class="container">
    <div class="row">
     <div class="col-md-4 ml-auto mr-auto">
      <div class="card card-profile text-center card-hidden">
       <div class="card-header ">
        <div class="card-avatar">
         <a href="#pablo">
          <img class="img" src="assets/img/faces/avatar.jpg">
         </a>
        </div>
       </div>
       <div class="card-body ">
        <h4 class="card-title">Tania Andrew</h4>
        <div class="form-group">
         <label for="exampleInput1" class="bmd-label-floating">Enter Password</label>
         <input type="password" class="form-control" id="exampleInput1">
        </div>
       </div>
       <div class="card-footer justify-content-center">
        <a href="#pablo" class="btn btn-rose btn-round">Unlock</a>
       </div>
      </div>
     </div>
    </div>
   </div>
   <?php include('includes/footer.php') ?>
  </div>
 </div>
 <!--   Core JS Files   -->
 <?php include('includes/script.php') ?>