<?php
require_once 'con.php'; // Importamos la conexión a la bd
session_start(); // Iniciar sesión si no se ha iniciado aún
?>
<html lang="es">
<head>
    <link rel="icon" href=""> <!-- Icono de la página web -->
    <meta name="description" content="Proyecto de la asignatura de SGSSI">
    <meta name="author" content="Asier Larrazabal, Ainhoa García, Aritz Blasco, Diego Garcia, Marcos Martín, Aitor Cortado ">
    <title>AlquiCar</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- Iconos -->
    <!-- Estilos -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="index.php">
                    <img src="https://i0.wp.com/blogmaldito.com/wp-content/uploads/2014/03/logo-coche.jpg?ssl=1" alt="Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="items.php"><i class="fas fa-car"></i> Coches</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="modificar_datos.php"><i class="fas fa-user-edit"></i> Modificar Datos</a></li>
                <?php endif; ?>
            </ul>
            <div class="profile">
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="profile-name">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <a href="logout.php" class="logout">Cerrar Sesión</a>
                <?php else: ?>
                    <a href="login.php" class="profile-name">LogIn</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

