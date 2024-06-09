<?php


$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$celular=$_POST['celular'];
$servicio=$_POST['servicio'];
$cant_pers=$_POST['cant_pers'];
$fecha_reserva=$_POST['fecha_reserva'];

$conexion=mysqli_connect("localhost","root","","reserva");

$consulta= "insert into reserva values('$nombres',$apellidos,'$celular','$servicio','$cant_pers','$fecha_reserva')";

$resultado= mysqli_query($conexion,$consulta);

if($resultado)
{

    echo "Datos agregados correctamente";

}

else
{
    
    echo "Error al ingresar los datos,,,,,,,";
}

mysqli_close($conexion);

?>