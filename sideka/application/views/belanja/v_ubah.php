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
          $('#desa').autocomplete({
              // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
              serviceUrl: site+'datapenduduk/c_belanja/cari_desa',
              // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
              onSelect: function (suggestion) {
                  $('#v_id_desa').val(''+suggestion.id_desa); // membuat id 'v_nim' untuk ditampilkan
                  // $('#v_jurusan').val(''+suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
                  $('#bidang_kegiatan').autocomplete({
                      // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                      serviceUrl: site+'datapenduduk/c_belanja/cari_bidang_kegiatan/'+suggestion.id_desa,
                      // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                      onSelect: function (suggestion) {
                          $('#v_id_bidang_kegiatan').val(''+suggestion.id_bidang_kegiatan); // membuat id 'v_nim' untuk ditampilkan
                          // $('#v_jurusan').val(''+suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
                      }
                  });
              }
          });

          $("#desa").keyup(function(){
              if ($("#desa").val() == '') {
                  $('#v_id_desa').val('');
              }
          });

          $("#bidang_kegiatan").keyup(function(){
              if ($("#bidang_kegiatan").val() == '') {
                  $('#v_id_bidang_kegiatan').val('');
              }
          });

          /* Dengan Rupiah */
          var dengan_rupiah = document.getElementById('anggaran');
        	dengan_rupiah.addEventListener('keyup', function(e)
        	{
        		dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        	});

          var dengan_rupiah2 = document.getElementById('anggaranpak');
        	dengan_rupiah2.addEventListener('keyup', function(e)
        	{
        		dengan_rupiah2.value = formatRupiah(this.value, 'Rp. ');
        	});

          var dengan_rupiah3 = document.getElementById('harga_satuan');
        	dengan_rupiah3.addEventListener('keyup', function(e)
        	{
        		dengan_rupiah3.value = formatRupiah(this.value, 'Rp. ');
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



<?php echo form_open_multipart('datapenduduk/c_belanja/update_belanja'); ?>
	<fieldset>
		<!-- Form Name -->
		<legend></legend>

    <!-- Text input-->
    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Nama Desa</label>
		  <div class="col-md-9">
		  <input id="desa" name="desa" type="search" placeholder="Nama Desa" class="form-control input-md" required="" value="<?= $hasil->nama_desa?>"/>
      <input id="v_id_desa" name="id_desa" type="hidden" placeholder="ID Desa" class="form-control input-md" required="" value="<?= $hasil->id_desa?>"/>
      <input id="v_id_belanja" name="id_belanja" type="hidden" placeholder="ID Belanja" class="form-control input-md" required="" value="<?= $hasil->id_belanja?>"/>
		  <span class="help-block"><?php echo form_error('desa', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Bidang & Kegiatan</label>
		  <div class="col-md-9">
		  <input id="bidang_kegiatan" name="bidang_kegiatan" type="search" placeholder="Bidang & Kegiatan" class="form-control input-md" required="" value="<?= $hasil->bidang_kegiatan?>"/>
      <input id="v_id_bidang_kegiatan" name="id_bidang_kegiatan" type="hidden" placeholder="ID Bidang & Kegiatan" class="form-control input-md" required="" value="<?= $hasil->id_bidang_kegiatan?>"/>
		  <span class="help-block"><?php echo form_error('bidang_kegiatan', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <!-- Text input-->

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Anggaran</label>
		  <div class="col-md-9">
		  <input id="anggaran" name="anggaran" type="text" placeholder="Anggaran" class="form-control input-md" required="" value="Rp. <?= number_format($hasil->anggaran,0,",",".")?>"/>
		  <span class="help-block"><?php echo form_error('anggaran', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Anggaran PAK</label>
		  <div class="col-md-9">
		  <input id="anggaranpak" name="anggaranpak" type="text" placeholder="Anggaran PAK" class="form-control input-md" required="" value="Rp. <?= number_format($hasil->anggaranpak,0,",",".")?>"/>
		  <span class="help-block"><?php echo form_error('anggaranpak', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Jumlah Satuan</label>
		  <div class="col-md-9">
		  <input id="jumlah_satuan" name="jumlah_satuan" type="text" placeholder="Jumlah Satuan" class="form-control input-md" required="" value="<?= $hasil->jumlah_satuan?>"/>
		  <span class="help-block"><?php echo form_error('jumlah_satuan', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Harga Satuan</label>
		  <div class="col-md-9">
		  <input id="harga_satuan" name="harga_satuan" type="text" placeholder="Harga Satuan" class="form-control input-md" required="" value="Rp. <?= number_format($hasil->harga_satuan,0,",",".")?>"/>
		  <span class="help-block"><?php echo form_error('harga_satuan', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Sumber Dana</label>
		  <div class="col-md-9">
		  <input id="sumber_dana" name="sumber_dana" type="text" placeholder="Sumber Dana" class="form-control input-md" required="" value="<?= $hasil->sumber_dana?>"/>
		  <span class="help-block"><?php echo form_error('sumber_dana', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Nama Rekening</label>
		  <div class="col-md-9">
		  <input id="nama_rek" name="nama_rek" type="text" placeholder="Nama Rekening" class="form-control input-md" required="" value="<?= $hasil->nama_rek?>"/>
		  <span class="help-block"><?php echo form_error('nama_rek', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

		<legend></legend>


		<!-- Button (Double) -->
		<div class="form-group">
		  <label class="col-md-0 control-label" for="simpan"></label>
		  <div class="col-md-9">
			<button id="simpan" name="simpan" class="btn btn-success">Simpan</button>
			<button id="batal" name="batal" class="btn btn-danger" onclick="location.href='<?= base_url() ?>datapenduduk/c_belanja'">Batal</button>
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

	var d = document.getElementById("nav-belanja");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>
