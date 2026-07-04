<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Método no permitido.";
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$clave = trim($_POST["clave"] ?? "");

if ($nombre === "" || $correo === "" || $clave === "") {
    http_response_code(400);
    echo "Completa todos los campos obligatorios.";
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Ingresa un correo electrónico válido.";
    exit;
}

if (strlen($clave) < 6) {
    http_response_code(400);
    echo "La clave debe tener mínimo 6 caracteres.";
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO usuarios(Id, Nombre, Correo, Clave) VALUES (0, ?, ?, ?)");

if (!$stmt) {
    http_response_code(500);
    echo "No se pudo preparar el registro.";
    exit;
}

mysqli_stmt_bind_param($stmt, "sss", $nombre, $correo, $clave);

if (mysqli_stmt_execute($stmt)) {
    echo "Registro guardado correctamente. Te contactaremos pronto.";
} else {
    http_response_code(500);
    echo "Error al guardar el registro.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
