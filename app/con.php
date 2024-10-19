<?php
    $hostname = "mariadb";  // El nombre del servicio del contenedor en Docker
    $username = "myuser";   // Usuario definido en Docker Compose
    $password = "mypassword"; // Contraseña definida en Docker Compose
    $db = "mydatabase";     // Base de datos definida en Docker Compose
    
    $conn = mysqli_connect($hostname, $username, $password, $db);
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    