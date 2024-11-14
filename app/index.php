<?php
ini_set('session.cookie_secure', 1);          
ini_set('session.cookie_httponly', 1);        
ini_set('session.cookie_samesite', 'Strict'); 

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);

session_start();

// Generar y almacenar el token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once 'plantillas/header.php';
?>


<div class="body-margen">
  <h1>Bienvenido a AlquiCar!!</h1>
</div>

<?php
require_once 'plantillas/footer.php';
?>

