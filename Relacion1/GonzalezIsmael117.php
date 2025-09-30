<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Haz un script en PHP que calcule la división de dos números naturales utilizando el algoritmo de Euclides para la división
        $dividendo = 10;
        $divisor = 2;
        if ($divisor == 0) {
            echo "Error: División por cero no está permitida.";
        } 
            $cociente = 0;
            $resto = $dividendo;
        while ($resto >= $divisor) {
            $resto -= $divisor;
            $cociente++;
        }
        echo "Cociente", $cociente, "<br>";
        echo "Resto", $resto;
    ?>
</body>
</html>