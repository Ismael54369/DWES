<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Calculadora</h1>
            </div>
            <div class="card-body">
                <p class="card-text mb-4">Rellena los siguientes campos para realizar los cálculos.</p>
                <form class="needs-validation" method="get" novalidate>
                    <div class="mb-3">
                        <label for="num1" class="form-label">Numero 1</label>
                        <input type="number" class="form-control" id="num1" name="num1" required>
                        <div class="invalid-feedback">
                            Por favor, introduce un numero.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="op" class="form-label">Operador</label>
                        <select class="form-select" id="op" name="op" required>
                            <option selected disabled value="">Elige una opción...</option>
                            <option value="suma">+</option>
                            <option value="resta">-</option>
                            <option value="mult">*</option>
                            <option value="div">/</option>
                            <option value="resto">%</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecciona un operador.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="num2" class="form-label">Numero 2</label>
                        <input type="number" class="form-control" id="num2" name="num2" required>
                        <div class="invalid-feedback">
                            Por favor, introduce un numero.
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-secondary me-2">Borrar</button>
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </div>
                </form>
                <p id="resultado" class="text-center">
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
                            $num1 = $_GET["num1"];
                            $num2 = $_GET["num2"];
                            $op = $_GET["op"];

                            $resultado = match ($op) {
                                "suma" => $num1 + $num2,
                                "resta" => $num1 - $num2,
                                "mult" => $num1 * $num2,
                                "div" => ($num2 == 0) ? "Error: División por cero" : $num1 / $num2,
                                "resto" => ($num2 == 0) ? "Error: Módulo por cero" : $num1 % $num2,
                                default => "Operación no válida" 
                        };
                        echo "El resultado de la operación es: <strong>" , $resultado , "</strong>";
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</main>
</body>
</html>