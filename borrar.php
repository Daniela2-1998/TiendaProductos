<?php
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "tienda");

  $id = $_GET['id'];

  $consulta = "DELETE FROM videojuegos WHERE id=$id";

  mysqli_query($conexion, $consulta);
  header('Location: admin.php');
?>