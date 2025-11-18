<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>
    <?php
    echo "<h1>Ejercicio 12</h1>";
    $mimodulo = new stdClass();
    var_dump($mimodulo);

    //Creamos atributos sobre la marcha
    $mimodulo->nombre = "Desarrollo Web en Entorno Servidor";
    $mimodulo->acronimo = "DWES";
    $mimodulo->curso = 2;
    $mimodulo->descripcion = "Se da PHP";
    $mimodulo->teacher = "Pilar";

    echo "<p>Esto es lo que tiene ahora mimodulo</p>";
    var_dump($mimodulo);

    //Convertimos mimodulo en array
    $mimoduloArray = (array) $mimodulo;
    echo "<p>Esto es lo que tiene ahora mimoduloArray</p>";
    var_dump($mimoduloArray);

    //Vamos a serializar mimoduloArray
    $mimoduloArraySer = serialize($mimoduloArray);
    echo "<p>Esto es lo que tiene ahora mimoduloArraySer</p>";
    var_dump($mimoduloArraySer);

    //Convertimos mimoduloArray de array a objeto
    $miModuloObj = (object) $mimoduloArray;
    echo "<p>Esto es lo que tiene ahora miModuloObj</p>";
    var_dump($miModuloObj);
    ?>
</body>
</html>