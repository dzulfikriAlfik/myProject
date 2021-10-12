<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Realtime Chat app</title>
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- <link rel="stylesheet" href="assets/css/font-awesome.css"> -->
   <!-- <link rel="stylesheet" href="assets/css/fontawesome.min.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>

<div class="wrapper">
   <section class="form login">
      <header>Realtime chat app</header>
      <form action="#">
         <div class="error-txt">This is an error messages!</div>
         <div class="field input">
            <label for="emailAddress">Email Address</label>
            <input type="text" id="emailAddress" placeholder="Enter Email Address">
         </div>
         <div class="field input">
            <label for="password">Password</label>
            <input type="text" id="password" placeholder="Enter Password">
            <i class="fa fa-eye"></i>
         </div>
         <div class="field button">
            <input type="submit" value="submit">
         </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
   </section>
</div>

</body>

</html>