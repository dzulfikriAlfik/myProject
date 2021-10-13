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
      <section class="chat-area">
         <header>
            <?php 
               $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
               $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'");
               if(mysqli_num_rows($query) > 0) {
                  $row = mysqli_fetch_assoc($query);
               }
            ?>
            <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="assets/img/users/<?= $row['img']; ?>" alt="">
            <div class="details">
               <span><?= $row['first_name'] . " " . $row['last_name']; ?></span>
               <p><?= $row['status']; ?></p>
            </div>
         </header>
         <div class="chat-box">
            
         </div>
         <form action="#" class="typing-area">
            <input type="text" name="outgoing_id" value="<?= $_SESSION['unique_id']; ?>" hidden>
            <input type="text" name="incoming_id" value="<?= $user_id; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here ...">
            <button><i class="fab fa-telegram-plane"></i></button>
         </form>
      </section>
   </div>

   <!-- script -->
   <script src="assets/js/chat.js"></script>

</body>

</html>