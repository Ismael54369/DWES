<?php
   //Función para comprobar si un número es primo
   function esPrimo($num) {
    $primo = true;
    if ($num == 1) {
        $primo = false;
    } else {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $primo = false;
                break;
            }
        }
    }
    return $primo;
   }

   //Función para obtener todos los números primos hasta un número dado
   function obtenerPrimosHasta($limite) {   
        $primos = [];
        for ($i = 2; $i <= $limite; $i++) {
            if (esPrimo($i)) {
                $primos[] = $i;
            }
        }
        return implode(', ', $primos); //Devuelve los primos como una cadena separada por comas
   }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
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
                        <h1 class="h4 mb-0 text-center">Primos</h1> <!-- Corregido: H1 único -->
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
                            </div>

                            <!-- Botón para enviar el formulario -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Calcular números</button>
                            </div>
                        </form>
                    </div>
                    <!-- Bloque PHP para procesar el formulario y mostrar el resultado -->
                    <?php
                     // Verifica que el formulario se ha enviado y que los campos necesarios no están vacíos
                     if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['num'])) {
                        // Usar filter_input para sanear y validar la entrada numérica
                        $num = filter_input(INPUT_GET, 'num', FILTER_VALIDATE_INT);

                        // Solo procesamos si el número es un entero válido mayor que 1
                        if ($num !== false && $num > 1) {
                            echo '<div class="card-footer bg-light text-dark text-center mt-3">';
                             
                             // 1. Comprobar si el número introducido es primo
                            if (esPrimo($num)) {
                                echo "<h4>El número <span class='fw-bold'>$num</span> <span class='badge bg-success'>es primo</span>.</h4>";
                            } else {
                                echo "<h4>El número <span class='fw-bold'>$num</span> <span class='badge bg-danger'>no es primo</span>.</h4>";
                            }
                           
                             // 2. Mostrar la lista de primos hasta el número introducido
                            echo '<h5 class="mt-3">Números primos hasta ' , $num , ':</h5>';
                            $lista_primos = obtenerPrimosHasta($num);
                            echo "<p class='fs-5'>$lista_primos</p>";

                            echo '</div>';
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
            <a href="../../super-index.html" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio2/GonzalezIsmael32.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
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