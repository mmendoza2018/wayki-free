<?php 
$conexion = mysqli_connect("localhost", "root", "", "waiky");

/* total servicios */
$resServicios = mysqli_query($conexion, "SELECT COUNT(id) as total FROM servicios");
$totalServicios = mysqli_fetch_assoc($resServicios)["total"];

/* total clientes */
$resClientes = mysqli_query($conexion, "SELECT COUNT(id) as total FROM clientes");
$totalClientes = mysqli_fetch_assoc($resClientes)["total"];

/* total reservas */
$resReservas = mysqli_query($conexion, "SELECT COUNT(id) as total FROM reservas");
$totalReservas= mysqli_fetch_assoc($resReservas)["total"];

/* total Viajeros */
$resViajeros = mysqli_query($conexion, "SELECT SUM(num_personas) as total FROM reservas");
$totalViajeros = mysqli_fetch_assoc($resViajeros)["total"];

$arrayResponse = [
    "totalServicios" => $totalServicios,
    "totalClientes" => $totalClientes,
    "totalReservas" => $totalReservas,
    "totalViajeros" => $totalViajeros
];

echo json_encode($arrayResponse);

?>