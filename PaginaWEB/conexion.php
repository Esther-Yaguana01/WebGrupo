<?php
$servidor = "127.0.0.1";
$usuario="root";
$password="";
$baseDatos="ejemplo";

$conn=mysqli_connect(
    $servidor,
    $usuario,
    $password,
    $baseDatos
);
if(!$conn){
    die("Error de conexion");
}
?>