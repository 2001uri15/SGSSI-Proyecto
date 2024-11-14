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
1. Descargar el repositorio:
```sh
$ git clone https://github.com/2001uri15/SGSSI-Proyecto.git
```
3. Situarse en el directorio donde se encuentre el proyecto:
```sh
$ cd ProyectoSGSSI
```
3. Construir la imagen web:
```sh
$ docker build -t="web" .
```
4. Desplegar los servicios:
```sh
$ docker-compose up
```
5. Acceder a la página de **PHPMyAdmin**:
```
En el navegador visitar http://localhost:8080/ y registrarse.
     Usuario: myuser
     Contraseña: mypassword
```
6. Importar la base de datos **database.sql**:
```
Haz click en "database" y luego en "import", donde elegimos el archivo ProyectoSGSSI/database.sql
```
7. Visitar la página web:
```
En el navegador visitar http://localhost:81
```

Por último, para parar los servicios, en otra terminal:
```sh
$ docker-compose down
```
