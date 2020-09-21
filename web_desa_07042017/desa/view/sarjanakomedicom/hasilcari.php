<!-- main content -->
                <article class="article-container" itemscope itemtype="http://schema.org/Article">
                    <div class="article-content blog-page">
                        <header>
                            <h1 itemprop="headline">Hasil Pencarian kata kunci : <span style='color:red'>"<?php echo anti_injection($_POST[kata]); ?>"</span></h1>

                            <div class="divider"></div>
                        </header>

                        <div class="post-entry" itemprop="articleBody">
                        </div>

                        <div class="blog-items style-1">
                            <ul class="list-unstyled">
							<?php
							  $kata = trim(anti_injection($_POST['kata']));
							  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
							  $pisah_kata = explode(" ",$kata);
							  $jml_katakan = (integer)count($pisah_kata);
							  $jml_kata = $jml_katakan-1;
							  $cari = "SELECT * FROM berita 
									left join users on berita.username=users.username
										left join kategori on berita.id_kategori=kategori.id_kategori WHERE " ;
							  for ($i=0; $i<=$jml_kata; $i++){
							  $cari .= "isi_berita LIKE '%$pisah_kata[$i]%' or judul LIKE '%$pisah_kata[$i]%'";
							  if ($i < $jml_kata ){
							  $cari .= " OR "; } }
							  $cari .= " ORDER BY id_berita DESC LIMIT 3";
							  $hasil  = mysql_query($cari);
							  $ketemu = mysql_num_rows($hasil);
							  if ($ketemu > 0){
							  
							  $no = 1;
							  $warna = array("category-1","category-1","category-default","category-2","category-3");
							  while($r=mysql_fetch_array($hasil)){
							  $pasang = $warna[$no];
							  $tgl = tgl_indo($r['tanggal']);
							  $baca = $r['dibaca']+1;	
							  $isi_berita =(strip_tags($r['isi_berita'])); 
							  $isi = substr($isi_berita,0,540); 
							  $isi = substr($isi_berita,0,strrpos($isi," ")); 
								
							  $komen = "SELECT * FROM komentar WHERE id_berita = '".$r['id_berita']."'";
							  $komentar = mysql_query($komen);
							  $total_komentar = mysql_num_rows($komentar);
								echo "<li class='post-item' data-posttype='video' data-showonscroll='true' data-animation='fadeIn'>
                                    <article class='post-box clearfix'>

                                        <figure class='sec-image'>

                                            <div style='height:300px; overflow:hidden; width:100%' href='#' class='post-thumbnail'>";
											if ($r['gambar'] == ''){
												echo "<img src='foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
											}else{
												echo "<img width='100%' src='foto_berita/$r[gambar]' alt='$r[gambar]' /></a>";
											}
											echo "</div>

                                        </figure>

                                        <div class='sec-title $pasang'>
                                            <div class='post-meta-metro'>
                                                <ul class='list-unstyled color-theme'>
                                                    <li>
                                                        <div class='meta-icon'><i class='icon-user3'></i></div>
                                                        <div class='popup-info animated more-fast fadeInRight'><a href='#' title=''>$r[nama_lengkap]</a></div>
                                                    </li>

                                                    <li>
                                                        <div class='meta-icon'><i class='icon-library'></i></div>
                                                        <div class='popup-info animated more-fast fadeInRight'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html' title='$r[nama_kategori]'>$r[nama_kategori]</a></div>
                                                    </li>

                                                    <li>
                                                        <div class='meta-icon'><i class='icon-alarm2'></i></div>
                                                        <div class='popup-info animated more-fast fadeInRight'><a href='#' itemprop='datePublished'>$tgl - $r[jam] WIB </a></div>
                                                    </li>

                                                    <li>
                                                        <div class='meta-icon'><i class='icon-tags'></i></div>
                                                        <div class='popup-info animated more-fast fadeInRight'>
                                                            <div class='tags'>
                                                                $r[tag]
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class='post-title'>
                                                <h2><a href='berita-$r[judul_seo].html' title='$r[judul]'>$r[judul]</a></h2>

                                                <div class='post-desc'>
                                                    <p>$isi . . .</p>

                                                <div class='post-meta-extended clearfix'>
                                                    <span class='read-more'><i class='icon-eye3'></i><a href='berita-$r[judul_seo].html'>Baca Selanjutnya...</a></span>

                                                    <span><i class='icon-bubbles4'></i><a href='#' itemprop='interactionCount'>$total_komentar</a></span>
                                                    <span><i class='icon-tv'></i><a href='#' itemprop='interactionCount'>$r[dibaca]</a></span>
                                                </div>

                                            </div>
                                        </div>
                                    </article>
                                </li>";
								$no++;
							  }
							}else{
							  echo "Tidak ditemukan berita dengan kata : <b>$kata</b>"; 
							}
							?>	
                            </ul>

                        </div>

                    </div>
                </article>