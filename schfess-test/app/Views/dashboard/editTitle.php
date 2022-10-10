<?= $this->extend('templates/template'); ?>
   
<?= $this->section('content'); ?> 
<div class="container mt-5">
   <div class="row">
      <div class="col">
         <div class="d-flex justify-content-between">
            <h2><?= $judul; ?></h2>
            <div>
               <a href="" class="btn btn-sm btn-warning align-self-center">Refresh</a>
               <a href="<?= base_url('dashboard'); ?>" class="btn btn-sm btn-primary align-self-center">Back</a>
            </div>
         </div>
      </div>
   </div>
   <div class="my-5 row">
      <div class="col-8">
         <form action="<?= base_url('dashboard/update/' . $movie['id']); ?>" method="POST">
         <?= csrf_field(); ?>
         <input type="hidden" name="id" value="<?= $movie['id']; ?>">
         <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Judul Movie</label>
            <div class="col-sm-10">
               <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" placeholder="Masukan Judul Movie" name="title" autofocus value="<?= (old('title')) ? old('title') : $movie['title']; ?>">
               <div id="title" class="invalid-feedback">
                  <?= $validation->getError('title'); ?>
               </div>
            </div>
         </div>
         <div class="form-group row">
            <label for="id_genre" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
               <select class="custom-select" id="inputGroupSelect01" name="id_genre">
                  <option></option>
                  <?php foreach($genre as $list) : ?>
                  <option value="<?= $list['id_genre']; ?>" <?= $list['id_genre'] == $movie['id_genre'] ? 'selected' : null ; ?>><?= $list['genre']; ?></option>
                  <?php endforeach; ?>
               </select>
               <div id="id_genre" class="invalid-feedback">
                  <?= $validation->getError('id_genre'); ?>
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