<?php
session_start();
require_once 'csrf.php';
require_once 'plantillas/header.php'; // Incluimos el header

// Generar y almacenar el token CSRF
generate_csrf_token(); // Generar el token CSRF

require_once 'plantillas/header.php';
?>


<div class="body-margen">
  <h1>Bienvenido a AlquiCar!!</h1>
</div>

<?php
require_once 'plantillas/footer.php';
?>

