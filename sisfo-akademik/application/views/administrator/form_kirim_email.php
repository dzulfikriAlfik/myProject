<div class="container-fluid">
   <div class="alert alert-success">
      <i class="fas fa-comment-dots"></i> Form Balas Pesan User
   </div>

   <?php foreach ($hubungi as $hub) : ?>
      <form method="post" action="<?= base_url('administrator/hubungi_kami/kirim_email_aksi'); ?>">
         <div class="form-group">
            <input type="hidden" name="id_hubungi" value="<?= $hub->id_hubungi; ?>">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $hub->email; ?>" readonly>
         </div>
         <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control">
         </div>
         <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea name="pesan" id="pesan" cols="30" rows="5" class="form-control"></textarea>
         </div>
         <button type="submit" class="btn btn-primary">Kirim</button>
         <a href="<?= base_url('administrator/hubungi_kami'); ?>" class="btn btn-warning">Kembali</a>
      </form>
   <?php endforeach; ?>

</div>