<?php
/*
 * Autor: Ismael González
 * Fecha: 21/11/2025
 *
 * Descripción:
 * Segunda versión del juego de adivinar un número. En esta ocasión, se utilizan
 * variables de sesión para mantener el número secreto y el contador de intentos.
 *
 * --- Preguntas y Respuestas ---
 *
 * 1. ¿Cuál crees que es la forma más acertada de haber resuelto este problema?
 *    Respuesta: La forma más acertada y robusta es utilizar variables de sesión.
 *
 * 2. ¿Por qué?
 *    Respuesta:
 *    - Seguridad: Al usar sesiones, el número secreto se almacena exclusivamente en el
 *      servidor. En la versión anterior (con campos ocultos), el número secreto viajaba
 *      al cliente y era visible en el código fuente HTML de la página. Un usuario con
 *      conocimientos básicos podría "hacer trampas" fácilmente inspeccionando el código.
 *      Con sesiones, esto es imposible.
 *    - Integridad de los datos: Los campos ocultos pueden ser manipulados por el usuario
 *      antes de enviar el formulario. Por ejemplo, un usuario podría cambiar el valor del
 *      contador de intentos a 0 en cada envío. Las variables de sesión, al estar en el
 *      servidor, están a salvo de este tipo de manipulación.
 *    - Limpieza del código: El estado del juego se gestiona de forma centralizada en la
 *      sesión, lo que hace que el código del formulario (HTML) sea más limpio, ya que no
 *      necesita incluir campos ocultos para pasar el estado de una página a otra.
 */

// 1. Iniciar o reanudar la sesión. Es imprescindible para usar $_SESSION.
session_start();

// --- INICIALIZACIÓN DE VARIABLES ---

$mensaje = "";
$juegoTerminado = false;

// --- LÓGICA DEL JUEGO ---

// Si se pide reiniciar el juego (a través del enlace "Jugar de Nuevo").
if (isset($_GET['reiniciar'])) {
    // Destruimos las variables de sesión del juego para empezar de cero.
    unset($_SESSION['numeroSecreto']);
    unset($_SESSION['intentos']);
    // Redirigimos para limpiar la URL de parámetros.
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Comprobamos si el número secreto NO está en la sesión para inicializar el juego.
if (!isset($_SESSION['numeroSecreto'])) {
    $_SESSION['numeroSecreto'] = rand(1, 100);
    $_SESSION['intentos'] = 0;
    $mensaje = "He pensado un número entre 1 y 100. ¡Adivínalo!";
}

// Si el formulario ha sido enviado (se ha hecho un intento).
if (isset($_GET['suposicion']) && $_GET['suposicion'] !== '') {
    $suposicionUsuario = (int)$_GET['suposicion'];
    $_SESSION['intentos']++;

    if ($suposicionUsuario < $_SESSION['numeroSecreto']) {
        $mensaje = "¡Te has quedado corto! Inténtalo de nuevo.";
    } elseif ($suposicionUsuario > $_SESSION['numeroSecreto']) {
        $mensaje = "¡Te has pasado! Inténtalo de nuevo.";
    } else {
        $mensaje = "¡ENHORABUENA! Has acertado el número {$_SESSION['numeroSecreto']} en {$_SESSION['intentos']} intentos.";
        $juegoTerminado = true;
    }
} elseif (isset($_GET['suposicion'])) {
    $mensaje = "Por favor, introduce un número para jugar.";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Adivina el Número (Sesiones)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header"><h1 class="text-center">Juego: Adivina el Número (Versión Sesiones)</h1></div>
        <div class="card-body">
            <p class="alert <?= $juegoTerminado ? 'alert-success' : 'alert-info' ?>"><?= $mensaje ?></p>

            <?php // SINTAXIS ALTERNATIVA DE PHP PARA ESTRUCTURAS DE CONTROL ?>

            <?php // INICIO DEL IF: Si la variable $juegoTerminado es 'false' (el juego NO ha terminado)... ?>
            <?php if (!$juegoTerminado): ?>
                
                <!-- ...entonces se muestra este bloque HTML: el formulario para que el usuario siga jugando. -->
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
                    <div class="mb-3">
                        <label for="suposicion" class="form-label">Introduce tu número (Intentos: <?= $_SESSION['intentos'] ?>):</label>
                        <input type="number" id="suposicion" name="suposicion" class="form-control" min="1" max="100" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">¡Probar suerte!</button>
                </form>

            <?php // ELSE: Si la condición del 'if' no se cumple (es decir, $juegoTerminado es 'true')... ?>
            <?php else: ?>
                <a href="?reiniciar=true" class="btn btn-success w-100">Jugar de Nuevo</a>
            <?php endif; ?>
        </div>
        <div class="card-footer text-muted">
            <p><strong>Modo depuración:</strong> El número secreto es <?= $_SESSION['numeroSecreto'] ?>.</p>
            <a href="../index.htm" class="btn btn-secondary mt-2">Volver al índice</a>
        </div>
    </div>
</div>
</body>
</html>
