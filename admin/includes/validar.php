<?php

$conexion=mysqli_connect("localhost","root","","waiky"); 

if (
    isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
    isset($_POST["apellidos"]) && !empty($_POST["apellidos"]) &&
    isset($_POST["celular"]) && !empty($_POST["celular"]) &&
    isset($_POST["correo"]) && !empty($_POST["correo"]) &&
    isset($_POST["servicio"]) && !empty($_POST["servicio"])&&
    isset($_POST["cant_pers"]) && !empty($_POST["cant_pers"])&&
    isset($_POST["rol"]) && !empty($_POST["rol"]) && 
    isset($_POST["password"]) && !empty($_POST["password"]) && 
    isset($_POST["fecha_reserva"]) && !empty($_POST["fecha_reserva"])
    
) {

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $celular = $_POST["celular"];
    $correo = $_POST["correo"];
    $servicio = $_POST["servicio"];
    $cant_pers = $_POST["cant_pers"];
    $rol = $_POST["rol"];
    $password = $_POST["password"];
    $fecha_reserva = $_POST["fecha_reserva"];
    

    /*
    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
		$imagen = $_POST["selImg"];
	} else {
		$imagen = '';
	}*/

    $sql = "INSERT INTO user (nombre, apellidos, celular, correo, servicio, cant_pers, rol, password,fecha_reserva)
    VALUES (?, ?, ?, ?, ?,?, ?,?,?)";

    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "sssssssss", $nombre, $apellidos, $celular, $correo, $servicio, $cant_pers, $rol, $password,$fecha_reserva);

        if (mysqli_stmt_execute($statement)) {
            header('Location: ../views/user.php');

        } else {
            echo "No se pudo realizar la accion";
        }
        mysqli_stmt_close($statement);
    }

    mysqli_close($conexion);
} else {
?>
<?php  } ?>
