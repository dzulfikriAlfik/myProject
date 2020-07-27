<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_sekilasinfo/aksi_sekilasinfo.php";
switch($_GET[act]){
  // Tampil Sekilas Info
  default:
	echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  <a href='?module=sekilasinfo&act=tambahsekilasinfo' class='button'>
	  <span>Tambah No Telpon</span>
      </a></div>";
	  
    echo "<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>No Telpon Penting</h1>
      <span></span> 
      </div> 
      <div class=block-content> 
      <table id=table-example class=table>
      <thead> 
          <tr><th width='30px'>No</th><th>Nama Instansi</th><th>No Telpon</th><th width='70px'>Aksi</th></tr>
	  </thead>
	  <tbody>";
    $tampil=mysql_query("SELECT * FROM no_penting ORDER BY id_no_penting DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    	$lebar=strlen($no);
    switch($lebar){
      case 1:
      {
        $g="0".$no;
        break;     
      }
      case 2:
      {
        $g=$no;
        break;     
      }      
    } 
      echo "<tr class=gradeX><td>$g</td>
                <td>$r[nama_instansi]</td>
                <td>$r[no_telpon]</td>
			
<td><a href=?module=sekilasinfo&act=editsekilasinfo&id=$r[id_no_penting] class='with-tip'>
<center><img src='img/edit.png'></a>

	  <a href=javascript:confirmdelete('$aksi?module=sekilasinfo&act=hapus&id=$r[id_no_penting]') class='with-tip'>
	  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a>			
		        </td></tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahsekilasinfo":
    echo "<div id='main-content'>
		  <div class='container_12'>

		  <div class='grid_12'>
		  <div class='block-border'>
		  <div class='block-header'>
			<h1>TAMBAHKAN NO PENTINGO</h1>
		  </div>
		  <div class='block-content'>
          <form method=POST action='$aksi?module=sekilasinfo&act=input' enctype='multipart/form-data'>
          
		  <p class=inline-small-label> 
		   <label for=field4>Nama Instansi</label>
		  <input type=text name='a' size=60>
		   </p> 

		   <p class=inline-small-label> 
		   <label for=field4>No Telpon</label>
		  <input type=text name='b' size=60>
		   </p> 
   		  
		   <div class=block-actions> 
		   <ul class=actions-right> 
		   <li>
		   <a class='button red' id=reset-validate-form href='?module=sekilasinfo'>Batal</a>
		   </li> </ul>
		   <ul class=actions-left> 
		   <li>
			  <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
		   </form>";
     break;
    
  case "editsekilasinfo":
    $edit = mysql_query("SELECT * FROM no_penting WHERE id_no_penting='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	    echo "<div id='main-content'>
		  <div class='container_12'>

		  <div class='grid_12'>
		  <div class='block-border'>
		  <div class='block-header'>
			<h1>EDIT NO PENTING</h1>
		  </div>
		  <div class='block-content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=sekilasinfo&act=update>
          <input type='hidden' name='id' value='$r[id_no_penting]'>
		  
		  <p class=inline-small-label> 
		   <label for=field4>Nama Instansi</label>
		  <input type=text name='a' value='".htmlentities($r[nama_instansi],ENT_QUOTES)."' size=60>
		   </p> 

		   <p class=inline-small-label> 
		   <label for=field4>No Telpon</label>
		  <input type=text name='b' value='$r[no_telpon]' size=60>
		   </p> 
   		  
		   <div class=block-actions> 
		   <ul class=actions-right> 
		   <li>
		   <a class='button red' id=reset-validate-form href='?module=sekilasinfo'>Batal</a>
		   </li> </ul>
		   <ul class=actions-left> 
		   <li>
			  <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Update &nbsp;&nbsp;&nbsp;&nbsp;'>
		   </form>";
    break;  
}
//kurawal akhir hak akses module
} else {
	echo akses_salah();
}

?>
