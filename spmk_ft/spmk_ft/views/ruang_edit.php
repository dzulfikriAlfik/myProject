<?php foreach($rs_ruang->result() as $ruang) {} ?>
<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>web/dashboard">Dashboard</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/ruang">Data Ruangan Tersedia</a> <span class="divider">/</span></li>
      <li class="active">Ubah Data</li>
   </ul>
   
   <div class="container-fluid">
      <div class="row-fluid">
        <?php if(isset($msg)) { ?>                        
              <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>                
                <?php echo $msg;?>
              </div>  
        <?php } ?>    
                  


        <form id="tab" method="POST" >
            <label>Kode Ruang</label>
            <input id="nama" type="text" value="<?php echo $ruang->nama;?>" name="nama" class="input-xlarge" />
            
            <label>Kapasitas</label>
            <input id="kapasitas" type="text" value="<?php echo $ruang->kapasitas;?>" name="kapasitas" class="input-xsmall" />
            
            <label>Kategori</label>
            <select name="jenis" class="input-xlarge">            
              <option value="TEORI" <?php echo $ruang->jenis === 'TEORI' ? 'selected':'';?> /> TEORI
              <option value="LABORATORIUM" <?php echo $ruang->jenis === 'LABORATORIUM' ? 'selected':'';?> /> LABORATORIUM            
            </select>
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url() .'web/ruang'; ?>"><button type="button" class="btn">Batal</button></a>
            </div>
        </form>

        <footer>
          <hr />
          <p class="pull-right">Fakultas Teknik Universitas Majalengka</p>
          <p>&copy; 2018</p>
        </footer>

      </div>
   </div>
</div>      