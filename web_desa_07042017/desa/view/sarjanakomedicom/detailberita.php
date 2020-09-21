<?php
	$detail=mysql_query("SELECT * FROM berita 
										left join users on berita.username=users.username
											left join kategori on berita.id_kategori=kategori.id_kategori
												where judul_seo='".anti_injection($_GET[judul])."'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d['tanggal']);
	$baca = $d['dibaca']+1;
	
	$komen3 = "SELECT * FROM komentar WHERE id_berita = '".$d['id_berita']."'";
	$komentar3 = mysql_query($komen3);
	$total_komentar = mysql_num_rows($komentar3);
?>	
		<article class="article-container clearfix" itemscope itemtype="http://schema.org/Article">
                    <div class="article-content clearfix">
                        <header>
                            <div class="breadcrumb-container clearfix" itemscope itemtype="http://schema.org/WebPage">
                                <ul class="breadcrumb ltr" itemprop="breadcrumb">
                                    <li><i class="icon-home3"></i><a href="index.php">Home</a></li>
                                    <li><a href="<?php echo "kategori-$d[id_kategori]-$d[kategori_seo].html"; ?>"><?php echo "$d[nama_kategori]"; ?></a></li>
                                    <li><?php echo "$d[judul]"; ?></li>
                                </ul>
                            </div>

                            <h1 itemprop="headline"><?php echo "$d[judul]"; ?></h1>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="icon-user3"></i><a href="#"><?php echo "$d[nama_lengkap]"; ?></a></li>
                                    <li><i class="icon-library"></i><a href="<?php echo "kategori-$d[id_kategori]-$d[kategori_seo].html"; ?>"><?php echo "$d[nama_kategori]"; ?></a></li>
                                    <li itemprop="datePublished"><i class="icon-alarm2"></i><?php echo "$tgl, $d[jam] WIB"; ?></li>
                                    <li itemprop="interactionCount"><i class="icon-tv"></i><?php echo "$d[dibaca]"; ?></li>
                                </ul>
                            </div>

							<?php
								if ($d['gambar'] != ''){
							?>
                            <div class="figure-container">
                                <figure class="featured-post-figure" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <img style='width:100%' itemprop="contentURL" src="<?php echo "foto_berita/$d[gambar]"; ?>" />
                                    <figcaption itemprop="description"><?php echo "Foto untuk : $d[judul]"; ?></figcaption>
                                </figure>
                            </div>
							<?php } ?>
                            <div class="divider"></div>
                        </header>

                        <div class="post-entry" itemprop="articleBody">

                            <?php echo "$d[isi_berita]"; ?>
                            
                            <nav class="post-navigation clearfix">
							<?php
							$id = $d['id_berita'] - 1;
							$prev = mysql_query("SELECT * FROM berita where id_berita='$id'");
							$p = mysql_fetch_array($prev);
							$hitung = mysql_num_rows($prev);
							
							if ($hitung >= 1){
							echo "<div class='prev-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>Previous Article</cite>
                                    <h3>$p[judul]</h3>
                                    <a href='berita-$p[judul_seo].html' class='more'></a>
                                </div>";
							}else{
							echo "<div class='prev-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>No Previous Article</cite>
                                    <h3 style='color:#feb1b1'>Tidak ditemukan Artikel Sebelumnya!!!</h3>
                                    <a href='' class='more'></a>
                                </div>";
							}
							?>
							
							<?php
							$idd = $d['id_berita'] + 1;
							$prevd = mysql_query("SELECT * FROM berita where id_berita='$idd'");
							$pd = mysql_fetch_array($prevd);
							$hitungd = mysql_num_rows($prevd);
							
							if ($hitungd >= 1){
							echo "<div class='next-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>Next Article</cite>
                                    <h3>$pd[judul]</h3>
                                    <a href='berita-$pd[judul_seo].html' class='more'></a>
                                </div>";
							}else{
							echo "<div class='next-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>No Next Article</cite>
                                    <h3 style='color:#feb1b1'>Tidak ditemukan Artikel Setelahnya!!!</h3>
                                    <a href='' class='more'></a>
                                </div>";
							}
							?>
                            </nav>

                        </div>
                    </div>
                </article>