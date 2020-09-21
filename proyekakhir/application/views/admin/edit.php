<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Data</h3>
            </div>
   <?php echo form_open('admin/edit/'.$admin['id_admin']); ?>
   <div class="box-body">
    <div class="row clearfix">
     <div class="col-md-12">
      <label for="nama_lengkap" class="control-label"><span class="text-danger">*</span>Nama Lengkap</label>
      <div class="form-group">
       <input type="text" name="nama_lengkap" value="<?php echo ($this->input->post('nama_lengkap') ? $this->input->post('nama_lengkap') : $admin['nama_lengkap']); ?>" class="form-control" id="nama_lengkap" />
       <span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="tempat_tanggal_lahir" class="control-label"><span class="text-danger">*</span>Tempat Tanggal Lahir</label>
      <div class="form-group">
       <input type="text" name="tempat_tanggal_lahir" value="<?php echo ($this->input->post('tempat_tanggal_lahir') ? $this->input->post('tempat_tanggal_lahir') : $admin['tempat_tanggal_lahir']); ?>" class="form-control" id="tempat_tanggal_lahir" />
       <span class="text-danger"><?php echo form_error('tempat_tanggal_lahir');?></span>
      </div>
     </div>
      <div class="col-md-12">
      <label for="no_telp" class="control-label"><span class="text-danger">*</span>No Telp</label>
      <div class="form-group">
       <input type="text" name="no_telp" value="<?php echo ($this->input->post('no_telp') ? $this->input->post('no_telp') : $admin['no_telp']); ?>" class="form-control" id="no_telp" />
       <span class="text-danger"><?php echo form_error('no_telp');?></span>
      </div>
     </div>
      <div class="col-md-12">
      <label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
      <div class="form-group">
       <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $admin['email']); ?>" class="form-control" id="email" />
       <span class="text-danger"><?php echo form_error('email');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
      <div class="form-group">
       <input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $admin['username']); ?>" class="form-control" id="username" />
       <span class="text-danger"><?php echo form_error('username');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
      <div class="form-group">
       <input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $admin['password']); ?>" class="form-control" id="password" />
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