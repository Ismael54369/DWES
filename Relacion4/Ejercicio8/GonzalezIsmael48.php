<?php
/*
 * Autor: Ismael González
 * Fecha: 21/11/2025
 *
 * Descripción:
 * Este script define y prueba la clase CuentaBancaria, que simula las
 * operaciones básicas de una cuenta bancaria.
 */

// Establecemos la cabecera para que el navegador interprete la salida como texto plano.
header('Content-Type: text/plain; charset=utf-8');

class CuentaBancaria {
    // Atributos privados
    private float $saldo = 0.0;
    private int $numOperaciones = 0;

    /**
     * Constructor con promoción de propiedades (PHP 8+).
     * @param string $numeroCuenta El número de la cuenta.
     * @param string $nombreTitular El nombre del titular de la cuenta.
     */
    public function __construct(
        private string $numeroCuenta,
        private string $nombreTitular
    ) {
        echo "-> Cuenta '{$this->numeroCuenta}' creada para '{$this->nombreTitular}'.\n";
    }

    /**
     * Destructor de la clase.
     */
    public function __destruct() {
        echo "-> Cuenta '{$this->numeroCuenta}' de '{$this->nombreTitular}' cerrada.\n";
    }

    /**
     * Método mágico __toString para obtener una representación en cadena del objeto.
     * @return string
     */
    public function __toString(): string {
        return sprintf(
            "   [Cuenta: %s | Titular: %s | Saldo: %.2f EUR | Operaciones: %d]\n",
            $this->numeroCuenta,
            $this->nombreTitular,
            $this->saldo,
            $this->numOperaciones
        );
    }

    /**
     * Deposita una cantidad de dinero en la cuenta.
     * @param float $cantidad La cantidad a depositar.
     * @return bool Devuelve true si la operación fue exitosa, false si no.
     */
    public function depositar(float $cantidad): bool {
        if ($cantidad <= 0) {
            echo "Error: La cantidad a depositar debe ser positiva.\n";
            return false;
        }
        $this->saldo += $cantidad;
        $this->numOperaciones++;
        echo "Depósito de {$cantidad} EUR realizado en la cuenta {$this->numeroCuenta}.\n";
        return true;
    }

    /**
     * Extrae una cantidad de dinero de la cuenta.
     * @param float $cantidad La cantidad a extraer.
     * @return bool Devuelve true si la operación fue exitosa, false si no.
     */
    public function extraer(float $cantidad): bool {
        if ($cantidad <= 0) {
            echo "Error: La cantidad a extraer debe ser positiva.\n";
            return false;
        }
        if ($this->saldo < $cantidad) {
            echo "Error: Saldo insuficiente en la cuenta {$this->numeroCuenta} para extraer {$cantidad} EUR.\n";
            return false;
        }
        $this->saldo -= $cantidad;
        $this->numOperaciones++;
        echo "Extracción de {$cantidad} EUR realizada de la cuenta {$this->numeroCuenta}.\n";
        return true;
    }

    /**
     * Transfiere dinero desde esta cuenta a otra.
     * @param float $cantidad La cantidad a transferir.
     * @param CuentaBancaria $cuentaDestino La cuenta de destino.
     * @return bool Devuelve true si la transferencia fue exitosa, false si no.
     */
    public function transferir(float $cantidad, CuentaBancaria $cuentaDestino): bool {
        echo "Iniciando transferencia de {$cantidad} EUR desde {$this->numeroCuenta} a {$cuentaDestino->numeroCuenta}...\n";
        // Intenta extraer el dinero de la cuenta de origen.
        if ($this->extraer($cantidad)) {
            // Si la extracción es exitosa, intenta depositarlo en la cuenta de destino.
            if ($cuentaDestino->depositar($cantidad)) {
                echo "Transferencia completada con éxito.\n";
                return true;
            } else {
                // Si el depósito falla, se debe revertir la extracción.
                echo "Error en la cuenta de destino. Revirtiendo operación en la cuenta de origen...\n";
                $this->depositar($cantidad); // Devolvemos el dinero.
                return false;
            }
        }
        // Si la extracción falla, la transferencia no se puede realizar.
        echo "Transferencia fallida.\n";
        return false;
    }
}

echo "========================================\n";
echo "== Pruebas de la clase CuentaBancaria ==\n";
echo "========================================\n\n";

// 1. Creación de cuentas
$cuenta1 = new CuentaBancaria("ES01-1234-5678-90", "Juan Pérez");
$cuenta2 = new CuentaBancaria("ES02-9876-5432-10", "Ana López");
echo $cuenta1;
echo $cuenta2;
echo "\n";

// 2. Operaciones de depósito y extracción
$cuenta1->depositar(1000);
$cuenta1->extraer(200);
$cuenta1->extraer(2000); // Intento de extracción fallido
echo $cuenta1;
echo "\n";

// 3. Operaciones de transferencia
$cuenta1->transferir(300, $cuenta2);
echo "Estado de las cuentas tras la transferencia:\n";
echo $cuenta1;
echo $cuenta2;
echo "\n";

// 4. Intento de transferencia sin fondos suficientes
$cuenta1->transferir(1000, $cuenta2);
echo "Estado de las cuentas tras el intento fallido:\n";
echo $cuenta1;
echo $cuenta2;
echo "\n";

echo "Fin de las pruebas. Los destructores se llamarán automáticamente.\n";

?>
