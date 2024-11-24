# SGSSI-Proyecto
Proyecto de la asignatura de Sistemas de Gestión de Seguridad de Sistemas de Información.

## Participantes
Este proyecto está realizado por:
<ul dir="auto">
    <li>Asier Larrazabal</li>
    <li>Ainhoa García</li>
    <li>Aritz Blasco</li>
    <li>Diego García</li>
    <li>Marcos Martín</li>
    <li>Aitor Cotano</li>
</ul>

# Datos del Proyecto
Nombre: AlquiCar

# Instrucciones para el despliegue del proyecto:
Versión de docker utilizado: 27.3.1
Versión de docker-compose utilizado: v2.29.7

1. Descargamos el repositorio entrega_2

2. Descomprimimos en el mismo directorio  (app) la carpeta PHPMailer
   
3. Situarse en el directorio donde se encuentre el proyecto ( /SGSSI-Proyecto-entrega_2 )

4. Construir los contenedores:
```sh
$ docker-compose up --build -d 
```
5. Acceder a la página de **PHPMyAdmin**:

En el navegador visitar https://phpmyadmin.localhost:8080/ y accedemos con las credenciales de root:
     Usuario: root
     Contraseña: rootpassword

6. Importar la base de datos **database.sql.zip**:

Haz click en "database" y luego en "import", donde elegimos el archivo ya comprimido que podemos ver en el repositorio ya descargado.

7. Visitar la página web:

En el navegador visitar https://localhost/ o https://localhost/


Por último, para parar los servicios, en la misma terminal:
```sh
$ docker-compose down
```
