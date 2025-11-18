<?php
class Restaurante {
    private static $restaurantes = 0;
    public function __construct(
        public string $nombre, 
        public string $tipoCocina, 
        public array $ratings = []
        ) {
            Restaurante::$restaurantes++;
        }

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

    public function addAllRatings($otrosRatings) {
        $this->ratings = array_merge($this->ratings, $otrosRatings);
    }

    public function getRatingMedio() {
        return round(array_sum($this->ratings) / count($this->ratings), 2);
    }
}

$miItaliano = new Restaurante("La nona", "Italiana");
var_dump($miItaliano);
?>