<div class="col-md-6">
	<section class="cat-widget wdg-cat-horiz-2col-sm clearfix">
	<?php 
		$random = mysql_query("SELECT * FROM kategori where sidebar='1'"); 
		$r = mysql_fetch_array($random);
	    echo "<div class='widget-title'>
				<span style='color:#000; font-size:16px; font-weight:bold' class='sub-title'>$r[nama_kategori]</span>
				<div class='sep-widget'></div>
			  </div>";
	?>
	            <div class="related-posts">

						<?php 
							$random2 = mysql_query("SELECT * FROM berita 
											left join users on berita.username=users.username
												left join kategori on berita.id_kategori=kategori.id_kategori
													where berita.id_kategori='$r[id_kategori]' order by id_berita DESC LIMIT 0,3");
							$no = 1;
							while ($r2 = mysql_fetch_array($random2)){
							$isi_berita = strip_tags($r2['isi_berita']); 
							$isi = substr($isi_berita,0,150); 
							$isi = substr($isi_berita,0,strrpos($isi," "));
								echo "<div class='post-item odd-item' data-showonscroll='true' data-animation='fadeIn'>
									<article class='post-box clearfix'>
										<header class='wdg-col-8 sec-title'>
											<h5><a style='color:orange' href='berita-$r2[judul_seo].html' title='$2[judul]'>$r2[judul]</a></h5>
											<div class='meta-info'>
												<span class='author'><i class='icon-user3'></i><a href='#'>$r2[nama_lengkap]</a></span>
												<span class='date'><i class='icon-alarm2'></i>".tgl_indo($r2['tanggal'])."</span><hr style='margin:5px'>
												<span style='color:#000'>$isi</span>
											</div>
										</header>
									</article>
								</div><div style='clear:both'><br></div>";
								$no++;
							}
						?>  
	               
	            </div>
	</section>
</div>

<div class="col-md-6">
	<section class="cat-widget wdg-cat-horiz-2col-sm clearfix">
	<?php 
		$hal = mysql_fetch_array(mysql_query("SELECT * FROM halamanstatis where id_halaman='1'"));
		$isi_halaman = strip_tags($hal['isi_halaman']); 
		$isi = substr($isi_halaman,0,650); 
		$isi = substr($isi_halaman,0,strrpos($isi," "));
	    echo "<div class='widget-title'>
				<span style='color:#000; font-size:16px; font-weight:bold' class='sub-title'>Selayang Pandang</span>
				<div class='sep-widget'></div>
			  </div>
	            <div class='related-posts'>
	            	<div id='testimonials' class='testimonial-wrapper clearfix flexslider tst'>
						<div class='testimonial'>
							$isi,..</div><br>
						<img style='width:80px; margin-right:10px' class='img-thumbnail pull-left' src='foto_statis/$hal[gambar]'>
						<p><span class='testimonial-details'>$hal[judul]</span></p>
                    	<a href='hal-$hal[judul_seo].html' class='btn btn-xs btn-warning btn-block'>Selengkapnya   </a>
					</div>
	            </div>";
	?>

	</section>
</div>

<div class="col-md-12">
	<section class="cat-widget wdg-cat-horiz-2col-sm clearfix">
		<div class='widget-title'>
			<span style='color:#000; font-size:16px; font-weight:bold' class='sub-title'>Video Terbaru</span>
			<div class='sep-widget'></div>
		</div>
            <div class="related-posts">
				<?php						  
				  $terkini2=mysql_query("select * from video ORDER BY id_video DESC LIMIT 2"); 				   
				  while($d=mysql_fetch_array($terkini2)){
				  $baca = $d['dilihat']+1;
				  $tgl = tgl_indo($d['tanggal']);
				  echo "<div class='col-md-6'><a href=play-$d[id_video]-$d[video_seo].html title='$d[jdl_video]'><b>$d[jdl_video]</b></a>
				  		<iframe itemprop='contentURL' class='youtube-player' type='text/html' width='100%' height='170' src='$d[youtube]' frameborder='0' play='0' allowfullscreen></iframe>
				  		<p><span class='tanggal01'><span> $d[hari], $tgl</span>
						  <span class style=\"color:#EA1C1C;\"> | </span>dilihat: $baca pengunjung</span>
						</p></div>";
				  }
				?>
            </div>
            <div style='clear:both'></div>
	</section>
</div>

<div class="col-md-12">
	<section class="cat-widget wdg-cat-horiz-2col-sm clearfix">
		<div class='widget-title'>
			<span style='color:#000; font-size:16px; font-weight:bold' class='sub-title'>Lokasi Kantor Desa</span>
			<div class='sep-widget'></div>
		</div>
	            <div class="related-posts">
					<?php
						$ma=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
						echo "<iframe width='100%'' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='$ma[maps]'></iframe><hr style='margin:5px'>";
	            		$alamat = mysql_fetch_array(mysql_query("SELECT * FROM mod_alamat")); echo "$alamat[alamat]";
	            	?>
	            </div>
	</section>
</div>