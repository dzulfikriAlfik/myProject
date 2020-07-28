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

    <link rel="icon" href="../assets/logo.png" type="image/ico" />

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
              <li><a href="profile.php">Profile</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </header>

  <div class="container">
    
  <!-- SESSION UPADTE SUCCESS -->
  <?php if( isset($_SESSION['updateSuccess']) ) { ?>
  <div class="row">
    <div class="col-md-12 successMessage">
      <div class="alert alert-success">
        Youre Profile Successfully Updated !
      </div> 
    </div>
  </div>
  <?php  
  unset($_SESSION['updateSuccess']); }
  ?>

  <!-- SESSION jobApply SUCCESS -->
  <?php if( isset($_SESSION['jobApplySuccess']) ) { ?>
  <div class="row">
    <div class="col-md-12 successMessage">
      <div class="alert alert-success">
        You Have Successfully Applied !
      </div> 
    </div>
  </div>
  <?php  
  unset($_SESSION['jobApplySuccess']); }
  ?>

    <!-- other dashboard functions -->
    <div class="row">
    <h3 class="text-center">My Dashboard</h3>
      <div class="col-md-2">
        <a href="applied-jobs.php" class="btn btn-success">Applied Jobs</a>
      </div>
      <div class="col-md-2">
        <a href="resume.php" class="btn btn-success">Resume</a>
      </div>
    </div>

    <!-- Search and apply to job post -->
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped">
          <h3 class="text-center">Active Jobs</h3>

            <thead>
              <th>Job Title</th>
              <th>Job Description</th>
              <th>Minimum Salary</th>
              <th>Maximum Salary</th>
              <th>Experience Required</th>
              <th>Qualification Required</th>
              <th>Created At</th>
              <th>Action</th>
            </thead>

            <tbody>
              <?php  

              $sql = "SELECT * FROM job_post";
              $result = $conn->query($sql);
              if( $result->num_rows > 0 ) {
                // output data
                while($row = $result->fetch_assoc()) { 
                  $sql1 = "SELECT * FROM apply_job_post WHERE id_user = $_SESSION[id_user] AND id_jobpost = $row[id_jobpost] ";
                  $result1 = $conn->query($sql1);
                  ?>

                  <tr>
                    <td><?= $row['jobtitle']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['minimumsalary']; ?></td>
                    <td><?= $row['maximumsalary']; ?></td>
                    <td><?= $row['experience']; ?></td>
                    <td><?= $row['qualification']; ?></td>
                    <td><?= date("d-M-Y", strtotime($row['createdat'])); ?></td>

                    <?php  
                    if ( $result1->num_rows > 0 ) { ?>
                      <td>
                        <strong style="color: red" class="text-center">Applied</strong>
                      </td>
                    <?php }  
                    else { ?>
                      <td>
                        <a href="apply-job-post.php?id=<?= $row['id_jobpost']; ?>">Apply</a>
                      </td>
                    <?php } ?>

                  </tr>
                  
              <?php }
              }
              $conn->close(); 
              ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>

  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/JavaScript">
      $(function() {
        $(".successMessage:visible").fadeOut(2000);
      });
    </script>

  </body>
</html>