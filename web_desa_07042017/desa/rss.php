<?php
  error_reporting(0);
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
  $logo=mysql_fetch_array(mysql_query("SELECT * FROM logo"));
  $sql = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 10");

  $file = fopen("rss.xml", "w");

  fwrite($file, '<?xml version="1.0"?> 
  <rss version="2.0">');

  fwrite($file, "<channel> 
				<title>$iden[nama_website] RSS</title> 
				<link>$iden[url]</link> 
				<image>
				<url>$iden[url]/logo/$logo[gambar]</url>
				<link>$logo[url]</link>
				<width>100</width>
				<height>35</height>
				</image>
				<language>id-id</language>");

  while($r=mysql_fetch_array($sql)){
  $isi_berita = htmlentities(strip_tags(nl2br($r['isi_berita']))); 
  $isi   = substr($isi_berita,0,500); 
  $isi   = substr($isi_berita,0,strrpos($isi," ")); 

  fwrite($file, "<item>
                 <title>$r[judul]</title>
                 <link>$iden[url]/berita-$r[judul_seo].html</link>
                 <description>$isi ...</description>
                 </item>");}

  fwrite($file, "</channel></rss>");
  fclose($file);
  ?>
