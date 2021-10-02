<?= $this->extend('templates/template'); ?>
   
<?= $this->section('content'); ?>  
<div class="container">
   <div class="row">
      <div class="col">
         <div class="my-3 d-flex justify-content-between">
            <h2 class="mb-2">Movie List</h2>
            <div>
               <a href="" class="btn btn-sm btn-success">Refresh</a>
               <a href="<?= base_url('dashboard/createTitle'); ?>" class="btn btn-sm btn-primary align-self-center">Tambah Data Movie</a>
            </div>
         </div>
         <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Hooray!</strong> <?= session()->getFlashdata('success'); ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif; ?>
         <table class="table table-striped">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul Movie</th>
                  <th scope="col">Genre</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               foreach ($title as $value) : ?>
                  <tr>
                     <th scope="row" class="text-center"><?= $no++; ?></th>
                     <td>
                        <?= $value['title']; ?>
                     </td>
                     <td>
                        <?= getnama($value['id_genre']); ?>
                     </td>
                     <td>
                        <a href="<?= base_url('dashboard/edit/'.$value['id']); ?>" class="btn btn-sm btn-warning">edit</a>
                        <a href="<?= base_url('dashboard/delete/'.$value['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data')">delete</a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>
