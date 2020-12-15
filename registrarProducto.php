<?php

    include("BaseDatos.php");

    if(isset($_POST["botonEnvio"])){
        
       
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $descripcion=$_POST["descripcion"];
        $foto=$_POST["foto"];

        $transaccion=new BaseDatos();

        $consultaSQL="INSERT INTO productos(nombre,precio,descripcion,foto) VALUES ('$nombre','$precio','$descripcion','$foto')";
    
        $transaccion->modificarTabla($consultaSQL);
    
        header("location:listadoProducto.php");


    }




?>