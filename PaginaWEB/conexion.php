<?php
$servidor = "127.0.0.1";
$usuario="root";
$password="";
$baseDatos="mi_examen";

$conn=mysqli_connect(
    $servidor,
    $usuario,
    $password,
    $baseDatos
);
if(!$conn){
    die("Error de conexion");
}
mysqli_set_charset($conn, "utf8mb4");
?>
