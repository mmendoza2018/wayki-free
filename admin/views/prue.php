<?php
  $conexion=mysqli_connect("localhost","root","","waiky");

$imagen=$_FILES["imagen"]["name"];
$ruta=$_FILES["imagen"]["tmp_name"];
$destino="img/".$foto;
copy($ruta,$destino);
mysqli_query("INSERT INTO user (foto) values('$destino')");
header("Location: ./index.php");
?>
