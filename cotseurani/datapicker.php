<html>
<head>
<link type="text/css" href="css/ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>   
<script type="text/javascript" src="js/ui.datepicker-id.js"></script>
<script type="text/javascript" src="js/effects.core.js"></script>
<script type="text/javascript" src="js/effects.drop.js"></script>
<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
          showAnim    : "drop",
          showOptions : { direction: "up" }
        });
      });
    </script>
<title>DataPicker</title>
</head>
<style type="text/css">
<!--
body
{
padding:50px;
}
-->
</style>
<body style="font-size:65%;">
<table align="center" width="30%">
<tr><td>&nbsp;</td></tr>
<tr>
<td>Masukkan Tanggal :</td>
<td><input type="text" id="tanggal" size=30 placeholder="Masukkan Tanggal"></td> 
</tr>
</table>
</body>
</html>