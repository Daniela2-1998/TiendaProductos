<?php
session_start();
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
}
else {
  header ("location:login.html" );
}

function eliminar($id){
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "tienda");
  $eliminar_registro = "DELETE * FROM videojuegos WHERE id=$id";
  mysqli_query($conexion, $eliminar_registro);
  header("Registro eliminado");
  echo "Campo eliminado";
}

function buscarPorId($id){
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "tienda");
  $buscarPorId = "SELECT * FROM videojuegos WHERE id=$id";
  mysqli_query($conexion, $buscarPorId);
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">

     <!-- CSS del bootstrap  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Gestión del negocio</title>
</head>
<body>

<section class="titulo">
      <h1>Videogamer</h1>
      <h2>Tienda de videojuegos</h2>
    </section>

    <section class="opciones-admin">
        <form class="espacio-busqueda" action="buscar.php" method="post">
            <input class="busqueda" name="busqueda" type="text" placeholder="Buscar por ID...">
            <button class="botones boton-busqueda" onclick="buscarPorId()">Buscar</button>
        </form>
        <a href="agregar.html">
            <button class="botones boton-admin">
             Agregar 
            </button>
        </a>
    </section>

    <h3>Videojuegos disponibles:</h3>
<h1>Bienvenido super usuario <?php echo $_SESSION['usuario'] ?> </h1>


<section>
        <div class="container">
            <div class="row espaciado">
                <?php

      
                    // 1) Conexion
                    $conexion = mysqli_connect("127.0.0.1", "root", "");
                    mysqli_select_db($conexion, "tienda");

                    $consulta = 'SELECT * FROM videojuegos';
                    $datos = mysqli_query($conexion, $consulta);

                    while ($reg = mysqli_fetch_array($datos)) {?>
                        <div class="diseño-card card col-sm-12 col-md-5 col-lg-3">
                        <div class= "">
                          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="card-img-top" src=" <?php echo ($reg['imagen'])?>" alt="" width="400px" height="400px") class="d-block w-100" alt="...">
                            </div>
              
                          </div>
                        </div>
                        </div>

                        <?php $id = $reg['id'];?>


                        <a href="ver.php?id=<?php echo $reg['id']; ?>" class="card-body">
                            <h3 class="nombre" style="width: 100%; font-size:25px;">
                            <?php echo ucwords($reg['nombre']) ?>
                            </h3>
                            <p><?php echo $reg['consola']; ?></p>
                            <p>$<?php echo $reg['precio']; ?></p>
                            <p>En stock:<?php echo $reg['stock']; ?></p>
                              <p class="id-icono"><?php echo $id; ?></p>
                            <div class="contenedor-botones">  
                              <button class="botones-edicion">
                                <img class="imagen-edicion" src="img/pen.png" alt="">
                              </button>
                              <button class="botones-edicion">
                                <img class="imagen-edicion" src="img/bin.png" alt="">
                              </button>
                            </div>
                       </a>
                    </div>

                <?php } ?>
    
            </div>
        </div>
    </section>


<a href="cerrarsesion.php">
  <button class="botones boton-busqueda">Cerrar sesion</button>
</a>

  <!-- JavaScript del bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>