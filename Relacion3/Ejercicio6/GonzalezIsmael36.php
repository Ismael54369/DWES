<?php
/**
 * Simula el lanzamiento de un dado normal de 6 caras.
 * @return int Un número aleatorio entre 1 y 6.
 */
function dadoNormal() {
    return rand(1, 6);
} 

/**
 * Simula el lanzamiento de un dado trucado (cargado).
 * La probabilidad de que salga un 6 es del 37.5% (3/8).
 * La probabilidad para cualquier otro número (1 a 5) es del 12.5% (1/8).
 * @return int El resultado del lanzamiento del dado trucado.
 */
function dadoTrucado() {
    // Generamos un número aleatorio entre 1 y 8 para simular las probabilidades.
    $num = rand(1, 8); 
    $numDado = 0;

    if($num <= 3) { // Si el número es 1, 2 o 3, el resultado es 6 (3 de 8 posibilidades).
        $numDado = 6;
    } else { // Si el número es 4, 5, 6, 7 u 8, el resultado es un número aleatorio entre 1 y 5.
        $numDado = rand(1, 5);
    }
    return $numDado;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <!-- CSS de Bootstrap para estilos rápidos y responsivos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- 'container' centra el contenido y 'my-5' añade margen vertical -->
    <main class="container my-5">
        <!-- 'row' y 'justify-content-center' para centrar la columna en la fila -->
        <div class="row justify-content-center">
            <!-- La columna ocupará 8/12 en pantallas medianas y 6/12 en grandes para mejor legibilidad -->
            <div class="col-md-8 col-lg-6">
                <!-- Título de la página, centrado y con margen inferior -->
                <h1 class="mb-4 text-center">Lanzamiento de Dados</h1>
                <!-- Tabla con estilos de Bootstrap: bordes, filas alternas, tema oscuro y texto centrado -->
                <table class="table table-bordered table-striped table-dark text-center">
                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr>
                            <!-- 'scope="col"' mejora la accesibilidad para lectores de pantalla -->
                            <th scope="col">Lanzamiento</th>
                            <th scope="col">Dado Normal</th>
                            <th scope="col">Dado Trucado</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla donde se generarán las filas dinámicamente -->
                    <tbody>
                        <?php
                        // Bucle que se ejecuta 10 veces para simular 10 lanzamientos.
                        for ($i = 1; $i <= 10; $i++) {
                            // En cada iteración, llamamos a las funciones para obtener un nuevo resultado.
                            $normal = dadoNormal();
                            $trucado = dadoTrucado();
                            // Imprimimos una fila (<tr>) con los resultados.
                                echo "<tr>
                                    <th scope='row'>$i</th>
                                    <td>$normal</td>
                                    <td>$trucado</td>
                                  </tr>"; 
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Botón para recargar la página y hacer una nueva ronda de tiradas -->
                <button class="btn btn-warning w-100 mt-0 mb-3" onclick="location.reload()">Hacer una nueva ronda de tiradas</button>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio5/GonzalezIsmael35.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio7/GonzalezIsmael37.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
</body>
</html>
