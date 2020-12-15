<?php 


include("BaseDatos.php");

$id=$_GET["id"];

$transaccion=new BaseDatos();

$consultaSQL="DELETE FROM productos WHERE idProducto='$id'";

$transaccion->modificarTabla($consultaSQL);

header("location:listadoProducto.php");



?>