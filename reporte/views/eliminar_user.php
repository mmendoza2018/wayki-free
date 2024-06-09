<?php

    $id= $_GET['id'];
    $conexion=mysqli_connect("localhost","root","","waiky");
    $consulta= mysqli_query($conexion,"DELETE FROM user WHERE id= '$id'");

    header('Location: user.php');
