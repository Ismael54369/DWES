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
    $num = 14;
    if ($num <= 1) {
        echo "El concepto primo no esta definido para los numeros inferiores al 1";
    } else {
       echo "<p>Los divisores de $num son: </p>";
       for ($i=1; $i <= $num ; $i++) { 
         if($num % $i == 0) {
            echo "<span style='color:green'><b>$i </b></span>";
         } else {
            echo "$i ";
         }
       }
    }
    ?>
</body>
</html>