            <?php
			  $terkini=mysql_query("SELECT * FROM berita left join users on berita.username=users.username
										left join kategori on berita.id_kategori=kategori.id_kategori
											WHERE headline='Y' ORDER BY id_berita DESC LIMIT 5");
			  $no=1;
			  while($t=mysql_fetch_array($terkini)){ 
			  $tgl = tgl_indo($t['tanggal']);
				if ($t[gambar] ==''){
					echo "<div data-thumb='' data-src='foto_berita/no-image.jpg'>";
				}else{
					echo "<div data-thumb='' data-src='foto_berita/$t[gambar]'>";
				}
					echo "<div class='camera_caption fadeFromBottom'>
						<h2 class='hidden'>Slider Section</h2>

						<div class='meta-info'>
							<span><i class='icon-user3'></i><a href='#'>$t[nama_lengkap]</a></span>
							<span><i class='icon-alarm2'></i>$tgl, $t[jam] WIB</span>
							<span><i class='icon-library'></i><a href='kategori-$t[id_kategori]-$t[kategori_seo].html'>$t[nama_kategori]</a></span>
						</div>
						
						<h3><a href='berita-$t[judul_seo].html'>$t[judul]</a></h3>
						<!--<span class='btn-srp color-theme'><a href='#cat'>Movies</a></span>-->

					</div>
				</div>";
			  }
			?>