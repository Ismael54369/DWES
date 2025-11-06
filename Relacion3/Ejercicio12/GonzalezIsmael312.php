<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h1 class="h4 mb-0">Ascenso de burbujas</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Se mostrarán los datos del array</p>
                        <div class="text-center">
                            <?php
                            function bubbleSortAsc(&$arr)
                            {
                                $longitud = count($arr);

                                //Recorremos todos los elementos del array
                                for ($i = 0; $i < $longitud; $i++) {
                                    for ($j = 0; $j < $longitud - 1; $j++) {
                                        if ($arr[$j] < $arr[$j + 1]) {
                                            $temporal = $arr[$j];
                                            $arr[$j] = $arr[$j + 1];
                                            $arr[$j + 1] = $temporal;
                                        }
                                    }
                                }
                            }

                            //Array para ordenar
                            $datos = ['Pérez', 'García', 'López', 'Márquez', 'Álvarez', 'Domínguez', 'Ruíz', 'Díaz'];
                            echo '<p class="mb-1>Array desordenado</p><br>';

                            //Usamos foreach para mostrar los datos del array ordenado
                            foreach ($datos as $valor) {
                                echo '<span class="text-success fs-5 m-1 mb-1">', $valor, '</span>';
                            }

                            echo '<p class="mb-1>Array ordenado</p>';
                            bubbleSortAsc($datos);

                            foreach ($datos as $valor) {
                                echo '<span class="text-danger fs-5 m-1 mb-1">', $valor, '</span>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio11/GonzalezIsmael311.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio13/GonzalezIsmael313.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>