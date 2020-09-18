<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1><?= ucfirst($page); ?> Supplier</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('supplier'); ?>">Supplier</a></li>
               <li class="breadcrumb-item active"><?= ucfirst($page); ?> Supplier</li>
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
               <a href="<?= base_url('supplier'); ?>" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="<?= base_url('supplier/process'); ?>" method="post">
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
                        <input type="hidden" name="supplier_id" value="<?= $row->supplier_id; ?>">
                        <div class="form-group">
                           <label for="supplier_name">Supplier Name <span class="text-red">*</span></label>
                           <input type="text" name="supplier_name" id="supplier_name" class="form-control" placeholder="Supplier Name" value="<?= $row->name; ?>" required>
                        </div>
                        <div class="form-group">
                           <label for="phone">Phone <span class="text-red">*</span></label>
                           <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?= $row->phone; ?>" required data-inputmask='"mask": "089999999999"' data-mask>
                        </div>
                        <div class="form-group">
                           <label for="address">Address</label>
                           <textarea name="address" id="address" cols="30" rows="4" class="form-control" required><?= $row->address; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="description" cols="30" rows="4" class="form-control"><?= $row->description; ?></textarea>
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