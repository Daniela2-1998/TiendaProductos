<?php
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "tienda");
  $eliminar_registro = "DELETE * FROM videojuegos WHERE id=$id";
  mysqli_query($conexion, $eliminar_registro);
  header("Registro eliminado");
  echo "Campo eliminado"; 
?>
