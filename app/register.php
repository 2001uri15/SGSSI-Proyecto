<?php
session_start();
require_once 'plantillas/header.php'; // Incluimos el header
require_once 'csrf.php'; // Asegurarse de iniciar la sesión para manejar el token CSRF

// Generar el token CSRF si no existe
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generar un token único
}
?>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="body-margen">
        <h1>Registro de Usuario</h1>
        <!-- Mostrar mensajes de error -->
    <?php
    if (isset($_SESSION['error_message'])) {
        echo "<p style='color: red;'>" . $_SESSION['error_message'] . "</p>";
        unset($_SESSION['error_message']); // Limpiar mensaje después de mostrarlo
    }
    ?>
        <form id="register_form" class="login-form" action="process_register.php" method="post" onsubmit="return validateForm();">
            <!-- Campo oculto con el token CSRF -->
            <input type="hidden" name="csrf_token" value="<?php echo get_csrf_token(); ?>">

            <label class="login-label" for="nombre">Nombre:</label>
            <input class="login-input" type="text" id="nombre" name="nombre" required placeholder="Ejemplo: Asier">

            <label class="login-label" for="apellido">Apellidos:</label>
            <input class="login-input" type="text" id="apellido" name="apellido" required placeholder="Ejemplo: Larrazabal">
            
            <label class="login-label" for="usuario">Usuario:</label>
            <input class="login-input" type="text" id="usuario" name="usuario" required placeholder="Ejemplo: asierlarra">
            
            <label class="login-label" for="password">Contraseña:</label>
            <input class="login-input" type="password" id="password" name="password" required placeholder="Introduce una contraseña con al menos 8 dígitos, 1 mayúscula y 1 número">
            
            <label class="login-label" for="dni">DNI:</label>
            <input class="login-input" type="text" id="dni" name="dni" required placeholder="Ejemplo: 12345678-Z">
            
            <label class="login-label" for="telefono">Teléfono:</label>
            <input class="login-input" type="text" id="telefono" name="telefono" required placeholder="Ejemplo: 612345678">
            
            <label class="login-label" for="fDate">Fecha de Nacimiento:</label>
            <input class="login-input" type="date" id="fDate" name="fNacimiento" required>
            
            <label class="login-label" for="email">Email:</label>
            <input class="login-input" type="email" id="email" name="email" required placeholder="Ejemplo: ejemplo@servidor.extensión">
            
            <button type="submit" class="login-button" id="register_submit">Registrar</button>
            <br><br>
            <p>Ya tengo cuenta, <a href="login.php">Iniciar sesión</a></p>
        </form>
    </div>
</body>

<script src="validaciones.js"></script> <!-- Incluir el archivo de validaciones -->
<?php
  require_once 'plantillas/footer.php';
?>
