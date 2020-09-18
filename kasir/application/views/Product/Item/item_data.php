<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1><?= ucfirst($menu); ?> <small class="text-muted">(Data barang)</small></h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
               <li class="breadcrumb-item active"><?= ucfirst($menu); ?></li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <div class="flash-data" data-pesan="<?= ucfirst($menu); ?>" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <div class="flash-error" data-pesan="<?= ucfirst($menu); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
         </div>
      </div>
   </div>
</section>

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a href="<?= base_url('item/add'); ?>" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add <?= ucfirst($menu); ?></a>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="myTable1" class="table table-bordered table-striped">
                     <!-- <table id="serverSideTable" class="table table-bordered table-striped"> -->
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Barcode</th>
                           <th>Product Name</th>
                           <th>Kategori</th>
                           <th>Unit</th>
                           <th>Price</th>
                           <th>Image</th>
                           <th>Stock</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        foreach ($row as $categ) : ?>
                           <tr>
                              <td class="text-center" width="3%"><?= $no++; ?>.</td>
                              <td class="text-center">
                                 <?= $categ['barcode']; ?>
                                 <div>
                                    <a href="<?= base_url('item/barcode_qrcode/' . $categ['item_id']); ?>" class="btn btn-dark btn-xs">Generate &nbsp;<i class="fas fa-barcode"></i></a>
                                 </div>
                              </td>
                              <td><?= $categ['name']; ?></td>
                              <td><?= getnama($categ['category_id'], 'p_category', 'category_id', 'name'); ?></td>
                              <td><?= getnama($categ['unit_id'], 'p_unit', 'unit_id', 'name'); ?></td>
                              <td class="text-right"><?= rupiah($categ['price']); ?></td>
                              <?php if ($categ['image'] != null) : ?>
                                 <td class="text-center"><img style="width: 100px;" src="<?= base_url('uploads/product/' . $categ['image']); ?>" alt=""></td>
                              <?php else : ?>
                                 <td class="text-center"><img style="width: 100px;" src="<?= base_url('uploads/product/product_default.jpg'); ?>" alt=""></td>
                              <?php endif; ?>
                              <td><?= $categ['stock']; ?></td>
                              <td width="160px" class="text-center">
                                 <a href="<?= base_url('item/edit/' . $categ['item_id']); ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>&nbsp;
                                 <a href="<?= base_url('item/delete/' . $categ['item_id']); ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                              </td>
                           </tr>
                        <?php endforeach; ?>

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- <script>
   $(document).ready(function() {
      $('#serverSideTable').DataTable({
         "processing": true,
         "serverSide": true,
         "ajax": "<?= base_url('item/get_ajax') ?>"
      });
   });
</script> -->