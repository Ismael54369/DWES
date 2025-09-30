<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>
<body>
    <h2>EJERCICIO 14</h2>
     <?php
    $num = 20;
    $sumando = 0;
    for ($i = 0; $i < $num; $i++) { 
        $sumando += $i;
    }
    echo "La suma total de los $num primeros numeros es: $sumando";
    ?>
</body>
</html>