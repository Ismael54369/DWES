<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">  
</head>
<body>
    <h2>EJERCICIO 6</h2>
    <?php 
    class Fruta {
        public $nombre;
        public $color;

        function set_name($nombre) {
            $this->nombre = $nombre;
        }

        function get_name() {
            return $this->nombre;
        }
    }
    $manzana = new Fruta();
    $manzana->set_name("Manzana");
    echo "El nombre de la fruta es: ", $manzana->get_name(), "<br>";
    $platano = new Fruta();
    $platano->set_name("Plátano");
    echo "El nombre de la fruta es: ", $platano->get_name();
    ?>
</body>
</html>