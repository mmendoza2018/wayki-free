<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$nombres = @$_POST["nombres"];
$correo = @$_POST["correo"];
$celular = @$_POST["celular"];

$response = mysqli_query($conexion, "INSERT INTO clientes (nombres, correo, celular) VALUES('$nombres', '$correo', '$celular')");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
