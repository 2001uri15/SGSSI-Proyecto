<?php
require_once 'plantillas/header.php'; // Incluimos el header


// Coger la información del item
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
<div class="body-margen">
    <h1>Información del Coche</h1>

    <br><br>
    <p><b>Matricula:</b> <?php echo $item['matricula'];?> </p>
    <p><b>Modelo:</b> <?php echo $item['modelo'];?> </p>
    <p><b>Marca:</b> <?php echo $item['marca'];?> </p>
    <p><b>Color:</b> <?php echo $item['color'];?> </p>
    <p><b>Combustión:</b> <?php echo $item['tipo_combustion'];?> </p>
</div>


<?php
require_once 'plantillas/footer.php'; // Incluimos el footer
?>