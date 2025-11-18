<?php
class RestauranteViejo {
    #Esto hasta la version 8
    public string $nombre;
    public string $tipoCocina;
    public array $ratings;

    function __construct($nombre, $tipoCocina, $ratings = []) {
        $this -> nombre = $nombre;
        $this -> tipoCocina = $tipoCocina;
    } 
}

//Constructor de la nueva version y mas corto
class Restaurante {
    public function __construct(
        public string $nombre, 
        public string $tipoCocina, 
        public array $ratings = []
        ) {}

    public function __destruct() {}

    private function mostrarRatings() {
        $salida = "";
        foreach ($this->ratings as $rating) {
            $salida .= $rating . " ";
        }
        return $salida;
    }

    public function __toString()
    {
        return "Nombre: $this->nombre | Tipo de cocina: $this->tipoCocina | Ratings: {$this->mostrarRatings()}";
    }

    public function addRating($rating) {
        array_push($this->ratings, $rating);
    }

    public function addAllRatings(...$otrosRatings) {
        $this->ratings = array_merge($this->ratings, $otrosRatings);
    }

    public function getRatingMedio() {
        return round(array_sum($this->ratings) / count($this->ratings), 2);
    }
}

$miItaliano = new Restaurante("La nona", "Italiana");
echo "<h1>Ejercicio 5</h1>";
echo $miItaliano . "<br>";
$miItaliano->addRating(5);
echo "Añadiendo un rating: " . $miItaliano . "<br>";
$miItaliano->addAllRatings(2, 3, 2, 4);
echo "Añadiendo varios ratings: " . $miItaliano . "<br>";
echo "Rating medio: " . $miItaliano->getRatingMedio();
?>