<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>
<body>
    <h2>EJERCICIO 13</h2>
    <?php
    $num = 5;
    $factorial = 1;
    for ($i = $num; $i > 1; $i--) { 
        $factorial *= $i;
    }
    echo "El factorial de tu numero $num  es: $factorial";
    ?>
</body>
</html>