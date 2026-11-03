
# Sistema Web de Registro de Estudiantes

## Descripcion del proyecto

Este proyecto consiste en el desarrollo de un sistema web dinamico para el registro y consulta de estudiantes, utilizando PHP, MySQL y CSS3.

El sistema permite almacenar informacion de los estudiantes en una base de datos y visualizar los registros mediante una tabla HTML.

## Tecnologias utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- XAMPP
- phpMyAdmin

## Estructura del proyecto

- conexion.php: establece la conexion con la base de datos.
- guardar.php: procesa y almacena los datos de los estudiantes.
- index.php: contiene el formulario de registro.
- listar.php: muestra los estudiantes registrados.
- probar_conexion.php: permite comprobar la conexion con la base de datos.
- style.css: contiene los estilos visuales del sistema.
- db_sistema_web.sql: script de exportacion de la base de datos.

## Requisitos

- Tener instalado XAMPP.
- Tener habilitados Apache y MySQL.
- Contar con un navegador web.

## Instalacion y ejecucion

1. Instalar y abrir XAMPP.
2. Iniciar los servicios Apache y MySQL.
3. Copiar la carpeta del proyecto dentro de la carpeta htdocs de XAMPP.
4. Abrir phpMyAdmin desde http://localhost/phpmyadmin.
5. Crear una base de datos llamada db_sistema_web.
6. Importar el archivo db_sistema_web.sql desde la opcion Importar de phpMyAdmin.
7. Verificar los parametros de conexion en conexion.php.
8. Abrir el navegador y acceder a:

http://localhost/Sistemas%20estudiantes/

## Funcionalidades

- Conexion con una base de datos MySQL.
- Registro de estudiantes.
- Almacenamiento de informacion.
- Consulta y visualizacion de estudiantes.
- Presentacion de registros mediante una tabla HTML.

## Seguridad

El proyecto contempla el uso de sentencias preparadas para reducir el riesgo de inyeccion SQL y el uso de htmlspecialchars() para prevenir ataques XSS al mostrar informacion.

## Autor

Nombre: Melany Valezca Guerrero Vergara

Universidad: ECOTEC

Asignatura: Sistemas Inteligentes

## Repositorio

Proyecto desarrollado como parte de la actividad academica de desarrollo web con PHP y MySQL.
