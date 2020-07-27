<?php foreach($rs_dosen->result() as $dosen) {} ?>

<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>web/dashboard">Dashboard</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/dosen">Data Dosen</a> <span class="divider">/</span></li>
      <li class="active">Ubah Data</li>
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
            <label>ID Dosen</label>
            <input id="nidn" type="text" value="<?php echo $dosen->nidn;?>" name="nidn" class="input-xlarge" />
            
            <label>Nama Dosen</label>
            <input id="nama" type="text" value="<?php echo $dosen->nama;?>" name="nama" class="input-xlarge" />
            
            <label>Alamat</label>
            <input id="alamat" type="text" value="<?php echo $dosen->alamat;?>" name="alamat" class="input-xlarge" />
            
            <label>Telp</label>
            <input id="telp" type="text" value="<?php echo $dosen->telp;?>" name="telp" class="input-xlarge" />       
            
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url() .'web/dosen'; ?>"><button type="button" class="btn">Batal</button></a>
            </div>
        </form>

        <footer>
          <hr />
          <p class="pull-right">Fakultas Teknik Universitas Majalengka </p>
          <p>&copy; 2018 </p>
        </footer>

      </div>
   </div>
</div>      