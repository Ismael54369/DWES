<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h2>EJERCICIO 8</h2>
    <?php
    $rubrica = [
        "Inicial" => 0.20,
        "Primera" => 0.30,
        "Segunda" => 0.20,
        "Tercera" => 0.30
    ];
    $calificaciones = [
        "Inicial" => 7,
        "Primera" => 8,
        "Segunda" => 6,
        "Tercera" => 9
    ];
    $notaFinal = 0;

    foreach ($rubrica as $prueba => $peso) {
        $notaFinal += $calificaciones[$prueba] * $peso;
    }
    if ($notaFinal >= 5) {
        echo "Has aprobado con una nota de: " . number_format($notaFinal, 2);
    } else {
        echo "Has suspendido con una nota de: " . number_format($notaFinal, 2);
    }
    ?>
</body>

</html>