<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h1 class="h3 mb-0">Arrays en PHP - Días de la semana</h1>
            </div>
            <div class="card-body">
                <h2 class="h5 card-title mb-4">Ejercicio 4</h2>
                <?php
                // Arrays en PHP
                const SEMANA = [
                    "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"
                ];

                echo "<p>El primer día de la semana es: <strong>" . SEMANA[0] . "</strong></p>";
                echo "<p>El último día de la semana es: <strong>" . SEMANA[count(SEMANA) - 1] . "</strong></p>";

                echo '<h3 class="h6 mt-4">Listado de días:</h3>';
                echo '<ul class="list-group">';
                foreach (SEMANA as $dia) {
                    echo '<li class="list-group-item">' . $dia . '</li>';
                }
                echo '</ul>';
                ?>
            </div>
            <div class="card-footer">
                <?php
                echo "Número total de días en la semana: <span class='badge bg-primary'>" . count(SEMANA) . "</span>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>