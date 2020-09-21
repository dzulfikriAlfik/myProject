<?php echo form_open('domisili/add',array("class"=>"form-horizontal" , "enctype" => 'multipapindah_ke/form-data')); ?>

	<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
	<div class="form-group">
		<label for="nama_warga" class="col-md-2 control-label"><span class="text-danger">*</span>Nama Lengkap</label>
		<div class="col-md-6">
			<input type="text" name="nama_warga" value="<?php echo $this->input->post('nama_warga'); ?>" class="form-control" id="nama_warga" />
			<span class="text-danger"><?php echo form_error('nama_warga');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nik" class="col-md-2 control-label"><span class="text-danger">*</span>NIK</label>
		<div class="col-md-6">
			<input type="text" name="nik" value="<?php echo $this->input->post('nik'); ?>" class="form-control" id="nik" />
			<span class="text-danger"><?php echo form_error('nik');?></span>
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
		<label for="kewarganegaraan" class="col-md-2 control-label"><span class="text-danger">*</span>Kewarganegaraan</label>
		<div class="col-md-6">
			<input type="text" name="kewarganegaraan" value="<?php echo $this->input->post('kewarganegaraan'); ?>" class="form-control" id="kewarganegaraan" />
			<span class="text-danger"><?php echo form_error('kewarganegaraan');?></span>
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
                <option>Buruh Usaha Jasa Informasi dan Komunama_wargaasi</option>
                <option>Buruh Usaha Jasa Transpopindah_keasi dan Perhubungan</option>
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
                <option>Seniman/apindah_keis</option>
                <option>Sopir</option>
                <option>Tidak Mempunyai Pekerjaan Tetap</option>
                <option>TNI</option>
                <option>Walikota</option>
                <option>Wakil Walikota</option>
                <option>Wakil bupati</option>
                <option>Wakil Gubernur</option>
                <option>Wakil Presiden</option>
                <option>Wapindah_keawan</option>
                <option>Wiraswasta</option>
            </select>
            <span class="text-danger"><?php echo form_error('pekerjaan');?></span>
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
		<label for="alamat_asal" class="col-md-2 control-label"><span class="text-danger">*</span>Alamat Asal</label>
		<div class="col-md-6">
			<input type="text" name="alamat_asal" value="<?php echo $this->input->post('alamat_asal'); ?>" class="form-control" id="alamat_asal" />
			<span class="text-danger"><?php echo form_error('alamat_asal');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="pindah_ke" class="col-md-2 control-label"><span class="text-danger">*</span>Pindah Ke-</label>
		<div class="col-md-6">
			<input type="text" name="pindah_ke" value="<?php echo $this->input->post('pindah_ke'); ?>" class="form-control" id="pindah_ke" />
			<span class="text-danger"><?php echo form_error('pindah_ke');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="alasan_pindah" class="col-md-2 control-label"><span class="text-danger">*</span>Alasan Pindah</label>
		<div class="col-md-6">
			<input type="text" name="alasan_pindah" value="<?php echo $this->input->post('alasan_pindah'); ?>" class="form-control" id="alasan_pindah" />
			<span class="text-danger"><?php echo form_error('alasan_pindah');?></span>
		</div>
	</div>	
	<div class="form-group">
		<label for="pengikut" class="col-md-2 control-label"><span class="text-danger">*</span>Pengikut</label>
		<div class="col-md-6">
			<input type="text" name="pengikut" value="<?php echo $this->input->post('pengikut'); ?>" class="form-control" id="pengikut" />
			<span class="text-danger"><?php echo form_error('pengikut');?></span>
		</div>
	</div>
    <div class="form-group">
        <label for="tgl_surat_dibuat" class="col-md-2 control-label"><span class="text-danger">*</span>Tanggal Surat Dibuat</label>
        <div class="col-md-6">
            <input type="text" name="tgl_surat_dibuat" value="<?php echo $this->input->post('tgl_surat_dibuat'); ?>" class="form-control" id="tgl_surat_dibuat" />
            <span class="text-danger"><?php echo form_error('tgl_surat_dibuat');?></span>
        </div>
    </div>
    <div class="form-group">
        <label for="tgl_surat_masuk" class="col-md-2 control-label"><span class="text-danger">*</span>Tanggal Surat Masuk</label>
        <div class="col-md-6">
            <input type="text" name="tgl_surat_masuk" value="<?php echo $this->input->post('tgl_surat_masuk'); ?>" class="form-control" id="tgl_surat_masuk" />
            <span class="text-danger"><?php echo form_error('tgl_surat_masuk');?></span>
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
		<label for="scan" class="col-md-2 control-label"><span class="text-danger">*</span>Scan</label>
		<div class="col-md-6">
			<input type="file" name="scan" value="<?php echo $this->input->post('scan'); ?>" class="form-control" id="scan" />
			<span class="text-danger"><?php echo form_error('scan');?></span>
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