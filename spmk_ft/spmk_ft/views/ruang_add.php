<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>web/dashboard">Dashboard</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/ruang">Data Ruangan Tersedia</a> <span class="divider">/</span></li>
      <li class="active">Tambah Data</li>
   </ul>
   
   <div class="container-fluid">
      <div class="row-fluid">
        <?php if(isset($msg)) { ?>                        
              <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">x</button>                
                <?php echo $msg;?>
              </div>  
        <?php } ?>    
                  


        <form id="tab" method="POST" >
            <label>Kode Ruang</label>
            <input id="nama" type="text" value="<?php echo set_value('nama');?>" name="nama" class="input-xlarge" />
            
            <label>Kapasitas</label>
            <input id="kapasitas" type="text" value="<?php echo set_value('kapasitas');?>" name="kapasitas" class="input-xsmall" />
            
            <label>Kategori</label>
            <select name="jenis" class="input-xlarge">            
              <option value="TEORI" <?php echo set_select('jenis','TEORI');?> /> TEORI
              <option value="LABORATORIUM" <?php echo set_select('jenis','LABORATORIUM');?> /> LABORATORIUM            
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