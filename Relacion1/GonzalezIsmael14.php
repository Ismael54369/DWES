<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h1>Array en PHP</h1>
    <h2>EJERCICIO 4</h2>
    <?php
    // Arrays en PHP
    const SEMANA = [
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
        "Domingo"
    ];
    echo "El primer dia de la semana es: ", SEMANA[0];
    echo "<br>El último dia de la semana es: ", SEMANA[6];
    echo "<ol>";
    for ($i = 0; $i < count(SEMANA); $i++) {
        echo "<li>El dia ", $i + 1, " de la semana es: ", SEMANA[$i], "</li>";
    }
    echo "</ol>";
    echo "<br>El número de días de la semana es: ", count(SEMANA);
    ?>
</body>

</html>