<?php
/*
 * Autor: Ismael González
 * Fecha: 21/11/2025
 *
 * Descripción:
 * Este script demuestra el uso de variables de sesión en PHP.
 * Mantiene dos contadores (num1 y num2) que pueden ser incrementados,
 * decrementados o reseteados a través de un formulario. También permite
 * destruir la sesión para empezar de cero.
 *
 * --- Preguntas y Respuestas ---
 *
 * 1. ¿Qué ocurre si cierras la pestaña y la vuelves a abrir?
 *    Respuesta: Mientras no cierres el navegador por completo, la sesión seguirá activa.
 *    Al reabrir la pestaña, los valores de las variables se conservarán. Esto se debe a que
 *    el identificador de sesión se guarda en una cookie de sesión en el navegador, que
 *    persiste hasta que el navegador se cierra.
 *
 * 2. ¿Qué ocurre si quieres empezar de nuevo de cero? ¿Por qué?
 *    Respuesta: Para empezar de cero, es necesario destruir la sesión activa. He añadido una
 *    opción "Destruir sesión" que elimina todos los datos de la sesión en el servidor.
 *    Al recargar la página, el script no encontrará las variables de sesión y las
 *    reiniciará a 0. Es necesario porque las sesiones están diseñadas para persistir
 *    y mantener el estado entre diferentes peticiones del usuario.
 *
 * 3. Prueba en otro navegador. Piensa en las implicaciones de esto.
 *    Respuesta: Cada navegador gestiona sus propias sesiones de forma independiente. Si abres
 *    la página en otro navegador (por ejemplo, Firefox en lugar de Chrome), se creará una
 *    sesión completamente nueva y separada. Los contadores empezarán en 0 en ese nuevo
 *    navegador, y no afectarán a la sesión del navegador original.
 *    Implicaciones: Esto es fundamental para la web. Permite que diferentes usuarios
 *    (o el mismo usuario en diferentes navegadores/dispositivos) tengan experiencias
 *    personalizadas y separadas (carritos de la compra, inicios de sesión, etc.) sin
 *    interferir entre sí.
 */

// 1. Iniciar o reanudar la sesión. Es lo primero que se debe hacer.
session_start();

// 2. Inicializar las variables de sesión si no existen.
//    Esto solo ocurrirá la primera vez que un usuario visita la página.
if (!isset($_SESSION['num1'])) {
    $_SESSION['num1'] = 0;
}
if (!isset($_SESSION['num2'])) {
    $_SESSION['num2'] = 0;
}

// 3. Procesar la acción del formulario si se ha enviado.
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'inc_a':
            $_SESSION['num1']++;
            break;
        case 'dec_a':
            $_SESSION['num1']--;
            break;
        case 'inc_b':
            $_SESSION['num2']++;
            break;
        case 'dec_b':
            $_SESSION['num2']--;
            break;
        case 'reset_a':
            $_SESSION['num1'] = 0;
            break;
        case 'reset_b':
            $_SESSION['num2'] = 0;
            break;
        case 'destroy':
            // Destruye todos los datos de la sesión.
            session_destroy();
            // Redirige a la misma página para refrescar y reiniciar los valores.
            // Es importante usar header() después de session_destroy() para que los
            // cambios se reflejen inmediatamente en la inicialización.
            header("Location: " . $_SERVER['PHP_SELF']);
            exit(); // Termina el script para asegurar que la redirección se ejecuta.
    }
} else {
    // Comportamiento por defecto en la primera carga (cuando no se ha enviado el formulario):
    // Aumentar la variable 'a' (num1).
    $_SESSION['num1']++;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Variables de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .counter-box {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Uso de Variables de Sesión</h1>
        </div>
        <div class="card-body">
            <div class="row text-center my-4">
                <div class="col">
                    <h2>Variable A (num1)</h2>
                    <p class="counter-box text-primary"><?= $_SESSION['num1'] ?? 0 ?></p>
                </div>
                <div class="col">
                    <h2>Variable B (num2)</h2>
                    <p class="counter-box text-success"><?= $_SESSION['num2'] ?? 0 ?></p>
                </div>
            </div>

            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="mt-4">
                <div class="mb-3">
                    <label for="action" class="form-label">Selecciona una acción:</label>
                    <select name="action" id="action" class="form-select">
                        <option value="inc_a" <?= (isset($action) && $action == 'inc_a') ? 'selected' : '' ?>>Aumentar A</option>
                        <option value="dec_a" <?= (isset($action) && $action == 'dec_a') ? 'selected' : '' ?>>Disminuir A</option>
                        <option value="inc_b" <?= (isset($action) && $action == 'inc_b') ? 'selected' : '' ?>>Aumentar B</option>
                        <option value="dec_b" <?= (isset($action) && $action == 'dec_b') ? 'selected' : '' ?>>Disminuir B</option>
                        <option value="" disabled>---</option>
                        <option value="reset_a" <?= (isset($action) && $action == 'reset_a') ? 'selected' : '' ?>>Resetear A</option>
                        <option value="reset_b" <?= (isset($action) && $action == 'reset_b') ? 'selected' : '' ?>>Resetear B</option>
                        <option value="" disabled>---</option>
                        <option value="destroy" <?= (isset($action) && $action == 'destroy') ? 'selected' : '' ?>>Destruir sesión</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ejecutar</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            <p><strong>Nota:</strong> Si no se elige ninguna opción y se recarga la página, o en la primera visita, la variable A se incrementará por defecto.</p>
            <a href="../index.htm" class="btn btn-secondary mt-2">Volver al índice</a>
        </div>
    </div>
</div>
</body>
</html>
