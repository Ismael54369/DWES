<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>

<body>
    <h2>EJERCICIO 12</h2>
    <?php
    $nota = 8;
    switch ($nota) {
        case 10:
        case 9:
            echo "Tu nota es sobresaliente";
            break;
        case 8:
        case 7:
            echo "Tu nota es notable";
            break;
        case 6:
            echo "Tu nota es bien";
            break;
        case 5:
            echo "Tu nota es suficiente";
            break;
        case 4:
        case 3:
        case 2:
        case 1:
            echo "Tu nota es insuficiente";
            break;
        default:
            echo "Tu nota es errónea";
            break;
    }
    ?>
</body>

</html>