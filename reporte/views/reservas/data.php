<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$id = $_GET["id"];

$response = mysqli_query($conexion, "SELECT * FROM reservas WHERE id = '$id'");
$arrayData = mysqli_fetch_assoc($response);

echo json_encode($arrayData);