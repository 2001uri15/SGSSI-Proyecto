<?php
    require_once 'plantillas/header.php'; // Incluimos el header
?>
<div class="body-margen">
    <div class="login">
        <h1>Iniciar Sesión</h1>
        <form id="login_form" class="login-form" action="process_login.php" method="post">
            <label class="login-label" for="username">Nombre de Usuario:</label>
            <input class="login-input" type="text" id="username" name="username" required>
            <br>
            <label class="login-label" for="password">Contraseña:</label>
            <input class="login-input" type="password" id="password" name="password" required>
            <br>
            <button type="submit" class="login-button" id="login_submit">Iniciar Sesión</button>
            <br><br>
            <p>No tienes cuenta, <a href="register.php">create una</a></p>
        </form>
    </div>
</div>
<?php
  require_once 'plantillas/footer.php';
?>