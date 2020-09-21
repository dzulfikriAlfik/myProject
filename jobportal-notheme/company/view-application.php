<?php  
session_start();
if( empty($_SESSION['id_company']) ) {
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
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </header>

  <div class="container">

    <div class="row">

      <div class="panel panel-info">
        <div class="panel-heading">User Application</div>
        <div class="panel-body">
          
          <?php 

          $sql = "SELECT * FROM apply_job_post INNER JOIN users ON apply_job_post.id_user=users.id_user WHERE apply_job_post.id_user='$_GET[id_user]' AND apply_job_post.id_jobpost='$_GET[id_job]' AND apply_job_post.status='0' ";

          $result = $conn->query($sql);

          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>

              <p>Name : <?= $row['firstname'] . " " . $row['lastname']; ?></p>
              <p>Email : <?= $row['email']; ?></p>
              <p>Address : <?= $row['address']; ?></p>
              <p>City : <?= $row['city']; ?></p>
              <p>State : <?= $row['state']; ?></p>
              <p>Contact No : <?= $row['contactno']; ?></p>
              <p>Qualification : <?= $row['qualification']; ?></p>
              <p>Stream : <?= $row['stream']; ?></p>
              <p>Passing Year : <?= $row['passingyear']; ?></p>
              <p>Date Of Birth : <?= $row['dob']; ?></p>
              <p>Designation : <?= $row['designation']; ?></p>
              <?php

              if( !empty($row['resume']) ) { ?>
                
                <a href="../uploads/resume/<?= $row['resume']; ?>" class="btn btn-success" download="<?= $row['firstname'].'Resume'; ?>">Download Resume</a>

              <?php } ?>

                <a href="reject-user.php?id_user=<?= $_GET['id_user']; ?>&id_jobpost=<?= $row['id_jobpost']; ?>&email=<?= $row['email']; ?>" class="btn btn-danger">Reject User</a>  

          <?php }
              } else {header("Location: dashboard.php"); exit();}
          ?> 

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