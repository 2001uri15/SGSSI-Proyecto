<?php
    require_once 'con.php'; //Importamos la conexión a la bd
?>
<html lang="es">
    <head>
        <link rel="icon" href=""> <!-- Icono de la página web -->
        <meta name="description" content="Proyecto de la asignatura de SGSSI">
        <meta name="author" content="Asier Larrazabal, Ainhoa García, Aritz Blasco, Diego Garcia, Marcos Martín, Aitor Cortado ">
        <title>AlquiCar</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!--Iconos-->
        <!-- Estilos -->
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="logo">
                    <img src="https://i0.wp.com/blogmaldito.com/wp-content/uploads/2014/03/logo-coche.jpg?ssl=1" alt="Logo">
                </div>
                <ul class="nav-links">
                    <li><a href="items.php"><i class="fas fa-car"></i> Coches</a></li>
                    <li><a href="precios.php"><i class="fas fa-dollar-sign"></i> Precios</a></li>
                    <li><a href="contacto.php"><i class="fas fa-envelope"></i> Contacto</a></li>
                </ul>
                <div class="profile">
                    <a href="login.php" class="profile-name">LogIn</a>
                </div>
            </nav>
        </header>
