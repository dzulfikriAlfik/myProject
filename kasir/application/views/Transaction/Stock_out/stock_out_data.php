<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1><?= ucfirst($menu); ?><small class="text-small"> (Barang Keluar)</small></h1>
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
                  <a href="<?= base_url('stock/out/add'); ?>" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add <?= ucfirst($menu); ?></a>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="myTable1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Barcode</th>
                           <th>Product Item</th>
                           <th>Qty</th>
                           <th>Date</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        foreach ($row as $data => $stock) : ?>
                           <tr>
                              <td class="text-center" style="width: 15%;"><?= $stock['barcode'] ?></td>
                              <td><?= $stock['item_name'] ?></td>
                              <td class="text-center" style="width: 8%;"><?= $stock['qty']; ?></td>
                              <td class="text-center"><?= indo_date($stock['date']); ?></td>
                              <td width="160px" class="text-center">
                                 <a id="detailStockIn" href="<?= base_url('stock/in/detail/' . $stock['stock_id']); ?>" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-detail" data-barcode="<?= $stock['barcode']; ?>" data-itemname="<?= $stock['item_name']; ?>" data-detail="<?= $stock['detail']; ?>" data-qty="<?= $stock['qty']; ?>" data-date="<?= indo_date($stock['date']); ?>">
                                    <i class="fas fa-eye"></i>
                                    Detail
                                 </a>&nbsp;
                                 <a href="<?= base_url('stock/out/delete/' . $stock['stock_id'] . '/' . $stock['item_id']); ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detailLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal-detailLabel">Stock Out Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="card-body table-responsive">
            <table class="table table-hover table-striped table-bordered">
               <tr>
                  <td>Barcode</td>
                  <td><span id="barcode"></span></td>
               </tr>
               <tr>
                  <td>Item Name</td>
                  <td><span id="item_name"></span></td>
               </tr>
               <tr>
                  <td>Detail</td>
                  <td><span id="detail"></span></td>
               </tr>
               <tr>
                  <td>Qty</td>
                  <td><span id="qty"></span></td>
               </tr>
               <tr>
                  <td>Date</td>
                  <td><span id="date"></span></td>
               </tr>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function() {
      $(document).on('click', '#detailStockIn', function() {
         const barcode = $(this).data('barcode');
         const itemname = $(this).data('itemname');
         const detail = $(this).data('detail');
         const qty = $(this).data('qty');
         const date = $(this).data('date');
         $('#barcode').text(barcode);
         $('#item_name').text(itemname);
         $('#detail').text(detail);
         $('#qty').text(qty);
         $('#date').text(date);
      });
   });
</script>