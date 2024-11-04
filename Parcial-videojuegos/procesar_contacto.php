<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; // Cambia esto si tienes una contraseña para el usuario root
$basedatos = "enviar_db";

// Crear la conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Preparar y ejecutar la consulta de inserción
$stmt = $conexion->prepare("INSERT INTO formulario (nombre, email, mensaje) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $mensaje);

if ($stmt->execute()) {
    echo "Formulario enviado correctamente!";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
