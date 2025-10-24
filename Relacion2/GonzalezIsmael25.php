<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h1 class="h3 mb-0">Array Asociativo - Temperaturas Semanales</h1>
            </div>
            <div class="card-body">
                <h2 class="h5 card-title mb-4">Ejercicio 5</h2>
                <?php
                // Array Asociativo constante en PHP
                const TEMPERATURAS = [
                    "Lunes" => 20.5,
                    "Martes" => 22.3,
                    "Miércoles" => 19.8,
                    "Jueves" => 21.0,
                    "Viernes" => 23.5,
                    "Sábado" => 24.1,
                    "Domingo" => 18.9
                ];

                // Mostrar las temperaturas en una tabla de Bootstrap
                echo '<table class="table table-striped table-hover">';
                echo '<thead class="table-dark"><tr><th>Día</th><th>Temperatura (°C)</th></tr></thead>';
                echo '<tbody>';
                foreach (TEMPERATURAS as $dia => $temp) {
                    echo "<tr><td>{$dia}</td><td>{$temp}°C</td></tr>";
                }
                echo '</tbody></table>';
                ?>
            </div>
            <div class="card-footer">
                <?php
                // Calcular estadísticas
                $temp_media = array_sum(TEMPERATURAS) / count(TEMPERATURAS);
                $temp_min = min(TEMPERATURAS);
                $temp_max = max(TEMPERATURAS);

                echo "<strong>Temp. Media:</strong> <span class='badge bg-info'>" . number_format($temp_media, 1) . "°C</span> | ";
                echo "<strong>Temp. Mínima:</strong> <span class='badge bg-primary'>" . $temp_min . "°C</span> | ";
                echo "<strong>Temp. Máxima:</strong> <span class='badge bg-danger'>" . $temp_max . "°C</span>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>