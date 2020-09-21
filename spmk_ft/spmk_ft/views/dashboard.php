<style>
  .block {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 0px solid #CCCCCC;
    margin: 1em 0;
}
</style>
<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   

   <div class="container-fluid">
         <?php if(isset($msg)) { ?>                        
            <div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">x</button>                
              <?php echo $msg;?>
            </div>  
        <?php } ?>  

      <div class="row-fluid">
  
    <div id="content_ajax">
          
          <div class="pagination pull-right" id="ajax_paging">
              <ul>
                  <?php echo $this->pagination->create_links();?>
              </ul>
          </div>           

          <div class="widget-content">            
              <table class="table table-striped table-bordered">
                 <thead>
                      <body>
                         <h2 align="center"> Selamat Datang </h2>
                         <p align="justify"> 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selamat datang di sistem penjadwalan mata kuliah Fakultas Teknik Universitas Majalengka, sistem penjadwalan ini menggunakan algoritma genetika yang secara otomatis akan memploting jadwal mata kuliah berdasarkan slot waktu dan ruangan tersedia dengan solusi terbaik sehingga terhindar dari bentrok waktu mata kuliah maupun ruangan.
                      
                            <p>Petunjuk pengisian :
                               <br>1. Masukan data penjadwalan : mata kuliah, dosen, ruangan.
                               <br>2. Ubah data penjadwalan 
                               <br>3. Hapus data penjadwalan
                               <br>4. Keterangan untuk satu range jam pada menu waktu di hitung sebagai satu SKS pada waktu jadwal mata kuliah. 
                               <br>&nbsp;&nbsp;&nbsp;&nbsp; Misal : 
                               <br>&nbsp;&nbsp;&nbsp;&nbsp; range waktu (No.1 | 08.00-08.50) (No.2 | 08.50-09.40) (No.3 | 09.40-10.30) 
                               <br>&nbsp;&nbsp;&nbsp;&nbsp; Untuk satu SKS, waktu pertemuan di kelas diambil dari range jam No.1, untuk dua SKS        pertemuan di kelas diambil dari range jam No.1&2, 
                               <br>&nbsp;&nbsp;&nbsp;&nbsp; dan untuk tiga SKS pertemuan di kelas diambil dari range jam No.1,2 & 3 dan seterusnya.
                               <br>5. Tidak boleh ada data range awal atau akhir jam yang sama. Contoh :
                               <br>&nbsp;&nbsp;&nbsp;&nbsp; (No.1 | 08.00-08.50) (No.2 | 08.00-09.00) (No.3 | 08.15-09.00)
                               <br>&nbsp;&nbsp;&nbsp;&nbsp; Yang benar adalah :
                               <br>&nbsp;&nbsp;&nbsp;&nbsp; (No.1 | 08.00-08.50) (No.2 | 08.50-09.40) (No.3 | 09.40-10.30)
                               <br>6. Menu waktu tidak bersedia adalah opsi jika dosen pengampu mata kuliah tidak bersedia pada waktu tertentu.
                            </p>
                            <p>Keterangan para proses ploting jadwal :
                                <br>- Masukan nilai populasi antara 10-100. merupakan nilai jumlah maksimal variabel untuk semua kemungkinan crossover dan mutasi
                                <br>- Masukan nilai probabilitas crossover 0,10 – 1. merupakan jumlah nilai kemungkinan terbentuk anak dari penyilangan dua kromosom penjadwalan. Sehingga &nbsp;&nbsp;didapatkan solusi penempatan terbaik pada slot waktu tersedia.
                                <br>- Masukan nilai probabiltias mutasi 0,10-1. merupakan jumlah nilai kemungkinan proses penyilangan dua kromosom penjadwalan (kemungkinan bentrok)
                                <br>- Masukan Nilai minimal generasi adalah 10000 semakin besar nilainya semakin besar kemungkinan ditemukan solusi ploting jadwal terbaik.
                             </p>
                      </body>                  
                  <br><h2 align="center"> Jadwal Mata Kuliah Hasil Ploting</h2>
                    <tr><br>
                       <th>No.</th>
                       <th>Hari</th>
                       <th>Sesi</th>
                       <th>Jam</th>
                       <th>Mata Kuliah</th>
                       <th>SKS</th>
                       <th>Semester</th>
                       <th>Kelas</th>
                       <th>Dosen</th>
                       <th>Ruang</th>     
                    </tr>
                 </thead>
                 <tbody>
  
                 <?php 
                   $i =  1;
                   foreach ($rs_jadwal->result() as $jadwal) { ?>
                   <tr>
            <td><?php echo $i;?></td>
                      <td><?php echo $jadwal->hari;?></td>
                      <td><?php echo $jadwal->sesi;?></td>
                      <td><?php echo $jadwal->jam_kuliah;?></td>
                      <td><?php echo $jadwal->nama_mk;?></td>
                      <td><?php echo $jadwal->sks;?></td>
                      <td><?php echo $jadwal->semester;?></td>
                      <td><?php echo $jadwal->kelas;?></td>
                      <td><?php echo $jadwal->dosen;?></td>
                      <td><?php echo $jadwal->ruang;?></td>                    
                   </tr>
                 <?php $i++;} ?>
                    
                 </tbody>
              </table>
           </div>
           
          
            <div class="pagination pull-right" id="ajax_paging">
              <ul>
                  <?php echo $this->pagination->create_links();?>
              </ul>
            </div>           
        </div>
        
         <footer>
            <hr />
            <p class="pull-right">Fakultas Teknik Universitas Majalengka</p>
            <p>&copy; 2018</p>
         </footer>
      </div>
   </div>
</div>