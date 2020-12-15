<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<header class="col-12">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><ion-icon name="brush-outline"></ion-icon> ART</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active ">
              <a class="nav-link" href="listadoProducto.php">Inventario</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="formularioRegistro.php">Formulario<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>   
</header> 
<main>

<?php
    
    include("BaseDatos.php");

    $transaccion=new BaseDatos();
    
    $consultaSQL="SELECT * FROM productos WHERE 1";

    $productos=$transaccion->consultarDatos($consultaSQL);

?>

<div class="container">


<div class="row justify-content-center">
    <div class="col-sm-7">
        <div id="carouselExampleFade" class="carousel slide carousel-fade " data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item " >
                        <img src="img/b.png" class="d-block " alt="img1"  >
                    </div>
                    <div class="carousel-item" >
                        <img src="img/a.png" class="d-block " alt="img2" >
                    </div>
                    <div class="carousel-item ">
                        <img src="img/c.png" class="d-block " alt="img3"  >
                    </div>
                    <div class="carousel-item active" >
                        <img src="img/d.png" class="d-block " alt="img4" >
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
        </div>
    </div>
</div>


    <div class="row row-cols-1 row-cols-md-3">

        <?php foreach($productos as $producto): ?>

            <div class="col mb-4">

                <div class="card h-100 text-white bg-dark c">
                    <img src="<?php echo($producto["foto"])?>" class="card-img-top" alt="fotoscard">
                    <div class="card-body">
                        <h5 class="card-title"><?= $producto["nombre"] ?></h5>
                        <h3 class="card-title"><?= $producto["precio"] ?></h3>
                        <p class="card-text"><?= $producto["descripcion"] ?></p>
                        <a href="eliminarProducto.php?id=<?= ($producto["idProducto"])?>" class="btn btn-danger">Eliminar</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar<?php echo($producto["idProducto"])?>">
                            Editar
                        </button>
                    </div>
                </div>

                <div class="modal fade" id="editar<?php echo($producto["idProducto"])?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edición</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="editarProducto.php?id=<?php echo($producto["idProducto"])?>" method="POST">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input type="text" class="form-control" name="nombreEditar" value="<?php echo($producto["nombre"])?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Precio:</label>
                                        <textarea class="form-control" rows="3" name="precioEditar"><?php echo($producto["precio"])?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Descripcion:</label>
                                        <textarea class="form-control" rows="3" name="descripcionEditar"><?php echo($producto["descripcion"])?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info" name="botonEditar">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        <?php endforeach ?>

    </div>

</div>

</main>
   
  <footer>
    <hr>
    <div class="row">
        <div class="col 12 col-md-4 ft">
            <p class="f">Jonatan Daniel Lopez Isaza</p>
            <p class="f">jonatanlopez696@gmail.com</p>
            <p class="f">Medellin,Colombia</p>
            <p class="f">2020</p>
        </div>
            <div class="col 12 col-md-8 p" >

    <a href="https://www.facebook.com/profile.php?id=100051168210801" target="_blank" class="btn btn-info p-3 mb-2 bg-primary text-white border-white"><ion-icon class="logo" name="logo-facebook"></ion-icon></a>
    <a href="https://co.pinterest.com/jonatanlopez696/" target="_blank" class="btn btn-info p-3 mb-2 bg-danger text-white border-white"><ion-icon  class="logo" name="logo-pinterest"></ion-icon></a>
    <a href="https://github.com/jonatanlopez22/proyectoHtml" target="_blank" class="btn btn-info p-3 mb-2 bg-dark text-white border-white"><ion-icon class="logo" name="logo-github"></ion-icon></a>
                          
            </div>
</div>

</footer>
<script  src = "https://unpkg.com/ionicons@5.1.2/dist/ionicons.js" > </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>