<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>
<script src="../package/jquery-3.6.0.min.js"></script>

</head>
<body>
    
<button id="btn">Click</button>

<table class="table table-striped table-dark table_id " id="table_id">

                   
<thead>    
<tr>
<th>Nombre</th>
<th>Apellidos</th>
<th>Celular</th>
<th>Correo</th>
<th>Servicio</th>
<th>Cantidad de personas</th>
<th>Rol</th>
<th>Password</th>
<th>Fecha de reserva</th>
<th>Fecha</th>
<th>Acciones</th>

</tr>
</thead>
<tbody>

<?php

$conexion=mysqli_connect("localhost","root","","waiky");               
$result=mysqli_query($conexion, "SELECT user.id, user.nombre, user.apellidos, user.celular, user.correo, 
user.servicio, user.cant_pers, permisos.rol, user.password, user.fecha_reserva, user.fecha  FROM user
LEFT JOIN permisos ON user.rol = permisos.id");
while ($fila = mysqli_fetch_assoc($result)):

?>
<tr>
<td><?=  $fila['nombre']; ?></td>
<td><?=  $fila['apellidos']; ?></td>
<td><?=  $fila['celular']; ?></td>
<td><?= $fila['correo']; ?></td>
<td><?= $fila['servicio']; ?></td>
<td><?= $fila['cant_pers']; ?></td>
<td><?= $fila['rol']; ?></td>
<td><?= $fila['password']; ?></td>
<td><?= $fila['fecha_reserva']; ?></td>
<td><?= $fila['fecha']; ?></td>



<td>


<a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit"></i>Editar </a>


<a href="delete.php?id=<?= $fila['id']?> " class="btn-del" >
<i class="fa fa-trash"></i> Eliminar</a>
</td>
</tr>


<?php endwhile;?>



<script>
    
    $('.btn-del').on('click', function(e){
e.preventDefault();
const href = $(this).attr('href')

Swal.fire({
  title: 'Estas seguro de eliminar este usuario?',
  text: "¡No podrás revertir esto!!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminalo!', 
}).then((result)=>{
    if(result.value){
        if (result.isConfirmed) {
    Swal.fire(
      'Eliminado!',
      'El archivo fue eliminado.',
      'success'
    )
  }

        document.location.href= href;
    }   
})

    })

    $('#btn').on('click', function(){

        Swal.fire({
								'title': '¡Mensaje!',
                                'icon': 'success',
                                'showConfirmButton': 'false',
                                'timer': '1500'

            })
    })

</script>

</body>
</table>
</html>