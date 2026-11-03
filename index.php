
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="contenedor">
        <header>
            <h1>Sistema de Gestión de Estudiantes</h1>
            <p>Registro de nuevos estudiantes</p>
        </header>

        <form action="guardar.php" method="POST">

            <div class="campo">
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres"
                       maxlength="100" required>
            </div>

            <div class="campo">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos"
                       maxlength="100" required>
            </div>

            <div class="campo">
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula"
                       maxlength="10" pattern="[0-9]{10}"
                       inputmode="numeric"
                       title="Ingrese una cédula de 10 dígitos"
                       required>
            </div>

            <div class="campo">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo"
                       maxlength="120" required>
            </div>

            <div class="campo">
                <label for="carrera">Carrera:</label>
                <input type="text" id="carrera" name="carrera"
                       maxlength="100" required>
            </div>

            <div class="campo">
                <label for="semestre">Semestre:</label>
                <select id="semestre" name="semestre" required>
                    <option value="">Seleccione un semestre</option>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?= $i ?>">
                            <?= $i ?>° semestre
                        </option>
                    <?php endfor; ?>
                </select>
            </div>

            <button type="submit">Registrar estudiante</button>

        </form>
    </div>

</body>
</html>
