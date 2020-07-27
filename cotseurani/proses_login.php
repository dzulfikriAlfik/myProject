<?php

include"koneksi.php";

$username=$_POST['username'];
$password=$_POST['password'];

if($username==NULL && $password==NULL)
{
	header("location:login.php?alert=1");
}
elseif($username==NULL && $password!=NULL)
{
	header("location:login.php?alert=2");
}
elseif($user!=NULL && $pass=NULL)
{
	header("location:login.php?alert=3");
}
else{
$a=mysql_query ("select * from admin where username = '$username' and password = '$password'");
if(mysql_num_rows($a) > 0){
	$i=mysql_fetch_array($a);
	ini_set("display_errors",FALSE);
	session_register("username");
	session_register("password");
	session_register("nama");		
	session_start();
	$a=mysql_query ("select * from admin where username = '$username' and password = '$password'");

	$i=mysql_fetch_array($a);
	ini_set("display_errors",FALSE);
	$_SESSION["login_admin"] = TRUE;
	$_SESSION[username]=$i[username];
	$_SESSION[password]=$i[password];
	$_SESSION[nama]=$i[nama];
	
	?>
	<script type="text/javascript">
		alert("Anda berhasil Login.... !");
		window.location='admin/index.php';
	</script>
	<?php
}
else
{
	?>
	<script type="text/javascript">
		alert("Username dan Password Tidak Cocok !");
		window.location='login.php';
	</script>
	<?php
}
}
?>
