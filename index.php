<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">

     <!-- CSS del bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Videogamer</title>
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


        <a href="login.html">
        <button class="botones boton-admin">
          Administrador
        </button>
        </a>

   

    </section>

    <h3>Videojuegos disponibles:</h3>


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


                        <a href="ver.php?id=<?php echo $reg['id']; ?>" class="card-body">
                            <h3 class="nombre" style="width: 100%; font-size:25px;">
                            <?php echo ucwords($reg['nombre']) ?>
                            </h3>
                            <p><?php echo $reg['consola']; ?></p>
                            <p>$<?php echo $reg['precio']; ?></p>
                            <p>En stock:<?php echo $reg['stock']; ?></p>
                       </a>
                    </div>

                <?php } ?>
    
            </div>
        </div>
    </section>

    <footer>
    </footer>


    <!-- JavaScript del bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
