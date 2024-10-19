<?php
require_once 'plantillas/header.php'; // Incluimos el header
?>
    <?php
        $id = $_GET['id'];

        if (!is_numeric($id)) {
            die("ID no válido");
        }

        // Obtener todos los items
        $sql = "SELECT * FROM coches WHERE id='$id' LIMIT 1";
        $item = $conn->query($sql);

        if ($item && $item->num_rows > 0) {
            $item = $item->fetch_assoc();
        } else {
            echo "No se encontró el coche con ID: $id";
        }
        
        
    ?>
    <style>
        /* Estilos del formulario */
        form#item_modify_form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        form#item_modify_form h2 {
            text-align: center;
            color: #007bff; /* Título azul */
            font-size: 24px;
            margin-bottom: 20px;
        }

        form#item_modify_form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #007bff; /* Borde azul */
            border-radius: 4px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
        }

        form#item_modify_form input[type="text"]:focus {
            border-color: #0056b3; /* Azul más oscuro al enfocar */
            outline: none;
        }

        form#item_modify_form button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #007bff; /* Botón azul */
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form#item_modify_form button:hover {
            background-color: #0056b3; /* Azul más oscuro al pasar el cursor */
        }

        form#item_modify_form button:focus {
            outline: none;
        }
    </style>
    <!-- Formulario para añadir un nuevo coche -->
    <div class="body-margen">
    <h1>Editar Coche</h1>
    <form method="post" action="process_editar_item.php" id="item_modify_form">
        <input hidden type="text" name="id" value="<?php echo $item['id']; ?>">
        <input type="text" name="matricula" placeholder="Matrícula" value="<?php echo $item['matricula']; ?>" required>
        <input type="text" name="modelo" placeholder="Modelo" value="<?php echo $item['modelo']; ?>" required>
        <input type="text" name="marca" placeholder="Marca" value="<?php echo $item['marca']; ?>" required>
        <input type="text" name="tipo_combustion" placeholder="Tipo de Combustión" value="<?php echo $item['tipo_combustion']; ?>" required>
        <input type="text" name="color" placeholder="Color" value="<?php echo $item['color']; ?>" required>
        <button type="submit" id="item_modify_submit" name="item_modify_submit">Editar Coche</button> <!-- Icono Font Awesome -->
    </form>
    </div>
<?php
require_once 'plantillas/footer.php'; // Incluimos el footer
?>