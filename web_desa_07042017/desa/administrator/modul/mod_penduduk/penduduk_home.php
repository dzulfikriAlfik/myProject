<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php
$aksi="modul/mod_penduduk/aksi_penduduk.php";
switch($_GET[act]){
  default:
	echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  <a href='?module=penduduk&act=tambah' class='button'>
	  <span>Tambah Data Penduduk</span>
      </a></div>";
	  
    echo "<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>Data Kartu Keluarga (Penduduk)</h1>
      <span></span> 
      </div> 
      <div class=block-content> 
      <table id=table-example class=table>
      <thead> 
          <tr><th width='30px'>No</th>
          	  <th>No Kartu Keluarga</th>
          	  <th>Nama Kepala Keluarga</th>
          	  <th>Alamat</th>
          	  <th>RT/RW</th>
          	  <th width='90px'>Aksi</th>
          </tr>
	  </thead>
	  <tbody>";
	if ($_SESSION['id_penduduk'] != ''){ unset($_SESSION['id_penduduk']); }
    $tampil=mysql_query("SELECT * FROM data_penduduk ORDER BY id_data_penduduk DESC");
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
      			<td>$r[no_kk]</td>
                <td>$r[kepala_keluarga]</td>
                <td>$r[alamat]</td>
                <td>$r[rt_rw]</td>
			
	<td><a href=?module=penduduk&act=detail&id=$r[id_data_penduduk] class='with-tip'><center><img src='img/ya_rzl.png'></a>
		<a href=?module=penduduk&act=edit&id=$r[id_data_penduduk] class='with-tip'>&nbsp;&nbsp;&nbsp;&nbsp;<img src='img/edit.png'></a>
		<a href=javascript:confirmdelete('$aksi?module=penduduk&act=hapus&id=$r[id_data_penduduk]') class='with-tip'>&nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a>			
	</td></tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "detail":
  	$row = mysql_fetch_array(mysql_query("SELECT * FROM data_penduduk where id_data_penduduk='".$_GET[id]."'"));
    echo "<div id='main-content'>
		  <div class='container_12'>
		  <div class='grid_12'>
		  <div class='block-border'>
		  <div class='block-header'>
			<h1>DETAIL DATA KELUARGA</h1>
		  </div>
		  <div class='block-content'>
          
          <div style='width:50%; float:left'>
			  <p class=inline-small-label> 
			   <label for=field4>No KK</label>
			  <input type=text name='a' value='$row[no_kk]' size=60 disabled>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kpala Keluarga</label>
			  <input type=text name='b' value='$row[kepala_keluarga]' size=60 disabled>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Alamat</label>
			  <input type=text name='c' value='$row[alamat]' size=60 disabled>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>RT/RW</label>
			  <input type=text name='d' value='$row[rt_rw]' size=60 disabled>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kode Pos</label>
			  <input type=text name='e' value='$row[kode_pos]' size=60 disabled>
			   </p> 
		  </div>

		  <div style='width:50%; float:right'>
			  <p class=inline-small-label> 
			   <label for=field4>Desa/Kelurahan</label>
			  <input type=text name='f' value='$row[desa_kelurahan]' size=60 disabled>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kecamatan</label>
			  <input type=text name='g' value='$row[kecamatan]' size=60 disabled>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kab/Kota</label>
			  <input type=text name='h' value='$row[kab_kota]' size=60 disabled>
			   </p>

			   <p class=inline-small-label> 
			   <label for=field4>Propinsi</label>
			  <input type=text name='i' value='$row[propinsi]' size=60 disabled>
			   </p>  
		  </div>
		  <div style='clear:both'></div>

		  	<table class=table>
		      <thead> 
		          <tr bgcolor='#cecece'><th width='20px'>No</th>
		          	  <th>Nama Lengkap</th>
		          	  <th>NIK</th>
		          	  <th>Jns. Kelamin</th>
		          	  <th>Tmpt. Lahir</th>
		          	  <th>Tgl. Lahir</th>
		          	  <th>Agama</th>
		          	  <th>Pendidikan</th>
		          	  <th>Pekerjaan</th>
		          </tr>
			  </thead>
			  <tbody>";
			  $tampil=mysql_query("SELECT * FROM data_penduduk_detail where id_data_penduduk='".$_GET[id]."'");
			  $no=1;
			  while ($r=mysql_fetch_array($tampil)){
			  	echo "<tr>
			  			 <td>$no</td>
			  			 <td>$r[nama_lengkap]</td>
			  			 <td>$r[nik]</td>
			  			 <td>$r[jenis_kelamin]</td>
			  			 <td>$r[tempat_lahir]</td>
			  			 <td>$r[tanggal_lahir]</td>
			  			 <td>$r[agama]</td>
			  			 <td>$r[pendidikan]</td>
			  			 <td>$r[jenis_pekerjaan]</td>
			  		</tr>";
			  		$no++;
			  }
			  echo "</tbody>
	  		</table><br><hr>
   		  
		   <div class=block-actions> 
		   <ul class=actions-right> 
		   <li>
		   <a class='button red' id=reset-validate-form href='?module=penduduk'>Kembali</a>
		   </li> </ul>
		   <ul class=actions-left> 
		   <li>";
     break;

  case "tambah":
  	if (isset($_POST['submit'])){
  		$cek = mysql_num_rows(mysql_query("SELECT * FROM data_penduduk where id_data_penduduk='".$_SESSION[id_penduduk]."'"));
  		if ($cek == '0'){
	  		mysql_query("INSERT INTO data_penduduk VALUES('','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]')");
	  		$_SESSION['id_penduduk'] = mysql_insert_id();
	  	}
	  	mysql_query("INSERT INTO data_penduduk_detail VALUES('','$_SESSION[id_penduduk]','$_POST[aa]','$_POST[bb]','$_POST[cc]','$_POST[dd]','$_POST[ee]','$_POST[ff]','$_POST[gg]','$_POST[hh]','$_SESSION[namauser]','".date('Y-m-d H:i:s')."')");
  		echo "<script>window.alert('Data sukses Tersimpan!');
                                  window.location=('media.php?module=penduduk&act=tambah')</script>";
  	}

  	if ($_SESSION['id_penduduk'] != ''){
  		$row = mysql_fetch_array(mysql_query("SELECT * FROM data_penduduk where id_data_penduduk='".$_SESSION[id_penduduk]."'"));
  	}
    echo "<div id='main-content'>
		  <div class='container_12'>

		  <div class='grid_12'>
		  <div class='block-border'>
		  <div class='block-header'>
			<h1>TAMBAHKAN DATA KELUARGA</h1>
		  </div>
		  <div class='block-content'>
          <form method=POST action='' enctype='multipart/form-data'>
          
          <div style='width:50%; float:left'>
			  <p class=inline-small-label> 
			   <label for=field4>No KK</label>
			  <input type=text name='a' value='$row[no_kk]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kpala Keluarga</label>
			  <input type=text name='b' value='$row[kepala_keluarga]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Alamat</label>
			  <input type=text name='c' value='$row[alamat]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>RT/RW</label>
			  <input type=text name='d' value='$row[rt_rw]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kode Pos</label>
			  <input type=text name='e' value='$row[kode_pos]' size=60>
			   </p> 
		  </div>

		  <div style='width:50%; float:right'>
			  <p class=inline-small-label> 
			   <label for=field4>Desa/Kelurahan</label>
			  <input type=text name='f' value='$row[desa_kelurahan]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kecamatan</label>
			  <input type=text name='g' value='$row[kecamatan]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kab/Kota</label>
			  <input type=text name='h' value='$row[kab_kota]' size=60>
			   </p>

			   <p class=inline-small-label> 
			   <label for=field4>Propinsi</label>
			  <input type=text name='i' value='$row[propinsi]' size=60>
			   </p>  
		  </div>
		  <div style='clear:both'></div>

		  	<table class=table>
		      <thead> 
		          <tr bgcolor='#cecece'><th width='20px'>No</th>
		          	  <th>Nama Lengkap</th>
		          	  <th>NIK</th>
		          	  <th>Jns. Kelamin</th>
		          	  <th>Tmpt. Lahir</th>
		          	  <th>Tgl. Lahir</th>
		          	  <th>Agama</th>
		          	  <th>Pendidikan</th>
		          	  <th>Pekerjaan</th>
		          	  <th width='70px'>Aksi</th>
		          </tr>
			  </thead>
			  <tbody>
			  	  <tr>
			  	  	  <td></td>
			  	  	  <td><input type='text' name='aa'></td>
			  	  	  <td><input type='text' name='bb' style='width:115px'></td>
			  	  	  <td><select name='cc' style='width:90px !important'>
			  	  	  		<option value='' selected>- Pilih -</option>
			  	  	  		<option value='laki-laki'>Laki-laki</option>
			  	  	  		<option value='perempuan'>Perempuan</option>
			  	  	  	  </select></td>
			  	  	  <td><input type='text' name='dd' style='width:70px'></td>
			  	  	  <td><input type='text' name='ee' style='width:70px'></td>
			  	  	  <td><input type='text' name='ff' style='width:50px'></td>
			  	  	  <td><input type='text' name='gg'></td>
			  	  	  <td><input type='text' name='hh'></td>
			  	  	  <td><center><input class='button' type='submit' name='submit' value='Tambah'></center></td>
			  	  </tr>";
			  $tampil=mysql_query("SELECT * FROM data_penduduk_detail where id_data_penduduk='".$_SESSION[id_penduduk]."'");
			  $no=1;
			  while ($r=mysql_fetch_array($tampil)){
			  	echo "<tr>
			  			 <td>$no</td>
			  			 <td>$r[nama_lengkap]</td>
			  			 <td>$r[nik]</td>
			  			 <td>$r[jenis_kelamin]</td>
			  			 <td>$r[tempat_lahir]</td>
			  			 <td>$r[tanggal_lahir]</td>
			  			 <td>$r[agama]</td>
			  			 <td>$r[pendidikan]</td>
			  			 <td>$r[jenis_pekerjaan]</td>
						 <td><a href=javascript:confirmdelete('?module=penduduk&act=tambah&hapus=$r[id_data_penduduk_detail]') class='with-tip'><center>&nbsp;<img src='img/hapus.png'></center></a>	</td>
			  		  </tr>";
			  		$no++;
			  }

			  if (isset($_GET[hapus])){
			  	mysql_query("DELETE FROM data_penduduk_detail where id_data_penduduk_detail='$_GET[hapus]'");
			  	echo "<script>document.location='media.php?module=penduduk&act=tambah';</script>";
			  }
			  echo "</tbody>
	  		</table><hr>
   		  
		   <div class=block-actions> 
		   <ul class=actions-right> 
		   <li>
		   <a class='button red' id=reset-validate-form href='?module=penduduk'>Batal</a>
		   </li> </ul>
		   <ul class=actions-left> 
		   <li>
			  <a href='media.php?module=penduduk' class='button'>Selesai</a>
		   </form>";
     break;
    
  case "edit":
 	if (isset($_POST['submit'])){
	  	mysql_query("INSERT INTO data_penduduk_detail VALUES('','$_GET[id]','$_POST[aa]','$_POST[bb]','$_POST[cc]','$_POST[dd]','$_POST[ee]','$_POST[ff]','$_POST[gg]','$_POST[hh]','$_SESSION[namauser]','".date('Y-m-d H:i:s')."')");
  		echo "<script>window.alert('Data sukses Tersimpan!');
                                  window.location=('media.php?module=penduduk&act=edit&id=$_GET[id]')</script>";
  	}

  	if (isset($_POST['submite'])){
	  	mysql_query("UPDATE data_penduduk_detail SET nama_lengkap='$_POST[aa]', 
	  												 nik = '$_POST[bb]',
	  												 jenis_kelamin = '$_POST[cc]',
	  												 tempat_lahir = '$_POST[dd]',
	  												 tanggal_lahir = '$_POST[ee]',
	  												 agama = '$_POST[ff]',
	  												 pendidikan = '$_POST[gg]',
	  												 jenis_pekerjaan = '$_POST[hh]' where id_data_penduduk_detail='$_POST[id]'");

  		echo "<script>window.alert('Perubahan data sukses Tersimpan!');
                                  window.location=('media.php?module=penduduk&act=edit&id=$_GET[id]')</script>";
  	}

  	if (isset($_POST['submitee'])){
  		mysql_query("UPDATE data_penduduk SET no_kk = '$_POST[a]',
  											  kepala_keluarga = '$_POST[b]',
  											  alamat = '$_POST[c]',
  											  rt_rw = '$_POST[d]',
  											  kode_pos = '$_POST[e]',
  											  desa_kelurahan = '$_POST[f]',
  											  kecamatan = '$_POST[g]',
  											  kab_kota = '$_POST[h]',
  											  propinsi = '$_POST[i]' where id_data_penduduk='$_GET[id]'");
  		echo "<script>window.alert('Perubahan data sukses Tersimpan!');
                                  window.location=('media.php?module=penduduk&act=edit&id=$_GET[id]')</script>";
  	}	

  	$row = mysql_fetch_array(mysql_query("SELECT * FROM data_penduduk where id_data_penduduk='".$_GET[id]."'"));
    echo "<div id='main-content'>
		  <div class='container_12'>

		  <div class='grid_12'>
		  <div class='block-border'>
		  <div class='block-header'>
			<h1>UPDATE DATA KELUARGA</h1>
		  </div>
		  <div class='block-content'>
          <form method=POST action='' enctype='multipart/form-data'>
          
          <div style='width:50%; float:left'>
			  <p class=inline-small-label> 
			   <label for=field4>No KK</label>
			  <input type=text name='a' value='$row[no_kk]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kpala Keluarga</label>
			  <input type=text name='b' value='$row[kepala_keluarga]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Alamat</label>
			  <input type=text name='c' value='$row[alamat]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>RT/RW</label>
			  <input type=text name='d' value='$row[rt_rw]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kode Pos</label>
			  <input type=text name='e' value='$row[kode_pos]' size=60>
			   </p> 
		  </div>

		  <div style='width:50%; float:right'>
			  <p class=inline-small-label> 
			   <label for=field4>Desa/Kelurahan</label>
			  <input type=text name='f' value='$row[desa_kelurahan]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kecamatan</label>
			  <input type=text name='g' value='$row[kecamatan]' size=60>
			   </p> 

			   <p class=inline-small-label> 
			   <label for=field4>Kab/Kota</label>
			  <input type=text name='h' value='$row[kab_kota]' size=60>
			   </p>

			   <p class=inline-small-label> 
			   <label for=field4>Propinsi</label>
			  <input type=text name='i' value='$row[propinsi]' size=60>
			   </p>  

			   <input class='button' type='submit' name='submitee' style='width:85px; float:right; margin-right:90px' value='Update Data'>
		  </div>
		  <div style='clear:both'></div>

		  	<table class=table>
		      <thead> 
		          <tr bgcolor='#cecece'><th width='20px'>No</th>
		          	  <th>Nama Lengkap</th>
		          	  <th>NIK</th>
		          	  <th>Jns. Kelamin</th>
		          	  <th>Tmpt. Lahir</th>
		          	  <th>Tgl. Lahir</th>
		          	  <th>Agama</th>
		          	  <th>Pendidikan</th>
		          	  <th>Pekerjaan</th>
		          	  <th width='70px'>Aksi</th>
		          </tr>
			  </thead>
			  <tbody>";
			  if ($_GET[idd]!=''){
			  	 $e = mysql_fetch_array(mysql_query("SELECT * FROM data_penduduk_detail where id_data_penduduk_detail='$_GET[idd]'"));
			  	 if ($e[jenis_kelamin]=='laki-laki'){ $select1 = 'selected'; }elseif ($e[jenis_kelamin]=='perempuan'){ $select2 = 'selected'; }
			  }
			  	  echo "<tr>
			  	  	  <td></td>
			  	  	  <input type='hidden' name='id' value='$e[id_data_penduduk_detail]'>
			  	  	  <td><input type='text' name='aa' value='$e[nama_lengkap]'></td>
			  	  	  <td><input type='text' name='bb' value='$e[nik]' style='width:115px'></td>
			  	  	  <td><select name='cc' style='width:90px !important'>
			  	  	  		<option value='' selected>- Pilih -</option>
			  	  	  		<option value='laki-laki' $select1>Laki-laki</option>
			  	  	  		<option value='perempuan' $select2>Perempuan</option>
			  	  	  	  </select></td>
			  	  	  <td><input type='text' name='dd' value='$e[tempat_lahir]' style='width:70px'></td>
			  	  	  <td><input type='text' name='ee' value='$e[tanggal_lahir]' style='width:70px'></td>
			  	  	  <td><input type='text' name='ff' value='$e[agama]' style='width:50px'></td>
			  	  	  <td><input type='text' name='gg' value='$e[pendidikan]'></td>
			  	  	  <td><input type='text' name='hh' value='$e[jenis_pekerjaan]'></td>";
			  	  	 if ($_GET[idd]!=''){
			  	  	 	echo "<td><center><input class='button' type='submit' name='submite' value='Update'></center></td>";
			  	  	 }else{
			  	  	  	echo "<td><center><input class='button' type='submit' name='submit' value='Tambah'></center></td>";
			  	  	 }

			  	  echo "</tr>";
			  $tampil=mysql_query("SELECT * FROM data_penduduk_detail where id_data_penduduk='".$_GET[id]."'");
			  $no=1;
			  while ($r=mysql_fetch_array($tampil)){
			  	echo "<tr>
			  			 <td>$no</td>
			  			 <td>$r[nama_lengkap]</td>
			  			 <td>$r[nik]</td>
			  			 <td>$r[jenis_kelamin]</td>
			  			 <td>$r[tempat_lahir]</td>
			  			 <td>$r[tanggal_lahir]</td>
			  			 <td>$r[agama]</td>
			  			 <td>$r[pendidikan]</td>
			  			 <td>$r[jenis_pekerjaan]</td>
			  			 <td><a href=media.php?module=penduduk&act=edit&id=$_GET[id]&idd=$r[id_data_penduduk_detail] class='with-tip'><center><img src='img/edit.png'></a>
							 <a href=javascript:confirmdelete('?module=penduduk&act=edit&hapus=$r[id_data_penduduk_detail]&id=$_GET[id]') class='with-tip'>&nbsp;<img src='img/hapus.png'></center></a>	</td>
			  		  </tr>";
			  		$no++;
			  }

			  if (isset($_GET[hapus])){
			  	mysql_query("DELETE FROM data_penduduk_detail where id_data_penduduk_detail='$_GET[hapus]'");
			  	echo "<script>document.location='media.php?module=penduduk&act=edit&id=$_GET[id]';</script>";
			  }
			  echo "</tbody>
	  		</table><hr>
   		  
		   <div class=block-actions> 
		   <ul class=actions-right> 
		   <li>
		   <a class='button red' id=reset-validate-form href='?module=penduduk'>Batal</a>
		   </li> </ul>
		   <ul class=actions-left> 
		   <li>
			  <a href='media.php?module=penduduk' class='button'>Selesai</a>
		   </form>";
    break;  
}

?>
