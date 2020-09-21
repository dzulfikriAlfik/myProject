<?php
$detail=mysql_query("SELECT * FROM halamanstatis where judul_seo='".anti_injection($_GET['halaman'])."'");
$d   = mysql_fetch_array($detail);
?>	
		<article class="article-container clearfix" itemscope itemtype="http://schema.org/Article">
                    <div class="article-content clearfix">
                        <header>
                            <h1 itemprop="headline"><?php echo strip_tags($d['judul']); ?></h1>
                            <div class="post-meta">
                                <ul>
									<?php
										$aut = mysql_query("SELECT * FROM users where level='admin'");
										$a = mysql_fetch_array($aut);
									?>
                                    <li><i class="icon-user3"></i><a href="#"><?php echo "$a[nama_lengkap]"; ?></a></li>
                                    <li><i class="icon-library"></i><a href="#"><?php echo "$a[email]"; ?></a></li>

                                    <li itemprop="datePublished"><i class="icon-alarm2"></i><?php echo "$tgl, $jam_sekarang WIB"; ?></li>
                                </ul>
                            </div>
                            <div class="divider"></div>
                        </header>
						<div class="post-entry" itemprop="articleBody">
                            <?php 
                                if (trim($d['gambar'])!=''){
                                    echo "<img class='pull-right img-thumbnail' style='width:300px; margin-left:8px' src='foto_statis/$d[gambar]'>";
                                }
                                echo "$d[isi_halaman]"; 
                            ?>
                        </div>
                    </div>
                </article>