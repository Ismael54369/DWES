<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Cálculo de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Resultados del Cálculo de Notas</h2>
            </div>
            <div class="card-body bg-light text-dark">
                <?php
                // Recogemos los datos y los saneamos para evitar inyección de código
                $rubrica = [
                    "Inicial" => 0.20,
                    "Primera" => 0.30,
                    "Segunda" => 0.20,
                    "Tercera" => 0.30
                ];

                $calificaciones = [
                    "Inicial" => htmlspecialchars($_GET['notaIni']),
                    "Primera" => htmlspecialchars($_GET['nota1']),
                    "Segunda" => htmlspecialchars($_GET['nota2']),
                    "Tercera" => htmlspecialchars($_GET['nota3'])
                ];
                
                $faltas = htmlspecialchars($_GET['faltas']);
                $nombre = htmlspecialchars($_GET['nombre']);
                $email = htmlspecialchars($_GET['email']);

                $notaFinal = 0;
                // Calculamos la nota final
                foreach ($rubrica as $prueba => $peso) {
                    $notaFinal += $calificaciones[$prueba] * $peso;
                }
                
                $notaFinal = $notaFinal - ($faltas * 0.25);

                // Determinamos el color del badge según la nota (aprobado >= 5)
                $badgeColor = 'bg-success'; // Verde por defecto
                if ($notaFinal < 5) {
                    $badgeColor = 'bg-danger'; // Rojo si es suspenso
                } elseif ($notaFinal < 6) {
                    $badgeColor = 'bg-warning'; // Amarillo si es aprobado justo
                } else {
                    $badgeColor = 'bg-success'; // Verde si es aprobado
                }
                ?>
                <h5 class="card-title">Alumno: <?php echo $nombre; ?></h5>
                <p class="card-text"><strong>Email:</strong> <?php echo $email ? $email : 'No proporcionado'; ?></p>
                <hr>
                <p class="card-text"><strong>Nota Inicial:</strong> <?php echo $calificaciones["Inicial"]; ?></p>
                <p class="card-text"><strong>Nota Primera:</strong> <?php echo $calificaciones["Primera"]; ?></p>
                <p class="card-text"><strong>Nota Segunda:</strong> <?php echo $calificaciones["Segunda"]; ?></p>
                <p class="card-text"><strong>Nota Tercera:</strong> <?php echo $calificaciones["Tercera"]; ?></p>
                <p class="card-text"><strong>Faltas de asistencia:</strong> <?php echo $faltas; ?></p>
            </div>
            
            <div class="card-footer bg-light text-dark text-end">
                <h4>Nota Final: <span class="badge <?php echo $badgeColor; ?> fs-4"><?php echo number_format($notaFinal, 2); ?></span></h4>
                <div class="progress">
                    <div class="progress-bar <?php echo $badgeColor; ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $notaFinal; ?>" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo $notaFinal*10; ?>%">
                        <?php echo number_format($notaFinal, 2); ?> / 10
                    </div>
                </div>
            </div>
            
        </div>
        <a href="./GonzalezIsmael214.php" class="btn btn-outline-light mt-3">Volver al formulario</a>
    </div>
</body>

</html>