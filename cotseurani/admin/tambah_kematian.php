<?php
/*
 *      tambah_penduduk.php
 *      Form tambah data penduduk
 */
include_once "include/koneksi.php";
include_once "include/config.php";
?>
<div class="top-bar">
	<a href="daftar_kematian" class="button">Lihat data </a>
    <h1>Tambah Data Kematian</h1>
        <div class="breadcrumbs">
          <p>Menambahkan data Kematian </p>
          <form id="form1" name="form1" method="post" action="simpan_kematian.php">
            <table width="365" border="0" id="peminjam">
              <tr>
                <th colspan="2" bgcolor="#FFCC00" scope="row">INPUT DATA KEMATIAN</th>
              </tr>
              <tr>
                <th width="176" height="33" scope="row"><div align="left">No. Surat</div></th>
                <td width="179"><input type="text" name="no_suratkematian" id="no_suratkematian" /></td>
              </tr>
              <tr>
                <th scope="row"><div align="left">No.KK</div></th>
                <td><input type="text" name="no_kk" id="no_kk" /></td>
              </tr>
              <tr>
                <th scope="row"><div align="left">Tanggal Meninggal</div></th>
                <td><input type="text" name="tgl_meninggal" id="tgl_meninggal" /></td>
              </tr>
              <tr>
                <th scope="row"><div align="left">Jam Meninggal</div></th>
                <td><input type="text" name="jam_meninggal" id="jam_meninggal" /></td>
              </tr>
              <tr>
                <th scope="row"><div align="left">Tempat Meninggal</div></th>
                <td><input type="text" name="tempat_meninggal" id="tempat_meninggal" /></td>
              </tr>
              <tr>
                <th scope="row"><div align="left">Sebab</div></th>
                <td><input type="text" name="sebab_meninggal" id="sebab_meninggal" /></td>
              </tr>
              <tr>
                <th scope="row"><div align="left"></div></th>
                <td><input type="submit" name="simpan" id="simpan" value="SIMPAN" /></td>
              </tr>
            </table>
          </form>
          <p>&nbsp;</p>
        </div>
</div>
<p>
  <script type="text/javascript" >

function hapus_inputan(elm){
	// hapus inputan
	$(elm).prev().remove();
	$(elm).remove();
	}
// fungsi untuk autocomplete
function lengkapi(elm){
$(elm).autocomplete({
			source: function(request,response){
				// fungsi yang akan mengambil data dari file cari2.php dalam bentuk json
				$.post("data_warga.php",{data:request.term},function(hasil){
					response($.map(hasil,function(item){
					return {
						// label untuk pilihan
						label: item.nama,
						value:item.nama,
						id:item.no_ktp
						}	
						}))
					},"json");
				},
			minLength: 2,
			select: function( event, ui ) {
						$(elm).next().val(ui.item.id);
					}
			})
}			
$(function(){
	$("a.button").click(function(){
		var target = $("#center-column");
		var url = $(this).attr("href");
		$(target).html("<div class='loading'><span class='loading'></span>&nbsp;&nbsp;Mohon ditunggu .......</div>")
		.load(url);
		return false;
		})
	// kejadian awal, panggil fungsi awal
	awal();
	// event ketika tombol submit diklik
	$("#form").submit(function(){
	var inputan = $(".isian");	
	var inputs = $(this).serializeArray(); //berupa JSON object
	var url = $(this).attr('action');
		for(i = 0; i < inputan.length - 1; i++){
				if($(inputan).eq(i).val() == ""){
					$(".ket").eq(i).html("harus diisi").css({"display":"block"});
					$(inputan).eq(i).focus();
					return false;
					}
				else {
					$(".ket").eq(i).empty().css({"display":"none"});
					}	
				}
		// kirim data ke server untuk disimpan
		if(inputs.length >= 7){
		var kepala_klg = $(".anggota_klg:first").val();	
		$("#status_proses").removeClass("sukses-inline").fadeIn("slow");
		$.post(url,{data:inputs,kk:kepala_klg},function(data){
			if(data == 1){
				// tampilkan info data telah disimpan
				$("#status_proses").removeClass("proses-inline")
				.addClass("sukses-inline").delay("2000").fadeOut("slow");
				$(".isian").val("");
				awal();
				// hapus sisa anggota keluarga
				$(".icon-del").click();
				}
			else {
				$("#status_proses").removeClass("proses-inline")
				.addClass("gagal-inline").delay("2000").fadeOut("slow");
				$(".isian").val("");
				awal();
				// hapus sisa anggota keluarga
				$(".icon-del").click();
				}	
			})
		}
		else {
		$("span.input-link").click();	
		}	
	return false;
	})
	// menambahkan field baru untuk menambah anggota keluarga
	$("span.input-link").click(function(){
		var input_baru = '<div><label>*<span class="small">Ketik nama </span></label>';
			input_baru +='<input type="text" class="isian anggota_klg" autocomplete="off" onfocus="lengkapi(this)"/>';
			input_baru +='<input type="text" name="kepala_keluarga" class="isian" autocomplete="off" readonly />';
			input_baru +='<span class="ket"></span></div><span class="icon-del" onclick="hapus_inputan(this)"></span>';
			$(input_baru).insertBefore($("button"));
			$(".isian:last").focus();
			
	})
})
  </script>
  <script type="text/javascript" >
$(function(){
	$("#tgl_meninggal").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true,yearRange:"1930"});
	$("a.button").click(function(){
		var target = $("#center-column");
		var url = $(this).attr("href");
		$(target).html("<div class='loading'><span class='loading'></span>&nbsp;&nbsp;Mohon ditunggu .......</div>")
		.load(url);
		return false;
		})
	// kejadian awal, panggil fungsi awal
	awal();
	// event ketika tombol submit diklik
	$("#form").submit(function(){
	var inputan = $(".isian");	
	var inputs = $(this).serializeArray(); //berupa JSON object
	var url = $(this).attr('action');
		for(i = 0; i < inputan.length - 1; i++){
				if($(inputan).eq(i).val() == ""){
					$(".ket").eq(i).html("harus diisi").css({"display":"block"});
					$(inputan).eq(i).focus();
					return false;
					}
				else {
					$(".ket").eq(i).empty().css({"display":"none"});
					}	
				}
		// kirim data ke server untuk disimpan
		$("#status_proses").removeClass("sukses-inline").fadeIn("slow");
		$.post(url,{data:inputs},function(data){
			if(data == 1){
				// tampilkan info data telah disimpan
				$("#status_proses").removeClass("proses-inline")
				.addClass("sukses-inline").delay("2000").fadeOut("slow");
				$(".isian").val("");
				awal();
				}
			else {
				$("#status_proses").removeClass("proses-inline")
				.addClass("gagal-inline").delay("2000").fadeOut("slow");
				$(".isian").val("");
				awal();
				}	
			})
	return false;
	})
})
  </script>
  
  <style>
	.ui-autocomplete-loading { background: white url('img/loading.gif') right center no-repeat; }
	.ui-widget { font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif; font-size: 0.8em; }
	.ui-widget-content { border: 1px solid #dddddd; background: #ffffff url(images/ui-bg_highlight-soft_100_eeeeee_1x100.png) 50% top repeat-x; color: #333333; }
  </style>
</p>
