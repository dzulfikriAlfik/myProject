<h3><?= $page_title ?></h3>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php echo form_open('pustaka/c_status_penduduk/update_status_penduduk'); ?>
<fieldset>
	<legend></legend>
	<!-- Text input-->
	<div class="form-group">
		<div class="col-md-9">
			<input  value="<?= $hasil->id_status_penduduk?>" id="id_status_penduduk" name="id_status_penduduk" type="hidden" placeholder="Deskripsi" class="form-control input-md">
			<span class="help-block"><?php echo form_error('id_status_penduduk', '<p class="field_error">','</p>')?></span>  
		</div>
	</div>


	<!-- Text input-->
	<div class="form-group">
		<label  class="col-md-3 control-label" for="deskripsi">Deskripsi</label>
		<div class="col-md-9">
			<input  value="<?= $hasil->deskripsi?>" id="deskripsi" name="deskripsi" type="text" 
			placeholder="Deskripsi" class="form-control input-md">
			<span class="help-block"><?php echo form_error('deskripsi', '<p class="field_error">','</p>')?></span>  
		</div>
	</div>
	<legend></legend>
</fieldset>
<p>
<input type="submit" value="Simpan" id="simpan" class="btn btn-success"/>
<input type="button" value="Batal" id="batal" class="btn btn-danger" onclick="location.href='<?= base_url() ?>pustaka/c_status_penduduk'"/>
</p>

<script>
function nav_active(){
	
	document.getElementById("a-data-pustaka_kependudukan").className = "collapsed active";
	
	document.getElementById("pustaka_kependudukan").className = "collapsed";

	var d = document.getElementById("nav-status_penduduk");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>