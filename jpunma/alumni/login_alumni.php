<?php
  session_start(); 
if(isset($_SESSION['id_user'])) {
  header("Location: login_alumni.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../css/images/unma.jpg" type="image/ico">

    <title>JP-Unma | Job Portal Universitas Majalengka </title>

    <!-- Bootstrap -->
    <link href="../css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../css/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../css/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form  method="post" action="ceklogin-alumni.php">
              <h1><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Login Alumni</h1>
              <div>
                <input type="npm" class="form-control" id="npm" name="npm" placeholder="NPM" required="">
              </div>
              <p></p>
              <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required="">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">MASUK</button>
              </div>
<!-- ceklogin-alumni -->   
<?php 
if(isset($_SESSION['loginError'])) {
  ?>
  <div>
    <br>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <h5>NPM / Password Salah ! Silahkan Coba Lagi</h5>
    </div>
  </div>
<?php
 unset($_SESSION['loginError']); }
?>

              <div class="clearfix"></div>

              <div class="separator">
                  <a href="../admin/login_admin.php" style="font-size: 20px">Admin</a>
                  <a style="font-size: 20px"> | </a>
                  <a href="../index.php" style="font-size: 20px">Home</a>
                <div class="clearfix"></div>
              <div class="separator">

                  <p>©2018 All Rights Reserved Designed by Dzulfikri </p>

              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
