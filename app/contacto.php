<?php
require_once 'plantillas/header.php'; // Incluimos el header
$email = "alquicar@gmail.com";
$tel = "+34 611223344";
$address = "Paseo Rafael Moreno \"Pitxitxi\", n. 2/3. 48013 - Bilbao ";
?>
<!--Iconos redes sociales.-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!--Container principal con toda la información.-->
<body>
	<div class="container"> 
	    <h2>Contáctanos:</h2>
	    <!--Información de contacto.-->
	    <div class="contacto"> 
	        <p><i class="fa-solid fa-envelope"></i><strong>Email:</strong> <?php echo $email; ?></p>
	        <p><i class="fa-solid fa-phone"></i><strong>Teléfono:</strong> <?php echo $tel; ?></p>
	        <p><i class="fa-solid fa-location-dot"></i><strong>Dirección:</strong> <?php echo $address; ?></p>
	        <p><i class="fa-solid fa-hashtag"></i><strong>Redes sociales:</strong></p>
	    </div>

	    <!--Iconos y links de redes sociales.-->
		<div class="redes">
	        <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter fa-xl"></i></a>
	        <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram fa-xl"></i></a>
	        <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook fa-xl"></i></a>
	        <a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin fa-xl"></i></a>
	        <a href="https://github.com/2001uri15/SGSSI-Proyecto" target="_blank"><i class="fa-brands fa-github-square fa-xl"></i></a>
	    </div>
	</div>
</body>

<?php
require_once 'plantillas/footer.php';
?>
