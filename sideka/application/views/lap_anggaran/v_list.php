<div class="row">
<div class="col-md-9">
<h3><?= $page_title ?></h3>
<br>
</div>

  <div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Cetak Anggaran Pendapatan</h3>
    </div>
    <div class="panel-body">

        <form action="" method="post" target="_blank">
            <label>Dari Tanggal</label>
            <a href="javascript:NewCssCal('ttl','ddmmyyyy')">
        		 <div class="input-group">
        							 <span class="input-group-addon">
        								<span class="fa fa-table"></span>
        							</span>
                <input class="form-control input-md" type="text" name="tgl_pendapatan" id="ttl" size="20" readonly="readonly" placeholder="Tgl-Bln-Thn" required>
        		 </div>
            </a>


            <label>Sampai Tanggal</label>
            <a href="javascript:NewCssCal('ttl2','ddmmyyyy')">
        		 <div class="input-group">
        							 <span class="input-group-addon">
        								<span class="fa fa-table"></span>
        							</span>
                <input class="form-control input-md" type="text" name="tgl_pendapatan2" id="ttl2" size="20" readonly="readonly" placeholder="Tgl-Bln-Thn" required>
        		 </div>
            </a>

            <button type="submit" name="cetak_pendapatan" class="btn btn-default" style="float:right;"><i class="fa fa-print"></i> Cetak</button>
        </form>

    </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Cetak Anggaran Belanja</h3>
    </div>
    <div class="panel-body">
        <form action="" method="post" target="_blank">
            <label>Dari Tanggal</label>
            <a href="javascript:NewCssCal('ttl3','ddmmyyyy')">
        		 <div class="input-group">
        							 <span class="input-group-addon">
        								<span class="fa fa-table"></span>
        							</span>
                <input class="form-control input-md" type="text" name="tgl_belanja" id="ttl3" size="20" readonly="readonly" placeholder="Tgl-Bln-Thn" required>
        		 </div>
            </a>


            <label>Sampai Tanggal</label>
            <a href="javascript:NewCssCal('ttl4','ddmmyyyy')">
        		 <div class="input-group">
        							 <span class="input-group-addon">
        								<span class="fa fa-table"></span>
        							</span>
                <input class="form-control input-md" type="text" name="tgl_belanja2" id="ttl4" size="20" readonly="readonly" placeholder="Tgl-Bln-Thn" required>
        		 </div>
            </a>

            <button type="submit" name="cetak_belanja" class="btn btn-default" style="float:right;"><i class="fa fa-print"></i> Cetak</button>
        </form>
    </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Cetak Anggaran Pembiayaan</h3>
    </div>
    <div class="panel-body">
        <form action="" method="post" target="_blank">
            <label>Dari Tanggal</label>
            <a href="javascript:NewCssCal('ttl5','ddmmyyyy')">
        		 <div class="input-group">
        							 <span class="input-group-addon">
        								<span class="fa fa-table"></span>
        							</span>
                <input class="form-control input-md" type="text" name="tgl_pembiayaan" id="ttl5" size="20" readonly="readonly" placeholder="Tgl-Bln-Thn" required>
        		 </div>
            </a>


            <label>Sampai Tanggal</label>
            <a href="javascript:NewCssCal('ttl6','ddmmyyyy')">
        		 <div class="input-group">
        							 <span class="input-group-addon">
        								<span class="fa fa-table"></span>
        							</span>
                <input class="form-control input-md" type="text" name="tgl_pembiayaan2" id="ttl6" size="20" readonly="readonly" placeholder="Tgl-Bln-Thn" required>
        		 </div>
            </a>

            <button type="submit" name="cetak_pembiayaan" class="btn btn-default" style="float:right;"><i class="fa fa-print"></i> Cetak</button>
        </form>
    </div>
    </div>
  </div>


</div>

<legend></legend>

<table id="flex1" style="display:none"></table>

<script>
function nav_active(){

	document.getElementById("a-data-penganggaran").className = "collapsed active";

	document.getElementById("penganggaran").className = "collapsed";

	var d = document.getElementById("nav-lap_penganggaran");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>
