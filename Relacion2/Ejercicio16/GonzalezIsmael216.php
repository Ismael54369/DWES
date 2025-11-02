<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
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
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0 text-center">Primos y Divisores</h1> <!-- Corregido: H1 único -->
                    </div>
                    
                    <!-- 'card-body' es el cuerpo principal de la tarjeta, donde va el formulario. -->
                    <div class="card-body">
                        
                        <!-- INICIO DEL FORMULARIO -->
                        <!-- method: Cómo se envían los datos (GET los muestra en la URL). -->
                        <!-- onsubmit: Ejecuta una función JavaScript antes de enviar. Si la función devuelve 'false', el envío se cancela. -->
                        <!-- action="" hace que el formulario se envíe a la misma página. -->
                        <form action="" method="get" onsubmit="return validarNum()">
                            
                            <!-- Campo para la Nota Inicial -->
                            <!-- 'mb-3' añade un margen inferior para separar los campos. -->
                            <div class="mb-3">
                                <!-- 'form-label' da estilo a la etiqueta. El 'for' debe coincidir con el 'id' del input. -->
                                <label for="num" class="form-label">Introduce un número:<span class="text-danger"> *</span></label>
                                <!-- 'form-control' da el estilo de Bootstrap al input. -->
                                <!-- 'oninput' ejecuta una función JS cada vez que el usuario escribe algo. -->
                                <!-- El 'value' con PHP hace que el número se mantenga en el campo después de enviar. -->
                                <input type="text" placeholder="Un número entero mayor que 1" class="form-control" name="num" id="num" oninput="limpiarError('num')" value="<?php echo isset($_GET['num']) ? htmlspecialchars($_GET['num']) : ''; ?>">
                                <div id="numHelp" class="form-text text-danger" style="visibility: hidden;">Debes introducir un número entero mayor que 1.</div>

                                <!-- Grupo de Radio Buttons para seleccionar la operación -->
                                <legend class="col-form-label col-sm-6 pt-0 mt-3">Selecciona una operación:</legend>
                                <div class="form-check">
                                    <!-- Radio buttons agrupados con el mismo 'name'. 'checked' marca una opción por defecto. -->
                                    <input class="form-check-input" type="radio" name="operacion" id="primo" value="primo" <?php echo (!isset($_GET['operacion']) || (isset($_GET['operacion']) && $_GET['operacion'] == 'primo')) ? 'checked' : ''; ?>>
                                    <!-- 
                                        Este código PHP decide si el radio button debe aparecer marcado.
                                        Usa un operador ternario (condición ? valor_si_cierto : valor_si_falso).
                                        La condición se cumple en dos casos:
                                        1. `!isset($_GET['operacion'])`: La página se carga por primera vez y no se ha enviado ninguna operación. En este caso, se marca por defecto.
                                        2. `$_GET['operacion'] == 'primo'`: El usuario ya ha enviado el formulario y había seleccionado 'primo'. Así, la opción se mantiene marcada.
                                        Si la condición se cumple, imprime 'checked'; si no, no imprime nada.
                                    -->
                                    <label class="form-check-label" for="primo">Calcular si es primo</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="operacion" id="divisor" value="divisor" <?php echo (isset($_GET['operacion']) && $_GET['operacion'] == 'divisor') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="divisor">Calcular sus divisores</label>
                                </div>
                            </div>

                            <!-- Botón para enviar el formulario -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                            </div>
                        </form>
                    </div>
                    <!-- Bloque PHP para procesar el formulario y mostrar el resultado -->
                     <?php
                     // Verifica que el formulario se ha enviado y que los campos necesarios no están vacíos
                     if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['num']) && !empty($_GET['operacion'])) {
                        $num = htmlspecialchars($_GET['num']);
                        $operacion = htmlspecialchars($_GET['operacion']);
                        
                        switch ($operacion) {
                            case 'primo':
                                $contador = 2;
                                $primo = true;
                                do {
                                    if ($num % $contador == 0) {
                                        $primo = false;
                                    } 
                                    $contador++;
                                } while ($primo && $contador < $num);
                                echo '<div class="card-footer bg-light text-dark text-center mt-3">';
                                if ($primo) {
                                    echo "<h4>El número " , $num , " es primo.</h4>";
                                } else {
                                    echo "<h4>El número " , $num , " no es primo.</h4>";
                                }
                                echo '</div>';
                                break;
                            case 'divisor':
                                echo '<div class="card-footer bg-light text-dark text-center mt-3">';
                                echo "<h4>Los divisores de " . $num . " son:</h4><p>";
                                for ($i=1; $i <= $num ; $i++) { 
                                    if($num % $i == 0) {
                                        echo "<span style='color:green'><b>$i </b></span>";
                                    } else {
                                        echo "<span style='color:gray'><b>$i </b></span>";
                                    }
                                }
                                echo "</p>";
                                echo '</div>';
                                break;
                            default: 
                                // No hacer nada si no se ha seleccionado ninguna operación
                                break;
                        }
                    }
                    ?>
                </div> 
            </div>
        </div>
        <!-- ================================================================= -->
        <!-- NAVEGACIÓN ENTRE EJERCICIOS                                     -->
        <!-- ================================================================= -->
        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio15/GonzalezIsmael215.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.html" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio17/GonzalezIsmael217.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        //Función para validar el formulario
        function validarNum() {
            let esValido = true;
            const numInput = parseInt(document.getElementById('num').value);

            // Validar que el número es un entero no negativo
            if (!Number.isInteger(numInput) || numInput <= 1) {
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