<?php
require_once 'plantillas/header.php'; // Incluimos el header
?>
    <style>
        /* Estilos del formulario */
        form#item_add_form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        form#item_add_form h2 {
            text-align: center;
            color: #007bff; /* Título azul */
            font-size: 24px;
            margin-bottom: 20px;
        }

        form#item_add_form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #007bff; /* Borde azul */
            border-radius: 4px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
        }

        form#item_add_form input[type="text"]:focus {
            border-color: #0056b3; /* Azul más oscuro al enfocar */
            outline: none;
        }

        form#item_add_form button {
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

        form#item_add_form button:hover {
            background-color: #0056b3; /* Azul más oscuro al pasar el cursor */
        }

        form#item_add_form button:focus {
            outline: none;
        }
    </style>
    <!-- Formulario para añadir un nuevo coche -->
    <div class="body-margen">
    <h1>Añadir Coche</h1>
    <form method="post" action="process_add_item.php" id="item_add_form">
        <input type="text" name="matricula" placeholder="Matrícula" required>
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="text" name="tipo_combustion" placeholder="Tipo de Combustión" required>
        <input type="text" name="color" placeholder="Color" required>
        <button type="submit" id="item_add_submit" name="item_add_submit">Añadir Coche</button> <!-- Icono Font Awesome -->
    </form>
    </div>
<?php
require_once 'plantillas/footer.php'; // Incluimos el footer
?>