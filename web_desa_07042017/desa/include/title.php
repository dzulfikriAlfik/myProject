<?php
if (isset($_GET['judul'])){
   $sql = mysql_query("select judul from berita where judul_seo='".anti_injection($_GET[judul])."'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "$j[judul]";
    } else{
      $sql2 = mysql_query("select nama_website from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[nama_website]";
  }
}elseif ($_GET['id'] != ''){
	$sql = mysql_query("select jdl_video from video where id_video='".anti_injection($_GET[id])."'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "Video - $j[jdl_video]";
}
}
elseif ($_GET['ald'] != ''){
	$sql = mysql_query("select jdl_album from album where id_album='".anti_injection($_GET[ald])."'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "Berita Foto - $j[jdl_album]";
}
}
elseif ($_GET['kt'] != ''){
	$sql = mysql_query("select nama_kategori from kategori where id_kategori='".anti_injection($_GET[kt])."'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "Berita Kategori $j[nama_kategori]";
}
}
elseif (isset($_GET['play'])){
	echo "Semua Daftar / Koleksi Video";
}
elseif (isset($_GET['dwn'])){
	echo "Semua Daftar file Download";
}
elseif (isset($_GET['haldownload'])){
	echo "Semua Daftar file Download Halaman ".anti_injection($_GET['haldownload']);
}
elseif (isset($_GET['alb'])){
	echo "Semua Daftar Berita Foto";
}
elseif (isset($_GET['idx'])){
	echo "Halaman Indexs Berita";
}
elseif (isset($_GET['agd'])){
	echo "Daftar Semua Agenda";
}
elseif (isset($_GET['hp'])){
	echo "Terima kasih telah memberikan pendapat anda.";
}
elseif (isset($_GET['lp'])){
	echo "Hasil Persentase Perhitungan Poling";
}
elseif (isset($_GET['tema'])){
$sql = mysql_query("select tema from agenda where tema_seo='".anti_injection($_GET[tema])."'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "$j[tema]";
	}
}
elseif (isset($_GET['halagenda'])){
	echo "Semua Daftar Agenda Halaman halagenda";
}
elseif ($_GET['halaman'] != ''){
	$sql = mysql_query("SELECT * FROM halamanstatis where judul_seo='".anti_injection($_GET[halaman])."'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "Halaman ".strip_tags($j['judul']);
}
}
elseif (isset($_GET['hub'])){
        echo "Hubungi Kami Segera";
}else{
      $sql2 = mysql_query("select nama_website from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[nama_website]";
}
?>
