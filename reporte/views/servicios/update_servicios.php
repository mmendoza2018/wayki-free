<?php 

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$id = @$_POST["id"];
$descripcion = @$_POST["descripcion"];
$estado = @$_POST["estado"];

$response = mysqli_query($conexion, "UPDATE servicios SET descripcion = '$descripcion', estado_servicio = '$estado' WHERE id = $id");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
