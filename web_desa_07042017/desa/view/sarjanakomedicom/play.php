<?php
  $detail=mysql_query("SELECT * FROM video,users,playlist WHERE users.username=video.username 
							AND video.id_playlist=playlist.id_playlist AND id_video='".anti_injection($_GET[id])."'");
  $d   = mysql_fetch_array($detail);
  $tgl = tgl_indo($d['tanggal']);
  $lihat = $d['dilihat']+1;
	
  mysql_query("UPDATE video SET dilihat=$d[dilihat]+1 WHERE id_video='".anti_injection($_GET[id])."'");
?>	
		<article class="article-container clearfix" itemscope itemtype="http://schema.org/Article">
                    <div class="article-content clearfix">
                        <header>

                            <div class="breadcrumb-container clearfix" itemscope itemtype="http://schema.org/WebPage">
                                <ul class="breadcrumb ltr" itemprop="breadcrumb">
                                    <li><i class="icon-home3"></i><a href="index.php">Home</a></li>
                                    <li><a href="index.php">Video</a></li>
                                    <li><?php echo "$d[jdl_video]"; ?></li>
                                </ul>
                            </div>
							<h1 itemprop="headline"><?php echo "$d[jdl_video]"; ?></h1>

                            <div class="post-meta">
                                <ul>
                                    <li><i class="icon-user3"></i><a href="#"><?php echo "$d[nama_lengkap]"; ?></a></li>
                                    <li itemprop="datePublished"><i class="icon-alarm2"></i><?php echo "$tgl, $d[jam] WIB"; ?></li>
                                    <li><i class="icon-bubbles4"></i><a href="#" itemprop="interactionCount"><?php echo "$total_komentar"; ?>  Comments</a></li>
                                    <li itemprop="interactionCount"><i class="icon-tv"></i><?php echo "$lihat"; ?></li>
                                </ul>
                            </div>
                            <div class="figure-container">
                                <figure class="featured-post-figure" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <iframe itemprop='contentURL' class='youtube-player' type='text/html' width='100%' height='445' src='<?php echo "$d[youtube]"; ?>' frameborder='0' allowfullscreen></iframe>
                                </figure>
                            </div>
                        </header>

                        <div class="post-entry" itemprop="articleBody">

                            <?php echo "$d[keterangan]"; ?>
                            
                            <nav class="post-navigation clearfix">
							<?php
							$id = $d['id_video'] - 1;
							$prev = mysql_query("SELECT * FROM video where id_video='$id'");
							$p = mysql_fetch_array($prev);
							$hitung = mysql_num_rows($prev);
							
							if ($hitung >= 1){
							echo "<div class='prev-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>Previous Video</cite>
                                    <h3>$p[jdl_video]</h3>
                                    <a href='play-$p[id_video]-$p[video_seo].html' class='more'></a>
                                </div>";
							}else{
							echo "<div class='prev-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>No Previous Video</cite>
                                    <h3 style='color:#feb1b1'>Tidak ditemukan Video Sebelumnya!!!</h3>
                                    <a href='' class='more'></a>
                                </div>";
							}
							?>
							
							<?php
							$idd = $d['id_video'] + 1;
							$prevd = mysql_query("SELECT * FROM video where id_video='$idd'");
							$pd = mysql_fetch_array($prevd);
							$hitungd = mysql_num_rows($prevd);
							
							if ($hitungd >= 1){
							echo "<div class='next-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>Next Videos</cite>
                                    <h3>$pd[jdl_video]</h3>
                                    <a href='play-$pd[id_video]-$pd[video_seo].html' class='more'></a>
                                </div>";
							}else{
							echo "<div class='next-article col-md-6 col-sm-6 col-xs-12'>
                                    <cite>No Next Article</cite>
                                    <h3 style='color:#feb1b1'>Tidak ditemukan Video Setelahnya!!!</h3>
                                    <a href='' class='more'></a>
                                </div>";
							}
							?>
                            </nav>

                        </div>


                    </div>
                </article>