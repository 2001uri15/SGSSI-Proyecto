<?php
require_once 'con.php'; // Conexión a la base de datos

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegúrate de validar y sanitizar la entrada

    // Si se ha confirmado la eliminación
    if (isset($_POST['confirm'])) {
        // Eliminar el registro
        $sql = "DELETE FROM coches WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }

        // Cambiar "id" por "i" para indicar que es un entero
        $stmt->bind_param("i", $id); 
        $stmt->execute();

        // Redirigir a items.php después de eliminar
        header("Location: items.php");
        exit();
    }
} else {
    // Redirigir si no se pasa ningún ID
    header("Location: items.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Eliminación</title>
</head>
<body>
    <h1>Confirmar Eliminación</h1>
    <p>¿Estás seguro de que deseas borrar el elemento con ID <?php echo $id; ?>?</p>
    
    <form method="post">
        <button type="submit" name="confirm">Sí, borrar</button>
        <a href="items.php">No, regresar</a>
    </form>
</body>
</html>
