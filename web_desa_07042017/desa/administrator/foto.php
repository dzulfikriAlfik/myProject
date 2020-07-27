 <?php

$a=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'"));
if (empty($a[foto])){
	echo "<img class='img-left framed' width=60 src='../foto_user/blank.png' border=0 class>"; 
}else{
	echo "<img class='img-left framed' width=60 src='../foto_user/$a[foto]' border=0 class>"; 
}
?>