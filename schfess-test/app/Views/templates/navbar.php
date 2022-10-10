<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand" href="#">Schoolfess Test</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <?php 
         $uri = service('uri');
         ?>
         <div class="navbar-nav">
            <a class="nav-link <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null); ?>" href="<?= base_url('dashboard'); ?>">Data Movie</a>
            <a class="nav-link <?= ($uri->getSegment(2) == 'genreList' ? 'active' : null); ?>" href="<?= base_url('dashboard/genreList'); ?>">List Genre</a>
            <a class="btn btn-sm btn-warning" href="<?= base_url('auth/logout'); ?>">Logout</a>
         </div>
      </div>
   </div>
</nav>