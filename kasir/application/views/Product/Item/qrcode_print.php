<html>

<head>
   <title>QRCode Product - <?= $row->barcode; ?></title>
</head>

<body>
   <h2 style="text-align:center">QRCode - <?= $row->barcode ?></h2>
   <img src="uploads/qr-code/<?= $row->barcode . "-Item-" . getnama($row->item_id, 'p_item', 'item_id', 'name') . ".png"; ?>" alt="QR-Code" style="width: 250px;">
</body>

</html>