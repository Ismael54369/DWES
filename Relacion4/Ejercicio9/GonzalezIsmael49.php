<?php
/*
 * Autor: Ismael González
 * Fecha: 21/11/2025
 *
 * Descripción:
 * Este script define una estructura de clases para cuentas bancarias utilizando
 * una clase abstracta 'CuentaBancaria' y dos clases hijas: 'CuentaDebito' y
 * 'CuentaCredito', cada una con su propia lógica para la extracción de dinero.
 */

header('Content-Type: text/plain; charset=utf-8');

/**
 * Clase Abstracta CuentaBancaria
 * Define la estructura y comportamiento común a todas las cuentas bancarias.
 */
abstract class CuentaBancaria {
    // Atributos protegidos para que las clases hijas puedan acceder a ellos
    protected float $saldo = 0.0;
    protected int $numOperaciones = 0;

    public function __construct(
        protected string $numeroCuenta,
        protected string $nombreTitular
    ) {
        echo "-> Cuenta '{$this->numeroCuenta}' creada para '{$this->nombreTitular}'.\n";
    }

    public function __destruct() {
        echo "-> Cuenta '{$this->numeroCuenta}' de '{$this->nombreTitular}' cerrada.\n";
    }

    public function __toString(): string {
        return sprintf(
            "   [Cuenta: %s | Titular: %s | Saldo: %.2f EUR | Operaciones: %d]\n",
            $this->numeroCuenta,
            $this->nombreTitular,
            $this->saldo,
            $this->numOperaciones
        );
    }

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
     * Método abstracto para extraer dinero.
     * Cada clase hija deberá implementar su propia lógica.
     */
    abstract public function extraer(float $cantidad): bool;

    public function transferir(float $cantidad, CuentaBancaria $cuentaDestino): bool {
        echo "Iniciando transferencia de {$cantidad} EUR desde {$this->numeroCuenta} a {$cuentaDestino->numeroCuenta}...\n";
        if ($this->extraer($cantidad)) {
            if ($cuentaDestino->depositar($cantidad)) {
                echo "Transferencia completada con éxito.\n";
                return true;
            } else {
                echo "Error en la cuenta de destino. Revirtiendo operación en la cuenta de origen...\n";
                $this->depositar($cantidad);
                return false;
            }
        }
        echo "Transferencia fallida.\n";
        return false;
    }
}

/**
 * Clase CuentaDebito
 * No permite extraer dinero si el saldo no es suficiente.
 */
class CuentaDebito extends CuentaBancaria {
    public function extraer(float $cantidad): bool {
        if ($cantidad <= 0) {
            echo "Error: La cantidad a extraer debe ser positiva.\n";
            return false;
        }
        if ($this->saldo < $cantidad) {
            echo "Error (Débito): Saldo insuficiente en la cuenta {$this->numeroCuenta} para extraer {$cantidad} EUR.\n";
            return false;
        }
        $this->saldo -= $cantidad;
        $this->numOperaciones++;
        echo "Extracción de {$cantidad} EUR realizada de la cuenta {$this->numeroCuenta}.\n";
        return true;
    }
}

/**
 * Clase CuentaCredito
 * Permite un saldo negativo hasta un límite establecido.
 */
class CuentaCredito extends CuentaBancaria {
    private float $limiteCredito;

    public function __construct(string $numeroCuenta, string $nombreTitular, float $limiteCredito = 1000.0) {
        // Llama al constructor de la clase padre
        parent::__construct($numeroCuenta, $nombreTitular);
        $this->limiteCredito = $limiteCredito;
        echo "   (Esta es una cuenta de crédito con un límite de {$this->limiteCredito} EUR).\n";
    }

    public function extraer(float $cantidad): bool {
        if ($cantidad <= 0) {
            echo "Error: La cantidad a extraer debe ser positiva.\n";
            return false;
        }
        // Comprueba si la extracción superaría el límite de crédito
        if (($this->saldo - $cantidad) < -$this->limiteCredito) {
            echo "Error (Crédito): La extracción de {$cantidad} EUR superaría el límite de crédito de la cuenta {$this->numeroCuenta}.\n";
            return false;
        }
        $this->saldo -= $cantidad;
        $this->numOperaciones++;
        echo "Extracción de {$cantidad} EUR realizada de la cuenta {$this->numeroCuenta}.\n";
        return true;
    }

    // Sobrescribimos __toString para mostrar también el límite de crédito
    public function __toString(): string {
         return sprintf(
            "   [Cuenta: %s | Titular: %s | Saldo: %.2f EUR | Límite Crédito: %.2f EUR | Operaciones: %d]\n",
            $this->numeroCuenta,
            $this->nombreTitular,
            $this->saldo,
            $this->limiteCredito,
            $this->numOperaciones
        );
    }
}

echo "=================================================================\n";
echo "== Pruebas de Cuentas Bancarias (Débito y Crédito) ==\n";
echo "=================================================================\n\n";

// 1. Creación de cuentas
echo "--- Creando una cuenta de DÉBITO y una de CRÉDITO ---\n";
$cuentaDebito = new CuentaDebito("ES-DEBITO-01", "Carlos Ruiz");
$cuentaCredito = new CuentaCredito("ES-CREDITO-02", "Laura Gil", 500); // Límite de crédito de 500€
echo $cuentaDebito;
echo $cuentaCredito;
echo "\n";

// 2. Pruebas con Cuenta de Débito
echo "--- Operando con la Cuenta de DÉBITO ---\n";
$cuentaDebito->depositar(200);
echo $cuentaDebito;
$cuentaDebito->extraer(150);
echo $cuentaDebito;
echo "Intentando extraer más dinero del disponible...\n";
$cuentaDebito->extraer(100); // Debería fallar
echo $cuentaDebito;
echo "\n";

// 3. Pruebas con Cuenta de Crédito
echo "--- Operando con la Cuenta de CRÉDITO ---\n";
$cuentaCredito->depositar(100);
echo $cuentaCredito;
echo "Extrayendo más dinero del disponible (usando crédito)...\n";
$cuentaCredito->extraer(300); // Debería funcionar, saldo quedará en -200
echo $cuentaCredito;
echo "Intentando extraer más dinero del límite de crédito...\n";
$cuentaCredito->extraer(400); // Debería fallar, -200 - 400 = -600, que supera el límite de -500
echo $cuentaCredito;
echo "\n";

// 4. Pruebas de Transferencias
echo "--- Probando TRANSFERENCIAS entre cuentas ---\n";
echo "Transfiriendo 50 EUR desde Débito (saldo 50) a Crédito (saldo -200)...\n";
$cuentaDebito->transferir(50, $cuentaCredito); // Debería funcionar
echo "Estado final de las cuentas:\n";
echo $cuentaDebito;   // Saldo esperado: 0
echo $cuentaCredito; // Saldo esperado: -150
echo "\n";

echo "Intentando transferir 1 EUR desde Débito (saldo 0) a Crédito...\n";
$cuentaDebito->transferir(1, $cuentaCredito); // Debería fallar por falta de saldo en origen
echo "Estado final de las cuentas:\n";
echo $cuentaDebito;   // Saldo esperado: 0
echo $cuentaCredito; // Saldo esperado: -150
echo "\n";

echo "Fin de las pruebas. Los destructores se llamarán automáticamente.\n";

?>
