<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <main class="container my-5">
        <div class="row gy-4"> <!-- gy-4 añade espacio vertical entre las tarjetas -->
            <!-- ================================================================= -->
            <!-- TARJETA 1: NÚMEROS PRIMOS DEL 1 AL 100                           -->
            <!-- ================================================================= -->
            <div class="col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h1 class="h4 mb-0">Números Primos del 1 al 100</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-center">A continuación se muestran todos los números primos encontrados entre 1 y 100:</p>
                        <div class="text-center">
                            <?php
                                require_once '../relacion3.php';
 
                                // Generamos un array con los números del 1 al 100.
                                $numeros = range(1, 100);

                                // Usamos array_filter para quedarnos solo con los que devuelven true en la función esPrimo.
                                $primos = array_filter($numeros, "esPrimo");
 
                                // Mostramos cada número primo con un estilo de "badge" de Bootstrap.
                                foreach ($primos as $primo) {
                                    echo '<span class="text-success fs-5 m-1">' , $primo , '</span>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ================================================================= -->
            <!-- TARJETA 2: DOBLES CON array_walk                                 -->
            <!-- ================================================================= -->
            <div class="col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="h5 mb-0">Dobles con array_walk</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-center">A continuación se muestra el doble de los números del 1 al 100:</p>
                        <div class="text-center">
                            <?php
                                // Generamos un array con los números del 1 al 50.
                                $numeros_walk = range(1, 100);

                                // Usamos array_walk para modificar cada elemento del array original.
                                // La función anónima usa '&' para pasar el valor por referencia y poder modificarlo.
                                array_walk($numeros_walk, function (&$valor) {
                                    $valor *= 2;
                                });
            
                                // Mostramos cada número doblado.
                                foreach ($numeros_walk as $doble) {
                                    echo '<span class="text-info fs-5 m-1">' , $doble , '</span>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================================================================= -->
            <!-- TARJETA 3: DOBLES CON array_map                                  -->
            <!-- ================================================================= -->
            <div class="col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="h5 mb-0">Dobles con array_map</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-center">A continuación se muestra el doble de los números del 1 al 100:</p>
                        <div class="text-center">
                            <?php
                                $numeros_map = range(1, 100);
                                // array_map crea un nuevo array con los resultados de aplicar la función a cada elemento.
                                $dobles_map = array_map(function ($valor) {
                                    return $valor * 2;
                                }, $numeros_map);

                                foreach ($dobles_map as $doble) {
                                    echo '<span class="text-warning fs-5 m-1">' , $doble , '</span>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================================================================= -->
            <!-- TARJETA 4: PRIMERA OCURRENCIA CON array_filter                   -->
            <!-- ================================================================= -->
            <div class="col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="h5 mb-0">Buscar 1ª Ocurrencia</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Primera ocurrencia de un número de 2 cifras idénticas:</p>
                        <div class="text-center">
                            <?php
                                $numeros_find = range(1, 100);

                                // Usamos array_filter para encontrar los números que cumplen la condición.
                                // Un número de 2 cifras tiene dígitos idénticos si es divisible por 11.
                                $ocurrencias = array_filter($numeros_find, function ($n) {
                                    return ($n >= 10 && $n <= 99 && $n % 11 == 0);
                                });

                                // reset() devuelve el primer elemento de un array, o false si está vacío.
                                $primera_ocurrencia = reset($ocurrencias);

                                echo '<h4>Encontrado: <span class="badge bg-primary fs-4">' , $primera_ocurrencia , '</span></h4>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Cierre del div.row -->
        <!-- Navegación -->
        <div class="mt-4 d-flex justify-content-between mb-5">
            <a href="../Ejercicio15/GonzalezIsmael315.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio17/GonzalezIsmael317.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
</body>
</html>