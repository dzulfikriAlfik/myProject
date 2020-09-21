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
                       <th>Matakuliah</th>
                       <th>Dosen</th>
                       <th>Kelas</th>
                       <th>Tahun Akademik</th>
                       <th style="width: 65px;"></th>
                    </tr>
                 </thead>
                 <tbody>
  
                 <?php 
                   $i =  intval($start_number) + 1;
                   foreach ($rs_penjadwalan->result() as $penjadwalan) { ?>
                   <tr>
					  <td><?php echo str_pad((int)$i,3,0,STR_PAD_LEFT);?></td> 
                      <td><?php echo $penjadwalan->nama_mk;?></td>                    
                      <td><?php echo $penjadwalan->nama_dosen;?></td>
                      <td><?php echo $penjadwalan->kelas;?></td>
                      <td><?php echo $penjadwalan->tahun_akademik;?></td>
                      
                      <td>
                        <a href="<?php echo base_url() . 'web/penjadwalan_edit/' .$penjadwalan->kode;?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a href="<?php echo base_url() . 'web/penjadwalan_delete/' .$penjadwalan->kode;?>" class="btn btn-small" onClick="return confirm('Anda yakin ingin menghapus data ini?')" ><i class="icon-trash"></i></a>
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
