<?php  
session_start();
if( isset($_SESSION['id_user']) ) {
  header("Location: user/dashboard.php");
  exit();
}
require_once("db.php");
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
              <li><a href="login.php">Login</a></li>
            <?php endif ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 well">
          <h2 class="text-center"> Company Register</h2>
          <hr>
            <form method="post" action="addcompany.php">
              <div class="form-group">
                <label for="companyname">Company Name</label>
                <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name" required="required">
              </div>
              <div class="form-group">
                <label for="headofficecity">Head Office City</label>
                <input type="text" class="form-control" id="headofficecity" name="headofficecity" placeholder="Head Office City" required="required">
              </div>
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control" name="provinsi" id="provinsi">
                  <option value="" selected="">-- Pilih Provinsi --</option>
                  <?php  

                  $sql = "SELECT * FROM provinsi";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while ( $row = $result->fetch_assoc() ) {
                      echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
                    }
                  }

                  ?>
                </select>
              </div>
              <div id="kotaDiv" class="form-group" style="display: none">
                <label for="kota">Kabupaten/Kota</label>
                <select class="form-control" name="kota" id="kota">
                  <option value="" selected="">-- Select Kota --</option>
                </select>
              </div>
              <div id="kecDiv" class="form-group" style="display: none">
                <label for="kecamatan">Kecamatan</label>
                <select class="form-control" name="kecamatan" id="kecamatan">
                  <option value="" selected="">-- Select Kecamatan --</option>
                </select>
              </div>
              <div class="form-group">
                <label for="contactno">Contact Number</label>
                <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" minlength="10" maxlength="12" autocomplete="off" onkeypress="return validatePhone(event);" required="required">
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="Website">
              </div>
              <div class="form-group">
                <label for="companytype">Company Type</label>
                <input type="text" class="form-control" id="companytype" name="companytype" placeholder="Company Type" required="required">
              </div>
              <div class="form-group">
                <label for="email">Company Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Register</button>
                <button type="reset" class="btn btn-primary">Reset</button>
              </div>
              <br>
              <!-- LOGIN ERROR -->
              <?php  
              if(isset($_SESSION['registerError'])) {
                ?>
                <div id="successMessage">
                  <p class="text-center">Email is already exist, choose another email to register !</p>
                </div>
              <?php 
                unset($_SESSION['registerError']); }
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

    <script type="text/javascript">

      function validatePhone(event) {

        var key = window.event ? event.keyCode : event.which;

        if( event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39 ) {
          // 8 means backspace
          // 46 means delete
          // 37 means left arrow
          // 39 means right arrow
          return true;

        } else if( key < 48 || key > 57 ) { //48-57 is 0-9 number on keyboard
          return false;

        } else return true;

      }

    </script>

    <script>
      $("#provinsi").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#kota").find('option:not(:first)').remove();
        if(id != '') {
          $.post("kota.php", {id: id}).done(function(data) {
            $("#kota").append(data);
          });
          $('#kotaDiv').show();
        } else {
          $('#kotaDiv').hide();
          $('#kecDiv').hide();
        }
      });
    </script>

    <script>
      $("#kota").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#kecamatan").find('option:not(:first)').remove();
        if(id != '') {
          $.post("kecamatan.php", {id: id}).done(function(data) {
            $("#kecamatan").append(data);
          });
          $('#kecDiv').show();
        } else {
          $('#kecDiv').hide();
        }
      });
    </script>

  </body>
</html>