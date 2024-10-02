<?php
require_once 'con.php'; // Incluimos la conexión a la base de datos

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $fNacimiento = $_POST['fNacimiento'];
    $email = $_POST['email'];

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparamos la consulta SQL para insertar los datos
    $query = $conn->prepare("INSERT INTO usuarios (nombre, apellido, usuario, password, dni, telefono, fNacimiento, mail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$query) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Asociamos los parámetros
    $query->bind_param("ssssssss", $nombre, $apellido, $usuario, $hashed_password, $dni, $telefono, $fNacimiento, $email);

    // Ejecutamos la consulta
    if ($query->execute()) {
        // Iniciar sesión después de registrar al usuario
        session_start(); // Iniciar sesión
        $_SESSION['username'] = $usuario; // Guardar el nombre de usuario en la sesión

        // Redirigir a index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error al registrar: " . $query->error;
    }

    // Cerramos la consulta
    $query->close();
}

// Cerramos la conexión a la base de datos
$conn->close();
?>

