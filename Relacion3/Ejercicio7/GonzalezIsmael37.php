<?php
/**
 * Obtiene el nombre del día de la semana para una fecha dada.
 * @param DateTime $fecha La fecha a formatear.
 * @return string El nombre del día en español (ej: "Lunes").
 */
function obtenerNombreDia(DateTime $fecha) {
    // Crear un formateador para el nombre del día de la semana en español.
    // El patrón 'EEEE' devuelve el nombre completo del día (ej: "lunes").
    $formateador = new IntlDateFormatter(
        'es_ES',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
        'Europe/Madrid',
        IntlDateFormatter::GREGORIAN,
        'EEEE'
    );
    // Devolver el nombre del día con la primera letra en mayúscula.
    return ucfirst($formateador->format($fecha));
}

/**
 * Obtiene el nombre del mes para una fecha dada.
 * @param DateTime $fecha La fecha a formatear.
 * @return string El nombre del mes en español (ej: "Octubre").
 */
function obtenerNombreMes(DateTime $fecha) {
    // Crear un formateador para el nombre del mes en español.
    // El patrón 'MMMM' devuelve el nombre completo del mes (ej: "octubre").
    $formateador = new IntlDateFormatter(
        'es_ES',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
        'Europe/Madrid',
        IntlDateFormatter::GREGORIAN,
        'MMMM'
    );
    // Devolver el nombre del mes con la primera letra en mayúscula.
    return ucfirst($formateador->format($fecha));
}

$fechaActual = new DateTime();
$nombreDia = obtenerNombreDia($fechaActual);
$nombreMes = obtenerNombreMes($fechaActual);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 - Fecha Actual</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <!-- CSS de Bootstrap para estilos rápidos y responsivos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- 'container' centra el contenido y 'my-5' añade margen vertical -->
    <main class="container my-5">
        <!-- 'row' y 'justify-content-center' para centrar la columna en la fila -->
        <div class="row justify-content-center">
            <!-- La columna ocupará 8/12 en pantallas medianas y 6/12 en grandes para mejor legibilidad -->
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm text-center">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0">Fecha Actual en Español</h1>
                    </div>
                    <div class="card-body">
                        <p class="fs-4">Hoy es <strong class="text-primary"><?php echo $nombreDia; ?></strong>.</p>
                        <p class="fs-4">Estamos en el mes de <strong class="text-primary"><?php echo $nombreMes; ?></strong>.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio6/GonzalezIsmael36.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio8/GonzalezIsmael38(1).php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
</body>
</html>