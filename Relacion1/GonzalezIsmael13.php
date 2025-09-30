<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h1>Superglobals en PHP</h1>
    <h2>EJERCICIO 3</h2>
    <?php
    // Variables superglobales en PHP

    $_SERVER['HTTP_HOST']; // Nombre del host
    $_SERVER['DOCUMENT_ROOT']; // Raíz del documento
    $_SERVER['SERVER_NAME']; // Nombre del servidor 
    $_SERVER['HTTP_USER_AGENT']; // Información del navegador
    $_SERVER['REMOTE_ADDR']; // Dirección IP del cliente
    $_SERVER['PHP_SELF']; // Nombre del archivo en ejecución
    $_SERVER['SERVER_SOFTWARE']; // Información del servidor
    $_SERVER['SERVER_PROTOCOL']; // Protocolo del servidor
    $_SERVER['HTTP_HOST']; // Host del servidor
    $_SERVER['SCRIPT_FILENAME']; // Ruta completa del script
    $_SERVER['REMOTE_ADDR']; // Dirección IP del cliente
    $_SERVER['REMOTE_PORT']; // Puerto del cliente
    $_SERVER['REQUEST_URI']; // URI de la solicitud
    echo "<pre>";
    print_r($_SERVER); // Muestra todas las variables del servidor 
    echo "</pre>";
    var_dump($_SERVER); // Muestra todas las variables del servidor
    ?>
</body>

</html>