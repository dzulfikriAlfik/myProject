
                        <?php
                        if(isset($_POST['ganti'])){
                          $email    = $_SESSION['email'];
                          $password = mysqli_real_escape_string($koneksi, $_POST['password']);
                          $password1  = $_POST['password1'];
                          $password2  = $_POST['password2'];
                          $password = base64_encode(strrev(md5($password)));
                          
                          $cek = mysqli_query($koneksi, "SELECT * FROM company WHERE email='$email' AND password='$password'");
                          if(mysqli_num_rows($cek) == 0){
                            echo '<div class="alert alert-danger">Password sekarang tidak tepat.</div>';
                          }else{
                            if($password1 == $password2){
                              if(strlen($password1) >= 5){
                              $pass = base64_encode(strrev(md5($password1)));
                                $update = mysqli_query($koneksi, "UPDATE company SET password='$pass' WHERE email='$email'");
                                if($update){
                                  echo '<div class="alert alert-success">Password berhasil dirubah.</div>';
                                }else{
                                  echo '<div class="alert alert-danger">Password gagal dirubah.</div>';
                                }
                              }else{
                                echo '<div class="alert alert-danger">Panjang karakter Password minimal 5 karakter.</div>';
                              }
                            }else{
                              echo '<div class="alert alert-danger">Konfirmasi Password tidak tepat.</div>';
                            }
                          }
                        }
                        ?>