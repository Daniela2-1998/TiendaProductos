<?php
function buscar(){
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tienda");

$busqueda = $_POST["busqueda"];
$consultaFiltrada = 'SELECT * FROM videojuegos WHERE nombre = ' + $busqueda + "'";
$datosFiltrados = mysqli_query($conexion, $consultaFiltrada);


while ($reg = mysqli_fetch_array($datosFiltrados)) {?>
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
   </a>
</div>

<?php }
}

?>