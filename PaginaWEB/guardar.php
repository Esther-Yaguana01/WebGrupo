<?php
include("conexion.php");
if(isset($_POST['nombre'])&&isset($_POST['correo'])){
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$sql="INSERT INTO prueba(nombre,correo) VALUES ('$nombre','$correo')";
if(mysqli_query($conn,$sql)){
    echo "Datos guardado";
} else{
    echo "Error al guardar";
}
}else{
    echo "Bandera";
}
?>