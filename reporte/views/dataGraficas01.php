<?php 
$conexion = mysqli_connect("localhost", "root", "", "waiky");

/* total servicios */
$resServicios = mysqli_query($conexion, "SELECT COUNT(id) as total FROM servicios WHERE estado_servicio = 1");
$totalServicios = mysqli_fetch_assoc($resServicios)["total"];

/* total clientes */
$resClientes = mysqli_query($conexion, "SELECT COUNT(id) as total FROM clientes WHERE estado_cliente = 1");
$totalClientes = mysqli_fetch_assoc($resClientes)["total"];

/* total reservas */
$resReservas = mysqli_query($conexion, "SELECT COUNT(id) as total FROM reservas WHERE estado_reserva = 1");
$totalReservas= mysqli_fetch_assoc($resReservas)["total"];

/* total Viajeros */
$resViajeros = mysqli_query($conexion, "SELECT SUM(num_personas) as total FROM reservas WHERE estado_reserva = 1");
$totalViajeros = mysqli_fetch_assoc($resViajeros)["total"];

$arrayResponse = [
    "totalServicios" => $totalServicios,
    "totalClientes" => $totalClientes,
    "totalReservas" => $totalReservas,
    "totalViajeros" => $totalViajeros
];

echo json_encode($arrayResponse);

?>