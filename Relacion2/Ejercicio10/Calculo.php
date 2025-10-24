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
                    $resultado = null;
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
                            $num1 = $_GET["num1"];
                            $num2 = $_GET["num2"];
                            $op = $_GET["op"];
                        }

                        if ($num1 !== false && $num2 !== false && $op) {
                            $resultado = match ($op) {
                                "suma" => $num1 + $num2,
                                "resta" => $num1 - $num2,
                                "mult" => $num1 * $num2,
                                "div" => ($num2 == 0) ? "<span class='text-danger'>Error: División por cero</span>" : $num1 / $num2,
                                "resto" => ($num2 == 0) ? "<span class='text-danger'>Error: Módulo por cero</span>" : $num1 % $num2,
                                default => "<span class='text-warning'>Operación no válida</span>"
                            };
                            echo '<p class="h5 mt-3">El resultado de la operación es:</p>';
                            echo '<p class="display-4"><strong>' . $resultado . '</strong></p>';
                        } else {
                            echo '<p class="h5 text-danger">Error: Datos inválidos o faltantes.</p>';
                        }
                    }
                ?>
                <a href="GonzalezIsmael210.php" class="btn btn-primary mt-4">Volver a la calculadora</a>
            </div>
        </div>
    </div>
</main>
</body>
</html>