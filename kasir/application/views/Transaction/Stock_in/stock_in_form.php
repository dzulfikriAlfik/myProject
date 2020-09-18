<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Add Stock In</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('stock/in'); ?>"><?= ucfirst($menu); ?></a></li>
               <li class="breadcrumb-item active">Add Stock In</li>
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
               <a href="<?= base_url('stock/in'); ?>" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="<?= base_url('stock/process'); ?>" method="post">
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
                        <input type="hidden" name="stock_id" id="stock_id">
                        <input type="hidden" name="item_id" id="item_id">
                        <div class="form-group">
                           <label for="date">Date <span class="text-red">*</span></label>
                           <input type="date" name="date" id="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <label for="barcode">Barcode <span class="text-red">*</span></label>
                        <div class="input-group mb-3">
                           <input type="text" name="barcode" id="barcode" class="form-control" required autofocus readonly>
                           <div class="input-group-append">
                              <span class="input-group-sm">
                                 <button type="submit" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fas fa-search"></i>
                                 </button>
                              </span>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="item_name">Item Name <span class="text-red">*</span></label>
                           <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" readonly>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-8">
                                 <label for="unit_name">Unit Name</label>
                                 <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                              </div>
                              <div class="col-md-4">
                                 <label for="Stock">Initial Stock</label>
                                 <input type="text" name="Stock" id="stock" value="-" class="form-control" readonly>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="detail">Detail <span class="text-red">*</span></label>
                           <input type="text" name="detail" id="detail" class="form-control" placeholder="Kulakan / Tambahan / Lainnya" required>
                        </div>
                        <div class="form-group">
                           <label for="supplier">Supplier</label>
                           <select name="supplier" id="supplier" class="form-control">
                              <option value="">-- Pilih Supplier --</option>
                              <?php foreach ($supplier as $supp => $data) : ?>
                                 <option value="<?= $data['supplier_id']; ?>"><?= $data['name']; ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="qty">Quantity <span class="text-red">*</span></label>
                           <input type="number" name="qty" id="qty" class="form-control" placeholder="Quantity" required>
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

<div class="modal fade" id="modal-item" tabindex="-1" aria-labelledby="modal-itemLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal-itemLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="card-body table-responsive">
            <table id="myTable1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Barcode</th>
                     <th>Name</th>
                     <th>Unit</th>
                     <th>Price</th>
                     <th>Stock</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($item as $itm => $data) : ?>
                     <tr>
                        <td class="text-center"><?= $data['barcode']; ?></td>
                        <td><?= $data['name']; ?></td>
                        <td><?= getnama($data['unit_id'], 'p_unit', 'unit_id', 'name'); ?></td>
                        <td class="text-right"><?= rupiah($data['price']); ?></td>
                        <td><?= $data['stock']; ?></td>
                        <td class="text-center">
                           <button class="btn btn-dark btn-xs" id="select" data-id="<?= $data['item_id']; ?>" data-barcode="<?= $data['barcode']; ?>" data-name="<?= $data['name']; ?>" data-unit="<?= getnama($data['unit_id'], 'p_unit', 'unit_id', 'name'); ?>" data-stock="<?= $data['stock']; ?>">
                              <i class="fas fa-check"></i> Select
                           </button>
                        </td>
                     </tr>
                  <?php endforeach; ?>

               </tbody>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function() {
      $(document).on('click', '#select', function() {
         const item_id = $(this).data('id');
         const barcode = $(this).data('barcode');
         const name = $(this).data('name');
         const unit_name = $(this).data('unit');
         const stock = $(this).data('stock');
         $('#item_id').val(item_id);
         $('#barcode').val(barcode);
         $('#item_name').val(name);
         $('#unit_name').val(unit_name);
         $('#stock').val(stock);
         $('#modal-item').modal('hide');
      });
   });
</script>