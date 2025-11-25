<?php
class Conjunto
{
    // Atributos privados
    private array $set;
    private int $maxItems;
    private int $items;

    //Constructor de la clase Conjunto.
    public function __construct(public int $tamanno)
    {
        $this->set = [];
        $this->items = 0;
        $this->maxItems = $tamanno > 0 ? $tamanno : 10; //Aseguro un tamaño mínimo
    }

    //Destructor de la clase.
    public function __destruct()
    {
        /**
         * Podria no poner nada aquí y funcionaría igual, 
         * el echo es para verificar que funciona
         */
        echo "Conjunto destruido "; 
    }

    //Convierte el conjunto a una representación en formato de cadena.
    public function __toString()
    {
        return '{' . implode(', ', $this->set) . '}'; //implode une elementos de un array en un string
    }

    //Añade un elemento al conjunto si no existe previamente y hay espacio.
    public function incluir(int $elemento)
    {
        $verificador = false;
        if ($this->items < $this->maxItems && !$this->incluido($elemento)) {
            $this->set[] = $elemento;
            $this->items++;
            $verificador = true;
        }

        return $verificador;
    }

     //Comprueba si un elemento ya está en el conjunto.
    public function incluido(int $elemento)
    {
        return in_array($elemento, $this->set); //in_array indica si un valor pertenece a un array
    }

    //Devuelve los elementos en común utilizando otro conjunto como parámetro
    public function interseccion(Conjunto $otroConjunto)
    {
        $elementosComunes = array_intersect($this->set, $otroConjunto->set); //array_intersect calcula la intersección de arrays
        $nuevoTamanno = count($elementosComunes);
        $conjuntoInterseccion = new Conjunto($nuevoTamanno);

        foreach ($elementosComunes as $elemento) {
            $conjuntoInterseccion->incluir($elemento);
        }
        return $conjuntoInterseccion;
    }

    //Devuelve los elmentos de ambos sin repetición
    public function union(Conjunto $otroConjunto)
    {
        $elementosUnidos = array_unique(array_merge($this->set, $otroConjunto->set)); //array_unique elimina los valores duplicados de un array y array_merge fusiona varios arrays en uno solo
        $nuevoTamanno = count($elementosUnidos); //count devuelve el numero de elementos en un array
        $conjuntoUnion = new Conjunto($nuevoTamanno);

        foreach ($elementosUnidos as $elemento) {
            $conjuntoUnion->incluir($elemento);
        }
        return $conjuntoUnion;
    }

    //Devuelve el conjunto que contiene los elementos que no estan en comun
    public function diferencia(Conjunto $otroConjunto)
    {
        $diferenciaSimetrica = array_merge(
            /**
             * array_diff calcula la diferencia entre arrays
             * Hago 2 veces array_diff porque sino solo detecta la diferencia
             * del primero con el segundo (en el ejemplo 0) en vez de la 
             * diferencia de ambos (en el ejemplo 0, 5)
             */
            array_diff($this->set, $otroConjunto->set),
            array_diff($otroConjunto->set, $this->set)
        );
        
        $nuevoTamanno = count($diferenciaSimetrica);
        $conjuntoDiferencia = new Conjunto($nuevoTamanno);

        foreach ($diferenciaSimetrica as $elemento) {
            $conjuntoDiferencia->incluir($elemento);
        }
        return $conjuntoDiferencia;
    }
}

$miConjunto = new Conjunto(5);
$miOtroConjunto = new Conjunto(5);

echo "<h1>Ejercicio 2 - Examen PHP</h1>";
for ($i = 0; $i < 5; $i++) {
    $miConjunto->incluir($i);
    $miOtroConjunto->incluir($i + 1);
}
echo "<p><strong>Conjunto 1:</strong> " . $miConjunto . "</p>";
echo "<p><strong>Conjunto 2:</strong> " . $miOtroConjunto . "</p>";

echo "<p><strong>¿El 0 está incluido en el conjunto 1?</strong> " . ($miConjunto->incluido(0) ? "Si" : "No") . "</p>";

$interseccion = $miConjunto->interseccion($miOtroConjunto);
echo "<p><strong>Interseccion de conjunto 1 y conjunto 2:</strong> " . $interseccion . "</p>";

$union = $miConjunto->union($miOtroConjunto);
echo "<p><strong>Union de conjunto 1 y conjunto 2:</strong> " . $union . "</p>";

$diferencia = $miConjunto->diferencia($miOtroConjunto);
echo "<p><strong>Diferencia de conjunto 1 y conjunto 2:</strong> " . $diferencia . "</p>";

echo "<p><strong>La destrucción de conjuntos se hará al finalizar la sesión.</strong></p>"; 

echo "<p style='color:red'><strong>NOTA, APARECE CONJUNTO DESTRUIDO TANTAS VECES POR TODAS LAS VARIABLES CREADAS</strong></p>";
?>