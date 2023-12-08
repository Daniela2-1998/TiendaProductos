<?php
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tienda");

$id = $_GET['id'];

$consulta= "SELECT * FROM videojuegos WHERE id=$id";

$repuesta=mysqli_query ($conexion, $consulta);
$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/agregar.css">

        <title>Modificar datos</title>
    </head>
    <body>
        <?php
    
        $nombre = $datos['nombre'];
        $consola = $datos['consola'];
        $precio = $datos['precio'];
        $stock = $datos['stock'];
        $imagen = $datos['imagen'];
        ?>

        <h1>Modificar videojuego:</h1>
            <section class="formulario-inicio tamaño-contenedor-ingreso">
               <form method="post">
                <label>Nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre / título del videojuego" value="<?php echo "$nombre"; ?>">
 
                <label>Consola:</label>
                <input type="text" name="consola" placeholder="Consola" value="<?php echo "$consola"; ?>">
 
                <label>Precio:</label>
                <input type="double" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
 
                <label>Stock:</label>
                <input type="text" name="stock" placeholder="Stock disponible"  value="<?php echo "$stock"; ?>">

                <label>Imagen:</label>
                <input type="text" name="imagen" placeholder="Link de la imágen"  value="<?php echo "$imagen"; ?>">

                <input class="boton-inicio-sesion" type="submit" value="Guardar cambios" name="guardar_cambios">
                <button type="submit" name="Cancelar" formaction="admin.php">Cancelar</button>
               </form>
            </section>
        <?php

        if(array_key_exists('guardar_cambios',$_POST)){
            $conexion = mysqli_connect("127.0.0.1", "root", "");
            mysqli_select_db($conexion, "tienda");

            $nombre = $_POST['nombre'];
            $consola = $_POST['consola'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_POST['imagen'];

            $consulta = "UPDATE videojuegos SET nombre='$nombre', consola='$consola', precio='$precio', precio='$precio', 
            stock='$stock', imagen='$imagen' WHERE id=$id";

            mysqli_query($conexion, $consulta);
            header('Location: admin.php');
        }?>
    </body>
</html>