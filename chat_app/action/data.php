<?php 

while ($row = mysqli_fetch_assoc($query)) {
   $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} 
            OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id} 
            OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1
         ";
   $query2 = mysqli_query($conn, $sql2);
   $row2 = mysqli_fetch_assoc($query2);
   if(mysqli_num_rows($query2) > 0) {
      $result = $row2['messages'];
   } else {
      $result = "No message available";
   }

   // trimming message if word more than 28 char
   (strlen($result) > 15) ? $message = substr($result, 0, 15) . " . . . ." : $message = $result;
   // adding you : text before msg if login id send msg
   ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
   // check user is online / offline
   ($row['status'] == 'Offline now') ? $offline = 'offline' : $offline = "";

   $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                  <div class="content">
                     <img src="assets/img/users/' . $row['img'] .'" alt="">
                     <div class="details">
                        <span>' . $row['first_name'] . " " . $row['last_name'] .'</span>
                        <p>' . $you . $message . '</p>
                     </div>
                  </div>
                  <div class="status-dot ' . $offline . ' "><i class="fas fa-circle"></i></div>
               </a>';
}

?>