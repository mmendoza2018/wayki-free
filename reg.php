<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$conexion = mysqli_connect("localhost", "root", "", "waiky");

if (isset($_POST['registrar'])) {
    $campos = ['nombres', 'celular', 'correo', 'cant_pers', 'fecha_reserva'];

    $campos_completos = true;
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            $campos_completos = false;
            break;
        }
    }

    if ($campos_completos) {
        $nombres = @$_POST["nombres"];
        $celular = @$_POST["celular"];
        $correo = @$_POST["correo"];
        $servicio = @$_POST["servicio"];
        $subServicio = @$_POST["subServicio"];
        $cant_pers = @$_POST["cant_pers"];
        $fecha_reserva = @$_POST["fecha_reserva"];
        $idClienteReserva = null;

        /* verificamos si existe el cliente */
        $resExisteCliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE correo = '$correo' ");
        if (mysqli_num_rows($resExisteCliente) > 0) {
            // existe cliente
            $idClienteReserva = mysqli_fetch_assoc($resExisteCliente)["id"];
        } else {
            /* insertamos a clientes */
            $consulta = "INSERT INTO clientes (nombres, celular, correo) VALUES ('$nombres', '$celular', '$correo')";
            $resultado = mysqli_query($conexion, $consulta);
            /* utlimo registro */
            $resUltimoCliente = mysqli_query($conexion, "SELECT * FROM clientes ORDER BY id DESC LIMIT 1");
            $idClienteReserva = mysqli_fetch_assoc($resUltimoCliente)["id"];
        }


        /* registro de reservas */

        $consulta = "INSERT INTO reservas (id_servicio_categoria, id_servicio_subcategoria,id_cliente, num_personas, fecha_reserva)
                  VALUES (
                  " . (($servicio == null) ? "NULL" : $servicio) . ",
                  " . (($subServicio == null) ? "NULL" : $subServicio) . ",
                  $idClienteReserva,
                  $cant_pers,
                  '$fecha_reserva'
                  )";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo json_encode([true, "Agregado con exito!"]);
        } else {
            echo json_encode([false, "Hubo un error al insertar!"]);
        }
    } else {
        echo json_encode([false, "Por favor completa todos los campos!"]);
    }
}



/*
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conexion=mysqli_connect("localhost","root","","r_user"); 


include ("config.php");

if(isset($_POST['registrar'])){
    if(
        strlen($_POST['nombre'])>=1 &&
        strlen($_POST['apellidos'])>=1 &&
        strlen($_POST['celular'])>=1 &&
        strlen($_POST['correo'])>=1 &&
        strlen($_POST['servicio'])>=1 &&
        strlen($_POST['cant_pers'])>=1 &&
        strlen($_POST['rol'])>=1 &&
        strlen($_POST['password'])>=1 &&
        strlen($_POST['fecha_reserva'])>=1
        
    )
    {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $celular = $_POST["celular"];
        $correo = $_POST["correo"];
        $servicio = $_POST["servicio"];
        $cant_pers = $_POST["cant_pers"];
        $rol = $_POST["rol"];
        $password = $_POST["password"];
        $fecha_reserva = $_POST["fecha_reserva"];

        $consulta = "INSERT INTO user (nombre, apellidos, celular, correo, servicio, cant_pers, rol, password,fecha_reserva)
                  VALUES ('$nombre','$apellidos','$celular','$correo','$servicio','$cant_pers','$rol','$password','$fecha_reserva')";
        $resultado = mysqli_query($conexion,$consulta);

        if ($resultado) {
            echo '<h3 class="bad">Ha ocurrido un error: ' . mysqli_error($conexion) . '</h3>';
        } else {
            echo '<h3 class="bad">Ha ocurrido un error</h3>';
        }
    } else {
        echo '<h3 class="bad">Por favor completa todos los campos</h3>';
    }
}*/
