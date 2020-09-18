<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Barcode / QR-Code Generator</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
               <li class="breadcrumb-item"><a href="<?= base_url($menu); ?>"><?= ucfirst($menu); ?></a></li>
               <li class="breadcrumb-item active"><?= ucfirst($page); ?></li>
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

<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-8 offset-2">
         <div class="card">
            <div class="card-header">
               <a href="<?= base_url('item'); ?>" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
               <div class="col-md-5 offset text-center">
                  <div class="card-body">
                     <p>Barcode</p>
                     <?php
                     $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                     echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" class="pb-3">';
                     echo "<br>";
                     echo $row->barcode;
                     ?>
                  </div>
                  <a href="<?= base_url('item/barcode_print/' . $row->item_id); ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Print Barcode</a>
               </div>
               <div class="col-md-5 offset">
                  <div class="card-body text-center">
                     <p>QR-Code</p>
                     <?php
                     $qrCode = new Endroid\QrCode\QrCode($row->barcode);
                     $qrCode->writeFile("uploads/qr-code/$row->barcode-Item-" . getnama($row->item_id, 'p_item', 'item_id', 'name') . ".png");
                     ?>
                     <img src="<?= base_url("uploads/qr-code/$row->barcode-Item-" . getnama($row->item_id, 'p_item', 'item_id', 'name') . ".png"); ?>" alt="QR-Code" style="width: 200px;">
                     <?php
                     echo "<br>";
                     echo $row->barcode;
                     ?><br><br>
                     <a href="<?= base_url('item/qrcode_print/' . $row->item_id); ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Print QRCode</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.card -->
      </div>
   </div>
</section>