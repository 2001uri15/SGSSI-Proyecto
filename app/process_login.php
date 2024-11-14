<?php
session_start();
require_once 'con.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar el token Anti-CSRF antes de continuar con el procesamiento de la solicitud
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Error de validación CSRF.");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $recaptcha_response = $_POST['g-recaptcha-response'];
    
    $secret_key = '6LcM_n0qAAAAAL2JjcEVcyCq9aRZIf3_YCpFhBL6';
    
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($url . "?secret=" . $secret_key . "&response=" . $recaptcha_response);
    $response_keys = json_decode($response, true);
    
    
    if (intval($response_keys["success"]) !== 1) {
        // CAPTCHA no válido, mostrar mensaje de error
        header('Location: login.php?error=captcha_failed');
        exit;
    }
    

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

