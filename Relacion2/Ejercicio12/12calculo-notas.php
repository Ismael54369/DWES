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
                $nota1 = htmlspecialchars($_GET['nota1']);
                $nota2 = htmlspecialchars($_GET['nota2']);
                $faltas = htmlspecialchars($_GET['faltas']);
                $nombre = htmlspecialchars($_GET['nombre']);
                $email = htmlspecialchars($_GET['email']);
                
                // Calculamos la nota final
                $notaFinal = ($nota1 + $nota2) / 2 - $faltas * 0.25;

                // Determinamos el color del badge según la nota (aprobado >= 5)
                $badgeColor = 'bg-success'; // Verde por defecto
                if ($notaFinal < 5) {
                    $badgeColor = 'bg-danger'; // Rojo si es suspenso
                }
                ?>
                <h5 class="card-title">Alumno: <?php echo $nombre; ?></h5>
                <p class="card-text"><strong>Email:</strong> <?php echo $email ? $email : 'No proporcionado'; ?></p>
                <hr>
                <p class="card-text"><strong>Nota 1:</strong> <?php echo $nota1; ?></p>
                <p class="card-text"><strong>Nota 2:</strong> <?php echo $nota2; ?></p>
                <p class="card-text"><strong>Faltas de asistencia:</strong> <?php echo $faltas; ?></p>
            </div>
            <div class="card-footer bg-light text-dark text-end">
                <h4>Nota Final: <span class="badge <?php echo $badgeColor; ?> fs-4"><?php echo number_format($notaFinal, 2); ?></span></h4>
            </div>
        </div>
        <a href="./GonzalezIsmael212.php" class="btn btn-outline-light mt-3">Volver al formulario</a>
    </div>
</body>

</html>