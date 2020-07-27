<?php
/*
 *      tambah_penduduk.php
 *      Form tambah data penduduk
 */
include_once "include/koneksi.php";

?>
<div class="top-bar">
	<a href="daftar_kelahiran" class="button">Lihat data </a>
    <h1>Tambah Data Kelahiran</h1>
        <div class="breadcrumbs">Menambahkan data Kelahiran</div>
</div>
<form id="form1" name="form1" method="post" action="simpan_kelahiran.php">
  <div id="stylized" class="select-bar">
    <table width="365" border="0" id="peminjam">
      <tr>
        <th colspan="2" bgcolor="#FFCC00" scope="row">INPUT DATA KELAHIRAN</th>
      </tr>
      <tr>
        <th width="176" height="33" scope="row"><div align="left">No. Surat</div></th>
        <td width="179"><input type="text" name="no_suratlahir" id="no_suratlahir" /></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">No.KK</div></th>
        <td><input type="text" name="no_kk" id="no_kk" /></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Anak</div></th>
        <td><input type="text" name="anak" id="anak" /></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Tanggal Lahir</div></th>
        <td><input type="text" name="tgl_lahir" id="tgl_lahir" /></td>
      </tr>
      <tr>
        <th scope="row"><div align="left"></div></th>
        <td><input type="submit" name="simpan" id="simpan" value="SIMPAN" /></td>
      </tr>
    </table>
  </div>
</form>
<p>&nbsp;</p>
<p>
  <script type="text/javascript" >
$(function(){
	$("#tgl_lahir").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true,yearRange:"1930"});
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
