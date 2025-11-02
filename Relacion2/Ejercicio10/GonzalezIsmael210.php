<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
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
                <form class="needs-validation" action="Calculo.php" method="get" novalidate>
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
            </div>
        </div>
    </div>
    <!-- ================================================================= -->
    <!-- NAVEGACIÓN ENTRE EJERCICIOS                                     -->
    <!-- ================================================================= -->
    <div class="mt-4 d-flex justify-content-between">
        <a href="../Ejercicio9/GonzalezIsmael29.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
        <a href="../index.html" class="btn btn-primary">Volver al Index</a>
        <a href="../Ejercicio11/GonzalezIsmael211.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
    </div>
</main>
</body>
</html>