<?php  
session_start();
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

    <link rel="icon" href="assets/logo.png" type="image/ico" />
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
            <?php else :
            if(isset($_SESSION['id_company']) ) : ?>
              <li><a href="company/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php else :
              if(isset($_SESSION['id_admin']) ) : ?>
              <li><a href="admin/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php else : ?>
              <li><a href="admin/index.php">Admin</a></li>
              <li><a href="company.php">Company</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
            <?php endif;
              endif;
            endif ?>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </header>

    <!-- JUMBOTRON  -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron text-center">
              <h1>Job Portal</h1>
              <p>Find Your Dream Job</p>
              <!-- <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a></p> -->
              <p><a class="btn btn-primary btn-lg" href="search.php" role="button">Search Job</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- LATEST JOB POST -->
    <section>
      <div class="container">
        <div class="row">
          <h2 class="text-center">Latest Job Posts</h2>
        </div>

        <?php  

        $sql = "SELECT * FROM job_post Order By Rand() Limit 4 ";

        $result = $conn->query($sql);

        if( $result->num_rows > 0 ) {
          // output data
          while($row = $result->fetch_assoc()) { ?>

            <div class="col-md-6 fixHeight">
              <h3><?= $row['jobtitle']; ?></h3>
              <p><?= $row['description']; ?></p>
              <button class="btn btn-default">View</button>
            </div>
            
        <?php }
        }
        $conn->close(); 
        ?>
        
      </div>
    </section>

    <!-- COMPANIES LIST -->
    <section>
       <div class="container">
         <div class="row">

           <h2 class="text-center">Companies List</h2>
           <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
              <img src="..." alt="...">
            </a>
          </div>
           <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
              <img src="..." alt="...">
            </a>
          </div>
           <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
              <img src="..." alt="...">
            </a>
          </div>
           <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
              <img src="..." alt="...">
            </a>
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
        var maxHeight = 0;

        $(".fixHeight").each(function() {
          maxHeight = ($(this).height() > maxHeight ? $(this).height() : maxHeight) ;
        });

        $(".fixHeight").height(maxHeight);

      });
    </script>

  </body>
</html>