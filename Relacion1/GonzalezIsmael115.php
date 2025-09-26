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
    $num = 20;
    $contador = 2;
    $primo = true;
    if ($num <= 1) {
        echo "El concepto primo no esta definido para los numeros inferiores al 1";
    } else {
        do {
            if ($num % $contador == 0) {
                $primo = false;
        } 
        $contador++;
        } while ($primo && $contador < $num);
        if ($primo) {
            echo "Tu numero es primo";
        } else {
            echo "Tu numero no es primo";
        }
    }
    ?>
</body>
</html>