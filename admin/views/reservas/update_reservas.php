<?php 

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$id = @$_POST["id"];
$id_servicio_categoria = @$_POST["id_servicio_categoria"]; 
$id_servicio_subcategoria = @$_POST["id_servicio_subcategoria"]; 
$id_cliente = @$_POST["id_cliente"]; 
$num_personas = @$_POST["num_personas"]; 
$fecha_reserva = @$_POST["fecha_reserva"]; 
$estado = @$_POST["estado"]; 


$response = mysqli_query($conexion, "UPDATE reservas SET 
                                                        id_servicio_categoria  = " . (($id_servicio_categoria == null) ? "NULL" : $id_servicio_categoria) . ",
                                                        id_servicio_subcategoria = " . (($id_servicio_subcategoria == null) ? "NULL" : $id_servicio_subcategoria) . ",
                                                        id_cliente = '$id_cliente',
                                                        num_personas = '$num_personas',
                                                        fecha_reserva = '$fecha_reserva',
                                                        estado_reserva = '$estado'
                                                        WHERE id = $id");

echo ($response) ? json_encode([true, "peticion exitosa"]) : json_encode([false, "Hubo un error"]);
