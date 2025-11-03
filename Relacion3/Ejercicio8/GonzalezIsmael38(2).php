<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <main class="container my-5">
        <div class="row justify-content-center">
            <!-- ================================================================= -->
            <!-- VERSIÓN 2: RADIO BUTTONS (OPCIÓN EXCLUYENTE)                    -->
            <!-- ================================================================= -->
            <div class="col-md-8 col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0 text-center">Mayúsculas o Minúsculas (Radio Buttons)</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="" method="post" onsubmit="return validarForm2()">
                            <div class="mb-3">
                                <label for="texto2" class="form-label">Introduce un texto:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Escribe algo aquí..." class="form-control" name="texto2" id="texto2" value="<?php echo isset($_POST['texto2']) ? htmlspecialchars($_POST['texto2']) : ''; ?>">
                                <div id="error-texto2" class="form-text text-danger" style="visibility: hidden;">El campo de texto no puede estar vacío.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Opción de conversión:<span class="text-danger"> *</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opcion2" value="mayusculas" id="radio-mayus" <?php if(isset($_POST['opcion2']) && $_POST['opcion2'] == 'mayusculas') echo 'checked'; ?>>
                                    <label class="form-check-label" for="radio-mayus">Mostrar en mayúsculas</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opcion2" value="minusculas" id="radio-minus" <?php if(isset($_POST['opcion2']) && $_POST['opcion2'] == 'minusculas') echo 'checked'; ?>>
                                    <label class="form-check-label" for="radio-minus">Mostrar en minúsculas</label>
                                </div>
                                <div id="error-opcion2" class="form-text text-danger" style="visibility: hidden;">Debes seleccionar una opción.</div>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" name="submit2" class="btn btn-dark">Convertir (Versión 2)</button>
                            </div>
                        </form>
                    </div>
                    <?php
                        // Procesamiento para el segundo formulario
                        if (isset($_POST['submit2'])) {
                            $texto2 = trim($_POST['texto2'] ?? '');
                            $opcion2 = $_POST['opcion2'] ?? '';

                            if (!empty($texto2) && !empty($opcion2)) {
                                echo '<div class="card-footer text-center">';
                                if ($opcion2 == 'mayusculas') {
                                    $resultado = strtoupper($texto2);
                                    $etiqueta = 'Mayúsculas';
                                } else {
                                    $resultado = strtolower($texto2);
                                    $etiqueta = 'Minúsculas';
                                }
                                echo '<h5>Resultado (' . $etiqueta . '):</h5>';
                                echo '<h4><span class="badge bg-success fs-4">' . $resultado . '</span></h4>';
                                echo '</div>';
                            }
                        }
                    ?>
                </div> 
            </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio7/GonzalezIsmael37.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="GonzalezIsmael38(2).php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script src="./validacionForm.js"></script>
</body>
</html>