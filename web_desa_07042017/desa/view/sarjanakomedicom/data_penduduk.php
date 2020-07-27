<?php if (isset($_GET[kk])){ ?> 
        <article class="article-container" itemscope itemtype="http://schema.org/Article">
            <div class="article-content blog-page">
                <header>
                    <h1 itemprop="headline">Data Kartu Keluarga (Penduduk)</h1>
                    <div class="divider"></div>
                </header>
                <div class="post-entry" itemprop="articleBody"></div>

                <div class="blog-items style-1">
                    <ul class="list-unstyled">
					<?php
						echo "<table id='example1' class='table table-bordered table-striped'>
			                    <thead>
			                      <tr bgcolor='#cecece'><th width='20px'>No</th>
						          	  <th width='150px'>No Kartu Keluarga</th>
						          	  <th width='180px'>Nama Kepala Keluarga</th>
						          	  <th>Alamat</th>
						          	  <th width='60px'>RT/RW</th>
						          	  <th width='70px'></th>
						          </tr>
			                    </thead>
			                    <tbody>";
					  $sql   = "SELECT * FROM data_penduduk ORDER BY id_data_penduduk DESC";		 
					  $hasil = mysql_query($sql);
					  $no = 1;
					  while($r=mysql_fetch_array($hasil)){
					  echo "<tr class=gradeX><td>$no</td>
			      			<td>$r[no_kk]</td>
			                <td>$r[kepala_keluarga]</td>
			                <td>$r[alamat]</td>
			                <td>$r[rt_rw]</td>
							<td><a class='btn btn-success btn-xs' href='penduduk-$r[id_data_penduduk].html' class='with-tip'><center><i class='icon-search'></i> Lihat Data</center></a></td>
					  </tr>";
						$no++;
					  }

                    echo "</tbody></table>";
                    ?>
                </div>

            </div>
        </article>
<?php }elseif(isset($_GET[idp])){ ?>
        <article class="article-container" itemscope itemtype="http://schema.org/Article">
            <div class="article-content blog-page">
                <header>
                    <h1 itemprop="headline">Detail Data Kartu Keluarga (Penduduk) <a href='data-penduduk.html' class='btn btn-warning btn-sm pull-right'>Kembali</a></h1>
                    <div class="divider"></div>
                </header>
                <div class="post-entry" itemprop="articleBody"></div>

                <div class="blog-items style-1">
                    <ul class="list-unstyled">
					<?php
						$row = mysql_fetch_array(mysql_query("SELECT * FROM data_penduduk where id_data_penduduk='".anti_injection($_GET[idp])."'"));
						echo "<div class='col-md-6'>
								<table width='100%'>
								   <tr><td style='font-weight:bold' width='120px'>No KK</td> <td> : $row[no_kk]</td></tr> 
								   <tr><td style='font-weight:bold'>Kepala Keluarga</td> 	<td> : $row[kepala_keluarga]</td></tr> 
								   <tr><td style='font-weight:bold'>Alamat</td> 				<td> : $row[alamat]</td></tr> 
								   <tr><td style='font-weight:bold'>RT/RW</td> 				<td> : $row[rt_rw]</td></tr> 
								   <tr><td style='font-weight:bold'>Kode Pos</td> 			<td> : $row[kode_pos]</td></tr> 
								</table>
							  </div>

							  <div class='col-md-6'>
							  	<table width='100%'>
								   <tr><td style='font-weight:bold' width='120px'>Desa/Kelurahan</td> <td> : $row[desa_kelurahan]</td></tr> 
								   <tr><td style='font-weight:bold'>Kecamatan</td> 			<td> : $row[kecamatan]</td></tr> 
								   <tr><td style='font-weight:bold'>Kab/Kota</td> 			<td> : $row[kab_kota]</td></tr> 
								   <tr><td style='font-weight:bold'>Propinsi</td> 			<td> : $row[propinsi]</td></tr> 
								</table> 
							  </div>
							  <div style='clear:both'></div><br>

							  	<table class=table>
							      <thead> 
							          <tr bgcolor='#cecece'><th width='20px'>No</th>
							          	  <th>Nama Lengkap</th>
							          	  <th>NIK</th>
							          	  <th>Jns. Kelamin</th>
							          	  <th>Tmpt. Lahir</th>
							          	  <th>Tgl. Lahir</th>
							          	  <th>Agama</th>
							          	  <th>Pendidikan</th>
							          	  <th>Pekerjaan</th>
							          </tr>
								  </thead>
								  <tbody>";
								  $tampil=mysql_query("SELECT * FROM data_penduduk_detail where id_data_penduduk='".$_GET[idp]."'");
								  $no=1;
								  while ($r=mysql_fetch_array($tampil)){
								  	echo "<tr>
								  			 <td>$no</td>
								  			 <td>$r[nama_lengkap]</td>
								  			 <td>$r[nik]</td>
								  			 <td>$r[jenis_kelamin]</td>
								  			 <td>$r[tempat_lahir]</td>
								  			 <td>$r[tanggal_lahir]</td>
								  			 <td>$r[agama]</td>
								  			 <td>$r[pendidikan]</td>
								  			 <td>$r[jenis_pekerjaan]</td>
								  		</tr>";
								  		$no++;
								  }
								  echo "</tbody>
						  		</table>
                </div>
            </div>
        </article>";
}