<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
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
                        <h1 class="h4 mb-0 text-center">Cálculo de factorial</h1>
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
                                <label for="num" class="form-label">Introduce un número para calcular su factorial:<span class="text-danger"> *</span></label>
                                <!-- 'form-control' da el estilo de Bootstrap al input. -->
                                <!-- 'oninput' ejecuta una función JS cada vez que el usuario escribe algo. -->
                                <!-- El 'value' con PHP hace que el número se mantenga en el campo después de enviar. -->
                                <input type="text" placeholder="Un número entero no negativo" class="form-control" name="num" id="num" oninput="limpiarError('num')" value="<?php echo isset($_GET['num']) ? htmlspecialchars($_GET['num']) : ''; ?>">
                                <!-- Este 'div' mostrará el mensaje de error. El JS lo hará visible o invisible. -->
                                <div id="numHelp" class="form-text text-danger" style="visibility: hidden;">Debes introducir un número entero no negativo.</div>
                            </div>

                            
                            <!-- Botón para enviar el formulario -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Calcular Factorial</button>
                            </div>
                        </form>
                    </div>
                    <!-- PHP para calcular el factorial si se ha enviado el formulario -->
                     <?php
                     // Verifica que el formulario se ha enviado y que los campos necesarios no están vacíos
                     if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['num'])) {
                        $num = htmlspecialchars($_GET['num']);
                        $factorial = 1;

                        for ($i = $num; $i > 1; $i--) {
                            $factorial *= $i;
                        }
                        echo '<div class="card-footer bg-light text-dark text-center mt-3">';
                        echo '<h4>Factorial de ' . $num . ': <span class="badge bg-primary fs-4">' . number_format($factorial) . '</span></h4>';
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
            <a href="../Ejercicio14/GonzalezIsmael214.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.html" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio16/GonzalezIsmael216.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        //Función para validar el formulario
        function validarNum() {
            let esValido = true;
            const numInput = parseInt(document.getElementById('num').value);

            // Validar que el número es un entero
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