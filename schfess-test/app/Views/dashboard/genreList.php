<?= $this->extend('templates/template'); ?>
   
<?= $this->section('content'); ?>  
<div class="container">
   <div class="row">
      <div class="col">
         <div class="my-3 d-flex justify-content-between">
            <h2 class="mb-2">Genre List</h2>
            <div>
               <a href="" class="btn btn-sm btn-success">Refresh</a>
               <a href="<?= base_url('dashboard/createGenre'); ?>" class="btn btn-sm btn-primary align-self-center">Tambah List Genre</a>
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
                  <th scope="col">Genre</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               foreach ($genreList as $value) : ?>
                  <tr>
                     <th scope="row" class="text-center"><?= $no++; ?></th>
                     <td>
                        <?= $value['genre']; ?>
                     </td>
                     <td>
                        <a href="<?= base_url('dashboard/editGenre/'.$value['id_genre']); ?>" class="btn btn-sm btn-warning">edit</a>
                        <a href="<?= base_url('dashboard/deleteGenre/'.$value['id_genre']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data')">delete</a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>
