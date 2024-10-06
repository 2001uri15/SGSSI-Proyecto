<?php
require_once 'plantillas/header.php'; // Incluimos el header
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Coches</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
    <h1>Gestión de Coches</h1>

    <!-- Formulario para añadir un nuevo coche -->
    <h2>Añadir Coche</h2>
    <form method="post">
        <input type="text" name="matricula" placeholder="Matrícula" required>
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="text" name="tipo_combustion" placeholder="Tipo de Combustión" required>
        <input type="text" name="color" placeholder="Color" required>
        <button type="submit" name="add"><i class="fas fa-plus"></i> Añadir Coche</button> <!-- Icono Font Awesome -->
    </form>

    <!-- Tabla para listar, editar y eliminar coches -->
    <h2>Listado de Coches</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Matrícula</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Tipo de Combustión</th>
            <th>Color</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Conexión a la base de datos y operaciones CRUD

        require 'con.php';

        // Función para eliminar un coche
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM coches WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                echo "Coche eliminado con éxito.";
            } else {
                echo "Error al eliminar el coche.";
            }
        }

        // Función para actualizar un coche
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $matricula = $_POST['matricula'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $tipo_combustion = $_POST['tipo_combustion'];
            $color = $_POST['color'];

            $sql = "UPDATE coches SET matricula = :matricula, modelo = :modelo, marca = :marca, tipo_combustion = :tipo_combustion, color = :color WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':tipo_combustion', $tipo_combustion);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo "Coche actualizado con éxito.";
            } else {
                echo "Error al actualizar el coche.";
            }
        }

        // Mostrar todos los coches
        $sql = "SELECT * FROM coches";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $coches = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($coches as $coche): ?>
        <tr>
            <form method="post">
                <td><?php echo $coche['id']; ?></td>
                <td><input type="text" name="matricula" value="<?php echo $coche['matricula']; ?>"></td>
                <td><input type="text" name="modelo" value="<?php echo $coche['modelo']; ?>"></td>
                <td><input type="text" name="marca" value="<?php echo $coche['marca']; ?>"></td>
                <td><input type="text" name="tipo_combustion" value="<?php echo $coche['tipo_combustion']; ?>"></td>
                <td><input type="text" name="color" value="<?php echo $coche['color']; ?>"></td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $coche['id']; ?>">
                    <button type="submit" name="update"><i class="fas fa-edit"></i> Actualizar</button>
                    <button type="submit" name="delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este coche?')"><i class="fas fa-trash"></i> Eliminar</button>
                </td>
            </form>
        </tr>
        <?php endforeach; ?>
    </table>

<?php
require_once 'plantillas/footer.php'; // Incluimos el footer
?>
</body>
</html>

