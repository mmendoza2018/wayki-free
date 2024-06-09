<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$arrayDataGlobal = [];
/* total servicios */
$resReservas = mysqli_query($conexion, "SELECT * FROM reservas");
$arrayDataServicios = [];

/*  lista e reservas */
$resServicios = mysqli_query($conexion, "SELECT * FROM servicios");
$arrayServicios = [];
//alamacenamos los servicios en una arreglo
foreach ($resServicios as $servicio) {
    //$arrayServicios[$servicio["descripcion"]] = 0;
    array_push($arrayServicios, $servicio["descripcion"]);
}

/* var_dump($arrayServicios);
echo " <br> ------------------------- <br>"; */

foreach ($resReservas as $reserva) {

    if ($reserva["id_servicio_categoria"] == null) {
        $sql = "SELECT ser.descripcion as nombreServicio FROM servicios ser INNER JOIN servicios_categorias seca ON ser.id = seca.servicio_id ";
        $sql .= "INNER JOIN servicios_subcategorias sesu ON seca.id = sesu.servicio_cat_id ";
        $sql .= "INNER JOIN reservas res ON res.id_servicio_subcategoria = sesu.id";
        //echo $sql;

        $respuesta = mysqli_query($conexion, $sql);
        $servicioDB = mysqli_fetch_assoc($respuesta)["nombreServicio"];

        $contador = 0; // Inicializa el contador
        foreach ($arrayServicios as $value) {
            if ($value === $servicioDB) {
                // Verifica si la posición del array ya está inicializada
                if (isset($arrayDataServicios[$contador])) {
                    // Si ya está inicializada, le suma 1
                    $arrayDataServicios[$contador] += 1;
                } else {
                    // Si no está inicializada, la inicializa con 1
                    $arrayDataServicios[$contador] = 1;
                }
            } else {
                // Si el valor no coincide, inicializa con 0
                $arrayDataServicios[$contador] = 0;
            }
            $contador++; // Incrementa el contador
        }
    } else {

        $sql = "SELECT ser.descripcion as nombreServicio FROM servicios ser INNER JOIN servicios_categorias seca ON ser.id = seca.servicio_id ";
        $sql .= "INNER JOIN reservas res ON res.id_servicio_categoria = seca.id";
        //echo $sql;

        $respuesta = mysqli_query($conexion, $sql);
        $servicioDB = mysqli_fetch_assoc($respuesta)["nombreServicio"];

        $contador = 0; // Inicializa el contador
        foreach ($arrayServicios as $value) {
            if ($value === $servicioDB) {
                // Verifica si la posición del array ya está inicializada
                if (isset($arrayDataServicios[$contador])) {
                    // Si ya está inicializada, le suma 1
                    $arrayDataServicios[$contador] += 1;
                } else {
                    // Si no está inicializada, la inicializa con 1
                    $arrayDataServicios[$contador] = 1;
                }
            } else {
                // Si el valor no coincide, inicializa con 0
                $arrayDataServicios[$contador] = 0;
            }
            $contador++; // Incrementa el contador
        }
    }
}
/* var_dump($arrayDataServicios);
die(); */

// Array para almacenar las fechas de los últimos días
$ultimosDias = [];
$ultimosDiasData = [];


// Obtener la fecha actual
$fechaActual = date('Y-m-d');

// Generar las fechas de los últimos 7 días
for ($i = 6; $i >= 0; $i--) {
    $fecha = date('Y-m-d', strtotime("-$i days", strtotime($fechaActual)));
    array_unshift($ultimosDias, $fecha); // Agregar la fecha al principio del array
}

foreach ($ultimosDias as $fecha) {
    $responseFecha = mysqli_query($conexion, "SELECT COUNT(fecha_reserva) as total FROM reservas WHERE fecha_reserva = '$fecha'");
    $totalRegistrosPorDIa = mysqli_fetch_assoc($responseFecha)["total"];
    array_push($ultimosDiasData, $totalRegistrosPorDIa);
}


$arrayDataGlobal = [
    "graficoPastel" => [
        "servicios" => $arrayServicios,
        "data" => $arrayDataServicios,
    ],
    "graficoBarras" => [
        "dias" => $ultimosDias,
        "data" => $ultimosDiasData,
    ]
];

echo json_encode($arrayDataGlobal);
