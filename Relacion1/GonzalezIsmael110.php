<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>
<body>
    <h2>EJERCICIO 10 y 11</h2>
    <?php
    $a = 1;
    $b = -3;
    $c = 2;
    $discriminante = $b * $b - 4 * $a * $c; // Calcula el discriminante
    if ($discriminante > 0) {
        $x1 = (-$b + sqrt($discriminante)) / (2 * $a); 
        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
        echo "Las soluciones son x1 = $x1 y x2 = $x2";
    } elseif ($discriminante == 0) {
        $x = -$b / (2 * $a); 
        echo "La solución es x = $x";
    } else {
        echo "No hay soluciones reales.";
    }
    ?>
</body>
</html>