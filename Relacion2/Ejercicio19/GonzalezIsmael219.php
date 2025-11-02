<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
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
                    <div class="card-header bg-dark text-white"><h1 class="h4 mb-0 text-center">Conversion a binario, octal y hexadecimal</h1></div>
                    
                    <!-- 'card-body' es el cuerpo principal de la tarjeta, donde va el formulario. -->
                    <div class="card-body">
                        
                        <!-- INICIO DEL FORMULARIO -->
                        <form action="" method="get" onsubmit="return validarForm()">
                            
                            <!-- Campos para el numero decimal -->
                            <div class="mb-3">
                                <label for="num" class="form-label">Numero decimal:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Número entero no negativo" class="form-control" name="num" id="num" oninput="limpiarError('num')" value="<?php echo isset($_GET['num']) ? htmlspecialchars($_GET['num']) : ''; ?>">
                                <div id="numHelp" class="form-text text-danger" style="visibility: hidden;">Debe ser un número entero no negativo.</div>
                                <select name="base" id="base" class="form-select mt-3">
                                    <option value="2" selected>Binario</option>
                                    <option value="8">Octal</option>
                                    <option value="16">Hexadecimal</option>
                                </select>
                            </div>

                            <!-- Botón para enviar el formulario -->
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Convertir</button>
                            </div>
                        </form>
                    </div>
                    <!-- Bloque PHP para procesar el formulario y mostrar el resultado -->
                     <?php
                        // 1. VERIFICACIÓN: Comprueba si el formulario se ha enviado y si los campos necesarios existen y no están vacíos.
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['num'], $_GET['base']) && $_GET['num'] !== '') {
                            
                            // 2. VALIDACIÓN Y SANEAMIENTO:
                            // Se usa filter_input para obtener y validar que el número y la base sean enteros.
                            // Es más seguro que simplemente usar $_GET.
                            $num = filter_input(INPUT_GET, 'num', FILTER_VALIDATE_INT);
                            $base = filter_input(INPUT_GET, 'base', FILTER_VALIDATE_INT);

                            echo '<div class="card-footer bg-light text-dark text-center mt-3">';

                            // Si el número no es un entero válido o es negativo, muestra un error.
                            $num_original = $num; // Guardamos el número original para mostrarlo al final.
                            $resultado = '';

                            // Caso especial: si el número es 0, el resultado es "0".
                            if ($num_original == 0) {
                                $resultado = '0';
                            } else {
                                // 3. PROCESAMIENTO CON MATCH:
                                // La expresión 'match' evalúa el valor de $base.
                                // Cada rama (=>) ejecuta su bloque de código y devuelve el valor final a la variable $resultado.
                                $resultado = match ($base) {
                                    2 => (function() use ($num) {
                                        $res = '';
                                        while ($num > 0) {
                                            $res = ($num % 2) . $res;
                                            $num = (int)($num / 2);
                                        }
                                        return $res;
                                    })(),
                                    8 => (function() use ($num) {
                                        $res = '';
                                        while ($num > 0) {
                                            $res = ($num % 8) . $res;
                                            $num = (int)($num / 8);
                                        }
                                        return $res;
                                    })(),
                                    16 => (function() use ($num) {
                                        $caracteres = '0123456789ABCDEF';
                                        $res = '';
                                        while ($num > 0) {
                                            $res = $caracteres[$num % 16] . $res;
                                            $num = (int)($num / 16);
                                        }
                                        return $res;
                                    })(),
                                };
                            }
                                
                            // 4. SALIDA: Muestra el resultado de forma clara.
                            $nombreBase = match($base) { 2 => 'Binario', 8 => 'Octal', 16 => 'Hexadecimal' };
                            echo "<h5>El número decimal $num_original en $nombreBase es:</h5>";
                            echo '<h4><span class="badge bg-success fs-4">' . $resultado . '</span></h4>';
                            echo '</div>';
                        }
                    ?>
                </div> 
            </div>
        </div>
        <!-- ================================================================= -->
        <!-- NAVEGACIÓN ENTRE EJERCICIOS                                     -->
        <!-- ================================================================= -->
        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio18/GonzalezIsmael218.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.html" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio20/GonzalezIsmael220.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        //Función para validar el formulario
        function validarForm() {
            let esValido = true;
            const numInput = parseInt(document.getElementById('num').value);

            // Validar dividendo
            if (!Number.isInteger(numInput) || numInput < 0) {
                document.getElementById('numHelp').style.visibility = 'visible';
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