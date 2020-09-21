<?php
$cek=umenu_akses("?module=pasangiklan",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=pasangiklan'><b>Iklan SideBar</b></a></li>";
}

?>
