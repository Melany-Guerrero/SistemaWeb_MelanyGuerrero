
<?php
// Configuracion de la base de datos
$host = "localhost";
$dbname = "db_sistema_web";
$username = "root";
$password = "";

try {
    // Crear conexion mediante PDO
    $conexion = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    // Configurar el manejo de errores
    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // Configurar resultados como arreglos asociativos
    $conexion->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {

    // Registrar el error sin mostrar detalles al usuario
    error_log("Error de conexion: " . $e->getMessage());

    die("No fue posible conectar con el sistema. Intente mas tarde.");
}
?>
