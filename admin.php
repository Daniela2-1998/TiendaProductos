<?php
session_start();
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
}
else {
  header ("location:login.html" );
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión del negocio</title>
</head>
<body>

<section class="titulo">
      <h1>Videogamer</h1>
      <h2>Tienda de videojuegos</h2>
    </section>

    <section class="opciones-admin">
        <div class="espacio-busqueda">
            <input class="busqueda" name="busqueda" type="text" placeholder="Buscar por título...">
            <button class="botones boton-busqueda">Buscar</button>
        </div>
        <button class="botones boton-admin">
          <a href="login.php"></a>
          Administrador
        </button>
    </section>

    <h3>Videojuegos disponibles:</h3>
<h1>Bienvenido super usuario <?php echo $_SESSION['usuario'] ?> </h1>

<a href="cerrarsesion.php">Cerrar sesion</a>
</body>
</html>