<h3><?= $page_title ?></h3>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php echo form_open('pustaka/c_jabatan/simpan_jabatan'); ?>
<fieldset>
	<legend></legend>

	<!-- Text input-->
	<div class="form-group">
		<label  class="col-md-3 control-label" for="deskripsi">Deskripsi</label>
		<div class="col-md-9">
			<input   id="deskripsi" name="deskripsi" type="text" 
			placeholder="Deskripsi" class="form-control input-md">
			<span class="help-block"><?php echo form_error('deskripsi', '<p class="field_error">','</p>')?></span>  
		</div>
	</div>
	<legend></legend>
</fieldset>
<p>
<input type="submit" value="Simpan" id="simpan" class="btn btn-success"/>
<input type="button" value="Batal" id="batal" class="btn btn-danger" onclick="location.href='<?= base_url() ?>pustaka/c_jabatan'"/>
</p>

<script>
function nav_active(){
	
	document.getElementById("a-data-pustaka_lainnya").className = "collapsed active";
	
	document.getElementById("pustaka_lainnya").className = "collapsed";

	var d = document.getElementById("nav-jabatan");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>