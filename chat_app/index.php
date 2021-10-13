<?php 
session_start();
include_once('header.php');
if(isset($_SESSION['unique_id'])) {
   header("Location: users.php");
}

?>

<body>

<div class="wrapper">
   <section class="form signup">
      <header>Realtime chat app</header>
      <form action="#" enctype="multipart/form-data">
         <div class="error-txt">This is an error messages!</div>
         <div class="name-details">
            <div class="field input">
               <label for="firstName">First Name</label>
               <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" required>
            </div>
            <div class="field input">
               <label for="lastName">Last Name</label>
               <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required>
            </div>
         </div>
         <div class="field input">
            <label for="emailAddress">Email Address</label>
            <input type="text" name="email" id="emailAddress" placeholder="Enter Email Address" required>
         </div>
         <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <i class="fas fa-eye"></i>
         </div>
         <div class="field image">
            <label for="image">Select Image</label>
            <input type="file" name="image" id="image" required>
         </div>
         <div class="field button">
            <input type="submit" value="submit">
         </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
   </section>
</div>

<!-- Script -->
<script src="assets/js/pass-show-hide.js"></script>
<script src="assets/js/signup.js"></script>

</body>

</html>