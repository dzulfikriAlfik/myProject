<html>
<head>
<title>Kirim Berita</title>
</head>
<body>
<form action="kirimberita.php" method="post">
From :
<?php
echo $_GET['userid'];
$no = $_GET['no'];
echo "<input type='hidden' name='userid' value='$no'>";
?>
<p>
Berita:<br>
<textarea name=berita cols=30 rows=10></textarea>
<p>
<input type=submit>
</form>
</body>
</html>
