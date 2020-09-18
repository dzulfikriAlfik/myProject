<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Sales Report</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
               <li class="breadcrumb-item active">Sales Report</li>
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
               <!-- <div class="card-header">
                  <a href="<?= base_url('customer/add'); ?>" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add customer</a>
               </div> -->
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="myTable1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Invoice</th>
                           <th>Date</th>
                           <th>Customer</th>
                           <th>Total</th>
                           <th>Discount</th>
                           <th>Grand Total</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $no = 1;
                        foreach ($row as $s => $data) : ?>
                           <tr>
                              <td style="width: 5%;"><?= $no++; ?></td>
                              <td class="text-center"><?= $data->invoice; ?></td>
                              <td><?= indo_date($data->date); ?></td>
                              <td><?= $data->customer_name == '' ? 'Umum' : $data->customer_name; ?></td>
                              <td><?= rupiah($data->total_price); ?></td>
                              <td><?= rupiah($data->discount); ?></td>
                              <td><?= rupiah($data->final_price); ?></td>
                              <td width="200px" class="text-center">
                                 <button type="button" id="detail" data-target="#modal-detail" data-toggle="modal" data-invoice="<?= $data->invoice; ?>" data-date="<?= $data->date; ?>" data-time="<?= substr($data->sales_created, 11, 5); ?>" data-customer="<?= $data->customer_id == null ? 'Umum' : $data->customer_name; ?>" data-total="<?= rupiah($data->total_price); ?>" data-discount="<?= rupiah($data->discount); ?>" data-grandtotal="<?= rupiah($data->final_price); ?>" data-cash="<?= rupiah($data->cash); ?>" data-change="<?= rupiah($data->remaining); ?>" data-note="<?= $data->note; ?>" data-cashier="<?= $data->user_name; ?>" data-salesid="<?= $data->sales_id; ?>" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Detail</button>&nbsp;
                                 <a href="<?= base_url('sales/cetak/' . $data->sales_id); ?>" target="_blank" class="btn btn-dark btn-xs"><i class="fas fa-print"></i> Cetak</a>&nbsp;
                                 <a href="<?= base_url('sales/delete_sales/' . $data->sales_id); ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
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

<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-detail-title" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal-detail-title">Sales Report Detail</h5>
            <button class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body table-responsive">
            <table class="table table-striped table-hover table-borderless">
               <tbody>
                  <tr>
                     <th style="width: 20%;">Invoice</th>
                     <td style="width: 30%;"><span id="invoice"></span></td>
                     <th style="width: 20%;">Customer</th>
                     <td style="width: 30%;"><span id="cust"></span></td>
                  </tr>
                  <tr>
                     <th>Date Time</th>
                     <td><span id="datetime"></span></td>
                     <th>Cashier</th>
                     <td><span id="cashier"></span></td>
                  </tr>
                  <tr>
                     <th>Total</th>
                     <td><span id="total"></span></td>
                     <th>Cash</th>
                     <td><span id="cash"></span></td>
                  </tr>
                  <tr>
                     <th>Discount</th>
                     <td><span id="discount"></span></td>
                     <th>Change</th>
                     <td><span id="change"></span></td>
                  </tr>
                  <tr>
                     <th>Grand Total</th>
                     <td><span id="grandtotal"></span></td>
                     <th>Note</th>
                     <td><span id="note"></span></td>
                  </tr>
                  <tr>
                     <th>Product</th>
                     <td colspan="3"><span id="product"></span></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).on('click', '#detail', function() {
      $('#invoice').text(': ' + $(this).data('invoice'));
      $('#cust').text(': ' + $(this).data('customer'));
      $('#datetime').text(': ' + $(this).data('date') + " " + $(this).data('time'));
      $('#cashier').text(': ' + $(this).data('cashier'));
      $('#total').text(': ' + $(this).data('total'));
      $('#cash').text(': ' + $(this).data('cash'));
      $('#discount').text(': ' + $(this).data('discount'));
      $('#change').text(': ' + $(this).data('change'));
      $('#grandtotal').text(': ' + $(this).data('grandtotal'));
      $('#note').text(': ' + $(this).data('note'));

      let product = '<table class="table">'
      product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
      $.getJSON('<?= site_url('report/sales_product/') ?>' + $(this).data('salesid'), function(data) {
         $.each(data, function(key, val) {
            product += '<tr><td>' + val.name + '</td><td>' + val.price + '</td><td>' + val.qty + '</td><td>' + val.discount_item + '</td><td>' + val.total + '</td></tr>'
         })
         product += '</table>'
         $('#product').html(product)
      })
   })
</script>