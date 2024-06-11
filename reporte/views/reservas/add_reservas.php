<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$id_servicio_categoria = $_POST["id_servicio_categoria"];
$id_servicio_subcategoria = $_POST["id_servicio_subcategoria"];
$id_cliente = $_POST["id_cliente"];
$num_personas = $_POST["num_personas"];
$fecha_reserva = $_POST["fecha_reserva"];

$response = mysqli_query($conexion, "INSERT INTO reservas (
id_servicio_categoria,
id_servicio_subcategoria,
id_cliente,
num_personas,
fecha_reserva) 
VALUES(" . (($id_servicio_categoria == null) ? "NULL" : $id_servicio_categoria) . "," . (($id_servicio_subcategoria == null) ? "NULL" : $id_servicio_subcategoria) . ",'$id_cliente','$num_personas','$fecha_reserva')");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
