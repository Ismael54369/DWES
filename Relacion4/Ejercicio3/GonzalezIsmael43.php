<?php
/*
 * Autor: Ismael González
 * Fecha: 21/11/2025
 *
 * Descripción:
 * Juego de adivinar un número. El servidor "piensa" un número del 1 al 100
 * y el usuario debe adivinarlo. El número secreto y el contador de intentos
 * se mantienen entre peticiones usando campos de formulario ocultos (hidden).
 * Todo el código (lógica y formulario) está en este mismo archivo.
 */

// --- INICIALIZACIÓN DE VARIABLES ---

$mensaje = ""; // Mensaje para el usuario (pistas, felicitaciones, etc.)
$numeroSecreto = null; // El número que el usuario debe adivinar.
$intentos = 0; // Contador de intentos.
$juegoTerminado = false; // Bandera para saber si el juego ha finalizado.

// --- LÓGICA DEL JUEGO ---

// Comprobamos si el formulario ha sido enviado.
// La primera vez que se carga la página, 'numeroSecreto' no existirá en $_GET.
if (isset($_GET['numeroSecreto'])) {
    // El juego ya ha comenzado, recuperamos los valores de los campos ocultos.
    $numeroSecreto = (int)$_GET['numeroSecreto'];
    $intentos = (int)$_GET['intentos'];

    // Validamos que el usuario ha introducido un número.
    if (isset($_GET['suposicion']) && $_GET['suposicion'] !== '') {
        $suposicionUsuario = (int)$_GET['suposicion'];
        $intentos++; // Incrementamos el contador en cada intento.

        if ($suposicionUsuario < $numeroSecreto) {
            $mensaje = "¡Te has quedado corto! Inténtalo de nuevo.";
        } elseif ($suposicionUsuario > $numeroSecreto) {
            $mensaje = "¡Te has pasado! Inténtalo de nuevo.";
        } else {
            $mensaje = "¡ENHORABUENA! Has acertado el número $numeroSecreto en $intentos intentos.";
            $juegoTerminado = true;
        }
    } else {
        $mensaje = "Por favor, introduce un número para jugar.";
    }

} else {
    // Es la primera vez que se carga la página.
    // "Pensamos" un número aleatorio entre 1 y 100.
    $numeroSecreto = rand(1, 100);
    $intentos = 0;
    $mensaje = "He pensado un número entre 1 y 100. ¡Adivínalo!";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Adivina el Número</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Juego: Adivina el Número</h1>
        </div>
        <div class="card-body">
            <p class="alert <?= $juegoTerminado ? 'alert-success' : 'alert-info' ?>"><?= $mensaje ?></p>

            <?php if (!$juegoTerminado): ?>
                <!-- El formulario solo se muestra si el juego no ha terminado -->
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
                    <!-- Campos ocultos para mantener el estado del juego -->
                    <input type="hidden" name="numeroSecreto" value="<?= $numeroSecreto ?>">
                    <input type="hidden" name="intentos" value="<?= $intentos ?>">

                    <div class="mb-3">
                        <label for="suposicion" class="form-label">Introduce tu número (Intentos: <?= $intentos ?>):</label>
                        <input type="number" id="suposicion" name="suposicion" class="form-control" min="1" max="100" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">¡Probar suerte!</button>
                </form>
            <?php else: ?>
                <!-- Si el juego ha terminado, mostramos un botón para volver a jugar -->
                <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="btn btn-success w-100">Jugar de Nuevo</a>
            <?php endif; ?>
        </div>
        <div class="card-footer text-muted">
            <p><strong>Modo depuración:</strong> El número secreto es <?= $numeroSecreto ?>.</p>
            <a href="../index.htm" class="btn btn-secondary mt-2">Volver al índice</a>
        </div>
    </div>
</div>
</body>
</html>
