<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <?php
    $lado1 = 1;
    $lado2 = 4.5;
    $lado3 = 3.2;

    if ($lado1 == $lado2 && $lado2 == $lado3) {
        echo "El triángulo es equilátero.";
    } elseif ($lado1 == $lado2 || $lado1 == $lado3 || $lado2 == $lado3) {
        echo "El triángulo es isósceles.";
    } else {
        echo "El triángulo es escaleno.";
    }
    ?>
</body>

</html>