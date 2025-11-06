<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <main class="container my-5">
        <div class="row gy-4"> <!-- gy-4 añade espacio vertical entre las tarjetas -->
            <!-- ================================================================= -->
            <!-- TARJETA 1: FUNCIONES DE ARRAYS                                   -->
            <!-- ================================================================= -->
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h1 class="h4 mb-0">Uso de Funciones de Array</h1>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-center">Uso de funciones sobre arrays generados.</p>
                        <div class="text-start flex-grow-1">
                            <?php
                            require_once '../relacion3.php';

                            // Generamos un array con los números del 1 al 100.
                            $numeros = range(1, 20);
                            $numeros2 = range(1, 40);

                            // Usamos array_filter para quedarnos solo con los que devuelven true en la función esImpar y con los multiplos de 3.
                            $impar = array_filter($numeros, "esImpar");
                            $multiploDe3 = array_filter($numeros2, "esMultiploDe3");

                            // Usamos array_filter para saber cuantos números pares hay en el array.
                            $par1 = array_filter($impar, "esPar");
                            $par2 = array_filter($multiploDe3, "esPar");

                            // Usamos array_filter para extraer los primos de ambos arrays.
                            $primos1 = array_filter($impar, "esPrimo");
                            $primos2 = array_filter($multiploDe3, "esPrimo");

                            //Usamos array_map para calcular el doble de cada número en ambos arrays
                            $cuadrados1 = array_map("cuadrado", $impar);
                            $cuadrados2 = array_map("cuadrado", $multiploDe3);

                            //Usamos array_walk para sustituir cada número por su cuadrado en ambos arrays
                            array_walk($impar, function (&$valor) {
                                $valor = cuadrado($valor);
                            });
                            array_walk($multiploDe3, function (&$valor) {
                                $valor = cuadrado($valor);
                            });

                            //Usamos array_intersect para saber los números comunes entre ambos arrays
                            $comunes = array_intersect($impar, $multiploDe3);

                            // Para depuración, mostramos los arrays intermedios
                            echo '<div class="alert alert-secondary small p-2"><strong>Array Impares (1-20):</strong> ' . implode(', ', $impar) . '</div>';
                            echo '<div class="alert alert-secondary small p-2"><strong>Array Múltiplos de 3 (1-40):</strong> ' . implode(', ', $multiploDe3) . '</div>';

                            echo '<div class="alert alert-info">
                            <h5 class="mb-2">Resultados de <code>count()</code></h5>
                            <ul class="list-unstyled mb-0 mt-2">
                                <li><small><strong>Pares encontrados en el array de impares: </strong>' , count($par1) , '</small></li>
                                <li><small><strong>Pares encontrados en el array de múltiplos de 3: </strong>' , count($par2) , '</small></li>
                            </ul>
                            </div>';

                            echo '<div class="alert alert-danger">
                            <h5 class="mb-2">Resultados de <code>array_any()</code>(Da error porque es de php 8.4.0)</h5>
                            </div>';

                            echo '<div class="alert alert-info">
                            <h5 class="mb-2">Resultados de <code>array_filter()</code></h5>
                            <ul class="list-unstyled mb-0 mt-2">
                                <li><small><strong>Primos encontrados en el array de impares: </strong>' , implode(', ', $primos1) , '</small></li>
                                <li><small><strong>Primos encontrados en el array de múltiplos de 3: </strong>' , implode(', ', $primos2) , '</small></li>
                            </ul>
                            </div>';

                            echo '<div class="alert alert-danger">
                            <h5 class="mb-2">Resultados de <code>array_find()</code>(Da error porque es de php 8.4.0)</h5>
                            </div>';

                            echo '<div class="alert alert-info">
                            <h5 class="mb-2">Resultados de <code>array_map()</code></h5>
                            <ul class="list-unstyled mb-0 mt-2">
                                <li><small><strong>Cuadrados encontrados en el array de impares: </strong>' , implode(', ', $cuadrados1) , '</small></li>
                                <li><small><strong>Cuadrados encontrados en el array de múltiplos de 3: </strong>' , implode(', ', $cuadrados2) , '</small></li>
                            </ul>
                            </div>';

                            echo '<div class="alert alert-info">
                            <h5 class="mb-2">Resultados de <code>array_walk()</code></h5>
                            <ul class="list-unstyled mb-0 mt-2">
                                <li><small><strong>El nuevo contenido de array de impares: </strong>' , implode(', ', $impar) , '</small></li>
                                <li><small><strong>El nuevo contenido de array de múltiplos de 3: </strong>' , implode(', ', $multiploDe3) , '</small></li>
                            </ul>
                            </div>';

                            echo '<div class="alert alert-info">
                            <h5 class="mb-2">Resultados de <code>array_intersect()</code></h5>
                            <small><strong>Los numeros comunes encontrados en ambos arrays son: </strong>' , implode(', ', $comunes) , '</small>
                            </div>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Cierre del div.row -->
        <!-- Navegación -->
        <div class="mt-4 d-flex justify-content-between mb-5">
            <a href="../Ejercicio16/GonzalezIsmael316.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio18/GonzalezIsmael318.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
</body>

</html>