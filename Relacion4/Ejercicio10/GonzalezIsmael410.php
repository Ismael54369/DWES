<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>
<body>
    <?php

    interface Encendible {
        public function encender();
        public function apagar();
    }

    class Bombilla implements Encendible {
        public function __construct(
            public string $tipoBombilla,
            private float $lumenes,
            private bool $encendida = false
        ) {}

        public function __destruct() {}

        public function encender()
        {
            $this->encendida = true;
            echo "Bombilla encendida.<br>";
        }

        public function apagar()
        {
            $this->encendida = false;
            echo "Bombilla apagada.<br>";
        }
    }

    class Motocicleta implements Encendible {
        public function __construct(
            public string $matricula,
            private float $gasolina = 0,
            private float $bateria = 2,
            private bool $estado = false
        ) {}

        public function cargarGasolina($cantidad) {
            $this->gasolina += $cantidad;
        }

        public function encender() {
            if ($this->estado || $this->bateria == 0 || $this->gasolina == 0) {
                echo "La motocicleta no se pudo arrancar.<br>";
            } else {
                $this->estado = true;
                echo "La motocicleta se arranco con éxito.<br>";      
            }
        }

        public function apagar()
        {
            if($this->estado) {
                $this->estado = false;
                echo "Motocicleta apagada con éxito.<br>";
            } else {
                echo "Motocicleta no arrancada.<br>";
            }
        }
    }

    function enciende_algo (Encendible $algo) {  $algo->encender();  }  
    $miBombilla = new Bombilla("led",12);  
    $miMoto = new Motocicleta("3873 NXB"); 
    echo "<h1>Ejercicio 10</h1>";
    enciende_algo($miBombilla);
    $miMoto->cargarGasolina(23);  
    enciende_algo($miMoto);
    ?>
</body>
</html>