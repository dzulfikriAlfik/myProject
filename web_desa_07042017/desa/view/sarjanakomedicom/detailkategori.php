<!-- main content -->
                <article class="article-container" itemscope itemtype="http://schema.org/Article">
                    <div class="article-content blog-page">
                        <header>
						<?php
							$sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='".anti_injection($_GET[kt])."'");
							$n = mysql_fetch_array($sq);
						?>
                            <h1 itemprop="headline">Category "<?php echo "$n[nama_kategori]"; ?>"</h1>

                            <div class="divider"></div>
                        </header>

                        <div class="post-entry" itemprop="articleBody">
                        </div>

                        <div class="blog-items style-1">
                            <ul class="list-unstyled">
							<?php
							  $p      = new Paging3;
							  $batas  = 4;
							  $posisi = $p->cariPosisi($batas);
							  
							  $sql   = "SELECT * FROM berita 
											left join users on berita.username=users.username
												left join kategori on berita.id_kategori=kategori.id_kategori WHERE berita.id_kategori='".anti_injection($_GET[kt])."' 
													ORDER BY id_berita DESC LIMIT $posisi,$batas";		 
							  $hasil = mysql_query($sql);
							  $jumlah = mysql_num_rows($hasil);
								
							if ($jumlah > 0){
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
												echo "<img style='width:100%' src='foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
											}else{
												echo "<img style='width:100%' src='foto_berita/$r[gambar]' alt='$r[gambar]' /></a>";
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
							  echo "Belum ada berita pada kategori ini."; 
							}
							?>	
                            </ul>

							<?php
								$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_kategori='".anti_injection($_GET[kt])."'"));
								$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
								$linkHalaman = $p->navHalaman(anti_injection($_GET['halkategori']), $jmlhalaman);
							?>
                            <footer class="blog-pagination">
                                <ul class="pagination">
                                    <li><?php echo $linkHalaman ?></li>
                                </ul>
                            </footer>

                        </div>

                    </div>
                </article>