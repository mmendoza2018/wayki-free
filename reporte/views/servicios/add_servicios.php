<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$descripcion = @$_POST["descripcion"];

$response = mysqli_query($conexion, "INSERT INTO servicios (descripcion) VALUES('$descripcion')");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
