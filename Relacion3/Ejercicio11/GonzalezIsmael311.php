<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 mb-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0 text-center">Funciones swap e invertirArray</h1>
                    </div>
                
                    <div class="card-body">
                        <form action="" method="post" onsubmit="return validarForm()">
                            <p class="text-muted">Introduce dos valores para intercambiarlos y una lista de elementos separados por comas para invertir su orden.</p>
                            
                            <h5 class="mt-4">Prueba de <code>swap()</code></h5>
                            <div class="mb-3">
                                <label for="val1" class="form-label">Valor 1: <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Ej: Manzana" class="form-control" name="val1" id="val1" value="<?php echo isset($_POST['val1']) ? htmlspecialchars($_POST['val1']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="val2" class="form-label">Valor 2: <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Ej: Pera" class="form-control" name="val2" id="val2" value="<?php echo isset($_POST['val2']) ? htmlspecialchars($_POST['val2']) : ''; ?>">
                            </div>

                            <h5 class="mt-4">Prueba de <code>invertirArray()</code></h5>
                            <div class="mb-3">
                                <label for="array_texto" class="form-label">Lista de elementos: <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Ej: 1, 2, 3, 4, 5" class="form-control" name="array_texto" id="array_texto" value="<?php echo isset($_POST['array_texto']) ? htmlspecialchars($_POST['array_texto']) : ''; ?>">
                                <div id="error-form" class="form-text text-danger" style="visibility: hidden;">Todos los campos son obligatorios.</div>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Probar Funciones</button>
                            </div>
                        </form>
                    </div>

                    <?php
                        require_once '../relacion3.php'; // Incluimos la librería

                        //Procesamiento del formulario
                        if(isset($_POST['submit']) && !empty($_POST['val1']) && !empty($_POST['val2']) && !empty($_POST['array_texto'])) {
                            // Saneamos las entradas
                            $val1 = htmlspecialchars(trim($_POST['val1']));
                            $val2 = htmlspecialchars(trim($_POST['val2']));
                            $array_texto = htmlspecialchars(trim($_POST['array_texto']));

                            // --- Prueba de swap() ---
                            list($newVal1, $newVal2) = swap($val1, $val2);

                            echo '<div class="card-footer text-center">';
                            echo '<div class="alert alert-info">';
                            echo '<h5>Resultado de <code>swap()</code></h5>';
                            echo "<p class='mb-1'>Valores originales: <code>$val1</code>, <code>$val2</code></p>";
                            echo "<p class='mb-0'>Valores intercambiados: <strong><span class='text-success'><code>$newVal1</code>, <code>$newVal2</code></span></strong></p>";
                            echo '</div>';

                            // --- Prueba de invertirArray() ---
                            // Convertimos el string en un array, eliminando espacios extra
                            $array_original = array_map('trim', explode(',', $array_texto));
                            $array_invertido = invertirArray($array_original);

                            echo '<div class="alert alert-success mt-3">';
                            echo '<h5>Resultado de <code>invertirArray()</code></h5>';
                            echo "<p class='mb-1'>Array original: <code>[" . implode(', ', $array_original) . "]</code></p>";
                            echo "<p class='mb-0'>Array invertido: <strong><span class='text-primary'><code>[" . implode(', ', $array_invertido) . "]</code></span></strong></p>";
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio10/GonzalezIsmael310.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio12/GonzalezIsmael312.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        function validarForm() {
            const val1 = document.getElementById('val1').value.trim();
            const val2 = document.getElementById('val2').value.trim();
            const array_texto = document.getElementById('array_texto').value.trim();
            const errorDiv = document.getElementById('error-form');
            let esValido = true;

            if (val1 === '' || val2 === '' || array_texto === '') {
                errorDiv.style.visibility = 'visible';
                esValido = false;
            } else {
                errorDiv.style.visibility = 'hidden';
            }

            return esValido;
        }
    </script>
</body>
</html>