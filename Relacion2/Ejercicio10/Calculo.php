<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Cálculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="card shadow-sm col-lg-6">
            <div class="card-header bg-success text-white">
                <h1 class="h4 mb-0">Resultado</h1>
            </div>
            <div class="card-body text-center">
                <?php
                    // Inicializamos la variable $resultado a null.
                    // Esto nos ayudará a saber si se ha realizado un cálculo válido más adelante.
                    $resultado = null;

                    // Comprobamos si la página ha sido solicitada usando el método "GET"
                    // y si el array $_GET (que contiene los datos del formulario) no está vacío.
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {

                        // Verificamos que las variables necesarias (num1, num2, op) han sido enviadas desde el formulario.
                        // Es una buena práctica usar isset() para evitar errores si una variable no llega.
                        if (isset($_GET["num1"], $_GET["num2"], $_GET["op"])) {
                            // Obtenemos los valores del array $_GET.
                            // Convertimos los números a tipo float para poder operar con decimales.
                            $num1 = (float)$_GET["num1"];
                            $num2 = (float)$_GET["num2"];
                            $op = $_GET["op"];

                            // La expresión 'match' es una alternativa moderna al 'switch'.
                            // Compara el valor de $op y ejecuta el código correspondiente.
                            $resultado = match ($op) {
                                "suma" => $num1 + $num2,
                                "resta" => $num1 - $num2,
                                "mult" => $num1 * $num2,
                                // Para la división y el resto, comprobamos si el divisor es 0.
                                // Usamos un operador ternario: (condición) ? valor_si_cierto : valor_si_falso.
                                "div" => ($num2 == 0) ? "<span class='text-danger'>Error: División por cero</span>" : $num1 / $num2,
                                "resto" => ($num2 == 0) ? "<span class='text-danger'>Error: Módulo por cero</span>" : $num1 % $num2,
                                // 'default' se ejecuta si $op no coincide con ninguno de los casos anteriores.
                                default => "<span class='text-warning'>Operación no válida</span>"
                            };

                            // Mostramos el resultado en la página.
                            echo '<p class="h5 mt-3">El resultado de la operación es:</p>';
                            echo '<p class="display-4"><strong>' . $resultado . '</strong></p>';
                        } else {
                            // Si faltan datos en la URL, mostramos un mensaje de error.
                            echo '<p class="h5 text-danger">Error: Datos inválidos o faltantes.</p>';
                        }
                    }
                ?>
                <!-- Este enlace permite al usuario volver al formulario para hacer otro cálculo -->
                <a href="GonzalezIsmael210.php" class="btn btn-primary mt-4">Hacer otro cálculo</a>
            </div>
        </div>
    </div>
</main>
</body>
</html>