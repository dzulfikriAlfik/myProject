<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1><?= ucfirst($page . ' ' . $menu); ?></h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url($menu); ?>"><?= ucfirst($menu); ?></a></li>
               <li class="breadcrumb-item active"><?= ucfirst($page . ' ' . $menu); ?></li>
            </ol>
         </div>
      </div>
   </div>
</section>

<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <a href="<?= base_url('unit'); ?>" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="<?= base_url('unit/process'); ?>" method="post">
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
                        <input type="hidden" name="unit_id" value="<?= $row->unit_id; ?>">
                        <div class="form-group">
                           <label for="unit_name">Unit Name <span class="text-red">*</span></label>
                           <input type="text" name="unit_name" id="unit_name" class="form-control" placeholder="Unit Name" value="<?= $row->name; ?>" required>
                        </div>
                        <!-- Button -->
                        <div class="form-group text-center">
                           <button type="submit" name="<?= $page; ?>" class="btn btn-success btn-flat"><i class="fas fa-paper-plane"></i> Save</button>
                           <button type="reset" class="btn btn-dark btn-flat"><i class="fas fa-backward"></i> Reset</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
   </div>
</section>