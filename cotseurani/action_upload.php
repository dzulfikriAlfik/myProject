<?php
//Buat konfigurasi upload
//Folder tujuan upload file
$eror		= false;
$folder		= './upload/';
//definisikan variabel file dan alamat file
		$uploaddir='./upload/';
		$alamatfile=$uploaddir.$nama_file;
//type file yang bisa diupload
$file_type	= array('pdf','docx','doc');
//tukuran maximum file yang dapat diupload
$max_size	= 1000000; // 1MB
if(isset($_POST['btnUpload'])){
	//Mulai memorises data
	$file_name	= $_FILES['data_upload']['name'];
	$file_size	= $_FILES['data_upload']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		?>
		<script language="javascript">alert("Type file yang anda upload tidak sesuai");</script>
		<script> document.location.href='upload.php'; </script>
		<?
	}
	if($file_size > $max_size){

			?>
		<script language="javascript">alert("Ukuran file melebihi batas maximum");</script>
		<script> document.location.href='upload.php'; </script>
		<?
	}
	//check ukuran file apakah sudah sesuai

	if($eror == true){
		echo '<div id="eror">'.$pesan.'</div>';
	}
	else{
		//mulai memproses upload file
		if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
			//catat nama file ke database
			$catat = mysql_query('insert into proposal(Filename,ket,Folder,tanggal,nama,nik,perihal,no_proposal,hp) 
			
			values ("'.$file_name.'","'.$_POST['keterangan'].'", 
			"'.$folder.'","'.date('Y-m-d  H:i:s').'", "'.$_POST['nama'].'","'.$_POST['nik'].'","'.$_POST['perihal'].'","'.$_POST['no_proposal'].'","'.$_POST['hp'].'")');
								 

			
			
			?>
		<script language="javascript">alert("Anda Berhasil Mengupload file");</script>
		<script> document.location.href='upload.php'; </script>
		<?
		} else{
			echo "Proses upload eror";
		}
	}
}
?>