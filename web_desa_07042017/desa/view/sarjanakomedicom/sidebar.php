<?php
$pasangiklan=mysql_query("SELECT * FROM pasangiklan ORDER BY id_pasangiklan DESC");
while($b=mysql_fetch_array($pasangiklan)){
    $string = $b['gambar'];
    if ($b['gambar'] == ''){
    }else{
        if(preg_match("/swf\z/i", $string)) {
            echo "<embed src='foto_pasangiklan/$b[gambar]' width=300 height=250 quality='high' type='application/x-shockwave-flash'>";
        } else {
            echo "<a href='$b[url]' target='_blank'><img style='width:100%;' src='foto_pasangiklan/$b[gambar]' alt='$b[judul]' /></a>
                   <hr style='margin:5px'>";
        }
    }
}
?>
                <h2 class="hidden">Sidebar</h2>
                <section class="widget wdg-tabs" data-showonscroll="true" data-animation="fadeIn">
                    <div class="widget-title clearfix">
                        <h3 class="hidden">Tabs Widget</h3>
                        <div class="sep-widget"></div>
                    </div>

                    <div class="widget-content paddingZero clearfix">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#recent" data-toggle="tab">Berita</a></li>
                            <li><a href="#popular" data-toggle="tab">Popular</a></li>
                            <li><a href="#comments" data-toggle="tab">Random</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <aside class="tab-pane animated fadeInDown active" id="recent">
                                <h4 class="hidden">Recent Posts - Tab</h4>
                                <div class="wdg-classic-posts color-theme clearfix">
                                    <ul class="list-unstyled">
									<?php
										$kaan = mysql_query("SELECT * FROM berita 
											left join users on berita.username=users.username
												left join kategori on berita.id_kategori=kategori.id_kategori
													order by id_berita DESC LIMIT 5");
										while ($kka = mysql_fetch_array($kaan)){
										$tglkka = tgl_indo($kka['tanggal']);
										$pecah1 = explode(",", $kka['tag']);
										$tag = $pecah1[0];
											echo "<li class='post-item'>
                                            <article class='post-box clearfix'>
                                                <figure class='wdg-col-4 sec-image'>
                                                    <div class='mask-background white'></div>
                                                    <div class='post-type anim'><i class='icon-camera2'></i></div>
                                                    <div class='post-thumbnail border-radius-2px'>";
														if ($kka['gambar'] ==''){
															echo "<img src='foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
														}else{
															echo "<img src='foto_berita/small_$kka[gambar]' alt='$kka[gambar]' /></a>";
														}
													echo "</div>
                                                    <a href='#' class='more'></a>
                                                </figure>
                                                <div class='wdg-col-8 sec-title'>
                                               <h5><a href='berita-$kka[judul_seo].html' title='$kka[judul]'>$kka[judul]</a></h5>
                                                    <div class='meta-info'>
                                                        <span class='date'><i class='icon-alarm2'></i>$tglkka, $kka[jam] WIB</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>";
										}
									?>
                                    
                                    </ul>
                                </div>
                            </aside>

                            <aside class="tab-pane animated fadeInDown" id="popular">
                                <h4 class="hidden">Popular Posts - Tab</h4>

                                <div class="wdg-classic-posts color-theme clearfix">
                                    <ul class="list-unstyled">
                                        <?php
										$kaan1 = mysql_query("SELECT * FROM berita 
											left join users on berita.username=users.username
												left join kategori on berita.id_kategori=kategori.id_kategori
													order by dibaca DESC LIMIT 5");
										while ($kka = mysql_fetch_array($kaan1)){
										$tglkka = tgl_indo($kka['tanggal']);
										$pecah1 = explode(",", $kka['tag']);
										$tag = $pecah1[0];
											echo "<li class='post-item'>
                                            <article class='post-box clearfix'>
                                                <figure class='wdg-col-4 sec-image'>
                                                    <div class='mask-background white'></div>
                                                    <div class='post-type anim'><i class='icon-camera2'></i></div>
                                                    <div class='post-thumbnail border-radius-2px'>";
														if ($kka['gambar'] ==''){
															echo "<img src='foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
														}else{
															echo "<img src='foto_berita/small_$kka[gambar]' alt='$kka[gambar]' /></a>";
														}
													echo "</div>
                                                    <a href='#' class='more'></a>
                                                </figure>
                                                <div class='wdg-col-8 sec-title'>
                                                 <h5><a href='berita-$kka[judul_seo].html' title='$kka[judul]'>$kka[judul]</a></h5>
                                                    <div class='meta-info'>
                                                        <span class='date'><i class='icon-alarm2'></i>$tglkka, $kka[jam] WIB</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>";
										}
									?>
                                    </ul>
                                </div>
                            </aside>

                            <aside class="tab-pane animated fadeInDown" id="comments">
                                <h4 class="hidden">Random - Tab</h4>

                                <div class="wdg-classic-posts color-theme clearfix">
                                    <ul class="list-unstyled">
                                        <?php
										$kaan2 = mysql_query("SELECT * FROM berita 
											left join users on berita.username=users.username
												left join kategori on berita.id_kategori=kategori.id_kategori
													order by RAND() DESC LIMIT 5");
										while ($kka = mysql_fetch_array($kaan2)){
										$tglkka = tgl_indo($kka['tanggal']);
										$pecah1 = explode(",", $kka['tag']);
										$tag = $pecah1[0];
											echo "<li class='post-item'>
                                            <article class='post-box clearfix'>
                                                <figure class='wdg-col-4 sec-image'>
                                                    <div class='mask-background white'></div>
                                                    <div class='post-type anim'><i class='icon-camera2'></i></div>
                                                    <div class='post-thumbnail border-radius-2px'>";
														if ($kka['gambar'] ==''){
															echo "<img src='foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
														}else{
															echo "<img src='foto_berita/small_$kka[gambar]' alt='$kka[gambar]' /></a>";
														}
													echo "</div>
                                                    <a href='#' class='more'></a>
                                                </figure>
                                                <div class='wdg-col-8 sec-title'>
                                                <h5><a href='berita-$kka[judul_seo].html' title='$kka[judul]'>$kka[judul]</a></h5>
                                                    <div class='meta-info'>
                                                        <span class='date'><i class='icon-alarm2'></i>$tglkka, $kka[jam] WIB</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>";
										}
									?>
                                    </ul>
                                </div>
                            </aside>


                        </div>
                    </div>
                </section>
				
                <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
                    <div class="widget-title clearfix">
                        <h3>No Telpon Penting</h3>
                        <div class="sep-widget"></div>
                    </div>

                    <div class="widget-content clearfix">
                        <div class="wdg-review-posts color-theme clearfix">
                            <table class='table table-condensed'>
                                <thead>
                                    <tr>
                                        <th>Nama Instansi</th>
                                        <th>No Telpon</th>
                                    </tr>
                                    <?php 
                                        $telpon = mysql_query("SELECT * FROM no_penting ORDER BY id_no_penting ASC");
                                        while($r = mysql_fetch_array($telpon)){
                                            echo "<tr>
                                                    <td>$r[nama_instansi]</td>
                                                    <td>$r[no_telpon]</td>
                                                </tr>";
                                        }
                                    ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                </aside>