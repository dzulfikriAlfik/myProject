<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Data</h3>
            </div>
   <?php echo form_open('domisili/edit/'.$domisili['nik']); ?>
   <div class="box-body">
    <div class="row clearfix">
     <div class="col-md-12">
      <label for="nik" class="control-label"><span class="text-danger">*</span>NIK</label>
      <div class="form-group">
       <input type="text" name="nik" value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $datawarga['nik']); ?>" class="form-control" id="nik" />
       <span class="text-danger"><?php echo form_error('nik');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="no_kk" class="control-label"><span class="text-danger">*</span>No KK</label>
      <div class="form-group">
       <input type="text" name="no_kk" value="<?php echo ($this->input->post('no_kk') ? $this->input->post('no_kk') : $datawarga['no_kk']); ?>" class="form-control" id="no_kk" />
       <span class="text-danger"><?php echo form_error('no_kk');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="nama_lengkap" class="control-label"><span class="text-danger">*</span>Nama Lengkap</label>
      <div class="form-group">
       <input type="text" name="nama_lengkap" value="<?php echo ($this->input->post('nama_lengkap') ? $this->input->post('nama_lengkap') : $datawarga['nama_lengkap']); ?>" class="form-control" id="nama_lengkap" />
       <span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="alamat" class="control-label"><span class="text-danger">*</span>Alamat</label>
      <div class="form-group">
       <input type="text" name="alamat" value="<?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $datawarga['alamat']); ?>" class="form-control" id="alamat" />
       <span class="text-danger"><?php echo form_error('alamat');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="rt" class="control-label"><span class="text-danger">*</span>RT</label>
      <div class="form-group">
       <input type="text" name="rt" value="<?php echo ($this->input->post('rt') ? $this->input->post('rt') : $datawarga['rt']); ?>" class="form-control" id="rt" />
       <span class="text-danger"><?php echo form_error('rt');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="rw" class="control-label"><span class="text-danger">*</span>RW</label>
      <div class="form-group">
       <input type="text" name="rw" value="<?php echo ($this->input->post('rw') ? $this->input->post('rw') : $datawarga['rw']); ?>" class="form-control" id="rw" />
       <span class="text-danger"><?php echo form_error('rw');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="jenis_kelamin" class="control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
      <div class="form-group">
       <input type="text" name="jenis_kelamin" value="<?php echo ($this->input->post('jenis_kelamin') ? $this->input->post('jenis_kelamin') : $datawarga['jenis_kelamin']); ?>" class="form-control" id="jenis_kelamin" />
       <span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="tempat_tanggal_lahir" class="control-label"><span class="text-danger">*</span>Tempat Tanggal Lahir</label>
      <div class="form-group">
       <input type="date" name="tempat_tanggal_lahir" value="<?php echo ($this->input->post('tempat_tanggal_lahir') ? $this->input->post('tempat_tanggal_lahir') : $datawarga['tempat_tanggal_lahir']); ?>" class="form-control" id="tempat_tanggal_lahir" />
       <span class="text-danger"><?php echo form_error('tempat_tanggal_lahir');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="no_telp" class="control-label"><span class="text-danger">*</span>No Telp</label>
      <div class="form-group">
       <input type="text" name="no_telp" value="<?php echo ($this->input->post('no_telp') ? $this->input->post('no_telp') : $datawarga['no_telp']); ?>" class="form-control" id="no_telp" />
       <span class="text-danger"><?php echo form_error('no_telp');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="agama" class="control-label"><span class="text-danger">*</span>Agama</label>
      <div class="form-group">
       <input type="text" name="agama" value="<?php echo ($this->input->post('agama') ? $this->input->post('agama') : $datawarga['agama']); ?>" class="form-control" id="agama" />
       <span class="text-danger"><?php echo form_error('agama');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="pendidikan" class="control-label"><span class="text-danger">*</span>Pendidikan</label>
      <div class="form-group">
       <input type="text" name="pendidikan" value="<?php echo ($this->input->post('pendidikan') ? $this->input->post('pendidikan') : $datawarga['pendidikan']); ?>" class="form-control" id="pendidikan" />
       <span class="text-danger"><?php echo form_error('pendidikan');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="pekerjaan" class="control-label"><span class="text-danger">*</span>Pekerjaan</label>
      <div class="form-group">
       <input type="text" name="pekerjaan" value="<?php echo ($this->input->post('pekerjaan') ? $this->input->post('pekerjaan') : $datawarga['pekerjaan']); ?>" class="form-control" id="pekerjaan" />
       <span class="text-danger"><?php echo form_error('pekerjaan');?></span>
      </div>
     </div>
      <div class="col-md-12">
      <label for="status" class="control-label"><span class="text-danger">*</span>Status Kawin</label>
      <div class="form-group">
       <input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $datawarga['status']); ?>" class="form-control" id="status" />
       <span class="text-danger"><?php echo form_error('status');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="hubungan_keluarga" class="control-label"><span class="text-danger">*</span>Hubungan Keluarga</label>
      <div class="form-group">
       <input type="text" name="hubungan_keluarga" value="<?php echo ($this->input->post('hubungan_keluarga') ? $this->input->post('hubungan_keluarga') : $datawarga['hubungan_keluarga']); ?>" class="form-control" id="hubungan_keluarga" />
       <span class="text-danger"><?php echo form_error('hubungan_keluarga');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="scan" class="control-label"><span class="text-danger">*</span>Scan</label>
      <div class="form-group">
       <input type="file" name="scan" value="<?php echo ($this->input->post('scan') ? $this->input->post('scan') : $datawarga['scan']); ?>" class="form-control" id="scan" />
       <span class="text-danger"><?php echo form_error('scan');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="ket" class="control-label"><span class="text-danger">*</span>Keterangan</label>
      <div class="form-group">
       <input type="text" name="ket" value="<?php echo ($this->input->post('ket') ? $this->input->post('ket') : $datawarga['ket']); ?>" class="form-control" id="ket" />
       <span class="text-danger"><?php echo form_error('ket');?></span>
      </div>
     </div>
    </div>
   </div>
   <div class="box-footer">
             <button type="submit" class="btn btn-success">
     <i class="fa fa-check"></i> Save
    </button>
         </div>    
   <?php echo form_close(); ?>
  </div>
    </div>
</div>