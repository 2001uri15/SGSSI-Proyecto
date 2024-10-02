<?php
require_once 'con.php'; // Conexión a la base de datos
session_start(); // Iniciar sesión para acceder a la información del usuario

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Obtener el nombre de usuario actual de la sesión
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los nuevos datos enviados por el formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $fNacimiento = $_POST['fNacimiento'];
    $mail = $_POST['email']; // Cambiado a 'email' para que coincida con el formulario
    $new_password = $_POST['password']; // Nueva contraseña, si se proporciona

    // Preparar la consulta de actualización
    if (!empty($new_password)) {
        // Si se introduce una nueva contraseña, actualizarla (hashed)
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, dni = ?, telefono = ?, fNacimiento = ?, mail = ?, password = ? WHERE usuario = ?");
        $stmt->bind_param("ssssssss", $nombre, $apellido, $dni, $telefono, $fNacimiento, $mail, $hashed_password, $username);
    } else {
        // Si no se proporciona nueva contraseña, actualizar solo los demás campos
        $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, dni = ?, telefono = ?, fNacimiento = ?, mail = ? WHERE usuario = ?");
        $stmt->bind_param("sssssss", $nombre, $apellido, $dni, $telefono, $fNacimiento, $mail, $username);
    }

    // Ejecutar la consulta y manejar errores
    if ($stmt->execute()) {
        // Si la actualización es exitosa, redirigir a la página de modificar_datos
        header('Location: modificar_datos.php?update=success');
        exit;
    } else {
        // Mostrar mensaje de error con información
        echo "Error al actualizar los datos: " . $stmt->error;
    }
}
?>
