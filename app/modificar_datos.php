<?php
require_once 'con.php'; // Conexión a la base de datos
session_start(); // Iniciar sesión para acceder a la información del usuario

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Obtener los datos actuales del usuario
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT nombre, apellido, dni, telefono, fNacimiento, mail FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();
?>

<?php
    require_once 'plantillas/header.php'; // Incluimos el header
?>
<div class="body-margen">
    <h1>Modificar Datos</h1>

    <!-- Mostrar mensaje de éxito si la actualización fue exitosa -->
    <?php if (isset($_GET['update']) && $_GET['update'] === 'success'): ?>
        <p style="color: green;">Datos actualizados correctamente.</p>
    <?php endif; ?>

    <form id="modify_form" class="login-form" action="process_modificar_datos.php" method="post" onsubmit="return validateForm();">
        <label class="login-label" for="nombre">Nombre:</label>
        <input class="login-input" type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user_data['nombre']); ?>" required>
        
        <label class="login-label" for="apellido">Apellidos:</label>
        <input class="login-input" type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($user_data['apellido']); ?>" required>
        
        <label class="login-label" for="usuario">Usuario:</label>
        <input class="login-input" type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($username); ?>" readonly required>
        
        <label class="login-label" for="dni">DNI:</label>
        <input class="login-input" type="text" id="dni" name="dni" value="<?php echo htmlspecialchars($user_data['dni']); ?>" required>
        
        <label class="login-label" for="telefono">Teléfono:</label>
        <input class="login-input" type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($user_data['telefono']); ?>" required>
        
        <label class="login-label" for="fNacimiento">Fecha de Nacimiento:</label>
        <input class="login-input" type="date" id="fDate" name="fNacimiento" value="<?php echo htmlspecialchars($user_data['fNacimiento']); ?>" required>
        
        <label class="login-label" for="mail">Email:</label>
        <input class="login-input" type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['mail']); ?>" required>
        
        <label class="login-label" for="password">Nueva Contraseña (dejar vacío para no cambiar):</label>
        <input class="login-input" type="password" id="password" name="password" placeholder="Nueva contraseña">
        
        <button type="submit" class="login-button">Actualizar Datos</button>
    </form>
</div>

<script src="validaciones.js"></script> <!-- Incluir el archivo de validaciones -->

<?php
    require_once 'plantillas/footer.php'; // Incluimos el footer
?>

