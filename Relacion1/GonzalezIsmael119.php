<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>
<body>
    <h2>EJERCICIO 18</h2>
    <?php
    $num = 128;
    echo "El numero decimal es: ", $num, "<br>";
    $binario = "";
    while ($num > 0) {
        $binario = ($num % 2) . $binario;
        $num = (int)($num / 2);
    }
    echo "El numero binario es: ", $binario;
    ?>
</body>
</html>