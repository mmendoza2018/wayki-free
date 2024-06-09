<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die();
    

}





$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "waiky");
$consulta= "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>


    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
</head>

<body id="page-top">


<form  action="../includes/_functions.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Editar Reserva</h3>
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre'];?>"required>
                            </div>
                            <div class="form-group">
                            <label for="apellidos" class="form-label">Apellidos *</label>
                            <input type="text"  id="apellidos" name="apellidos" class="form-control" value="<?php echo $usuario['apellidos'];?>"required>
                            </div>
                            <div class="form-group">
                            <label for="celular" class="form-label">Celular *</label>
                            <input type="tel"  id="celular" name="celular" class="form-control" value="<?php echo $usuario['celular'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $usuario['correo'];?>">
                            </div>
                            <label for="servicio" class="form-label">Servicio *</label>
                            <input type="text"  id="servicio" name="servicio" class="form-control" value="<?php echo $usuario['servicio'];?>"required>
                            </div>
                            <div class="form-group">
                                  <label for="cant_pers" class="form-label">Cantidad de personas *</label>
                                <input type="number"  id="cant_pers" name="cant_pers" class="form-control" value="<?php echo $usuario['cant_pers'];?>" required>
                                
                            </div>
                            <div class="form-group">
                                  <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number"  id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 usuario.." value="<?php echo $usuario['rol'];?>" required>
                                  <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario['password'];?>" required>
                             
                            </div>
                            <div class="form-group">
                                <label for="fecha_reserva">Fecha de Reserva:</label><br>
                                <input type="text" name="fecha_reserva" id="fecha_reserva" class="form-control" value="<?php echo $usuario['fecha_reserva'];?>" required>
                             
                            </div>
                
                           <br>

                                <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success" >Editar</button>
                               <a href="user.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>