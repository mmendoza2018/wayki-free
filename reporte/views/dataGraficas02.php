<?php

$conexion = mysqli_connect("localhost", "root", "", "waiky");

$arrayDataGlobal = [];
/* total servicios */
$resReservas = mysqli_query($conexion, "SELECT * FROM reservas WHERE estado_reserva = 1");
$arrayDataServicios = [];

/*  lista e reservas */
$resServicios = mysqli_query($conexion, "SELECT * FROM servicios WHERE estado_servicio = 1");
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
    $responseFecha = mysqli_query($conexion, "SELECT COUNT(fecha_reserva) as total FROM reservas WHERE fecha_reserva = '$fecha' AND estado_reserva = 1");
    $totalRegistrosPorDIa = mysqli_fetch_assoc($responseFecha)["total"];
    array_push($ultimosDiasData, $totalRegistrosPorDIa);
}


// Array para almacenar las fechas de los últimos días
$arrayMeses = array(
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
);

$arrayMesesData = [];


foreach ($arrayMeses as $index => $mes) {
    // Obtener el número del mes (index + 1 porque el array es 0-indexado)
    $mesNumero = $index + 1;

    // Consulta para contar las reservas en un mes específico
    $query = "SELECT COUNT(*) as total 
              FROM reservas 
              WHERE MONTH(fecha_reserva) = $mesNumero 
              AND estado_reserva = 1";
              
    $responseFecha = mysqli_query($conexion, $query);

    if ($responseFecha) {
        $totalRegistrosPorMes = mysqli_fetch_assoc($responseFecha)["total"];
    } else {
        $totalRegistrosPorMes = 0; // Si la consulta falla, establece el total a 0
    }

    // Almacenar el resultado en el array
    array_push($arrayMesesData, $totalRegistrosPorMes);
}



$arrayDataGlobal = [
    "graficoPastel" => [
        "servicios" => $arrayServicios,
        "data" => $arrayDataServicios,
    ],
    "graficoBarras" => [
        "dias" => $ultimosDias,
        "data" => $ultimosDiasData,
    ],
    "graficoBarrasPorMes" => [
        "meses" => $arrayMeses,
        "data" => $arrayMesesData,
    ]
];

echo json_encode($arrayDataGlobal);
