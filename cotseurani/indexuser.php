<?php
	if (!isset($_SESSION)) {
    session_start();
}
	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
		?>
<script type="text/javascript">
alert("Anda Harus Login Dulu...!!!");
window.location='index.php';
		</script>
		<?php
	}else{
	include "koneksi.php";
?>
<?php

 $sambung = mysql_connect("localhost", "root", "") or die ("Gagal konek ke server.");
mysql_select_db("kua") or die ("Gagal membuka database.");

$username=$_SESSION['username'];
$query = "select * from registrasi where username='$username'";
$result =  mysql_query($query, $sambung) or die("gagal melakukan query");
     $buff = mysql_fetch_array($result);
                 mysql_close($sambung);
?>
<html>

<head>
<link href="styles/examples-offline.css" rel="stylesheet">
    <link href="styles/kendo.common.min.css" rel="stylesheet">
    <link href="styles/kendo.default.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.web.min.js"></script>
    <script src="content/shared/js/console.js"></script>
<link rel="shortcut icon" href="logo_bar.png" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">

/******************************************
* Snow Effect Script- By Altan d.o.o. (http://www.altan.hr/snow/index.html)
* Visit Dynamic Drive DHTML code library (http://www.dynamicdrive.com/) for full source code
* Last updated Nov 9th, 05' by DD. This notice must stay intact for use
******************************************/
 /*
  //Configure below to change URL path to the snow image
  var snowsrc="gambar/snow.gif"
  // Configure below to change number of snow to render
  var no = 10;
  // Configure whether snow should disappear after x seconds (0=never):
  var hidesnowtime = 0;
  // Configure how much snow should drop down before fading ("windowheight" or "pageheight")
  var snowdistance = "pageheight";

///////////Stop Config//////////////////////////////////

  var ie4up = (document.all) ? 1 : 0;
  var ns6up = (document.getElementById&&!document.all) ? 1 : 0;

	function iecompattest(){
	return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
	}

  var dx, xp, yp;    // coordinate and position variables
  var am, stx, sty;  // amplitude and step variables
  var i, doc_width = 800, doc_height = 600; 
  
  if (ns6up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
  } else if (ie4up) {
    doc_width = iecompattest().clientWidth;
    doc_height = iecompattest().clientHeight;
  }

  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();
  snowsrc=(snowsrc.indexOf("http://localhost/sd_sumoroto/gambar/")!=-1)? "snow.gif" : snowsrc
  for (i = 0; i < no; ++ i) {  
    dx[i] = 0;                        // set coordinate variables
    xp[i] = Math.random()*(doc_width-50);  // set position variables
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;         // set amplitude variables
    stx[i] = 0.02 + Math.random()/10; // set step variables
    sty[i] = 0.7 + Math.random();     // set step variables
		if (ie4up||ns6up) {
      if (i == 0) {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><a href=\"http://dynamicdrive.com\"><img src='"+snowsrc+"' border=\"0\"><\/a><\/div>");
      } else {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
      }
    }
  }

  function snowIE_NS6() {  // IE and NS6 main animation function
    doc_width = ns6up?window.innerWidth-10 : iecompattest().clientWidth-10;
		doc_height=(window.innerHeight && snowdistance=="windowheight")? window.innerHeight : (ie4up && snowdistance=="windowheight")?  iecompattest().clientHeight : (ie4up && !window.opera && snowdistance=="pageheight")? iecompattest().scrollHeight : iecompattest().offsetHeight;
    for (i = 0; i < no; ++ i) {  // iterate for every dot
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top=yp[i]+"px";
      document.getElementById("dot"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+"px";  
    }
    snowtimer=setTimeout("snowIE_NS6()", 10);
  }

	function hidesnow(){
		if (window.snowtimer) clearTimeout(snowtimer)
		for (i=0; i<no; i++) document.getElementById("dot"+i).style.visibility="hidden"
	}
		

if (ie4up||ns6up){
    snowIE_NS6();
		if (hidesnowtime>0)
		setTimeout("hidesnow()", hidesnowtime*1000)
		}

</script>
<script>

/******************************************
* Cross browser cursor trailer script- By Brian Caputo (bcaputo@icdc.com)
* Visit Dynamic Drive (http://www.dynamicdrive.com/) for full source code
* Modified Dec 31st, 02' by DD. This notice must stay intact for use
******************************************/
/*
A=document.getElementById
B=document.all;
C=document.layers;
T1=new Array("gambar/trail1.gif",38,35,"gambar/trail2.gif",30,31,"gambar/trail3.gif",28,26,"gambar/trail4.gif",22,21,"gambar/trail5.gif",16,16,"gambar/trail6.gif",10,10)

var offsetx=15 //x offset of trail from mouse pointer
var offsety=10 //y offset of trail from mouse pointer

nos=parseInt(T1.length/3)
rate=50
ie5fix1=0;
ie5fix2=0;
rightedge=B? document.body.clientWidth-T1[1] : window.innerWidth-T1[1]-20
bottomedge=B? document.body.scrollTop+document.body.clientHeight-T1[2] : window.pageYOffset+window.innerHeight-T1[2]

for (i=0;i<nos;i++){
createContainer("CUR"+i,i*10,i*10,i*3+1,i*3+2,"","<img src='"+T1[i*3]+"' width="+T1[(i*3+1)]+" height="+T1[(i*3+2)]+" border=0>")
}

function createContainer(N,Xp,Yp,W,H,At,HT,Op,St){
with (document){
write((!A && !B) ? "<layer id='"+N+"' left="+Xp+" top="+Yp+" width="+W+" height="+H : "<div id='"+N+"'"+" style='position:absolute;left:"+Xp+"; top:"+Yp+"; width:"+W+"; height:"+H+"; ");
if(St){
if (C)
write(" style='");
write(St+";' ")
}
else write((A || B)?"'":"");
write((At)? At+">" : ">");
write((HT) ? HT : "");
if (!Op)
closeContainer(N)
}
}

function closeContainer(){
document.write((A || B)?"</div>":"</layer>")
}

function getXpos(N){
if (A)
return parseInt(document.getElementById(N).style.left)
else if (B)
return parseInt(B[N].style.left)
else
return C[N].left
}

function getYpos(N){
if (A)
return parseInt(document.getElementById(N).style.top)
else if (B)
return parseInt(B[N].style.top)
else
return C[N].top
}

function moveContainer(N,DX,DY){
c=(A)? document.getElementById(N).style : (B)? B[N].style : (C)? C[N] : "";
if (!B){
rightedge=window.innerWidth-T1[1]-20
bottomedge=window.pageYOffset+window.innerHeight-T1[2]
}
c.left=Math.min(rightedge, DX+offsetx);
c.top=Math.min(bottomedge, DY+offsety);
}
function cycle(){
//if (IE5) 
if (document.all&&window.print){
ie5fix1=document.body.scrollLeft;
ie5fix2=document.body.scrollTop;
}
for (i=0;i<(nos-1);i++){
moveContainer("CUR"+i,getXpos("CUR"+(i+1)),getYpos("CUR"+(i+1)))
}
}

function newPos(e){
moveContainer("CUR"+(nos-1),(B)?event.clientX+ie5fix1:e.pageX+2,(B)?event.clientY+ie5fix2:e.pageY+2)
}

function getedgesIE(){
rightedge=document.body.clientWidth-T1[1]
bottomedge=document.body.scrollHeight-T1[2]
}

if (B){
window.onload=getedgesIE
window.onresize=getedgesIE
}

if(document.layers)
document.captureEvents(Event.MOUSEMOVE)
document.onmousemove=newPos
setInterval("cycle()",rate)
*/
</script>

<script type="text/javascript">
function window_baru(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}

function  tb8_makeArray(n){
this.length = n;
return this.length;
}

tb8_messages = new  tb8_makeArray(1);
tb8_messages[0] = ".:: Sistem Administrasi KUA::.";

tb8_rptType = 'infinite';
tb8_rptNbr = 5;
tb8_speed = 200;
tb8_delay = 2000;
var tb8_counter=1;
var tb8_currMsg=0;
var tb8_tekst ="";
var tb8_i=0;
var tb8_TID = null;
function tb8_pisi(){
tb8_tekst = tb8_tekst +  tb8_messages[tb8_currMsg].substring(tb8_i, tb8_i+1);
document.title =  tb8_tekst;
tb8_sp=tb8_speed;
tb8_i++;
if  (tb8_i==tb8_messages[tb8_currMsg].length){
tb8_currMsg++; tb8_i=0;  tb8_tekst="";tb8_sp=tb8_delay;
}
if (tb8_currMsg ==  tb8_messages.length){
if ((tb8_rptType ==  'finite') && (tb8_counter==tb8_rptNbr)){
clearTimeout(tb8_TID);
return;
}
tb8_counter++;
tb8_currMsg = 0;
}
tb8_TID =  setTimeout("tb8_pisi()", tb8_sp);
}
tb8_pisi()
</script>
<script>
                $(document).ready(function() {
                    // create Calendar from div HTML element
                    $("#calendar").kendoCalendar();
                });
            </script>
            
            <style>
body{background-color:#93C9FF;font-family:verdana;font-size:10pt}
#papan{width:200;height:150;border:#efefef 1px solid;
background-color:white;overflow:hidden}
.p{background-color:white;height:70;text-align:left;
border-bottom:#cdcdcd 1px solid;padding:5}
.x{background-color:white;height:70;text-align:left;
border-bottom:#cdcdcd 1px solid;display:none;padding:5}
a{color:#306DA3;text-decoration:none}
</style>

<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script>
var i = 5;
var jumlah;
var brt = new Array();
var rotasi = 5;
var nomorakhir;
var posisiar;
$(document).ready(function(){
    jumlah = $("#jumlahberita").html();
    jumlah = parseInt(jumlah);
    nomorakhir = $("#nomorakhir").html();
    for(x=1;x<=jumlah;x++){
        brt[x] = $("#drz"+x).html(); //mengambil berita ,menjadi array brt[]
    }
    cek();
    putar();
});
function cek(){
    $.ajax({
        url: "cekdata.php",
        data: "akhir="+nomorakhir,
        cache: false,
        success: function(msg){
            if(msg!=""){
                data = msg.split("||");
                nomorakhir = data[0];
                brt.push(data[1]); //tambahkan berita baru ke array brt[] di posisi akhir
                jumlah++;
                rotasi = jumlah;
            }
        }
    });
    var waktucek = setTimeout("cek()",4000);
}

function putar(){
    if(jumlah>4){                   //kita putar atau scroll jika jumlah berita lebih dari 4
        $("#papan").prepend("<div id=drz"+i+" class=x><span id=s"+i+">"+brt[rotasi]+"<br></span></div>");
        $("#s"+i).hide();
        $("#drz"+i).slideDown(400); //fungsi untuk melakuan scrolldown
        $("#s"+i).fadeIn(3000);     //fungdi untuk menampilkan berita secara fade in
        rotasi--;
        i++;
        if(rotasi<=(jumlah - 5)){
            rotasi = jumlah;
        }
    }
    var waktuputar = setTimeout("putar()",4000);
}
</script>
<title>.:: Sistem Administrasi KUA::.</title>
<style>

body {
	font-family: Tahoma;
	font-size: 10pt;
	background-color: #FFF;
	background-image: url(image/Colorful%20Abstract%20Shapes%20%20by%20Cinta%20Desain%20(13)
.jpg);
	background-image: url(image/Colorful%20Abstract%20Shapes%20%20by%20Cinta%20Desain%20(13)
.jpg);
	background-image: url(image/Light%20Abstract%20(23)
.jpg);
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #FFF;
	border-right-color: #FFF;
	border-bottom-color: #FFF;
	border-left-color: #FFF;
	background-image: url(image/images%20(2)
.jpg);
	background-image: url(image/green-flowers-background-.jpg);
}
#bg {
}

a { text-decoration: none;
color: blue;
}

a:hover { 
text-decoration: underline;
color: #008080; 
font-weight: bold 
}

h2           	{
	height: 18px;
	text-align: center;
	border-style: solid;
	border-width: 1px;
	padding: 5px;
	margin: 0;
	font-color: #ffffff;
	background-image: url(image/images%20(1)
.jpg);
	background-repeat: repeat-x;
	background-image: url(image/mnl.jpg);
	color: #FFF;
}

.menu {
	background-color: #f2f2f2;
	margin: 0 0 0 0;
	border: 1px solid #030;
}
#header {
	height: 170px;
	width: 1000px;
	background-image: url(image/header.jpg);
}
#body {
	width: 1000px;
}
#footer {
	background-image: url(image/ft.jpg);
}
#isi {
	background-color: #CCC;
	width: 600px;
}
#left {
	background-color: #FFF;
	height: 500px;
	width: 200px;
}

table { 
font-size: 10pt;
font-family: Verdana;
border: 1px solid #C0C0C0;
border-collapse: collapse;
padding: 5px;
}

td { padding: 5px }

.arrowgreen{
	width: 196px;
	border-size: 1px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #000;
	border-right-color: #000;
	border-bottom-color: #000;
	border-left-color: #000;
}

.arrowgreen ul{
	list-style-type: none;
	margin: 0;
	padding: 0;
}

input{
font: bold 11px Verdana, Arial, Helvetica, sans-serif;
border: 1 1 1 1;
border: 1px solid green;
color: green;
}

input:hover{
font: bold 11px Verdana, Arial, Helvetica, sans-serif;s
border: 1 1 1 1;
//background: #33cc33;
border: 1px solid yellow;
color: green;
}

textarea {
font: bold 11px Verdana, Arial, Helvetica, sans-serif;
border: 1px solid green;
color: green;
}
textarea:hover {
font: bold 11px Verdana, Arial, Helvetica, sans-serif;
border: 1px solid yellow;
color: green;
background: #ffcc99;
}

select {
font: bold 11px Verdana, Arial, Helvetica, sans-serif;
border: 1px solid green;
color: green;
}

.arrowgreen li a{
	font: bold 12px Verdana, Arial, Helvetica, sans-serif;
	display: block;
	background: transparent url(gambar/arrowgreen.gif) 100% 0;
	height: 24px; /*Set to height of bg image- padding within link (ie: 32px - 4px - 4px)*/
	padding: 4px 0 4px 10px;
	line-height: 24px; /*Set line-height of bg image- padding within link (ie: 32px - 4px - 4px)*/
	text-decoration: none;
}	
	
.arrowgreen li a:link, .arrowgreen li a:visited {
	color: #5E7830;
}

.arrowgreen li a:hover{
	color: #26370A;
	background-position: 100% -32px;
}

	
.arrowgreen li a.selected{
	color: #26370A;
	background-position: 100% -64px;
}
/* Footer */
#footer {
	clear: both;
	height:25px;
	margin: 0;
	border-top: 1px solid #666666;
	background-image: url(image/sky-181341_1280.jpg);
	background-repeat: repeat-x;
	background-color: #0C0;
}

#footer p {
	margin: 0 0 0 0;
	padding: 5 0 5 0;
	text-align: center;
	font-size: smaller;
	color: #FFFFFF;
}
#footer2 {
	background-image: url(image/ftg.jpg);
}

#footer a {
	color: #FFFFFF;
}

.arrowgreen1 {	width: 196px; /*width of menu*/
	border-style: solid solid none solid;
	border-color: #94AA74;
	border-size: 1px;
	border-width: 1px;
}
.arrowgreen2 {	width: 196px; /*width of menu*/
	border-style: solid solid none solid;
	border-color: #94AA74;
	border-size: 1px;
	border-width: 1px;
}
#right {
	width: 200px;
}
#body tr #footer2 div {
	color: #FFF;
}
</style>
</head>

<body>

<div align="center">

<table border="1" width="1024" id="body" cellspacing="1" cellpadding="1">
	<tr>
		<td colspan="3" id="header">&nbsp;</td>
	</tr>
	<tr>
		<td width="206" valign="top" id="left">
		<h2>Menu Utama</h2>
		<div class="arrowgreen">
		  <div class="arrowgreen">
		    <ul>
		      <li><a href="indexuser.php">Beranda</a></li>
		      <li><a href="indexuser.php?page=profil_saya">Profil Saya</a></li>
		      <li><a href="indexuser.php?page=daftar_nikah">Daftar Nikah</a></li>
              <li><a href="indexuser.php?page=cetak_kartu">Cetak Kartu</a></li>
		      <li><a href="indexuser.php?page=lihat_jadwal"> Jadwal Pranikah</a></li>
		      <li><a href="indexuser.php?page=download">Donwload</a></li>
		      <li><a href="indexuser.php?page=buku_tamu">Buku Tamu</a></li>
              <li><a href="logout.php">Logout</a></li>
	        </ul>
	      </div>
		  </div>
		<br>
		
		<br>
		
  </td>
		<td width="596" valign="top" bgcolor="#FFFFFF" id="isi"><?php
		$page	= isset($_GET['page']) ? $_GET['page'] : "";
		if ($page=="beranda_user") { $h2="Beranda"; }
		elseif ($page=="profil_saya") { $h2="Profil Saya"; }
		elseif ($page=="lihat_daftar") { $h2="Daftar Nikah"; }
		elseif ($page=="lihat_jadwal_user") { $h2="Daftar Jadwal"; }
		elseif ($page=="daftar_nikah") { $h2="Daftar NIKAH"; }
		elseif ($page=="data_dosen") { $h2="Data Dosen Pembimbing"; }
		elseif ($page=="download") { $h2="Halaman Download"; }
		elseif ($page=="cetak_kartu") { $h2="cetak kartu"; }
			elseif ($page=="registrasi") { $h2="Registrasi"; }
		elseif ($page=="buku_tamu") { $h2="Buku Tamu"; }
		elseif ($page=="daftar") { $h2="Form Pendaftaran Nikah"; }
		else { $h2="Beranda"; }
		echo "<h2>$h2</h2>";
		?>
          <div class="menu">
            <?php
		if ($page=="beranda_user") { include "$page.php";}
		elseif ($page=="profil_saya") { include "$page.php";}
		elseif ($page=="lihat_daftar") { include "$page.php";}
			elseif ($page=="judul_acc") { include "$page.php";}
		elseif ($page=="dosen_penguji") { include "$page.php";}
		elseif ($page=="data_dosen") { include "$page.php";}
		elseif ($page=="download") { include "$page.php";}
		elseif ($page=="cetak_kartu") { include "$page.php";}
		elseif ($page=="lihat_jadwal") { include "$page.php";}
		elseif ($page=="dosen_penguji") { include "$page.php";}
		elseif ($page=="registrasi") { include "$page.php";}
		elseif ($page=="buku_tamu") { include "$page.php";}
		elseif ($page=="daftar_nikah") { include "$page.php";}
		else { include "beranda_user.php";}
		?>
          </div>
          <br>
      <br></td>
		<td width="190" valign="top" bgcolor="#FFFFFF" id="right"><h2>Kalender</h2>
		  <p><style type="text/css">
<!--
span.label {color:black;width:23;height:12;text-align:center;margin-top:0;background:#ffF;font:bold 9px Arial}
span.c1 {cursor:hand;color:black;width:23;height:12;text-align:center;margin-top:0;background:#ffF;font:bold 9px Arial}
span.c2 {cursor:hand;color:red;width:23;height:12;text-align:center;margin-top:0;background:#ffF;font:bold 9px Arial}
span.c3 {cursor:hand;color:#b0b0b0;width:23;height:12;text-align:center;margin-top:0;background:#ffF;font:bold 8px Arial}
-->
</style>

<script type="text/javascript">
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function maxDays(mm, yyyy){
var mDay;
    if((mm == 3) || (mm == 5) || (mm == 8) || (mm == 10)){
        mDay = 30;
      }
      else{
          mDay = 31
          if(mm == 1){
               if (yyyy/4 - parseInt(yyyy/4) != 0){
                   mDay = 28
               }
               else{
                   mDay = 29
              }
        }
  }
return mDay;
}
function changeBg(id){
    if (eval(id).style.backgroundColor != "yellow"){
        eval(id).style.backgroundColor = "yellow"
    }
    else{
        eval(id).style.backgroundColor = "#ffffff"
    }
}
function writeCalendar(){
var now = new Date
var dd = now.getDate()
var mm = now.getMonth()
var dow = now.getDay()
var yyyy = now.getFullYear()
var arrM = new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var arrY = new Array()
    for (ii=0;ii<=4;ii++){
        arrY[ii] = yyyy - 2 + ii
    }
var arrD = new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat")

var text = ""
text = "<form name=calForm>"
text += "<table border=1>"
text += "<tr><td>"
text += "<table width=100%><tr>"
text += "<td align=left>"
text += "<select name=selMonth onChange='changeCal()'>"
    for (ii=0;ii<=11;ii++){
        if (ii==mm){
            text += "<option value= " + ii + " Selected>" + arrM[ii] + "</option>"
        }
        else{
            text += "<option value= " + ii + ">" + arrM[ii] + "</option>"
        }
    }
text += "</select>"
text += "</td>"
text += "<td align=right>"
text += "<select name=selYear onChange='changeCal()'>"
    for (ii=0;ii<=4;ii++){
        if (ii==2){
            text += "<option value= " + arrY[ii] + " Selected>" + arrY[ii] + "</option>"
        }
        else{
            text += "<option value= " + arrY[ii] + ">" + arrY[ii] + "</option>"
        }
    }
text += "</select>"
text += "</td>"
text += "</tr></table>"
text += "</td></tr>"
text += "<tr><td>"
text += "<table border=1>"
text += "<tr>"
    for (ii=0;ii<=6;ii++){
        text += "<td align=center><span class=label>" + arrD[ii] + "</span></td>"
    }
text += "</tr>"
aa = 0
    for (kk=0;kk<=5;kk++){
        text += "<tr>"
        for (ii=0;ii<=6;ii++){
            text += "<td align=center><span id=sp" + aa + " onClick='changeBg(this.id)'>1</span></td>"
            aa += 1
        }
        text += "</tr>"
    }
text += "</table>"
text += "</td></tr>"
text += "</table>"
text += "</form>"
document.write(text)
changeCal()
}
function changeCal(){
var now = new Date
var dd = now.getDate()
var mm = now.getMonth()
var dow = now.getDay()
var yyyy = now.getFullYear()
var currM = parseInt(document.calForm.selMonth.value)
var prevM
    if (currM!=0){
        prevM = currM - 1
    }
    else{
        prevM = 11
    }
var currY = parseInt(document.calForm.selYear.value)
var mmyyyy = new Date()
mmyyyy.setFullYear(currY)
mmyyyy.setMonth(currM)
mmyyyy.setDate(1)
var day1 = mmyyyy.getDay()
    if (day1 == 0){
        day1 = 7
    }
var arrN = new Array(41)
var aa
    for (ii=0;ii<day1;ii++){
        arrN[ii] = maxDays((prevM),currY) - day1 + ii + 1
    }
    aa = 1
    for (ii=day1;ii<=day1+maxDays(currM,currY)-1;ii++){
        arrN[ii] = aa
        aa += 1
    }
    aa = 1
    for (ii=day1+maxDays(currM,currY);ii<=41;ii++){
        arrN[ii] = aa
        aa += 1
    }
    for (ii=0;ii<=41;ii++){
        eval("sp"+ii).style.backgroundColor = "#FFFFFF"
    }
var dCount = 0
    for (ii=0;ii<=41;ii++){
        if (((ii<7)&&(arrN[ii]>20))||((ii>27)&&(arrN[ii]<20))){
            eval("sp"+ii).innerHTML = arrN[ii]
            eval("sp"+ii).className = "c3"
        }
        else{
            eval("sp"+ii).innerHTML = arrN[ii]
            if ((dCount==0)||(dCount==6)){
                eval("sp"+ii).className = "c2"
            }
            else{
                eval("sp"+ii).className = "c1"
            }
            if ((arrN[ii]==dd)&&(mm==currM)&&(yyyy==currY)){
                eval("sp"+ii).style.backgroundColor="#90EE90"
            }
        }
    dCount += 1
        if (dCount>6){
            dCount=0
        }
    }
}
//  End -->
</script>

</HEAD>

<!-- STEP TWO: Copy this code into the BODY of your HTML document  -->

<BODY>

<script type="text/javascript">writeCalendar()</script>
</p>
		  <h2>Link</h2>
		<div class="menu">
		<div class="arrowgreen">
			<ul>
			<li><a href="#" target="_blank">Pemkab Bireuen</a></li>
			<li><a href="#" target="_blank">Pengadilan Agama</a></li>
			<li><a href="#" target="_blank">Dinas Syariat Islam </a></li>
			<li><a href="#" target="_blank">KUA Peusangan</a>        </li>
			</ul>
		</div>
		</div>
		</td>
	</tr>
	<tr>
	  <td colspan="3" id="footer2"><div align="center">Copy@Right - 2014</div></td>
    </tr>
  </table>

</div>
</body>
 <?php
}
?>
</html>