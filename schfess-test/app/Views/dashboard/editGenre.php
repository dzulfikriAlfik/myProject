<?= $this->extend('templates/template'); ?>
   
<?= $this->section('content'); ?> 
<div class="container mt-5">
   <div class="row">
      <div class="col">
         <div class="d-flex justify-content-between">
            <h2><?= $judul; ?></h2>
            <div>
               <a href="" class="btn btn-sm btn-warning align-self-center">Refresh</a>
               <a href="<?= base_url('dashboard/genreList'); ?>" class="btn btn-sm btn-primary align-self-center">Back</a>
            </div>
         </div>
      </div>
   </div>
   <div class="my-5 row">
      <div class="col-8">
         <form action="<?= base_url('dashboard/updateGenre/' . $genre['id_genre']); ?>" method="POST">
         <?= csrf_field(); ?>
         <input type="hidden" name="id_genre" value="<?= $genre['id_genre']; ?>">
         <div class="form-group row">
            <label for="genre" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
               <input type="text" class="form-control <?= ($validation->hasError('genre')) ? 'is-invalid' : ''; ?>" id="genre" placeholder="Masukan Genre" name="genre" autofocus value="<?= (old('genre')) ? old('genre') : $genre['genre']; ?>">
               <div id="genre" class="invalid-feedback">
                  <?= $validation->getError('genre'); ?>
               </div>
            </div>
         </div>
         <div class="mt-4 form-group row">
            <div class="col-sm-10">
               <button type="submit" class="btn btn-primary">Edit Data</button>
            </div>
         </div>
      </form>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>