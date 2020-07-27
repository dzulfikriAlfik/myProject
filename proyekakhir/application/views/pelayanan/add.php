<?php echo form_open('pelayanan/add',array("class"=>"form-horizontal")); ?>

	<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
            </div>
	<div class="form-group">
		<label for="nama_lengkap" class="col-md-4 control-label"><span class="text-danger">*</span>Nama Lengkap</label>
		<div class="col-md-8">
			<input type="text" name="nama_lengkap" value="<?php echo $this->input->post('nama_lengkap'); ?>" class="form-control" id="nama_lengkap" />
			<span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-md-4 control-label"><span class="text-danger">*</span>Alamat</label>
		<div class="col-md-8">
			<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
			<span class="text-danger"><?php echo form_error('alamat');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="tempat_tanggal_lahir" class="col-md-4 control-label"><span class="text-danger">*</span>Tempat Tanggal Lahir</label>
		<div class="col-md-8">
			<input type="text" name="tempat_tanggal_lahir" value="<?php echo $this->input->post('tempat_tanggal_lahir'); ?>" class="form-control" id="tempat_tanggal_lahir" />
			<span class="text-danger"><?php echo form_error('tempat_tanggal_lahir');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="no_telp" class="col-md-4 control-label"><span class="text-danger">*</span>No Telp</label>
		<div class="col-md-8">
			<input type="text" name="no_telp" value="<?php echo $this->input->post('no_telp'); ?>" class="form-control" id="no_telp" />
			<span class="text-danger"><?php echo form_error('no_telp');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_kelamin" class="col-md-4 control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
		<div class="col-md-8">
			<input type="text" name="jenis_kelamin" value="<?php echo $this->input->post('jenis_kelamin'); ?>" class="form-control" id="jenis_kelamin" />
			<span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="agama" class="col-md-4 control-label"><span class="text-danger">*</span>Agama</label>
		<div class="col-md-8">
			<input type="text" name="agama" value="<?php echo $this->input->post('agama'); ?>" class="form-control" id="agama" />
			<span class="text-danger"><?php echo form_error('agama');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label"><span class="text-danger">*</span>Status Kawin</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
			<span class="text-danger"><?php echo form_error('status');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-md-4 control-label"><span class="text-danger">*</span>Username</label>
		<div class="col-md-8">
			<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
			<span class="text-danger"><?php echo form_error('username');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
		<div class="col-md-8">
			<input type="text" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
			<span class="text-danger"><?php echo form_error('password');?></span>
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