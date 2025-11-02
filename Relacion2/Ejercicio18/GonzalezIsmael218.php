<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
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
                    <div class="card-header bg-dark text-white"><h1 class="h4 mb-0 text-center">Conversion a binario</h1></div>
                    
                    <!-- 'card-body' es el cuerpo principal de la tarjeta, donde va el formulario. -->
                    <div class="card-body">
                        
                        <!-- INICIO DEL FORMULARIO -->
                        <form action="" method="get" onsubmit="return validarForm()">
                            
                            <!-- Campos para el numero decimal -->
                            <div class="mb-3">
                                <label for="num" class="form-label">Numero decimal:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Número entero no negativo" class="form-control" name="num" id="num" oninput="limpiarError('num')" value="<?php echo isset($_GET['num']) ? htmlspecialchars($_GET['num']) : ''; ?>">
                                <div id="numHelp" class="form-text text-danger" style="visibility: hidden;">Debe ser un número entero no negativo.</div>
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
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['num']) && $_GET['num'] !== '') {
                            
                            // Saneamos y validamos las entradas del servidor.
                            /*
                                filter_input() es una función de PHP para obtener y validar/sanear datos externos de forma segura.
                                Es la forma recomendada de manejar datos que vienen de un formulario.

                                Argumentos que recibe:
                                1. INPUT_GET: Indica que el dato viene de la URL (método GET).
                                2. 'num': Es el nombre del campo (name="num") que queremos obtener.
                                3. FILTER_VALIDATE_INT: Es el filtro que se aplica. Este filtro comprueba si el valor es un número entero válido.

                                ¿Qué devuelve?
                                - Si 'num' existe en la URL y es un entero, la función devuelve ese número entero.
                                - Si 'num' no existe o no es un entero (p.ej. "hola"), la función devuelve 'false'.
                            */
                            $num = filter_input(INPUT_GET, 'num', FILTER_VALIDATE_INT);

                            echo '<div class="card-footer bg-light text-dark text-center mt-3">';

                            echo '<h5>El numero decimal ' , $num , ' en binario es: </h5>';

                            $binario = "";
                            while ($num > 0) {
                                $binario = ($num % 2) . $binario;
                                $num = (int)($num / 2);
                            }

                            echo '<h4><span class="badge bg-success fs-4">' , $binario , '</span></h4>';
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
            <a href="../Ejercicio17/GonzalezIsmael217.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.html" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio19/GonzalezIsmael219.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
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