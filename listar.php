
<?php

require_once "conexion.php";

try {

    // Consultar todos los estudiantes
    $sql = "SELECT * FROM estudiantes ORDER BY id DESC";

    $consulta = $conexion->query($sql);

    // Obtener todos los registros
    $estudiantes = $consulta->fetchAll();

} catch (PDOException $e) {

    error_log("Error al consultar estudiantes: " . $e->getMessage());

    die("No fue posible consultar los estudiantes.");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Estudiantes Registrados</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="contenedor tabla-contenedor">

    <header>
        <h1>Estudiantes Registrados</h1>
        <p>Listado general de estudiantes del sistema</p>
    </header>

    <div class="acciones">
        <a href="index.php" class="boton-enlace">
            + Registrar nuevo estudiante
        </a>
    </div>

    <?php if (count($estudiantes) > 0): ?>

        <div class="tabla-responsive">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Correo</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th>Fecha de registro</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($estudiantes as $estudiante): ?>

                        <tr>

                            <td><?= htmlspecialchars((string)$estudiante["id"], ENT_QUOTES, 'UTF-8') ?></td>

                            <td><?= htmlspecialchars($estudiante["nombres"], ENT_QUOTES, 'UTF-8') ?></td>

                            <td><?= htmlspecialchars($estudiante["apellidos"], ENT_QUOTES, 'UTF-8') ?></td>

                            <td><?= htmlspecialchars($estudiante["cedula"], ENT_QUOTES, 'UTF-8') ?></td>

                            <td><?= htmlspecialchars($estudiante["correo"], ENT_QUOTES, 'UTF-8') ?></td>

                            <td><?= htmlspecialchars($estudiante["carrera"], ENT_QUOTES, 'UTF-8') ?></td>

                            <td><?= htmlspecialchars((string)$estudiante["semestre"], ENT_QUOTES, 'UTF-8') ?></td>

                            <td><?= htmlspecialchars($estudiante["fecha_creacion"], ENT_QUOTES, 'UTF-8') ?></td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php else: ?>

        <p class="mensaje-vacio">
            Todavía no existen estudiantes registrados.
        </p>

    <?php endif; ?>

</div>

</body>
</html>
