<?php
session_start();
require_once 'con.php';
require_once 'csrf.php';
require_once 'send_email.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validate_csrf_token($_POST['csrf_token']);

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    	error_log("error de validaciÓn csfr");
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
        header('Location: login.php?error=captcha_failed');
        error_log("captcha fallido");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Comprobar si el usuario está bloqueado
        if (!is_null($user['bloqueado_hasta']) && new DateTime() < new DateTime($user['bloqueado_hasta'])) {
            $bloqueado_hasta = new DateTime($user['bloqueado_hasta']);
            echo "Cuenta bloqueada. Intenta de nuevo después de: " . $bloqueado_hasta->format('Y-m-d H:i:s');
            error_log("cuenta bloqueada");
            exit();
        }

        // Verificación de contraseña
        if (password_verify($password, $user['password'])) {
            // Restablecer intentos fallidos al inicio exitoso
            $stmt = $conn->prepare("UPDATE usuarios SET intentos_fallidos = 0, bloqueado_hasta = NULL WHERE usuario = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            function generateVerificationCode($length = 6) {
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$code = '';
    		for ($i = 0; $i < $length; $i++) {
       			$code .= $characters[random_int(0, strlen($characters) - 1)];
    		}
    		return $code;
	  }

            $email = $user['mail'];
            $verification_code = generateVerificationCode(6);
            $_SESSION['verification_code'] = $verification_code;
            $_SESSION['user_email'] = $email;
            $_SESSION['temp_username'] = $user['usuario'];

            // Enviar código al correo
            if (sendVerificationEmail($email, $verification_code)) {
                header('Location: verify_code.php');
                exit();
            } else {
            	error_log("no se pudo enviar el correo de verificación");
                echo "No se pudo enviar el correo de verificación.";
                exit();
            }
        } else {
            // Incrementar intentos fallidos
            $intentos_fallidos = $user['intentos_fallidos'] + 1;
            $bloqueado_hasta = null;
	    error_log("Intento de inicio de sesión fallido: contraseña incorrecta.");
            if ($intentos_fallidos >= 3) {
                $bloqueado_hasta = (new DateTime())->add(new DateInterval('PT15M'))->format('Y-m-d H:i:s');
                error_log("se procede a bloquear la cuenta");
            }

            $stmt = $conn->prepare("UPDATE usuarios SET intentos_fallidos = ?, bloqueado_hasta = ? WHERE usuario = ?");
            $stmt->bind_param("iss", $intentos_fallidos, $bloqueado_hasta, $username);
            $stmt->execute();

            header('Location: login.php?error=incorrect_password');
            error_log("contraseÑa incorrecta");
            exit();
        }
    } else {
        // Usuario no encontrado
        header('Location: login.php?error=user_not_found');
        error_log("Intento de inicio de sesión fallido: usuario no encontrado.");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

