<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Data</h3>
            </div>
   <?php echo form_open('sekdes/edit/'.$sekdes['id_sekdes']); ?>
   <div class="box-body">
    <div class="row clearfix">
     <div class="col-md-12">
      <label for="nama_lengkap" class="control-label"><span class="text-danger">*</span>Nama Lengkap</label>
      <div class="form-group">
       <input type="text" name="nama_lengkap" value="<?php echo ($this->input->post('nama_lengkap') ? $this->input->post('nama_lengkap') : $sekdes['nama_lengkap']); ?>" class="form-control" id="nama_lengkap" />
       <span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="alamat" class="control-label"><span class="text-danger">*</span>Alamat</label>
      <div class="form-group">
       <input type="text" name="alamat" value="<?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $sekdes['alamat']); ?>" class="form-control" id="alamat" />
       <span class="text-danger"><?php echo form_error('alamat');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="tempat_tanggal_lahir" class="control-label"><span class="text-danger">*</span>Tempat Tanggal Lahir</label>
      <div class="form-group">
       <input type="text" name="tempat_tanggal_lahir" value="<?php echo ($this->input->post('tempat_tanggal_lahir') ? $this->input->post('tempat_tanggal_lahir') : $sekdes['tempat_tanggal_lahir']); ?>" class="form-control" id="tempat_tanggal_lahir" />
       <span class="text-danger"><?php echo form_error('tempat_tanggal_lahir');?></span>
      </div>
     </div>
      <div class="col-md-12">
      <label for="no_telp" class="control-label"><span class="text-danger">*</span>No Telp</label>
      <div class="form-group">
       <input type="text" name="no_telp" value="<?php echo ($this->input->post('no_telp') ? $this->input->post('no_telp') : $sekdes['no_telp']); ?>" class="form-control" id="no_telp" />
       <span class="text-danger"><?php echo form_error('no_telp');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="jenis_kelamin" class="control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
      <div class="form-group">
       <input type="text" name="jenis_kelamin" value="<?php echo ($this->input->post('jenis_kelamin') ? $this->input->post('jenis_kelamin') : $sekdes['jenis_kelamin']); ?>" class="form-control" id="jenis_kelamin" />
       <span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
      </div>
     </div>
      <div class="col-md-12">
      <label for="agama" class="control-label"><span class="text-danger">*</span>Agama</label>
      <div class="form-group">
       <input type="text" name="agama" value="<?php echo ($this->input->post('agama') ? $this->input->post('agama') : $sekdes['agama']); ?>" class="form-control" id="agama" />
       <span class="text-danger"><?php echo form_error('agama');?></span>
      </div>
     </div>
      <div class="col-md-12">
      <label for="status" class="control-label"><span class="text-danger">*</span>Status Kawin</label>
      <div class="form-group">
       <input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $sekdes['status']); ?>" class="form-control" id="status" />
       <span class="text-danger"><?php echo form_error('status');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
      <div class="form-group">
       <input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $sekdes['username']); ?>" class="form-control" id="username" />
       <span class="text-danger"><?php echo form_error('username');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
      <div class="form-group">
       <input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $sekdes['password']); ?>" class="form-control" id="password" />
       <span class="text-danger"><?php echo form_error('password');?></span>
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