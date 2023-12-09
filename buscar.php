<?php
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "tienda");

  $nombre = $_POST['nombre'];
  $consola = $_POST['consola'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];
  $imagen = $_POST['imagen'];

  $consulta = "SELECT * FROM videojuegos WHERE id=$id";

  mysqli_query($conexion, $consulta);
  header('Location: admin.php');
?>