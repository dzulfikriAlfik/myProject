<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1><?= ucfirst($menu); ?></h1>
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
            <?= $this->session->flashdata('pesan'); ?>
         </div>
      </div>
   </div>
</section>

<div class="flash-data" data-pesan="<?= ucfirst($menu); ?>" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>

<!-- Main content -->
<section class="content">
   <!-- <form action="" method="post"> -->
   <!-- FIRST CARD -->
   <div class="row">
      <div class="col-lg-4">
         <div class="card" style="height: 188px;">
            <div class="card-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="date">Date</label>
                     </div>
                     <div class="col-9">
                        <input type="date" name="date" id="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="kasir">Kasir</label>
                     </div>
                     <div class="col-9">
                        <input type="text" name="kasir" id="kasir" class="form-control" value="<?= $this->fungsi->user_login()->name ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="customer">Customer</label>
                     </div>
                     <div class="col-9">
                        <select name="customer" id="customer" class="form-control">
                           <option value="">Umum</option>
                           <?php foreach ($row as $customer) : ?>
                              <option value="<?= $customer->customer_id; ?>"><?= $customer->name; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card" style="height: 188px;">
            <div class="card-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="barcode">Barcode</label>
                     </div>
                     <div class="col-9 input-group">
                        <input type="hidden" id="item_id">
                        <input type="hidden" id="price">
                        <input type="hidden" id="stock">
                        <input type="hidden" id="qty_cart">
                        <input type="text" id="barcode" class="form-control" required readonly>
                        <div class="input-group-append">
                           <span class="input-group-sm">
                              <button type="submit" class="btn btn-dark btn-flat" data-toggle="modal" data-target="#modal-item">
                                 <i class="fas fa-search"></i>
                              </button>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="qty">Qty</label>
                     </div>
                     <div class="col-9">
                        <input type="number" name="qty" id="qty" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col offset-3">
                        <button type="button" id="add_cart" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i> Add</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card" style="height: 188px;">
            <div class="card-body d-flex flex-column justify-content-between align-items-end">
               <div class="row">
                  <div class="col text-right">
                     <h5 style="font-size: 1.2rem;">Invoice-<b><?= $invoice; ?></b></h5>
                  </div>
               </div>
               <div class="row" style="height: 0;">
                  <h1 style="font-size: 2.7rem;"><b><span id="grand_total2"></span></b></h1>
               </div>
               <div class="row"></div>
            </div>
         </div>
      </div>
   </div>
   <!-- TABLE -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body table-responsive p-0">
               <table class="table table-bordered table-striped text-nowrap">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Product Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Discount Item</th>
                        <th>Total</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody id="cart_table">
                     <?php $this->view('Transaction/Sales/cart_data') ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- SECONDLAST CARD -->
   <div class="row">
      <div class="col-lg-4">
         <div class="card" style="height: 188px;">
            <div class="card-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-5">
                        <label for="subtotal">SubTotal</label>
                     </div>
                     <div class="col-7">
                        <input type="text" name="subtotal" id="subtotal" class="form-control" readonly>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-5">
                        <label for="discount">Discount</label>
                     </div>
                     <div class="col-7">
                        <input type="number" name="discount" id="discount" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-5">
                        <label for="grand_total">GrandTotal</label>
                     </div>
                     <div class="col-7">
                        <input type="text" name="grand_total" id="grand_total" class="form-control" readonly>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card" style="height: 188px;">
            <div class="card-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="cash">Cash</label>
                     </div>
                     <div class="col-9">
                        <input type="number" name="cash" id="cash" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="change">Change</label>
                     </div>
                     <div class="col-9">
                        <input type="text" name="change" id="change" readonly class="form-control">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card" style="height: 188px;">
            <div class="card-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-3">
                        <label for="note">Note</label>
                     </div>
                     <div class="col-9">
                        <textarea name="note" id="note" cols="30" rows="3" class="form-control"></textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- LAST CARD -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
               <div class="form-group text-center">
                  <button id="cancel_payment" class="btn btn-warning btn-flat"><i class="fas fa-undo"></i> Cancel</button>
                  <button type="submit" id="process_payment" class="btn btn-success btn-flat"><i class="fas fa-paper-plane"></i> Proccess Payment</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- </form> -->
</section>

<!-- Modal Add Product Item -->
<div class="modal fade" id="modal-item" tabindex="-1" aria-labelledby="modal-itemLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal-itemLabel">Sales</h5>
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
                           <button class="btn btn-dark btn-xs" id="select" data-id="<?= $data['item_id']; ?>" data-barcode="<?= $data['barcode']; ?>" data-price="<?= $data['price']; ?>" data-stock="<?= $data['stock']; ?>">
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

<!-- Modal Edit -->
<div class="modal fade" id="modal-item-edit" tabindex="-1" aria-labelledby="modal-item-editLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal-item-editLabel">Edit Product Item Sales</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <input type="hidden" id="cartid_item">
            <div class="form-group">
               <label for="product_item">Product Item</label>
               <div class="row">
                  <div class="col-md-5">
                     <input type="text" id="barcode_item" class="form-control" readonly>
                  </div>
                  <div class="col-md-7">
                     <input type="text" id="product_item" class="form-control" readonly>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="price_item">Price Item</label>
               <input type="number" id="price_item" min="0" class="form-control">
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-6">
                     <label for="qty_item">Qty</label>
                     <input type="number" id="qty_item" min="1" class="form-control">
                  </div>
                  <div class="col-md-6">
                     <label for="qty_item">Stock Item</label>
                     <input type="text" id="stock_item" class="form-control" readonly>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="total_before">Total Before Discount</label>
               <input type="number" id="total_before" class="form-control" readonly>
            </div>
            <div class="form-group">
               <label for="discount_item">Discount Per-Item</label>
               <input type="number" id="discount_item" min="0" class="form-control">
            </div>
            <div class="form-group">
               <label for="total_item">Total After Discount</label>
               <input type="number" id="total_item" min="0" class="form-control" readonly>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="edit_cart">Save</button>
         </div>
      </div>
   </div>
</div>

<script>
   function mySwal(title, text, icon, type) {
      Swal.fire({
         title: title,
         text: text,
         type: type,
         icon: icon,
         showConfirmButton: false,
         timer: 2000,
         footer: '<b>Aplikasi Kasir Penjualan</b>'
      });
   }

   function resetVal(itemId = false, barcode = false, price = false, stock = false, qty = false) {
      $(itemId).val('');
      $(barcode).val('');
      $(price).val('');
      $(stock).val('');
      $(qty).val('');
   }

   $(document).ready(function() {
      $(document).on('click', '#select', function() {
         const barcode = $(this).data('barcode');
         $('#item_id').val($(this).data('id'));
         $('#barcode').val(barcode);
         $('#price').val($(this).data('price'));
         $('#stock').val($(this).data('stock'));
         $('#qty').attr({
            "max": $(this).data('stock'),
            "min": 1
         });
         $('#modal-item').modal('hide');

         get_cart_qty(barcode)
      });
   });

   // cek stock di table cart
   function get_cart_qty(barcode) {
      $('#cart_table tr').each(function() {
         let qty_cart = $("#cart_table td.barcode:contains('" + barcode + "')").parent().find("td").eq(4).html();
         if (qty_cart != null) {
            $('#qty_cart').val(qty_cart);
         } else {
            $('#qty_cart').val(0);
         }
      });
   }

   // Add Cart
   $(document).on('click', '#add_cart', function() {
      const item_id = $('#item_id').val();
      const price = $('#price').val();
      const stock = parseInt($('#stock').val());
      const qty = parseInt($('#qty').val());
      const qty_cart = parseInt($('#qty_cart').val());
      if (item_id == '') {
         mySwal('Product Belum Dipilih', 'Pilih Product Terlebih Dahulu', 'error', 'error');
         $('#barcode').focus();
      } else if (qty == '' && stock > 0) {
         mySwal('Quantity Masih kosong', 'Masukan Jumlah Quantity Product', 'error', 'error');
         $('#barcode').focus();
      } else if (stock < 1) {
         mySwal('Stock Masih Kosong', 'Input Stock di Menu Stock-In', 'error', 'error');
         resetVal('#item_id', '#barcode', '#price', '#stock', '#qty');
      } else if (qty > stock || (stock - qty_cart) < qty) {
         mySwal('Stock Tidak Mencukupi', 'Quantity / Cart Tidak Boleh Melebihi Stock Tersedia', 'error', 'error');
      } else {
         $.ajax({
            type: 'POST',
            url: '<?= base_url('sales/process'); ?>',
            data: {
               'add_cart': true,
               'item_id': item_id,
               'price': price,
               'qty': qty
            },
            dataType: 'json',
            success: function(result) {
               if (result.success == true) {
                  $('#cart_table').load('<?= base_url('sales/load_cart_data'); ?>', function() {
                     resetVal('#item_id', '#barcode', '#price', '#stock', '#qty');
                     calculate();
                  })
               } else {
                  mySwal('Gagal Tambah Item Cart', 'Terdapat Error yang tidak diketahui', 'error', 'error');
                  resetVal('#item_id', '#barcode', '#price', '#stock', '#qty');
               }
            }
         })
      }
   });

   // Delete Cart
   $(document).on('click', '#del_cart', function() {
      const href = $(this).attr('href');
      const cart_id = $(this).data('cartid');

      Swal.fire({
         title: 'Apakah Anda Yakin?',
         text: 'Data akan dihapus!',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Hapus Data',
         footer: '<b>Aplikasi Kasir Penjualan</b>'
      }).then((result) => {
         if (result.value) {
            $.ajax({
               type: 'POST',
               url: '<?= base_url('sales/cart_delete'); ?>',
               dataType: 'json',
               data: {
                  'cart_id': cart_id
               },
               success: function(result) {
                  if (result.success == true) {
                     $('#cart_table').load('<?= base_url('sales/load_cart_data'); ?>', function() {
                        // mySwal('Data Item Cart Berhasil Dihapus', '', 'success', 'success');
                        calculate();
                     })
                  } else {
                     mySwal('Gagal Tambah Item Cart', 'Terdapat Error yang tidak diketahui', 'error', 'error');
                  }
               }
            })
         }
      });
   });

   // Edit Item Cart
   $(document).ready(function() {
      $(document).on('click', '#update_cart', function() {
         $('#cartid_item').val($(this).data('cartid'));
         $('#barcode_item').val($(this).data('barcode'));
         $('#product_item').val($(this).data('product'));
         $('#price_item').val($(this).data('price'));
         $('#qty_item').val($(this).data('qty'));
         $('#total_before').val($(this).data('price') * $(this).data('qty'));
         $('#discount_item').val($(this).data('discount'));
         $('#total_item').val($(this).data('total'));
         $('#stock_item').val($(this).data('stock'));
         $('#qty_item').attr({
            "max": $(this).data('stock'),
            "min": 1
         });
      });
   });

   function count_edit_modal() {
      const price = $('#price_item').val();
      const qty = $('#qty_item').val();
      const discount = $('#discount_item').val();

      total_before = price * qty;
      $('#total_before').val(total_before);

      total = (price - discount) * qty;
      $('#total_item').val(total);

      if (discount == '' || discount == 0) {
         $('#discount_item').val(0);
      }
   }

   $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
      count_edit_modal();
   });

   // Edit Cart
   $(document).on('click', '#edit_cart', function() {
      const cart_id = $('#cartid_item').val();
      const price = $('#price_item').val();
      const qty = parseInt($('#qty_item').val());
      const discount = $('#discount_item').val();
      const total = $('#total_item').val();
      const stock = $('#stock_item').val();
      if (price == '' || price < 1) {
         mySwal('Kolom Harga Tidak Boleh Kosong', 'Masukan Harga', 'error', 'error');
      } else if (qty == '' || qty < 1) {
         mySwal('Quantity Tidak Boleh kosong', 'Masukan Jumlah Quantity Product', 'error', 'error');
         $('#qty_item').focus();
      } else if (qty > stock) {
         mySwal('Quantity Tidak Boleh Melebihi Stock', false, 'error', 'error');
         $('#qty_item').focus();
      } else {
         $.ajax({
            type: 'POST',
            url: '<?= base_url('sales/process'); ?>',
            data: {
               'edit_cart': true,
               'cart_id': cart_id,
               'price': price,
               'qty': qty,
               'discount': discount,
               'total': total
            },
            dataType: 'json',
            success: function(result) {
               if (result.success == true) {
                  $('#cart_table').load('<?= base_url('sales/load_cart_data'); ?>', function() {
                     mySwal('Item Cart Berhasil di Update', false, 'success', 'success');
                     calculate();
                     $('#modal-item-edit').modal('hide');
                  })
               } else {
                  mySwal('Tidak Ada Item Cart yang Diupdate', false, 'warning', 'warning');
                  $('#modal-item-edit').modal('hide');
               }
            }
         })
      }
   });

   // Kalkuasi Total Sales
   function calculate() {
      let subTotal = 0;
      $('#cart_table tr').each(function() {
         subTotal += parseInt($(this).find('#total').text())
      });
      isNaN(subTotal) ? $('#subtotal').val(0) : $('#subtotal').val(subTotal);

      let discount = $('#discount').val();
      let grandTotal = subTotal - discount;
      if (isNaN(grandTotal)) {
         $('#grand_total').val(0)
         $('#grand_total2').text(0)
      } else {
         $('#grand_total').val(grandTotal)
         $('#grand_total2').text(grandTotal)
      }

      let cash = $('#cash').val();
      cash != 0 ? $('#change').val(cash - grandTotal) : $('#change').val(0);

      if (discount == '' || discount == 0) {
         $('#discount').val(0);
      }
   }

   $(document).on('keyup mouseup', '#discount, #cash', function() {
      calculate();
   });

   $(document).ready(function() {
      calculate();
   });

   // Process payment
   $(document).on('click', '#process_payment', function() {
      let customer_id = $('#customer').val();
      let subtotal = $('#subtotal').val();
      let discount = $('#discount').val();
      let grandtotal = $('#grand_total').val();
      let cash = $('#cash').val();
      let change = $('#change').val();
      let note = $('#note').val();
      let date = $('#date').val();

      if (subtotal < 1) {
         mySwal('Belum ada product item yang dipilih', false, 'error', 'error');
      } else if (cash < 1 || cash == null) {
         mySwal('Jumlah uang cash belum diinput', false, 'error', 'error');
      } else if (parseInt(cash) < parseInt(grandtotal)) {
         mySwal('Jumlah uang cash belum cukup', false, 'error', 'error');
         $('#cash').focus()
      } else {
         Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Transaksi ini akan diproses',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proses',
            footer: '<b>Aplikasi Kasir Penjualan</b>'
         }).then((result) => {
            if (result.value) {
               $.ajax({
                  type: 'POST',
                  url: '<?= base_url('sales/process'); ?>',
                  data: {
                     'process_payment': true,
                     'customer_id': customer_id,
                     'subtotal': subtotal,
                     'discount': discount,
                     'grandtotal': grandtotal,
                     'cash': cash,
                     'change': change,
                     'note': note,
                     'date': date
                  },
                  dataType: 'json',
                  success: function(result) {
                     if (result.success) {
                        mySwal('Transaksi Berhasil', false, 'success', 'success');
                        window.open('<?= base_url('sales/cetak/'); ?>' + result.sales_id, '_blank');
                     } else {
                        mySwal('Transaksi Gagal', false, 'error', 'error');
                     }
                     location.href = '<?= base_url('sales'); ?>';
                  }
               })
            }
         });
      }
   });

   // Cancel Payment
   $(document).on('click', '#cancel_payment', function() {
      Swal.fire({
         title: 'Apakah Anda Yakin?',
         text: 'Transaksi akan dibatalkan dan cart akan terhapus',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Proses',
         footer: '<b>Aplikasi Kasir Penjualan</b>'
      }).then((result) => {
         if (result.value) {
            $.ajax({
               type: 'POST',
               url: '<?= base_url('sales/cart_delete'); ?>',
               dataType: 'json',
               data: {
                  'cancel_payment': true
               },
               success: function(result) {
                  if (result.success == true) {
                     $('#cart_table').load('<?= base_url('sales/load_cart_data'); ?>', function() {
                        mySwal('Payment Canceled', 'Data Item Cart Berhasil Dihapus', 'success', 'success');
                        calculate();
                     })
                  }
               }
            })
         }
         $('#discount').val(0);
         $('#cash').val(0);
         $('#customer').val('').change();
         $('#barcode').val('');
      });
   });
</script>