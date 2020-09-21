<!-- Memanggil file .js untuk proses autocomplete -->
  <script type='text/javascript' src='<?php echo base_url();?>assetku/autocomplete/js/jquery-1.8.2.min.js'></script>
  <script type='text/javascript' src='<?php echo base_url();?>assetku/autocomplete/js/jquery.autocomplete.js'></script>

  <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
  <link href='<?php echo base_url();?>assetku/autocomplete/js/jquery.autocomplete.css' rel='stylesheet' />

  <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
  <link href='<?php echo base_url();?>assetku/autocomplete/css/default.css' rel='stylesheet' />

  <script type='text/javascript'>
      var site = "<?php echo site_url();?>";
      $(function(){
          $('#bidang_kegiatan').autocomplete({
              // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
              serviceUrl: site+'datapenduduk/c_data_anggaran/cari_bidang_kegiatan',
              // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
              onSelect: function (suggestion) {
                  $('#id_bidang_kegiatan').val(''+suggestion.id_bidang_kegiatan); // membuat id 'v_nim' untuk ditampilkan
                  $('#v_desa').val(''+suggestion.nama_desa); // membuat id 'v_jurusan' untuk ditampilkan
              }
          });

          $("#bidang_kegiatan").keyup(function(){
              if ($("#bidang_kegiatan").val() == '') {
                  $('#id_bidang_kegiatan').val('');
                  $('#v_desa').val('');
              }
          });


          /* Dengan Rupiah */
          var dengan_rupiah = document.getElementById('pagu');
        	dengan_rupiah.addEventListener('keyup', function(e)
        	{
        		dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        	});

        	/* Fungsi */
        	function formatRupiah(angka, prefix)
        	{
        		var number_string = angka.replace(/[^,\d]/g, '').toString(),
        			split	= number_string.split(','),
        			sisa 	= split[0].length % 3,
        			rupiah 	= split[0].substr(0, sisa),
        			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);

        		if (ribuan) {
        			separator = sisa ? '.' : '';
        			rupiah += separator + ribuan.join('.');
        		}

        		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        	}


      });
  </script>

<h2><?= $page_title ?></h2>

<div class="row">
                <div class="col-lg-12">

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>



<?php echo form_open_multipart('datapenduduk/c_data_anggaran/simpan_data_anggaran'); ?>
	<fieldset>
		<!-- Form Name -->
		<legend></legend>

		<!-- Text input-->
    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Nama Bidang & Kegiatan</label>
		  <div class="col-md-9">
		  <input id="bidang_kegiatan" name="bidang_kegiatan" type="search" placeholder="Nama Bidang & Kegiatan" class="form-control input-md" required=""/>
      <input id="id_bidang_kegiatan" name="id_bidang_kegiatan" type="hidden" placeholder="Nama Bidang & Kegiatan" class="form-control input-md" required=""/>
		  <span class="help-block"><?php echo form_error('bidang_kegiatan', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <!-- Text input-->
    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Nama Desa</label>
		  <div class="col-md-9">
		  <input id="v_desa" name="desa" type="text" placeholder="Nama Desa" class="form-control input-md" required="" disabled/>
		  <span class="help-block"><?php echo form_error('desa', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Lokasi</label>
		  <div class="col-md-9">
		  <input id="lokasi" name="lokasi" type="text" placeholder="Nama Lokasi" class="form-control input-md" required=""/>
		  <span class="help-block"><?php echo form_error('lokasi', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Waktu</label>
		  <div class="col-md-9">
		  <input id="waktu" name="waktu" type="text" placeholder="Nama Waktu" class="form-control input-md" required=""/>
		  <span class="help-block"><?php echo form_error('waktu', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Nama PPTKD</label>
		  <div class="col-md-9">
		  <input id="nama_pptkd" name="nama_pptkd" type="text" placeholder="Nama PPTKD" class="form-control input-md" required=""/>
		  <span class="help-block"><?php echo form_error('nama_pptkd', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Pagu</label>
		  <div class="col-md-9">
		  <input id="pagu" name="pagu" type="text" placeholder="Pagu" class="form-control input-md" required=""/>
		  <span class="help-block"><?php echo form_error('pagu', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Keluaran</label>
		  <div class="col-md-9">
		  <input id="keluaran" name="keluaran" type="text" placeholder="Keluaran" class="form-control input-md" required=""/>
		  <span class="help-block"><?php echo form_error('keluaran', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

		<legend></legend>


		<!-- Button (Double) -->
		<div class="form-group">
		  <label class="col-md-0 control-label" for="simpan"></label>
		  <div class="col-md-9">
			<button id="simpan" name="simpan" class="btn btn-success">Simpan</button>
			<button id="batal" name="batal" class="btn btn-danger" onclick="location.href='<?= base_url() ?>datapenduduk/c_data_anggaran'">Batal</button>
		  </div>
		</div>

	</fieldset>
<?php echo form_close(); ?>

</div>
</div>


<script>
function nav_active(){

	document.getElementById("a-data-penganggaran").className = "collapsed active";

	document.getElementById("penganggaran").className = "collapsed";

	var d = document.getElementById("nav-data_anggaran");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>
