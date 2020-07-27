<!--
            <section class="row footer-widgets">
                <h3 class="hidden">Footer Widgets</h3>

               <div class="col-md-4">
                    <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
                        <div class="widget-title clearfix">
                            <h3>Random Posts</h3>
                            <div class="sep-widget"></div>
                        </div>

                        <div class="widget-content clearfix">
                            <div class="wdg-classic-posts color-theme clearfix">
                                <ul class="list-unstyled">
								<?php
									$randomx = mysql_query("SELECT * FROM berita 
														left join users on berita.username=users.username
															left join kategori on berita.id_kategori=kategori.id_kategori
																order by RAND() DESC LIMIT 3");
									while ($r = mysql_fetch_array($randomx)){
									$pecah = explode(",", $r['tag']);
									$tag = $pecah[0];						
									$tgl = tgl_indo($r['tanggal']);
										echo "<li class='post-item'>
                                        <article class='post-box clearfix'>
                                            <figure class='wdg-col-4 sec-image'>
                                                <div class='mask-background white'></div>

                                                <div class='post-type anim'><i class='icon-camera2'></i></div>

                                                <div class='post-thumbnail border-radius-2px'>";
															if ($r['gambar'] ==''){
																echo "<img class='border-radius-2px' src='foto_berita/small_no-image.jpg' alt='no-image.jpg' />";
															}else{
																echo "<img class='border-radius-2px' src='foto_berita/small_$r[gambar]' alt='$r[gambar]' />";
															}
														echo "</div>

                                                <a href='berita-$r[judul_seo].html' class='more'></a>
                                            </figure>

                                            <div class='wdg-col-8 sec-title'>

                                                <span class='btn-srp'><a style='text-transform:capitalize;' href='kategori-$r[id_kategori]-$r[kategori_seo].html'>$tag</a></span>
                                                <h5><a href='berita-$r[judul_seo].html' title='$r[judul]'>$r[judul]</a></h5>
                                                <div class='meta-info'>

                                                    <span class='author'><i class='icon-user3'></i><a href='#'>$r[nama_lengkap]</a></span>
                                                    <span class='date'><i class='icon-alarm2'></i>$tgl</span>

                                                </div>

                                            </div>
                                        </article>
                                    </li>";
									}
								?>
                                    
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-md-4">

                    <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
                        <div class="widget-title clearfix">
                            <h3>Popular Posts</h3>
                            <div class="sep-widget"></div>
                        </div>

                        <div class="widget-content clearfix">
                            <div class="wdg-classic-posts color-theme clearfix">
                                <ul class="list-unstyled">
                                    <?php
									$popular = mysql_query("SELECT * FROM berita 
														left join users on berita.username=users.username
															left join kategori on berita.id_kategori=kategori.id_kategori
																order by dibaca DESC LIMIT 3");
									while ($r = mysql_fetch_array($popular)){
									$pecah = explode(",", $r['tag']);
									$tag = $pecah[0];						
									$tgl = tgl_indo($r['tanggal']);
										echo "<li class='post-item'>
                                        <article class='post-box clearfix'>
                                            <figure class='wdg-col-4 sec-image'>
                                                <div class='mask-background white'></div>

                                                <div class='post-type anim'><i class='icon-camera2'></i></div>

                                                <div class='post-thumbnail border-radius-2px'>";
															if ($r['gambar'] ==''){
																echo "<img class='border-radius-2px' src='foto_berita/small_no-image.jpg' alt='no-image.jpg' />";
															}else{
																echo "<img class='border-radius-2px' src='foto_berita/small_$r[gambar]' alt='$r[gambar]' />";
															}
														echo "</div>

                                                <a href='berita-$r[judul_seo].html' class='more'></a>
                                            </figure>

                                            <div class='wdg-col-8 sec-title'>

                                                <span class='btn-srp'><a style='text-transform:capitalize;' href='kategori-$r[id_kategori]-$r[kategori_seo].html'>$tag</a></span>
                                                <h5><a href='berita-$r[judul_seo].html' title='$r[judul]'>$r[judul]</a></h5>
                                                <div class='meta-info'>

                                                    <span class='author'><i class='icon-user3'></i><a href='#'>$r[nama_lengkap]</a></span>
                                                    <span class='date'><i class='icon-alarm2'></i>$tgl</span>

                                                </div>

                                            </div>
                                        </article>
                                    </li>";
									}
								?>

                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-md-4">

                    <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
                        <div class="widget-title clearfix">
                            <h3>Recent Comments</h3>
                            <div class="sep-widget"></div>
                        </div>

                        <div class="widget-content clearfix">
                            <div class="wdg-comments clearfix">
                                <ul class="list-unstyled">
								<?php
									$komentar = mysql_query("SELECT * FROM komentar order by id_komentar DESC LIMIT 3");
									while ($r = mysql_fetch_array($komentar)){
									$tgl = tgl_indo($r['tgl']);
									$isi_komentar = strip_tags($r['isi_komentar']); 
									$isi = substr($isi_komentar,0,55); 
									$isi = substr($isi_komentar,0,strrpos($isi," "));
									$test = md5(strtolower(trim($r['email'])));
									$berita = mysql_query("SELECT * FROM berita WHERE id_berita =$r[id_berita]");
									$b = mysql_fetch_array($berita);
									
										echo "<li class='post-item'>
                                        <article class='post-box clearfix'>
                                            <div class='wdg-col-4 sec-image'>

                                                <div class='avatar-thumbnail border-radius-2px'>";
													if ($r['email'] == ''){
														echo "<img class='border-radius-2px' src='foto_user/blank.png' alt='avatar-1' />";
													}else{
														echo "<img class='border-radius-2px' src='http://www.gravatar.com/avatar/$test.jpg?s=100' />";
													}

                                                echo "</div>

                                                <a href='berita-$b[judul_seo].html' class='more'></a>
                                            </div>

                                            <div class='wdg-col-8 sec-title'>
                                                <div class='meta-info'>
                                                    <span class='date-time'><i class='icon-alarm2'></i>$tgl, $r[jam_komentar] WIB</span>
                                                </div>

                                                <div class='comment'>
                                                    <h5><a href='berita-$b[judul_seo].html'>$r[nama_komentar]</a></h5>
                                                    <span class='separator'></span>
                                                    <p>$isi ...</p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>";
									}
								?>
                                </ul>
                            </div>
                        </div>
                    </aside>

                </div>
            </section>
-->
            <section class="row footer-bottom" data-showonscroll="true" data-animation="fadeIn">
                <h3 class="hidden">Footer Bottom Links</h3>

                <div class="col-md-6">
                    <ul>
                        <li><a href="http://sarjanakomedi.com/">SarjanaKomedi.com</a></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <p class="pull-right">&copy; Copyright <?php echo date('Y'); ?> Web Desa, All Rights Reserved</p>
                </div>

            </section>