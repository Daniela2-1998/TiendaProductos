<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    <section>
        <form  action="login.php" method="post">
           <label>Usuario:</label>
           <input type="text" name="usuario">

           <label>Contraseña:</label>
           <input type="password" name="password">

           <input type="submit" value="Aceptar">
        </form>
    </section>


<?php
$usuario = $_POST ["usuario"];
$contrasenia = $_POST ["password"];
session_start();
$_SESSION["usuario"]=$usuario;

$admin= "admin";
$adminPass = 1234;

if ($usuario==$admin && $contrasenia==$adminPass   ) {
  header ("location:admin.php" );
} else {
  echo "Incorrecto";
  header ("location:index.php" );
}

 ?>
</body>
</html>


