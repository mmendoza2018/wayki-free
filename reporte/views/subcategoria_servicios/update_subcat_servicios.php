<?php 

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$id = @$_POST["id"];
$titulo = @$_POST["titulo"];
$servicio_cat_id = @$_POST["servicio_cat_id"];
$descripcion = @$_POST["descripcion"];
$precio = @$_POST["precio"];
$cantidad_max_personas = @$_POST["cantidad_max_personas"];
$estado = @$_POST["estado"];


$response = mysqli_query($conexion, "UPDATE servicios_subcategorias SET 
                                                        id = '$id',
                                                        titulo = '$titulo',
                                                        servicio_cat_id = '$servicio_cat_id',
                                                        descripcion = '$descripcion',
                                                        precio = '$precio',
                                                        precio = '$precio',
                                                        esstado_ser_subcategoria = '$estado'
                                                        WHERE id = $id");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
