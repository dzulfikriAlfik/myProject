<?php 
session_start();
include_once('config.php');

$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$email     = mysqli_real_escape_string($conn, $_POST['email']);
$password  = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {
   // check users email valid or not
   if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // check email is already exist in database or not
      $query_select = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
      if(mysqli_num_rows($query_select) > 0) { //email is already exist
         echo "$email - this email is already exist";
      } else {
         // check users upload file or not
         if(isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name']; // getting user uploaded image filename
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            //explode image filename and get the last extension file
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $extensions = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
            if(in_array($img_ext, $extensions) === true) {
               $time = time();
               // move uploaded file to our folder
               $new_image_name = $time . " - " . $firstName . " " . $lastName . "." . $img_ext;
               if (move_uploaded_file($tmp_name, "../assets/img/users/" . $new_image_name)) {
                  $status = "Active now";
                  $random_id = rand(time(), 10000000);
                  // insert input fields to database
                  $query_insert = "INSERT INTO users (unique_id, first_name, last_name, email, password, img, status) VALUES ({$random_id}, '{$firstName}', '{$lastName}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')";
                  $sql_query = mysqli_query($conn, $query_insert);
                  if ($sql_query) {
                     $sql_query2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                     if(mysqli_num_rows($sql_query2) > 0) {
                        $row = mysqli_fetch_assoc($sql_query2);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo "success";
                     }
                  } else {
                     echo "something went wrong";
                  }
               }
            } else {
               echo "Plase select an image with jpg/jpeg/png extension";
            }
         } else {
            echo "Please select an image file first";
         }
      }
   } else {
      echo "$email - this is not a valid email";
   }
} else {
   echo "All input field is required";
}

?>