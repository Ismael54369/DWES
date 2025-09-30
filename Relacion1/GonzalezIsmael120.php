<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>`
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
</head>
<body>
    <?php
    // Mejora el ejercicio anterior para que se pueda convertir a binario, octal o hexadecimal
    $num = 1200;
    $base = 16;
    $resultado = "";
    echo "El numero decimal es: ", $num, "<br>";
    switch ($base) {
        case 2:
            $baseNombre = "binario";
            break;
        case 8:
            $baseNombre = "octal";
            break;
        case 16:
            $baseNombre = "hexadecimal";
            break;
        default:
            echo "Base no soportada.";
            exit;
    }
    $numOriginal = $num; // Guardar el valor original para mostrarlo después
    while ($num > 0) {
        $resto = $num % $base;
        if ($resto < 10) {
            $resultado = $resto . $resultado;
        } else {
            $resultado = chr($resto - 10 + ord('A')) . $resultado; // ord() y chr() para convertir a letras A-F
        }
        $num = (int)($num / $base);
    }
    echo "El numero en ", $baseNombre, " es: ", $resultado;
    ?>
</body>
</html>