<?php  
session_start();
if( empty($_SESSION['id_user']) ) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
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
            <a class="navbar-brand" href="../index.php">Job Portal</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="dashboard.php">Dashboard</a></li>
              <li class="active"><a href="profile.php">Profile</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 well">
          <h2 class="text-center">Profile</h2>

            <form method="post" action="updateprofile.php">
            <?php  

            $sql = "SELECT * FROM users WHERE id_user = $_SESSION[id_user] ";
            $result = $conn->query($sql);

            if( $result->num_rows > 0 ) :
              while( $row = $result->fetch_assoc() ) : ?>

              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?= $row['firstname']; ?>" required="required">
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?= $row['lastname']; ?>" required="required">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $row['email']; ?>" readonly="readonly">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="5" placeholder="Address"><?= $row['address']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?= $row['city']; ?>">
              </div>
              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?= $row['state']; ?>">
              </div>
              <div class="form-group">
                <label for="contactno">Contact Number</label>
                <input type="text" class="form-control" id="contactno" name="contactno" minlength="10" maxlength="12" autocomplete="off" onkeypress="return validatePhone(event);" placeholder="Contact Number" value="<?= $row['contactno']; ?>">
              </div>
              <div class="form-group">
                <label for="qualification">Highest Qualification</label>
                <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Highest Qualification" value="<?= $row['qualification']; ?>">
              </div>
              <div class="form-group">
                <label for="stream">Stream</label>
                <input type="text" class="form-control" id="stream" name="stream" placeholder="Stream" value="<?= $row['stream']; ?>">
              </div>
              <div class="form-group">
                <label for="passingyear">Passing Year</label>
                <input type="date" class="form-control" id="passingyear" name="passingyear" placeholder="Passing Year" value="<?= $row['passingyear']; ?>">
              </div>
              <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" min="1970-01-01" max="2002-12-31" value="<?= $row['dob']; ?>">
              </div>
              <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?= $row['age']; ?>" readonly="readonly">
              </div>
              <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?= $row['designation']; ?>">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="reset" class="btn btn-primary">Reset</button>
              </div>
              <br>
            <?php endwhile;
            endif; 
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

    <script type="text/javascript">
      
      $('#dob').on('change', function() {

        var today = new Date();
        var birthDate = new Date($(this).val());
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();

        if( m < 0 || (m === 0 && today.getDate() < birthDate.getDate()) ) {
          age--;
        }

        $('#age').val(age);

      });

    </script>

  </body>
</html>