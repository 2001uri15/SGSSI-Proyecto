<?php
require_once 'plantillas/header.php'; // Incluimos el header
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Tabla para listar, editar y eliminar coches -->
    <div class="body-margen">
        <h1>Listado de Coches</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Matrícula</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Tipo de Combustión</th>
                <th>Color</th>
                <th>#</th>
            </tr>
            
            <?php
            // Mostrar todos los coches
            $sql = "SELECT * FROM coches";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result(); // Obtenemos el resultado de la consulta

            $coches = array(); // Creamos un array para almacenar los coches

            // Recorremos los resultados y los añadimos al array
            while ($row = $result->fetch_assoc()) {
                $coches[] = $row;
            }
            ?>

            <?php foreach ($coches as $coche): ?>
            <tr>
                <form method="post">
                    <td> <?php echo $coche['id']; ?> </td>
                    <td> <?php echo $coche['matricula']; ?> </td>
                    <td> <?php echo $coche['modelo']; ?> </td>
                    <td> <?php echo $coche['marca']; ?> </td>
                    <td> <?php echo $coche['tipo_combustion']; ?> </td>
                    <td> <?php echo $coche['color']; ?> </td>
                    <td>
                        <a href="show_item.php?id=<?php echo $coche['id']; ?>"><i class="bi bi-eye-fill"></i></a>
                        <?php if (isset($_SESSION['username'])): ?>
                            <a href="modify_item.php?id=<?php echo $coche['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                            <a href="delete_item.php?id=<?php echo $coche['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                        <?php endif; ?>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php if (isset($_SESSION['username'])): ?>
            <div style="align: right;">
                <a href="add_item.php" >Añadir Item</a>
            </div>
        <?php endif; ?>
    </div>


    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        table, th, td {
            border: 1px solid #dddddd;
        }

        th, td {
            padding: 12px 15px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            text-decoration: none;
            color: #007bff;
            padding: 5px 10px;
        }

        td a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        td a i {
            font-size: 18px;
        }

        td:last-child {
            text-align: center;
        }
    </style>

<?php
require_once 'plantillas/footer.php'; // Incluimos el footer
?>