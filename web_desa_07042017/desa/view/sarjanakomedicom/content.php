<?php
if ($_GET['module']=='home'){ 
	include "home.php";

}elseif ($_GET['module']=='detailberita'){
	include "detailberita.php";
	
}elseif ($_GET['module']=='detailkategori'){
	include "detailkategori.php";
	
}elseif ($_GET['module']=='detailmenu'){
	include "detailmenu.php";
	
}elseif ($_GET['module']=='semuadownload'){
	include "detaildownload.php";
	
}elseif ($_GET['module']=='semuaagenda'){
	include "detailagenda.php";
	
}elseif ($_GET['module']=='detailagenda'){
	include "lihatdetailagenda.php";
	
}elseif ($_GET['module']=='hubungikami'){
	include "hubungi.php";
	
}elseif ($_GET['module']=='hubungiaksi'){
	include "hubungiaksi.php";
	
}elseif ($_GET['module']=='play'){
	include "play.php";
	
}elseif ($_GET['module']=='hasilcari'){
  include "hasilcari.php";
  
}elseif ($_GET['module']=='lihatpoling'){
  include "lihatpoling.php";

}elseif ($_GET['module']=='hasilpoling'){
  include "hasilpoling.php";
  
}elseif ($_GET['module']=='semuaalbum'){
  include "album.php";
  
}elseif ($_GET['module']=='detailalbum'){
  include "detailalbum.php";
  
}