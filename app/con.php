<?php
    // Incluir conexión a la base de datos
    $hostname = "mariadb"; // Nombre del host
    $username = "myuser";   // Nombre de usuario
    $password = "mypassword"; // Contraseña
    $db = "mydatabase";     // Nombre de la base de datos
  
    $conn = mysqli_connect($hostname, $username, $password, $db);
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
