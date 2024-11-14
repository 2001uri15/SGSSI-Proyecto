<?php 
    require_once 'con.php'; // Conexión a la base de datos
    session_start(); // Iniciar sesión para acceder a la información del usuario

    // Verificar si el usuario está logueado
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }

    ob_start(); // Inicia el buffer de salida
    if(isset($_POST['item_modify_submit'])) {
        $id = $_POST['id']; // Agregar punto y coma aquí
        $matricula = $_POST['matricula'];
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $tipo_combustion = $_POST['tipo_combustion'];
        $color = $_POST['color'];
        
        // Inserta los datos en la base de datos
        $sql = "UPDATE `coches` SET `matricula`='$matricula',`tipo_combustion`='$tipo_combustion',`modelo`='$modelo',`color`='$color',`marca`='$marca' WHERE id='$id'";
   
        
        // Ejecuta la consulta y verifica si fue exitosa
        if ($conn->query($sql) === TRUE) {
            header('Location: /items.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ob_end_flush(); // Envía el contenido del buffer al navegador