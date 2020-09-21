<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>web/dashboard">Dashboard</a> <span class="divider">/</span></li>
      <li class="active"><?php echo $page_title;?></li>
   </ul>

   <div class="container-fluid">
         <?php if($this->session->flashdata('msg')) { ?>                        
            <div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">x</button>                
              <?php echo $this->session->flashdata('msg');?>
            </div>  
        <?php } ?>  

      <div class="row-fluid">
        <a href="<?php echo base_url() . 'web/jadwal_add';?>"> <button class="btn btn-primary pull-right"><i class="icon-plus"></i> Tambah Jadwal</button></a>     

        <form class="form" method="POST" action="<?php echo base_url() . 'web/jadwal_search'?>">
          
          <label>Semester</label>
          <select id = "semester_tipe" name="semester_tipe" class="input-xlarge" onchange="change_get()">            
            <!--<option value="1" <?php echo isset($semester_tipe) ? ($semester_tipe === '1' ? 'selected':'') : '' ;?> /> GANJIL-->
            <!--<option value="0" <?php echo isset($semester_tipe) ? ($semester_tipe === '0' ? 'selected':'') : '' ;?> /> GENAP-->
			<option value="1" <?php echo $this->session->userdata('jadwal_semester_tipe') ==='1' ? 'selected':'' ;?> /> GANJIL
            <option value="0" <?php echo $this->session->userdata('jadwal_semester_tipe') ==='0' ? 'selected':'' ;?> /> GENAP
          </select>
            
          <label>Tahun Akademik</label>
          <select id="tahun_akademik" name="tahun_akademik" class="input-xlarge" onchange="change_get()">
            <!--<option value="2017-2018" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2017-2018' ? 'selected':'') : '' ;?> /> 2017-2018-->
            <!--<option value="2018-2019" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2018-2019' ? 'selected':'') : '' ;?> /> 2018-2019-->
            <!--<option value="2019-2020" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2019-2020' ? 'selected':'') : '' ;?> /> 2019-2020-->
            <!--<option value="2020-2021" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2020-2021' ? 'selected':'') : '' ;?> /> 2020-2021-->
            <!--<option value="2021-2022" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2021-2022' ? 'selected':'') : '' ;?> /> 2021-2022-->
            <!--<option value="2022-2023" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2022-2023' ? 'selected':'') : '' ;?> /> 2022-2023-->
            <!--<option value="2023-2024" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2023-2024' ? 'selected':'') : '' ;?> /> 2023-2024-->
            <!--<option value="2024-2025" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2024-2025' ? 'selected':'') : '' ;?> /> 2024-2025-->
            <!--<option value="2025-2026" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2025-2026' ? 'selected':'') : '' ;?> /> 2025-2026-->
            
			<option value="2017-2018" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2017-2018' ? 'selected':'' ;?> /> 2017-2018
            <option value="2018-2019" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2018-2019' ? 'selected':'' ;?> /> 2018-2019
            <option value="2019-2020" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2019-2020' ? 'selected':'' ;?> /> 2019-2020
            <option value="2020-2021" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2020-2021' ? 'selected':'' ;?> /> 2020-2021
            <option value="2021-2022" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2021-2022' ? 'selected':'' ;?> /> 2021-2022
            <option value="2022-2023" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2022-2023' ? 'selected':'' ;?> /> 2022-2023
            <option value="2023-2024" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2023-2024' ? 'selected':'' ;?> /> 2023-2024
            <option value="2024-2025" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2024-2025' ? 'selected':'' ;?> /> 2024-2025
            <option value="2025-2026" <?php echo $this->session->userdata('jadwal_tahun_akademik') === '2025-2026' ? 'selected':'' ;?> /> 2025-2026
			
          </select>
            
          <label>Dosen / Mata Kuliah</label>  
          <input type="text" name="search_query" value="<?php echo isset($search_query) ? $search_query : '' ;?>">  
          
          <div class="form">
            <button type="submit" class="btn">Cari</button>
            <a href="<?php echo base_url() . 'web/jadwal';?>"><button type="button" class="btn">Reset</button> </a>
          </div>
        </form>
		
		<?php if($rs_jadwal->num_rows() === 0):?>
		<div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>             
			Tidak ada data.
        </div>  
		<?php else: ?> 
		<div id="content_ajax">
          
          <div class="pagination" id="ajax_paging">
              <ul>
                  <?php echo $this->pagination->create_links();?>
              </ul>
          </div>           

          <div class="widget-content">            
              <table class="table table-striped table-bordered">
                 <thead>
                    <tr>
					   <th>No.</th>
                       <th>Mata Kuliah</th>
                       <th>Dosen</th>
                       <th>Kelas</th>
                       <th>Tahun Akademik</th>
                       <th style="width: 65px;"></th>
                    </tr>
                 </thead>
                 <tbody>
  
                 <?php 
                   $i =  intval($start_number) + 1;
                   foreach ($rs_jadwal->result() as $jadwal) { ?>
                   <tr<?php echo ' id="row_'.$jadwal->kode . '"';?>>
					  <td><?php echo str_pad((int)$i,3,0,STR_PAD_LEFT);?></td> 
                      <td><?php echo $jadwal->nama_mk;?></td>                    
                      <td><?php echo $jadwal->nama_dosen;?></td>
                      <td><?php echo $jadwal->kelas;?></td>
                      <td><?php echo $jadwal->tahun_akademik;?></td>
                      
                      <td>
                        <a href="<?php echo base_url() . 'web/jadwal_edit/' .$jadwal->kode;?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a class="btn btn-small" onClick="delete_row('web/jadwal_delete/', <?php echo $jadwal->kode ?>)" ><i class="icon-trash"></i></a>
                      </td>
                   </tr>
                 <?php $i++;} ?>
                    
                 </tbody>
              </table>
           </div>
           
          
           <div class="pagination" id="ajax_paging">
              <ul>
                  <?php echo $this->pagination->create_links();?>
              </ul>
          </div>           
        </div>
        <?php endif; ?>
         <footer>
            <hr />
            <p class="pull-right">Fakultas Teknik Universitas Majalengka</p>
            <p>&copy; 2018</p>
         </footer>
      </div>
   </div>
</div>