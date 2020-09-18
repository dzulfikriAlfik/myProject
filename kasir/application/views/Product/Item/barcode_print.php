<html>

<head>
   <title>Barcode Product - <?= $row->barcode; ?></title>
</head>

<body>
   <h2 style="text-align:center">Barcode - <?= $row->barcode ?></h2>
   <?php
   $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
   echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="width:200px">';
   ?>
</body>

</html>