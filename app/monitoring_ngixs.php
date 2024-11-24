<?php
// Ruta del archivo a monitorear
$filePath = "../nginx/default.conf";
// Archivo donde se almacenará el hash inicial
$hashFile = "referencia.txt";
// Función para calcular el hash del archivo
function calcularHash($filePath) {
    if (!file_exists($filePath)) {
        return null;
    }
    return hash_file("sha256", $filePath);
}
// Verificar si existe un hash de referencia
if (!file_exists($hashFile)) {
    // Calcular y guardar el hash inicial
    $hash = calcularHash($filePath);
    if ($hash !== null) {
        file_put_contents($hashFile, $hash);
        echo "Hash inicial generado y almacenado.\n";
    } else {
        echo "El archivo a monitorear no existe.\n";
    }
    exit;
}
// Leer el hash almacenado y calcular el actual
$hashReferencia = file_get_contents($hashFile);
$hashActual = calcularHash($filePath);
if ($hashActual === null) {
    echo "El archivo a monitorear no existe.\n";
    exit;
}
// Comparar los hashes
if ($hashReferencia === $hashActual) {
    echo "No se detectaron cambios en el archivo.\n";
} else {
    echo "¡Se detectaron cambios en el archivo!\n";
    // Actualizar el hash de referencia si se desea
    file_put_contents($hashFile, $hashActual);
    echo "El hash de referencia se ha actualizado.\n";
}
?>
