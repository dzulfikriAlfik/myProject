<?php echo form_open('datawarga/add',array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>

	<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
	<div class="form-group">
		<label for="nik" class="col-md-2 control-label"><span class="text-danger">*</span>NIK</label>
		<div class="col-md-6">
			<input type="text" name="nik" value="<?php echo $this->input->post('nik'); ?>" class="form-control" id="nik" />
			<span class="text-danger"><?php echo form_error('nik');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="no_kk" class="col-md-2 control-label"><span class="text-danger">*</span>No KK</label>
		<div class="col-md-6">
			<input type="text" name="no_kk" value="<?php echo $this->input->post('no_kk'); ?>" class="form-control" id="no_kk" />
			<span class="text-danger"><?php echo form_error('no_kk');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_lengkap" class="col-md-2 control-label"><span class="text-danger">*</span>Nama Lengkap</label>
		<div class="col-md-6">
			<input type="text" name="nama_lengkap" value="<?php echo $this->input->post('nama_lengkap'); ?>" class="form-control" id="nama_lengkap" />
			<span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-md-2 control-label"><span class="text-danger">*</span>Alamat</label>
		<div class="col-md-6">
			<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
			<span class="text-danger"><?php echo form_error('alamat');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="rt" class="col-md-2 control-label"><span class="text-danger">*</span>RT</label>
		<div class="col-md-6">
			<input type="text" name="rt" value="<?php echo $this->input->post('rt'); ?>" class="form-control" id="rt" />
			<span class="text-danger"><?php echo form_error('rt');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="rw" class="col-md-2 control-label"><span class="text-danger">*</span>RW</label>
		<div class="col-md-6">
			<input type="text" name="rw" value="<?php echo $this->input->post('rw'); ?>" class="form-control" id="rw" />
			<span class="text-danger"><?php echo form_error('rw');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_kelamin" class="col-md-2 control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
		<div class="col-md-6">
			<input type="radio" name="jenis_kelamin" value="Laki"/>Laki-laki<br/>
             <input type="radio" name="jenis_kelamin" value="Perempuan"/>Perempuan<br/>
			<span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="tempat_tanggal_lahir" class="col-md-2 control-label"><span class="text-danger">*</span>Tempat Tanggal Lahir</label>
		<div class="col-md-6">
			<input type="date" name="tempat_tanggal_lahir" value="<?php echo $this->input->post('tempat_tanggal_lahir'); ?>" class="form-control" id="tempat_tanggal_lahir" />
			<span class="text-danger"><?php echo form_error('tempat_tanggal_lahir');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="no_telp" class="col-md-2 control-label"><span class="text-danger">*</span>No Telepon</label>
		<div class="col-md-6">
			<input type="text" name="no_telp" value="<?php echo $this->input->post('no_telp'); ?>" class="form-control" id="no_telp" />
			<span class="text-danger"><?php echo form_error('no_telp');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="agama" class="col-md-2 control-label"><span class="text-danger">*</span>Agama</label>
		<div class="col-md-6">
			<select class="form-control" id="sel1" name="agama">
    			<option>Islam</option>
    			<option>Kristen</option>
    			<option>Katholik</option>
    			<option>Hindu</option>
    			<option>Budha</option>
    			<option>Konghucu</option>
    			<option>Lainnya</option>
  			</select>
			<span class="text-danger"><?php echo form_error('agama');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="pendidikan" class="col-md-2 control-label"><span class="text-danger">*</span>Pendidikan</label>
		<div class="col-md-6">
			<select class="form-control" id="sel1" name="pendidikan">
    			<option>Belum/Tidak Sekolah</option>
    			<option>Sedang TK/Kelompok Bermain</option>
    			<option>Sedang SD/Sederajat</option>
    			<option>Sedang SMP/Sederajat</option>
    			<option>Sedang SMA/Sederajat</option>
    			<option>Sedang D-1/Sederajat</option>
    			<option>Sedang D-2/Sederajat</option>
    			<option>Sedang D-3/Sederajat</option>
    			<option>Sedang S-1/Sederajat</option>
    			<option>Sedang S-2/Sederajat</option>
    			<option>Sedang S-3/Sederajat</option>
    			<option>Tamat SD/Sederajat</option>
    			<option>Tamat SMP/Sederajat</option>
    			<option>Tamat SMA/Sederajat</option>
    			<option>Tamat D-1/Sederajat</option>
    			<option>Tamat D-2/Sederajat</option>
    			<option>Tamat D-3/Sederajat</option>
    			<option>Tamat S-1/Sederajat</option>
    			<option>Tamat S-2/Sederajat</option>
    			<option>Tamat S-3/Sederajat</option>
    			<option>Tidak Pernah Sekolah</option>
    			<option>Tidak Tamat SD/Sederajat</option>

  			</select>
			<span class="text-danger"><?php echo form_error('pendidikan');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="pekerjaan" class="col-md-2 control-label"><span class="text-danger">*</span>Pekerjaan</label>
		<div class="col-md-6">
			<select class="form-control" id="sel1" name="pekerjaan">
    			<option>Akuntan</option>
    			<option>Anggota Kabinet Kementrian</option>
    			<option>Anggota Legislatif</option>
    			<option>Anggota Mahkamah Konstitusi</option>
    			<option>Apoteker</option>
    			<option>Arsitektur/Desainer</option>
    			<option>Belum Bekerja</option>
    			<option>Bidan Swasta</option>
    			<option>Bupati</option>
    			<option>Buruh Harian Lepas</option>
    			<option>Buruh Jasa Perdagangan Hasil Bumi</option>
    			<option>Buruh Migran</option>
    			<option>Buruh Tani</option>
    			<option>Buruh Usaha Hotel dan Penginapan lainnya</option>
    			<option>Buruh Usaha Jasa Hiburan dan Pariwisata</option>
    			<option>Buruh Usaha Jasa Informasi dan Komunikasi</option>
    			<option>Buruh Usaha Jasa Transportasi dan Perhubungan</option>
    			<option>Dokter Swasta</option>
    			<option>Dosen Swasta</option>
    			<option>Dukun Tradisional</option>
    			<option>Dukun/Paranormal/Supranatural</option>
    			<option>Duta Besar</option>
    			<option>Gubernur</option>
    			<option>Guru</option>
    			<option>Ibu Rumah Tangga</option>
    			<option>Jasa Konsultasi</option>
    			<option>Jasa Pengobatan Alternatif</option>
    			<option>Jasa Penyewaan Alat Pesta</option>
    			<option>Juru Masak</option>
    			<option>Karyawan Honorer</option>
    			<option>Karyawan Perusahaan Pemerintah</option>
    			<option>Karyawan Swasta</option>
    			<option>Kepala Daerah</option>
    			<option>Konsultan Manajemen dan Teknis</option>
    			<option>Kontraktor</option>
    			<option>Montir</option>
    			<option>Nelayan</option>
    			<option>Notaris</option>
    			<option>Pedagang barang kelontong</option>
    			<option>Pedagang Keliling</option>
    			<option>Pegawai Negeri Sipil</option>
    			<option>Pelajar</option>
    			<option>Pelaut</option>
    			<option>Pembantu rumah tangga</option>
    			<option>Pemilik perusahaan</option>
    			<option>Pemulung</option>
    			<option>Pemuka Agama</option>
    			<option>Pemulung</option>
    			<option>Pengacara</option>
    			<option>Pengrajin</option>
    			<option>Pengrajin industri rumah tangga lainnya</option>
    			<option>Pengusaha kecil, menengah dan besar</option>
    			<option>Penyiar radio</option>
    			<option>Perangkat Desa</option>
    			<option>Perawat</option>
    			<option>Petani</option>
    			<option>Peternak</option>
    			<option>Pilot</option>
    			<option>POLRI</option>
    			<option>Presiden</option>
    			<option>Pskiater/Psikolog</option>
    			<option>Pensiunan</option>
    			<option>Satpam/Security</option>
    			<option>Seniman/artis</option>
    			<option>Sopir</option>
    			<option>Tidak Mempunyai Pekerjaan Tetap</option>
    			<option>TNI</option>
    			<option>Walikota</option>
    			<option>Wakil Walikota</option>
    			<option>Wakil bupati</option>
    			<option>Wakil Gubernur</option>
    			<option>Wakil Presiden</option>
    			<option>Wartawan</option>
    			<option>Wiraswasta</option>

  			</select>
			<span class="text-danger"><?php echo form_error('pekerjaan');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-2 control-label"><span class="text-danger">*</span>Status Kawin</label>
		<div class="col-md-6">
			 <input type="radio" name="status" value="Kawin"/>Kawin<br/>
             <input type="radio" name="status" value="Belum"/>Belum Kawin<br/>
			<span class="text-danger"><?php echo form_error('status');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="hubungan_keluarga" class="col-md-2 control-label"><span class="text-danger">*</span>Hubungan Keluarga</label>
		<div class="col-md-6">
			<select class="form-control" id="sel1" name="hubungan_keluarga">
    			<option>Kepala Keluarga</option>
    			<option>Istri</option>
    			<option>Suami</option>
    			<option>Anak Kandung</option>
    			<option>Adik</option>
    			<option>Kakak</option>
    			<option>Ayah</option>
    			<option>Ibu</option>
    			<option>Mertua</option>
    			<option>Menantu</option>
    			<option>Famili Lain</option>
  			</select>
			<span class="text-danger"><?php echo form_error('hubungan_keluarga');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="scan" class="col-md-2 control-label"><span class="text-danger">*</span>Scan</label>
		<div class="col-md-6">
			<input type="file" name="scan" value="<?php echo $this->input->post('scan'); ?>" class="form-control" id="scan" />
			<span class="text-danger"><?php echo form_error('scan');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="ket" class="col-md-2 control-label"><span class="text-danger">*</span>Keterangan</label>
		<div class="col-md-6">
			<input type="text" name="ket" value="<?php echo $this->input->post('ket'); ?>" class="form-control" id="ket" />
			<span class="text-danger"><?php echo form_error('ket');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
</div>
    </div>
</div>
<?php echo form_close(); ?>