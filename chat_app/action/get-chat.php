<?php 
session_start();
if(isset($_SESSION['unique_id'])) {
   include_once('config.php');
   $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
   $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
   $output = "";
   $query = "SELECT * FROM messages left JOIN users ON users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) 
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC ";
   $sql = mysqli_query($conn, $query);
   if(mysqli_num_rows($sql) > 0) {
      while($row = mysqli_fetch_assoc($sql)) {
         if($row['outgoing_msg_id'] === $outgoing_id) { //if this is equal to then he is a sender
            $output .= '<div class="chat outgoing">
                           <div class="details">
                              <p>'. $row['messages'] .'</p>
                           </div>
                        </div>';
         } else { //he is message receiver
            $output .= '<div class="chat incoming">
                           <img src="assets/img/users/'. $row['img'] .'" alt="">
                           <div class="details">
                              <p>'. $row['messages'] .'</p>
                           </div>
                        </div>';
         }
      }
      echo $output;
   }
} else {
   header("Location: ../login.php");
}


?>