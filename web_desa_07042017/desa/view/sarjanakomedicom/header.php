<header class="container header-logo">
            <div class="logo" itemscope itemtype="http://schema.org/Brand">
                <h1 class="hidden" itemprop="name">PHPMU</h1>
                <a href="index.php">
					<?php
					  $logo=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
					  while($b=mysql_fetch_array($logo)){
					?>
					<img style='width:250px; height:90px' itemprop="logo" class="site-logo" src="logo/<?php echo "$b[gambar]"; ?>" alt="main-logo" />
					<?php
					  }
					?>
					
                </a>
            </div>

            <div class="advertise-790 visible-lg">
			<?PHP
			$atas=mysql_query("SELECT * FROM iklanatas ORDER BY id_iklanatas DESC LIMIT 1");
			$ia=mysql_fetch_array($atas);
			?>
                <a href="<?php echo "$ia[url]"; ?>" target="_blank">
					<?php
						$string = $ia['gambar'];
						if(preg_match("/swf\z/i", $string)) {
							echo "<embed src='foto_iklanatas/$ia[gambar]' width=728px; height=90px quality='high' type='application/x-shockwave-flash'>";
						} else {
							echo "<img src='foto_iklanatas/$ia[gambar]' title='$ia[judul]' />";
						}
					?>
					</a>
				
            </div>
        </header>