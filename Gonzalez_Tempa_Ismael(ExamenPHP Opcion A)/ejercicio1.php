<?php
    require_once 'libreria_examen.php'; //Incluimos la librería con las funciones
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Examen PHP</title>
</head>
<body>
    <h1>Ejercicio 1 - Examen PHP</h1>
    <form action="" method="post"> 
        <h3>Introduce dos cadenas y te calculo la distancia Hamming entre 
        ellas</h3> 
        <div> 
            <label for="cadena1">Cadena 1:</label> 
            <input type="text" id="cadena1" name="cadena1" required> 
        </div> 
        <div> 
            <label for="cadena2">Cadena 2:</label> 
            <input type="text" id="cadena2" name="cadena2" required> 
        </div> 
        <div> 
            <button type="submit">Enviar</button> 
        </div> 
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(trim($_POST['cadena1']) && !empty(trim($_POST['cadena2'])))) {
        //Recoger y sanear la cadena para prevenir ataque XSS
        $cadena1 = htmlspecialchars(trim($_POST['cadena1']));
        $cadena2 = htmlspecialchars(trim($_POST['cadena2']));

        //Imprimir mensaje de error en caso de que las dos cadenas no tengan la misma longitud
        if(distanciaHamming($cadena1, $cadena2) == -1) {
            echo "<p>Error, debes introducir dos cadenas con la misma longitud";
        } else {
            echo "<p>CaseSensitive activado para las dos cadenas " . $cadena1 . " y " . $cadena2 . " distancia: " . distanciaHamming($cadena1, $cadena2); //Utilizo la funcion con CaseSensitive activado
        echo "<p>CaseSensitive desactivado para las dos cadenas " . $cadena1 . " y " . $cadena2 . " distancia: " . distanciaHamming($cadena1, $cadena2, false); //Utilizo la funcion con CaseSensitive desactivado
        }
    }
    ?>
</body>
</html>