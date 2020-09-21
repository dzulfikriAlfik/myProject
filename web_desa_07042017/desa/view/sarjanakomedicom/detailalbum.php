<?php 
	$detail=mysql_query("SELECT * from album,users where id_album='".anti_injection($_GET['ald'])."'");
	$n   = mysql_fetch_array($detail);
	$tgl = tgl_indo($n['tgl_posting']);
	$hits = $n[hits_album]+1;
	mysql_query("UPDATE album SET hits_album='$hits' where id_album='".anti_injection($_GET['ald'])."'");
?>
<article class="article-container clearfix" itemscope itemtype="http://schema.org/Article">
<div class="article-content clearfix">
    <header>
        <div class="breadcrumb-container clearfix" itemscope itemtype="http://schema.org/WebPage">
            <ul class="breadcrumb ltr" itemprop="breadcrumb">
                <li><i class="icon-home3"></i><a href="index.php">Home</a></li>
				<li><a href="#">Detail Proyek</a></li>
                <li><?php echo "$n[jdl_album]"; ?></li>
            </ul>
        </div>
		
        <h1 itemprop="headline"><?php echo "$n[jdl_album]"; ?></h1>
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
		  	echo "<div class='post post-style-1'>
					  <div class='info'>
						  <span class='date'>$n[hari], $tgl_posting - $n[jam] WIB <span class style='color:#EA1C1C;'>|</span> dilihat: $hits pengunjung</span>
					  </div>
				  </div>
				  <p>$n[keterangan]</p>";

				  $p      = new Paging13;
				  $batas  = 1;
				  $posisi = $p->cariPosisi($batas);
				  $g = mysql_query("SELECT * FROM gallery WHERE id_album='".anti_injection($_GET['ald'])."' ORDER BY id_gallery DESC LIMIT $posisi,$batas");
				  $ada = mysql_num_rows($g);
				  if ($ada > 0){
				  	$no = $posisi+1;
					while ($h = mysql_fetch_array($g)) {
					$keterangan = nl2br($h['keterangan']);
						echo "<h3>$no. $h[jdl_gallery]</h3>
								<img class='img-thumbnail' style='width:100%' src='img_galeri/$h[gbr_gallery]' alt='$h[gbr_gallery]'/>
							  <p>$keterangan</p>";
						$no++;
					}
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM gallery WHERE id_album='".anti_injection($_GET['ald'])."'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman(anti_injection($_GET[halfotoberita]), $jmlhalaman);
					echo "<footer class='blog-pagination'>
		                    <ul class='pagination'>
		                        <li>$linkHalaman</li>
		                    </ul>
		                  </footer>";
				  }else{
				 	 echo "<div style='color:red; text-align:center; margin-top:12%; margin-bottom:12%;'><h4>Belum ada foto proyek pada halaman ini.</h4></div>";
				 }
				
		?>
	</div>
</div>
</article>
