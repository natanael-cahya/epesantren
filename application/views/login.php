<?php
if (!empty($_SESSION['level'])){
      if($_SESSION['level'] == '1'){
        redirect('admin/admin');
      }else if($_SESSION['level'] == '2'){
        redirect('pengasuhan/pengasuhan');
      }else if($_SESSION['level'] == '3'){
        redirect('pengajar/pengajar');
      }else if($_SESSION['level'] == '4'){
        redirect('organtri/organtri');
      }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Page</title>

  <!-- Bootstrap core CSS-->
  <link href="<?= base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="<?= base_url('assets'); ?>/img/logo.png" type="image/x-icon" />
  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>css/sb-admin.css" rel="stylesheet">

</head>

<body style="background-color: #00B785;">
  <br><br><br><br><br>
  <div class="container" style="opacity:0.9;">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" style="text-align: center; color: white; background-color: #007F5C;">Login E-PESANTREN</div>
      <div class="card-body">
        <form name="f1" method="post" action="<?= base_url('login'); ?>">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" name="user" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>

          <button style="background-color: #007F5C; color: white;" class="btn btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="" onclick="alert('silahkan kontak Admin')">Register an Account</a>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>