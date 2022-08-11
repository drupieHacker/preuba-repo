<?php

$v1=$_REQUEST['nombre'];
echo $v1;
$conexion = mysqli_connect("localhost", "root", "", "exam") or
die("Problemas con la conexión");

$registros = mysqli_query($conexion, "INSERT INTO results
VALUES ('','$v1')") or
die("Problemas en el select:" . mysqli_error($conexion));

?>