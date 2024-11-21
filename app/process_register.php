<?php
require_once 'con.php';
require_once 'csrf.php'; // Incluimos la conexión a la base de datos
session_start(); // Iniciar sesión para manejar el token CSRF

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validate_csrf_token($_POST['csrf_token']);
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $fNacimiento = $_POST['fNacimiento'];
    $email = $_POST['email'];
    
    // Verificar si el nombre de usuario ya existe
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Si el nombre de usuario ya existe, redirigir con un mensaje de error
        $_SESSION['error_message'] = "El nombre de usuario '$usuario' ya está en uso. Por favor, elige otro.";
        header("Location: register.php");
        exit();
    }
    
     // Verificar si el correo electrónico ya existe
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Si el correo electrónico ya existe, redirigir con un mensaje de error
        $_SESSION['error_message'] = "El correo electrónico '$email' ya está en uso. Por favor, usa otro.";
        header("Location: register.php");
        exit();
    }
	
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
        $_SESSION['username'] = $usuario; // Guardar el nombre de usuario en la sesión

        // Redirigir a index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error al registrar: " . $query->error;
    }

    // Cerramos la consulta
    $query->close();
    $stmt->close();
}

// Cerramos la conexión a la base de datos
$conn->close();
?>
