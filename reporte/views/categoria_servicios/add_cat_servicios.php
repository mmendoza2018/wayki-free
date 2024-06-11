<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$titulo = @$_POST["titulo"];
$servicio_id = @$_POST["servicio_id"];
$descripcion = @$_POST["descripcion"];
$precio = @$_POST["precio"];
$cantidad_max_personas = @$_POST["cantidad_max_personas"];

$response = mysqli_query($conexion, "INSERT INTO servicios_categorias (servicio_id, titulo, descripcion, precio, cantidad_max_personas) 
            VALUES('$servicio_id','$titulo','$descripcion','$precio','$cantidad_max_personas')");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
