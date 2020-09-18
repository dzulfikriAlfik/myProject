<html moznomarginboxes mozdisallowselectionprint>

<head>
   <title>MyKasir - Print Nota</title>
   <style type="text/css">
      html {
         font-family: "Verdana, Arial";
      }

      .content {
         width: 90mm;
         font-size: 12px;
         padding: 5px;
      }

      .title {
         text-align: center;
         font-size: 13px;
         padding-bottom: 5px;
         border-bottom: 1px dashed;
      }

      .head {
         margin-top: 5px;
         margin-bottom: 10px;
         padding-bottom: 10px;
         border-bottom: 1px solid;
      }

      table {
         width: 100%;
         font-size: 12px;
      }

      .thanks {
         margin-top: 10px;
         padding-top: 10px;
         text-align: center;
         border-top: 1px dashed;
      }

      @media print {
         @page {
            width: 80mm;
            margin: 0;
         }
      }
   </style>
</head>

<body onload="window.print()">

   <div class="content">
      <div class="title">
         <b>MyKasir Store</b>
         <br>
         Jl. Terminal Bis Cikijing
      </div>
      <div class="head">
         <table cellspacing="0" cellpadding="0">
            <tr>
               <td style="width: 170px;">
                  <?= date("d/m/y", strtotime($sales->date)) . " " . date("H:i", strtotime($sales->sales_created)); ?>
               </td>
               <td>Cashier</td>
               <td style="text-align: center; width:10px">:</td>
               <td style="text-align: right;"><?= ucfirst($sales->user_name); ?></td>
            </tr>
            <tr>
               <td><?= $sales->invoice; ?></td>
               <td>Customer</td>
               <td style="text-align: center;">:</td>
               <td style="text-align: right;">
                  <?= $sales->customer_id == null ? "Umum" : $sales->customer_name; ?>
               </td>
            </tr>
         </table>
      </div>
      <div class="transaction">
         <table class="transaction-table" cellspacing="0" cellpadding="0">
            <?php
            $arr_discount = [];
            foreach ($sales_detail as $key => $value) : ?>
               <tr>
                  <td style="width: 165px;"><?= $value->name; ?></td>
                  <td><?= $value->qty; ?></td>
                  <td style="text-align: right; width: 120px;"><?= rupiah_print($value->price); ?></td>
                  <td style="text-align: right; width: 120px;">
                     <?= rupiah_print(($value->price - $value->discount_item) * $value->qty); ?>
                  </td>
               </tr>
               <?php
               if ($value->discount_item > 0) :
                  $arr_discount[] = rupiah_print($value->discount_item);
               endif;
            endforeach;

            foreach ($arr_discount as $key => $value) : ?>
               <tr>
                  <td></td>
                  <td colspan="2" style="text-align: right;">Disc. <?= ($key + 1); ?></td>
                  <td style="text-align: right;"><?= $value; ?></td>
               </tr>
            <?php endforeach; ?>
            <tr>
               <td colspan="4" style="border-bottom: 1px dashed; padding-top: 5px;"></td>
            </tr>
            <tr>
               <td colspan="2"></td>
               <td style="text-align: right; padding-top: 5px;">Sub Total</td>
               <td style="text-align: right; padding-top: 5px;"><?= rupiah_print($sales->total_price); ?></td>
            </tr>
            <?php if ($sales->discount > 0) : ?>
               <tr>
                  <td colspan="2"></td>
                  <td style="text-align: right; padding-bottom: 5px;">Disc. Sale</td>
                  <td style="text-align: right; padding-bottom: 5px;"><?= rupiah_print($sales->discount); ?></td>
               </tr>
            <?php endif; ?>
            <tr>
               <td colspan="2"></td>
               <td style="border-top: 1px dashed; text-align: right; padding: 5px 0;">Grand Total</td>
               <td style="border-top: 1px dashed; text-align: right; padding: 5px 0;"><?= rupiah_print($sales->final_price); ?></td>
            </tr>
            <tr>
               <td colspan="2"></td>
               <td style="border-top: 1px dashed; text-align: right; padding-top: 5px;">Cash</td>
               <td style="border-top: 1px dashed; text-align: right; padding-top: 5px;"><?= rupiah_print($sales->cash); ?></td>
            </tr>
            <tr>
               <td colspan="2"></td>
               <td style="text-align: right">Change</td>
               <td style="text-align: right"><?= rupiah_print($sales->remaining); ?></td>
            </tr>
         </table>
      </div>
      <div class="thanks">
         ~~~ Thank You ~~~
         <br>
         www.instagram.com/dzulfikri_alfik
      </div>
   </div>

</body>

</html>