<?php $no = 1;
if ($cart->num_rows() > 0) :
   foreach ($cart->result() as $c => $data) : ?>
      <tr>
         <td><?= $no++; ?></td>
         <td class="barcode"><?= $data->barcode; ?></td>
         <td><?= $data->item_name; ?></td>
         <td class="text-right"><?= rupiah($data->cart_price); ?></td>
         <td class="text-center"><?= $data->qty; ?></td>
         <td class="text-right"><?= $data->discount_item; ?></td>
         <td class="text-right" id="total"><?= $data->total; ?></td>
         <td class="text-center" width="160px">
            <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit" data-cartid="<?= $data->cart_id; ?>" data-barcode="<?= $data->barcode; ?>" data-product="<?= $data->item_name; ?>" data-price="<?= $data->cart_price; ?>" data-qty="<?= $data->qty; ?>" data-discount="<?= $data->discount_item; ?>" data-stock="<?= $data->stock; ?>" data-total="<?= $data->total; ?>" class="btn btn-warning btn-xs">
               <i class="fas fa-edit"></i> Edit
            </button>
            <button id="del_cart" data-cartid="<?= $data->cart_id; ?>" class="btn btn-danger btn-xs">
               <i class="fas fa-trash"></i> Hapus
            </button>
         </td>
      </tr>
   <?php endforeach; ?>
<?php elseif ($cart->num_rows() < 1) : ?>
   <tr>
      <td colspan="8" class="text-center">Tidak Ada Data Item</td>
   </tr>
<?php endif; ?>