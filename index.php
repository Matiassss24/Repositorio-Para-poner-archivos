<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
<title>Iniciar sesion</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body style="font-family: Montserrat; margin: 0; background: url('back.jpeg') no-repeat center top; background-size: cover">
<div style="position: absolute; width: 320px; height: 420px; background-color: white; position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);">
</div>
<center id="center">
<?php
if (isset($_POST['load'])) {
$connect = mysqli_connect('localhost','db-user26936','magini33','db-user26936') or die(mysqli_error());
session_start();

$nick = $_POST['nick'];
$pass = $_POST['pass'];
$reqlen = strlen($nick) * strlen($pass);

$q = "SELECT * FROM cuentas WHERE nick='$nick' and pass=MD5('$pass')";
$consulta = mysqli_query($connect,$q);
$array = mysqli_fetch_array($consulta);

if ($reqlen > 0) {
if (!$array['nick']) {
echo 'Apodo y/o contrasena incorrecta';
} else {
$_SESSION['nick'] = $nick;
header ("location: http://matiasss24.7m.pl");
}
} else {
echo 'Todos los campos son obligatorios';
}
}
?>
<h1 style="margin-bottom: 60px">Iniciar sesion</h1>
<form method="POST" action="">
<table>
<tr>
<td>
Apodo
<div width="300px" height="27px;" style="border-bottom: 2px solid black; margin-bottom: 30px;">
<input type="name" name="nick" placeholder="Apodo" style="font-family: Montserrat; width: 250px; height: 27px; font-size: 17px; outline: none; background-color: transparent; border: none;">
</div>
</td>
</tr>
<tr>
<td>
Contrasena
<div width="300px" height="27px;" style="border-bottom: 2px solid black; margin-bottom: 30px;">
<input type="password" name="pass" placeholder="Contrasena" style="font-family: Montserrat; width: 250px; height: 27px; font-size: 17px; outline: none; background-color: transparent; border: none;">
</div>
</td>
</tr>
</table>
<div style="border-radius: 50%">
<input type="submit" name="load" value="Iniciar sesion" style="font-family: Montserrat; border: none; outline: none; width: 250px; height: 30px; background: #4cd137; font-size: 20px; border-radius: 20px;" >
</div>
</form>
<p style="margin: 0">No tengo cuenta  <a href="http://matiasss24.7m.pl/register">Registrarse</a></p><br>
</center>
</body>
</html>
