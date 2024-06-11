<?php 

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$id = @$_POST["id"];
$nombres = @$_POST["nombres"];
$correo = @$_POST["correo"];
$celular = @$_POST["celular"];
$estado = @$_POST["estado"];

$response = mysqli_query($conexion, "UPDATE clientes SET nombres = '$nombres', correo = '$correo', celular = '$celular', estado_cliente = '$estado' WHERE id = $id");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
