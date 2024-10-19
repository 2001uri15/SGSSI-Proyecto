<?php
require_once 'con.php'; // Conexión a la base de datos
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar usuario
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verificación de contraseña
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: index.php'); // Redirige al index si la contraseña es correcta
            exit;
        } else {
            // Contraseña incorrecta
            header('Location: login.php?error=incorrect_password');
            exit;
        }
    } else {
        // Usuario no encontrado
        header('Location: login.php?error=user_not_found');
        exit;
    }
}
?>

