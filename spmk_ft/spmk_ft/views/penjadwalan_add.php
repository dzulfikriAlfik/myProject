<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>web/dashboard">Dashboard</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/penjadwalan">Data Jadwal</a> <span class="divider">/</span></li>
      <li class="active">Tambah Data</li>
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
          
            <label>Semester</label>
            <select id = "semester_tipe" name="semester_tipe" class="input-xlarge" onchange="get_matakuliah();">            
              <option value="1" <?php echo isset($semester_tipe) ? ($semester_tipe === '1' ? 'selected':'') : '' ;?> /> GANJIL
              <option value="0" <?php echo isset($semester_tipe) ? ($semester_tipe === '0' ? 'selected':'') : '' ;?> /> GENAP
            </select>
          
            <label>Matakuliah</label>
            <select name="kode_mk" class="input-xlarge" id="option_matakuliah">
              <?php foreach($rs_mk->result() as $mk) { ?>
                <option value="<?php echo $mk->kode;?>" <?php echo set_select('kode_mk',$mk->kode);?> /> <?php echo $mk->nama;?>
              <?php } ?>            
            </select>
            
            <label>Dosen</label>
            <select name="kode_dosen" class="input-xlarge">
              <?php foreach($rs_dosen->result() as $dosen) { ?>
                <option value="<?php echo $dosen->kode;?>" <?php echo set_select('kode_dosen',$dosen->kode);?> /> <?php echo $dosen->nama;?>
              <?php } ?>
            </select>
            
            <label>Kelas</label>
            <input id="kelas" type="text" value="<?php echo set_value('kelas');?>" name="kelas" class="input-xsmall" />
            
            
            <label>Tahun Akademik</label>
            <select id="tahun_akademik" name="tahun_akademik" class="input-xlarge">
              <option value="2017-2018" <?php echo set_select('tahun_akademik','2017-2018');?> /> 2017-2018
              <option value="2018-2019" <?php echo set_select('tahun_akademik','2018-2019');?> /> 2018-2019
              <option value="2019-2020" <?php echo set_select('tahun_akademik','2019-2020');?> /> 2019-2020
              <option value="2020-2021" <?php echo set_select('tahun_akademik','2020-2021');?> /> 2020-2021
              <option value="2021-2022" <?php echo set_select('tahun_akademik','2021-2022');?> /> 2021-2022
              <option value="2022-2023" <?php echo set_select('tahun_akademik','2022-2023');?> /> 2022-2023
              <option value="2023-2024" <?php echo set_select('tahun_akademik','2023-2024');?> /> 2023-2024
              <option value="2024-2025" <?php echo set_select('tahun_akademik','2024-2025');?> /> 2024-2025
              <option value="2025-2026" <?php echo set_select('tahun_akademik','2025-2026');?> /> 2025-2026            
            </select>
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url() .'web/penjadwalan'; ?>"><button type="button" class="btn">Batal</button></a>
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