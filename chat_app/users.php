<?php 
session_start();
include_once('header.php');
include_once('action/config.php');
if(!isset($_SESSION['unique_id'])) {
   header("Location: login.php");
}

?>

<body>

   <div class="wrapper">
      <section class="users">
         <header>
            <?php 
            $unique_id = $_SESSION['unique_id'];
            $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}'");
            if(mysqli_num_rows($query) > 0) {
               $row = mysqli_fetch_assoc($query);
            }
            ?>
            <div class="content">
               <img src="assets/img/users/<?= $row['img']; ?>" alt="">
               <div class="details">
                  <span><?= $row['first_name'] . " " . $row['last_name']; ?></span>
                  <p><?= $row['status']; ?></p>
               </div>
            </div>
            <a href="logout.php" class="logout">Logout</a>
         </header>
         <div class="search">
            <span class="text">Select a user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
         </div>
         <div class="users-list">
            
         </div>
      </section>
   </div>

<!-- Script -->
<script src="assets/js/users.js"></script>

</body>

</html>