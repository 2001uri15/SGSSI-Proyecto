<?php
session_start();
require_once 'csrf.php';
require_once 'plantillas/header.php'; // Incluimos el header

// Genera el token Anti-CSRF y lo almacena en la sesión
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<div class="body-margen">
    <div class="login">
        <h1>Iniciar Sesión</h1>
        <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">
            <?php
            switch ($_GET['error']) {
                case 'captcha_failed':
                    echo "Falló el CAPTCHA. Por favor, inténtalo de nuevo.";
                    break;
                case 'incorrect_password':
                    echo "Contraseña incorrecta. Inténtalo nuevamente.";
                    break;
                case 'user_not_found':
                    echo "Usuario no encontrado. Verifica tu nombre de usuario.";
                    break;
                default:
                    echo "Ocurrió un error. Inténtalo nuevamente.";
                    break;
            }
            ?>
        </p>
    <?php endif; ?>
        <form id="login_form" class="login-form" action="process_login.php" method="post">
            <label class="login-label" for="username">Nombre de Usuario:</label>
            <input class="login-input" type="text" id="username" name="username" required>
            <br>
            <label class="login-label" for="password">Contraseña:</label>
            <input class="login-input" type="password" id="password" name="password" required>
            <br>
            <!-- Widget de reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LcM_n0qAAAAACOJMK1R2qcL1DqDL3835hT9pG7H"></div>
            <!-- Campo oculto para el token CSRF -->
            <input type="hidden" name="csrf_token" value="<?php echo get_csrf_token(); ?>">
            <button type="submit" class="login-button" id="login_submit">Iniciar Sesión</button>
            <br><br>
            <p>No tienes cuenta, <a href="register.php">crea una</a></p>
        </form>
    </div>
</div>

<?php
require_once 'plantillas/footer.php'; // Incluimos el footer
?>

