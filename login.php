<?php include_once('header.php'); ?>
<html>
<style>

table
{
border: 2px solid #353A46;
background-color: #C0C0C0;
}

input[type=text], input[type=password]
{
width: 100%;
padding: 8px 20px;
border: 2px solid #ccc;
box-sizing: border-box;
}
body
{
background-color: #ffffff;
}

img
{
width: 100%;
height: 100%;
}

label
{
font-size: 14px;
font-weight: bold;
font-family: arial;
}

input[type=submit]
{
background-color: #000080;
color: white;
padding: 8px 10px;
margin: 8px 0px
border: solid;
cursor: pointer;
width: 40%;
}
</style>

<center>
<form method="post" action="login.php">
<br><br><br><br><br><br><br><br>
<table>

<tr><td colspan="2" style="background-color:b5b5b5; padding-bottom:5px; padding-top:5px;"><label>Login</label></td></tr>
<tr><td align="center" rowspan="5"><img src="uploads/logo.png"/></td><td><label>Usuario</label></td></tr>
<br>
<tr><td><input type="text" name="txtusuario"/></td></tr>
<br>
<tr><td><label>Password</label></td></tr>
<tr><td><input type="password" name="txtpassword" /> </td></tr>
<tr><td><input type="submit" value="ingresar" /> </td></tr>
<tr><td> <a href="registrarse.php" target="_blank">Registrarse</a><p><a href="recuperarpassword.php" target="_blank">Olvide Contraseña</a></td></tr>
</table>
<br>
<br>
<br>
</form>
</center>
</html>
<?php include_once('footer.php'); ?>
