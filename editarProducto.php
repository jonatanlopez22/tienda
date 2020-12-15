<?php

    include("BaseDatos.php");

    if(isset($_POST["botonEditar"])){

        $id=$_GET["id"];

        $nombre=$_POST["nombreEditar"];
        $precio=$_POST["precioEditar"];
        $descripcion=$_POST["descripcionEditar"];

        $transaccion= new BaseDatos();

        $consultaSQL="UPDATE productos SET nombre='$nombre',precio='$precio',descripcion='$descripcion' WHERE idProducto='$id'";

        $transaccion->modificarTabla($consultaSQL);

        header("location:listadoProducto.php");

    }







?>
