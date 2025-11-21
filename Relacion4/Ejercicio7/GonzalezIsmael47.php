<?php
/*
 * Autor: Ismael González
 * Fecha: 21/11/2025
 *
 * Descripción:
 * Este script define y prueba la clase BanderaFranjas, que permite crear,
 * mostrar y manipular banderas compuestas por franjas de colores.
 */

// Establecemos la cabecera para que el navegador interprete la salida como texto plano.
header('Content-Type: text/plain; charset=utf-8');

class BanderaFranjas {
    /**
     * Constructor de la clase.
     * @param string $orientacion La orientación de las franjas ('horizontal' o 'vertical').
     * @param array $colores La lista de colores de las franjas.
     * @param string $nombre El nombre al que pertenece la bandera.
     */
    public function __construct(
        public string $orientacion, // 'horizontal' o 'vertical'
        public array $colores,       // Array con los nombres de los colores
        public string $nombre = "sin adscripción" // Nombre del país u organización
    ) {
        echo "-> Bandera '{$this->nombre}' creada.\n";
    }

    /**
     * Destructor de la clase. Se llama cuando el objeto es destruido.
     */
    public function __destruct() {
        echo "-> Bandera '{$this->nombre}' destruida.\n";
    }

    /**
     * Muestra los datos de la bandera por pantalla como texto.
     */
    public function mostrar() {
        echo "   Nombre: {$this->nombre}\n";
        echo "   Orientación: {$this->orientacion}\n";
        echo "   Colores: " . implode(" | ", $this->colores) . "\n\n";
    }

    /**
     * Compara si esta bandera es idéntica a otra (misma orientación y colores en el mismo orden).
     * @param BanderaFranjas $otraBandera El objeto BanderaFranjas con el que comparar.
     * @return bool Devuelve true si son idénticas, false en caso contrario.
     */
    public function sonIdenticas(BanderaFranjas $otraBandera): bool {
        // El operador == para arrays comprueba que tengan los mismos pares clave/valor en el mismo orden.
        return $this->orientacion === $otraBandera->orientacion && $this->colores == $otraBandera->colores;
    }

    /**
     * Compara si esta bandera tiene las mismas franjas que otra, pero con diferente orientación.
     * @param BanderaFranjas $otraBandera El objeto BanderaFranjas con el que comparar.
     * @return bool Devuelve true si cumplen la condición, false en caso contrario.
     */
    public function mismaPeroDiferenteOrientacion(BanderaFranjas $otraBandera): bool {
        return $this->orientacion !== $otraBandera->orientacion && $this->colores == $otraBandera->colores;
    }

    /**
     * Invierte el orden de las franjas de colores.
     */
    public function invertirColores() {
        $this->colores = array_reverse($this->colores);
        echo "-> Colores de la bandera '{$this->nombre}' invertidos.\n";
    }

    /**
     * Cambia la orientación de la bandera de horizontal a vertical y viceversa.
     */
    public function invertirOrientacion() {
        $this->orientacion = ($this->orientacion === 'horizontal') ? 'vertical' : 'horizontal';
        echo "-> Orientación de la bandera '{$this->nombre}' invertida.\n";
    }
}

echo "================================================\n";
echo "== Pruebas de la clase BanderaFranjas ==\n";
echo "================================================\n\n";

echo "1. CREACIÓN Y VISUALIZACIÓN DE BANDERAS\n";
echo "----------------------------------------\n";
$banderaAlemania = new BanderaFranjas('horizontal', ['black', 'red', 'gold'], 'Alemania');
$banderaAlemania->mostrar();

$banderaBelgica = new BanderaFranjas('vertical', ['black', 'gold', 'red'], 'Bélgica');
$banderaBelgica->mostrar();

$banderaSinNombre = new BanderaFranjas('horizontal', ['blue', 'white', 'red']);
$banderaSinNombre->mostrar();

echo "2. COMPARACIÓN DE BANDERAS\n";
echo "---------------------------\n";
$banderaAlemaniaCopia = new BanderaFranjas('horizontal', ['black', 'red', 'gold'], 'Alemania (copia)');

echo "¿La bandera de Alemania y su copia son idénticas? ";
echo $banderaAlemania->sonIdenticas($banderaAlemaniaCopia) ? "Sí\n" : "No\n";

echo "¿La bandera de Alemania y la de Bélgica son idénticas? ";
echo $banderaAlemania->sonIdenticas($banderaBelgica) ? "Sí\n" : "No\n";

$banderaBelgicaHorizontal = new BanderaFranjas('horizontal', ['black', 'gold', 'red'], 'Bélgica (horizontal)');
echo "¿Bélgica y Bélgica (horizontal) tienen mismas franjas pero diferente orientación? ";
echo $banderaBelgica->mismaPeroDiferenteOrientacion($banderaBelgicaHorizontal) ? "Sí\n\n" : "No\n\n";

echo "3. INVERSIÓN DE COLORES\n";
echo "------------------------\n";
echo "Bandera de Alemania original:\n";
$banderaAlemania->mostrar();
$banderaAlemania->invertirColores();
echo "Bandera de Alemania con colores invertidos:\n";
$banderaAlemania->mostrar();
$banderaAlemania->invertirColores(); // La dejamos como estaba

echo "4. INVERSIÓN DE ORIENTACIÓN\n";
echo "----------------------------\n";
echo "Bandera de Bélgica original:\n";
$banderaBelgica->mostrar();
$banderaBelgica->invertirOrientacion();
echo "Bandera de Bélgica con orientación invertida:\n";
$banderaBelgica->mostrar();

echo "5. DESTRUCCIÓN DE OBJETOS\n";
echo "---------------------------\n";
echo "Forzamos la destrucción de un objeto para ver el mensaje del destructor:\n";
unset($banderaSinNombre);
echo "\nEl resto de objetos se destruirán automáticamente al final del script.\n";

?>
