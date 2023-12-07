
<?php
$usuario = $_POST ["usuario"];
$contrasenia = $_POST ["password"];
session_start();
$_SESSION["usuario"]=$usuario;

$admin= "admin";
$adminPass = 1234;

if ($usuario==$admin && $contrasenia==$adminPass) {
  header ("location:admin.php" );
} else {
  echo "Incorrecto";
  header ("location:index.php" );
}

 ?>

</body>
</html>