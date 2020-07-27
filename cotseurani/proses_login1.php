<?php
session_start();

include"koneksi.php";

$username=$_POST['username'];
$password=$_POST['password'];

if($username==NULL && $password==NULL)
{
	header("location:indexuser.php?alert=1");
}
elseif($username==NULL && $password!=NULL)
{
	header("location:indexuser.php?alert=2");
}

else{
$a=mysql_query ("select * from registrasi where username = '$username' and password = '$password'");
if(mysql_num_rows($a) > 0){
	$i=mysql_fetch_array($a);
	ini_set("display_errors",FALSE);
	session_register("username");
	session_register("password");
	session_register("nik");
	session_register("nama");
	
	
	session_start();
	$a=mysql_query ("select * from registrasi where username = '$username' and password = '$password'");

	$i=mysql_fetch_array($a);
	ini_set("display_errors",FALSE);
	$_SESSION["login_proposal"] = TRUE;
	$_SESSION['username']=$i['username'];
	$_SESSION['password']=$i['password'];
	$_SESSION['nik']=$i['nik'];	
	$_SESSION['nama']=$i['nama'];
		
	?>
	<script type="text/javascript">
		alert("Anda berhasil Login.... !");
		window.location='indexuser.php';
	</script>
	<?php
}
else
{
	?>
	<script type="text/javascript">
		alert("Username dan Password Tidak Cocok !");
		window.location='indexuser.php';
	</script>
	<?php
}
}
?>
