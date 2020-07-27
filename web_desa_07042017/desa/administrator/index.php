<html>
<head>
<title>Administrator &rsaquo; Log In</title>
  <link rel="shortcut icon" href="../favicon.png" />
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  
  if (form.kode.value == ""){
    alert("Anda belum mengisikan Kode Captcha.");
    form.kode.focus();
    return (false);
  }
  return (true);
}
</script>

<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body OnLoad="document.login.username.focus();">
<div id="login">
	<h1>ADMINISTRATOR</h1>
		<div class="fieldContainer">
			<form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
        <div class="formRow">
            <div class="field">
                <input type="text" name="username" placeholder=" username...">
            </div>
        </div>
        <div class="formRow">     
            <div class="field">
                <input type="password" name="password" placeholder=" password...">
            </div>
        </div>
		<div class="formRow">     
            <div style='background:#fff; width:96.5%; margin-left:4px' class="field">
                <img style="height:28px;  margin-left:57px; margin-top:2px;" src='../captcha.php'>
            </div>
        </div>
		<div class="formRow">     
            <div class="field">
                <input type="text" name="kode" placeholder=" Input kode...">
            </div>
        </div>
		</div>
		
	<div class="signupButton">
        <input type="submit" name="submit" id="submit" value="Login" />
    </div>
			</form>
			
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>