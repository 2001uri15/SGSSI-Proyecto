<?php
require_once 'con.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario y la contraseña del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta para buscar al usuario
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el usuario
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            session_start(); // Iniciar sesión
            $_SESSION['username'] = $user['usuario']; // Guardar el nombre de usuario en la sesión
            header('Location: index.php'); // Redirigir a index.php
            exit; // Salir después de redirigir
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}

$conn->close();
?>
