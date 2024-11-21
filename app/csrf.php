<?php
session_start();

// Generar el token CSRF si no existe
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

// Obtener el token CSRF
function get_csrf_token() {
    generate_csrf_token();
    return $_SESSION['csrf_token'];
}

// Validar el token CSRF
function validate_csrf_token($token) {
    if (empty($token) || $token !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
}
?>
