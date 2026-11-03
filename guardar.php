
<?php

// Verificar que los datos provengan del formulario
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Recibir y limpiar los datos
$nombres = trim($_POST["nombres"] ?? "");
$apellidos = trim($_POST["apellidos"] ?? "");
$cedula = trim($_POST["cedula"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$carrera = trim($_POST["carrera"] ?? "");
$semestre = filter_var(
    $_POST["semestre"] ?? null,
    FILTER_VALIDATE_INT
);

// Validaciones del lado del servidor
$errores = [];

if ($nombres === "" || strlen($nombres) > 100) {
    $errores[] = "Los nombres son obligatorios y no deben superar 100 caracteres.";
}

if ($apellidos === "" || strlen($apellidos) > 100) {
    $errores[] = "Los apellidos son obligatorios y no deben superar 100 caracteres.";
}

if (!preg_match('/^[0-9]{10}$/', $cedula)) {
    $errores[] = "La cédula debe contener exactamente 10 números.";
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($correo) > 120) {
    $errores[] = "Ingrese un correo electrónico válido.";
}

if ($carrera === "" || strlen($carrera) > 100) {
    $errores[] = "La carrera es obligatoria y no debe superar 100 caracteres.";
}

if ($semestre === false || $semestre < 1 || $semestre > 12) {
    $errores[] = "Seleccione un semestre válido entre 1 y 12.";
}

// Mostrar errores de validación
if (!empty($errores)) {
    http_response_code(400);
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Error de validación</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="contenedor">
            <h2>Revise los datos ingresados</h2>

            <?php foreach ($errores as $error): ?>
                <p>
                    <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endforeach; ?>

            <p><a href="index.php">Volver al formulario</a></p>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Conectar con la base de datos
require_once "conexion.php";

try {

    // Preparar la consulta SQL
    $sql = "INSERT INTO estudiantes
            (nombres, apellidos, cedula, correo, carrera, semestre)
            VALUES
            (:nombres, :apellidos, :cedula, :correo, :carrera, :semestre)";

    $stmt = $conexion->prepare($sql);

    // Ejecutar la consulta con parámetros
    $stmt->execute([
        ":nombres" => $nombres,
        ":apellidos" => $apellidos,
        ":cedula" => $cedula,
        ":correo" => $correo,
        ":carrera" => $carrera,
        ":semestre" => $semestre
    ]);

    echo "<h2>¡Estudiante registrado correctamente!</h2>";
    echo '<p><a href="index.php">Registrar otro estudiante</a></p>';
    echo '<p><a href="listar.php">Ver estudiantes registrados</a></p>';

} catch (PDOException $e) {

    // Registrar el error sin mostrar detalles técnicos
    error_log("Error al registrar estudiante: " . $e->getMessage());

    if ($e->getCode() === "23000") {
        echo "<h2>La cédula o el correo ya se encuentran registrados.</h2>";
    } else {
        echo "<h2>No fue posible registrar al estudiante. Intente más tarde.</h2>";
    }

    echo '<p><a href="index.php">Volver al formulario</a></p>';
}

?>
