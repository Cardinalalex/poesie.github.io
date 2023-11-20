<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="stilelogin.css">
</head>
<body>

<div  class="centro">
<form action="Verifica_acesso.php" method="POST">
<div class="inputbox">
<label for="username">username</label>
<input type="text" id="username" name="username">
</div>

<div class="inputbox">
<label for="pass">password</label>
<input type="password" id="pass" name="pass">
</div>
<div class="inputbox">
<input type="submit" value="Login" >
</div>
</form>
</div>





</body>
</html>
