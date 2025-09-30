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
    $num1 = 20;
    $num2 = 12;
    echo "El primer numero es, ", $num1 ," ,el segundo numero es, ", $num2, "<br>";
    while ($num1 != $num2) {
        if ($num1 > $num2) {
            $num1 -= $num2;
        } else {
            $num2 -= $num1;
        }
    }
    echo "El MCD es: ", $num1;
    ?>
</body>
</html>