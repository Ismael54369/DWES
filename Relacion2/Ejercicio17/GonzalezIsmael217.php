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
    <!-- 'container' centra y limita el ancho del contenido. 'my-5' añade margen vertical. -->
    <main class="container my-5">
        <!-- 'row' es una fila del sistema de rejilla de Bootstrap. 'justify-content-center' centra la columna horizontalmente. -->
        <div class="row justify-content-center">
            <!-- 'col-md-8' y 'col-lg-6' definen el ancho de la columna en diferentes tamaños de pantalla (8 de 12 en medianas, 6 de 12 en grandes) -->
            <div class="col-md-8 col-lg-6">
                
                <!-- 'card' es un contenedor con bordes y relleno. 'shadow-sm' añade una sombra sutil. -->
                <div class="card shadow-sm">
                    <!-- 'card-header' es la cabecera de la tarjeta. 'bg-primary' y 'text-white' le dan fondo azul y texto blanco. -->
                    <div class="card-header bg-dark text-white"><h1 class="h4 mb-0 text-center">División por Restas Sucesivas</h1></div>
                    
                    <!-- 'card-body' es el cuerpo principal de la tarjeta, donde va el formulario. -->
                    <div class="card-body">
                        
                        <!-- INICIO DEL FORMULARIO -->
                        <form action="" method="get" onsubmit="return validarForm()">
                            
                            <!-- Campos para Dividendo y Divisor -->
                            <div class="mb-3">
                                <label for="dividendo" class="form-label">Dividendo:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Número entero no negativo" class="form-control" name="dividendo" id="dividendo" oninput="limpiarError('dividendo')" value="<?php echo isset($_GET['dividendo']) ? htmlspecialchars($_GET['dividendo']) : ''; ?>">
                                <div id="dividendoHelp" class="form-text text-danger" style="visibility: hidden;">Debe ser un número entero no negativo.</div>
                            </div>
                            <div class="mb-3">
                                <label for="divisor" class="form-label">Divisor:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Número entero positivo (no cero)" class="form-control" name="divisor" id="divisor" oninput="limpiarError('divisor')" value="<?php echo isset($_GET['divisor']) ? htmlspecialchars($_GET['divisor']) : ''; ?>">
                                <div id="divisorHelp" class="form-text text-danger" style="visibility: hidden;">Debe ser un número entero positivo (distinto de cero).</div>
                            </div>

                            <!-- Grupo de Checkboxes para seleccionar la operación -->
                            <legend class="col-form-label col-sm-6 pt-0 mt-3">Mostrar resultados:</legend>
                            <div class="form-check">
                                <!-- El name="operacion[]" permite recibir múltiples valores en un array PHP. -->
                                <!-- La comprobación con in_array mantiene el estado del checkbox después de enviar. -->
                                <input class="form-check-input" type="checkbox" name="operacion[]" id="cociente" value="cociente" <?php echo (isset($_GET['operacion']) && in_array('cociente', $_GET['operacion'])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="cociente">Calcular Cociente</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="operacion[]" id="resto" value="resto" <?php echo (isset($_GET['operacion']) && in_array('resto', $_GET['operacion'])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="resto">Calcular Resto</label>
                            </div>

                            <!-- Botón para enviar el formulario -->
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                            </div>
                        </form>
                    </div>
                    <!-- Bloque PHP para procesar el formulario y mostrar el resultado -->
                     <?php
                        // Verifica que el formulario se ha enviado y que los campos necesarios no están vacíos
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['dividendo'], $_GET['divisor'], $_GET['operacion'])) {
                            
                            // Saneamos y validamos las entradas del servidor.
                            /*
                                filter_input() es una función de PHP para obtener y validar/sanear datos externos de forma segura.
                                Es la forma recomendada de manejar datos que vienen de un formulario.

                                Argumentos que recibe:
                                1. INPUT_GET: Indica que el dato viene de la URL (método GET).
                                2. 'dividendo': Es el nombre del campo (name="dividendo") que queremos obtener.
                                3. FILTER_VALIDATE_INT: Es el filtro que se aplica. Este filtro comprueba si el valor es un número entero válido.

                                ¿Qué devuelve?
                                - Si 'dividendo' existe en la URL y es un entero, la función devuelve ese número entero.
                                - Si 'dividendo' no existe o no es un entero (p.ej. "hola"), la función devuelve 'false'.
                            */
                            $dividendo = filter_input(INPUT_GET, 'dividendo', FILTER_VALIDATE_INT);
                            $divisor = filter_input(INPUT_GET, 'divisor', FILTER_VALIDATE_INT);
                            $operaciones = (array) $_GET['operacion']; // Aseguramos que sea un array

                            echo '<div class="card-footer bg-light text-dark text-center mt-3">';

                            // Algoritmo de división por restas sucesivas
                            $cociente = 0;
                            $resto_actual = $dividendo;
                            while ($resto_actual >= $divisor) {
                                $resto_actual -= $divisor;
                                $cociente++;
                            }
                                
                            echo "<h5>Resultados para: $dividendo / $divisor</h5>";

                            // Mostramos el cociente si se seleccionó
                            if (in_array('cociente', $operaciones)) {
                                echo '<h4>Cociente: <span class="badge bg-success fs-4">' , $cociente , '</span></h4>';
                            }

                            // Mostramos el resto si se seleccionó
                            if (in_array('resto', $operaciones)) {
                                echo '<h4>Resto: <span class="badge bg-warning fs-4">' , $resto_actual , '</span></h4>';
                            }
                        }

                        echo '</div>';
                    ?>
                </div> 
            </div>
        </div>
        <!-- ================================================================= -->
        <!-- NAVEGACIÓN ENTRE EJERCICIOS                                     -->
        <!-- ================================================================= -->
        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio16/GonzalezIsmael216.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.html" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio18/GonzalezIsmael218.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        //Función para validar el formulario
        function validarForm() {
            let esValido = true;
            const dividendoInput = parseInt(document.getElementById('dividendo').value);
            const divisorInput = parseInt(document.getElementById('divisor').value);

            // Validar dividendo
            if (!Number.isInteger(dividendoInput) || dividendoInput < 0) {
                document.getElementById('dividendoHelp').style.visibility = 'visible';
                esValido = false;
            }

            // Validar divisor
            if (!Number.isInteger(divisorInput) || divisorInput <= 0) {
                document.getElementById('divisorHelp').style.visibility = 'visible';
                esValido = false;
            }

            // Validar que al menos un checkbox esté marcado
            if (!document.querySelector('input[name="operacion[]"]:checked')) {
                alert('Por favor, selecciona al menos una operación para calcular (Cociente o Resto).');
                esValido = false;
            }

            return esValido;
        }

        //Función para limpiar el mensaje de error al cambiar el valor del campo
        function limpiarError(idCampo) {
            document.getElementById(idCampo + 'Help').style.visibility = 'hidden';
        }
    </script>
    
</body>
</html>