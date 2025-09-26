<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h1>Hola mundo en php</h1>
    <h3 style='color:red'>
        <i>
            <?php
            $nombre = "Ismael"; // Variable de tipo cadena
            $edad = 23; // Variable de tipo entero
            echo "Hola mi nombre es $nombre y tengo $edad años";
            echo "<br>"; // Salto de línea en HTML
            echo "Hola mi nombre es ", $nombre, " y tengo ", $edad, " años"; // Concatenación
            echo "<br>"; // Salto de línea en HTML
            echo "Hola mi nombre es ", strtoupper($nombre), " y tengo ", $edad, " años"; // Convierte a mayúsculas
            echo "<br>"; // Salto de línea en HTML 
            // echo phpversion(); // Muestra la versión de PHP
            // echo phpinfo(); // Muestra información del servidor 
            echo "Hoy es ", date('d/m/y'); // Muestra la fecha y hora actual
            ?>
        </i>
    </h3>
</body>

</html>