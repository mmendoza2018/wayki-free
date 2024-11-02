<?php

require_once ("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=lector.xls");
?>


<table class="table table-striped table-dark " id= "table_id">

                   
<thead>    
<tr>
<th>Nombre</th>
<th>Apellidos</th>
<th>Celular</th>
<th>Correo</th>
<th>Servicio</th>
<th>Cantidad de personas</th>
<th>Rol</th>
<th>Fecha de reserva</th>
<th>Fecha</th>



</tr>
</thead>
<tbody>

<?php

$conexion=mysqli_connect("localhost","root","","waiky");               
$SQL="SELECT user.id, user.nombre, user.apellidos, user.celular, user.correo, 
user.servicio, user.cant_pers, permisos.rol, user.password, user.fecha_reserva,
user.fecha  FROM user
LEFT JOIN permisos ON user.rol = permisos.id";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['apellidos']; ?></td>
<td><?php echo $fila['celular']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['servicio']; ?></td>
<td><?php echo $fila['cant_pers']; ?></td>
<td><?php echo $fila['rol']; ?></td>
<td><?php echo $fila['fecha_reserva']; ?></td>
<td><?php echo $fila['fecha']; ?></td>




<?php
}

}
