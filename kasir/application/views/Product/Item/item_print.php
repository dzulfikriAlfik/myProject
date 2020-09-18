<html>

<head>
   <title>Barcode Product - <?= $row->barcode; ?></title>
</head>

<body>
   <h2 style="text-align:center">Detail Barang - <?= $row->barcode ?></h2>
   <p>Nama Product : <?= $row->name; ?></p>
   <p>Kategori : <?= getnama($row->category_id, 'p_category', 'category_id', 'name'); ?></p>
   <p>Unit : <?= getnama($row->unit_id, 'p_unit', 'unit_id', 'name'); ?></p>
   <p>Harga : <?= rupiah($row->price); ?></p>
   <p>Stock : <?= $row->stock; ?></p>
   <?php
   $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
   echo 'Barcode : &nbsp;&nbsp;<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="width:200px">';
   ?>
</body>

</html>