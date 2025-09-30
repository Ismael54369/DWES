<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h2>EJERCICIO 5</h2>
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
    echo "<h1>Array Asociativo en PHP</h1>";

    // Acceso a elementos del array asociativo
    echo "La temperatura del primer día de la semana Lunes es: ", TEMPERATURAS["Lunes"], "°C";

    // Recorrer el array asociativo
    echo "<br>Las temperaturas de todos los días son:<br>";
    foreach (TEMPERATURAS as $dia => $temp) {
        echo "La temperatura del ", $dia, " es: ", $temp, "°C<br>";
    }

    // Mostrar las temperaturas en una lista numerada
    echo "<br>Las temperaturas de todos los días en formato de lista numerada:<br>";
    echo "<ol>";
    foreach (TEMPERATURAS as $dia => $temp) {
        echo "<li>La temperatura del ", $dia, " es: ", $temp, "°C</li>";
    }
    echo "</ol>";

    // Mostrar los elementos del array en una tabla 
    echo "<br>Las temperaturas de todos los días en formato de tabla:<br>";
    echo "<table border='1'><tr><th>Día</th><th>Temperatura (°C)</th></tr>";
    foreach (TEMPERATURAS as $dia => $temp) {
        echo "<tr><td>", $dia, "</td><td>", $temp, "°C</td></tr>";
    }
    echo "</table>";
    ?>
</body>

</html>