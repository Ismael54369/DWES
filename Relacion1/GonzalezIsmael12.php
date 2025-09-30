<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h1>Variables en PHP</h1>
    <h2>EJERCICIO 2</h2>
    <?php
    $nombre = "Ismael"; // Variable de tipo cadena  
    $edad = 23; // Variable de tipo entero
    $altura = 1.75; // Variable de tipo flotante
    $es_estudiante = true; // Variable de tipo booleano
    echo var_dump($nombre); // Muestra el tipo y valor de la variable
    echo "<br>";
    echo var_dump($edad); // Muestra el tipo y valor de la variable
    printf("Edad en binario: %b", $edad); // Muestra la edad en binario
    echo "<br>";
    echo var_dump($altura); // Muestra el tipo y valor de la variable
    echo "<br>";
    echo var_dump($es_estudiante); // Muestra el tipo y valor de la 
    echo "<br>";
    printf("Variables: %s, %d, %.2f, %s", $nombre, $edad, $altura, $es_estudiante ? 'true' : 'false'); // Formateo de cadenas
    ?>
</body>

</html>