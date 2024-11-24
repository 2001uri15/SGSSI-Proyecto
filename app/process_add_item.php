<?php 
    require_once 'con.php'; // Conexión a la base de datos
    session_start(); // Iniciar sesión para acceder a la información del usuario

    // Verificar si el usuario está logueado
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }

    ob_start(); // Inicia el buffer de salida
    if(isset($_POST['item_add_submit'])) {
        // Recive y sanitiza los datos del formulario.
        $matricula = preg_replace('/[^a-zA-Z0-9-]/' , '', (string)$_POST['matricula']);
        // matricula tiene un regex distinto para permitir -.
        $modelo = preg_replace('/[^a-zA-Z0-9]/' , '', (string)$_POST['modelo']);
        $marca = preg_replace('/[^a-zA-Z0-9]/' , '', (string)$_POST['marca']);
        $tipo_combustion = preg_replace('/[^a-zA-Z0-9]/' , '', (string)$_POST['tipo_combustion']);
        $color = preg_replace('/[^a-zA-Z0-9]/' , '', (string)$_POST['color']);
        

        // Inserta los datos en la base de datos
        $sql = "INSERT INTO `coches` (`matricula`, `tipo_combustion`, `modelo`, `color`, `marca`) 
                VALUES ('$matricula', '$tipo_combustion', '$modelo', '$color', '$marca')";

        
        // Ejecuta la consulta y verifica si fue exitosa
        if ($conn->query($sql) === TRUE) {
            header('Location: /items.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ob_end_flush(); // Envía el contenido del buffer al navegador
?>
