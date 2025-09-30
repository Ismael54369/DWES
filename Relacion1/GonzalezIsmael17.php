<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h2>EJERCICIO 7</h2>
    <?php
    $nota1 = 7;
    $nota2 = 8;

    $faltas = 3;

    $resultado = (($nota1 + $nota2) / 2) - ($faltas * 0.25);
    if ($resultado >= 5) {
        echo "<h1>Enhorabuena, has aprobado con un ", $resultado, "</h1>";
    } else {
        echo "<h1>Lo siento, has suspendido con un ", $resultado, "</h1>";
    }
    ?>
</body>

</html>