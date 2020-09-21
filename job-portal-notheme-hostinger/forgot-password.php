<?php  
session_start();
if( isset($_SESSION['id_user']) ) {
  header("Location: user/dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Job Portal</title>
    
    <link rel="icon" href="https://sg-files.hostinger.co.id/handler.php?action=download?action=download&path=%2Fpublic_html%2Fassets%2Flogo.png" type="image/ico" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
      
      <!-- NAVIGATION BAR -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Job Portal</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <?php  
            if( isset($_SESSION['id_user']) ) : ?>
              <li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php else : ?>
              <li><a href="admin/index.php">Admin</a></li>
              <li><a href="company.php">Company</a></li>
              <li><a href="register.php">Register</a></li>
              <li class="active"><a href="login.php">Login</a></li>
            <?php endif ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </header>

    <section>
      <div class="container">
        <div class="row">

          <!-- CallFrom -->
          <?php  
          if(isset($_SESSION['callFrom1'])) {
            ?>
            <div id="successMessage" class="text-center alert alert-danger col-md-4 col-md-offset-4">
              <p>You have To Login First</p>
            </div>
          <?php 
            unset($_SESSION['callFrom1']); }
          ?>

          <div class="col-md-4 col-md-offset-4 well">
          <h2 class="text-center">Forgot Password</h2>
            <form method="post" action="passwordreset.php">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
              </div><div class="form-group">
                  <a href="login.php">Back To Login</a>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Reset Password</button>
              </div>
              <br>

              <!-- REGISTER COMPLETE -->
              <?php  
              if(isset($_SESSION['emailNotFoundError'])) {
                ?>
                <div>
                  <p id="successMessage" class="text-center">This Email is Not Exists in Database</p>
                </div>
              <?php 
                unset($_SESSION['emailNotFoundError']); }
              ?>

              <!-- LOGIN ERROR -->
              <?php  
              if(isset($_SESSION['passwordChanged'])) {
                ?>
                <div>
                  <p id="successMessage" class="text-center">Check Your Email For New Password</p>
                </div>
              <?php 
                unset($_SESSION['passwordChanged']); }
              ?>

            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/JavaScript">
      $(function() {
        $("#successMessage:visible").fadeOut(2000);
      });
    </script>

  </body>
</html>
