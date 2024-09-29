<?php
require_once 'con.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario']; // Asegúrate de que este campo esté en tu formulario
    $password = $_POST['password']; // Asegúrate de que este campo esté en tu formulario
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $fNacimiento = $_POST['fDate'];
    $email = $_POST['email'];

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, usuario, password, dni, telefono, fNacimiento, mail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ssssssss", $nombre, $apellido, $usuario, $hashed_password, $dni, $telefono, $fNacimiento, $email);
    
    if ($stmt->execute()) {
        session_start(); // Iniciar la sesión
        $_SESSION['username'] = $usuario; // Guardar el nombre de usuario en la sesión
        header('Location: index.php'); // Redirigir a index.php
        exit; // Salir después de redirigir
    } else {
        echo "Error al registrar: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>

