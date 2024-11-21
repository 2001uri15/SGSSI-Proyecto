<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendVerificationEmail($email, $code) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto si usas otro proveedor
        $mail->SMTPAuth = true;
        $mail->Username = 'diego1314gc@gmail.com'; // Tu correo electrónico
        $mail->Password = 'ggpo bvdc jxua vzez'; // Contraseña o clave de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('diego1314gc@gmail.com', 'Verificacion');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Codigo de Verificacion';
        $mail->Body = "Tu codigo de verificacion es: <b>$code</b>";

        $mail->send();
        return true;
    } catch (Exception $e) {
    	error_log("Error al enviar el correo: " . $e->getMessage()); // Log de errores en lugar de salida
        return false;
    }
}


