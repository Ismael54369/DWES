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
            <!-- VERSIÓN 1: CHECKBOXES (OPCIÓN MÚLTIPLE)                         -->
            <!-- ================================================================= -->
            <div class="col-md-8 col-lg-7 mb-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0 text-center">Mayúsculas y/o Minúsculas (Checkboxes)</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="" method="post" onsubmit="return validarForm1()">
                            <div class="mb-3">
                                <label for="texto1" class="form-label">Introduce un texto:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Escribe algo aquí..." class="form-control" name="texto1" id="texto1" value="<?php echo isset($_POST['texto1']) ? htmlspecialchars($_POST['texto1']) : ''; ?>">
                                <div id="error-texto1" class="form-text text-danger" style="visibility: hidden;">El campo de texto no puede estar vacío.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Opciones de conversión:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="opciones[]" value="mayusculas" id="check-mayus" <?php if(isset($_POST['opciones']) && in_array('mayusculas', $_POST['opciones'])) echo 'checked'; ?>>
                                    <label class="form-check-label" for="check-mayus">Mostrar en mayúsculas</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="opciones[]" value="minusculas" id="check-minus" <?php if(isset($_POST['opciones']) && in_array('minusculas', $_POST['opciones'])) echo 'checked'; ?>>
                                    <label class="form-check-label" for="check-minus">Mostrar en minúsculas</label>
                                </div>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" name="submit1" class="btn btn-primary">Convertir (Versión 1)</button>
                            </div>
                        </form>
                    </div>
                    <?php
                        // Procesamiento para el primer formulario
                        if (isset($_POST['submit1'])) {
                            $texto1 = trim($_POST['texto1'] ?? '');
                            $opciones = $_POST['opciones'] ?? [];

                            if (!empty($texto1)) {
                                echo '<div class="card-footer text-center">';
                                echo '<h5>Resultados:</h5>';

                                if (in_array('mayusculas', $opciones)) {
                                    echo '<p class="mb-1"><strong>Mayúsculas:</strong> <span class="text-success">' . strtoupper($texto1) . '</span></p>';
                                }
                                if (in_array('minusculas', $opciones)) {
                                    echo '<p class="mb-1"><strong>Minúsculas:</strong> <span class="text-success">' . strtolower($texto1) . '</span></p>';
                                }
                                if (empty($opciones)) {
                                    echo '<p class="text-muted">No se seleccionó ninguna opción de conversión.</p>';
                                }
                                echo '</div>';
                            }
                        }
                    ?>
                </div> 
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