<?php
session_start();
require_once 'con.php'; // Asegúrate de incluir la conexión si necesitas más datos del usuario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_code = $_POST['code'];

    if ($input_code == $_SESSION['verification_code']) {
        // Código correcto, almacena datos importantes en la sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_SESSION['temp_username']; // Asume que 'temp_username' fue almacenado durante el proceso de login
        $_SESSION['email'] = $_SESSION['user_email']; // Usa el correo del usuario almacenado previamente
        
        // Limpia los datos temporales
        unset($_SESSION['verification_code']);
        unset($_SESSION['temp_username']);

        // Redirige a la página principal
        header("Location: index.php");
        exit();
    } else {
        // Si el código es incorrecto, muestra un mensaje de error
        echo "El código ingresado es incorrecto.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verificar Código</title>
</head>
<body>
    <h1>Ingresa el Código de Verificación</h1>
    <form method="POST">
        <input type="text" name="code" placeholder="Código de verificación" required>
        <button type="submit">Verificar</button>
    </form>
</body>
</html>

