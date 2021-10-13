<?php 
session_start();
include_once('header.php');
if(isset($_SESSION['unique_id'])) {
   header("Location: users.php");
}

?>

<body>

<div class="wrapper">
   <section class="form login">
      <header>Realtime chat app</header>
      <form action="#">
         <div class="error-txt"></div>
         <div class="field input">
            <label for="emailAddress">Email Address</label>
            <input type="text" name="email" id="emailAddress" placeholder="Enter Email Address" required>
         </div>
         <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <i class="fa fa-eye"></i>
         </div>
         <div class="field button">
            <input type="submit" value="submit">
         </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
   </section>
</div>

<!-- Script -->
<script src="assets/js/pass-show-hide.js"></script>
<script src="assets/js/login.js"></script>

</body>

</html>