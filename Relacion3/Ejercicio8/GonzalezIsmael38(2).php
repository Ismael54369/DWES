<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <!-- Enlace al CSS de Bootstrap para estilos rápidos y responsivos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- 'container' centra el contenido y 'my-5' añade margen vertical -->
    <main class="container my-5">
        <!-- 'row' y 'justify-content-center' para centrar la columna en la fila -->
        <div class="row justify-content-center">
            <!-- ================================================================= -->
            <!-- VERSIÓN 2: RADIO BUTTONS (OPCIÓN EXCLUYENTE)                    -->
            <!-- ================================================================= -->
            <!-- La columna ocupará 8/12 en pantallas medianas y 7/12 en grandes para mejor legibilidad -->
            <div class="col-md-8 col-lg-7">
                <!-- 'card' es un contenedor con bordes y relleno. 'shadow-sm' añade una sombra sutil. -->
                <div class="card shadow-sm">
                    <!-- 'card-header' es la cabecera de la tarjeta. 'bg-dark' y 'text-white' le dan fondo oscuro y texto blanco. -->
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0 text-center">Mayúsculas o Minúsculas (Radio Buttons)</h1>
                    </div>
                    
                    <!-- 'card-body' es el cuerpo principal de la tarjeta, donde va el formulario. -->
                    <div class="card-body">
                        <!-- INICIO DEL FORMULARIO -->
                        <!-- action="": El formulario se envía a la misma página. -->
                        <!-- method="post": Los datos se envían de forma oculta en el cuerpo de la petición HTTP. -->
                        <!-- onsubmit="return validarForm2()": Antes de enviar, se ejecuta la función JS 'validarForm2'. Si devuelve 'false', el envío se cancela. -->
                        <form action="" method="post" onsubmit="return validarForm2()">
                            <!-- Campo para el texto -->
                            <div class="mb-3">
                                <label for="texto2" class="form-label">Introduce un texto:<span class="text-danger"> *</span></label>
                                <!-- El código PHP dentro del 'value' sirve para que el texto introducido no se borre si el formulario se recarga (por ejemplo, tras un error). -->
                                <!-- htmlspecialchars() es una medida de seguridad para evitar que se inyecte código HTML/JS (ataques XSS). -->
                                <input type="text" placeholder="Escribe algo aquí..." class="form-control" name="texto2" id="texto2" value="<?php echo isset($_POST['texto2']) ? htmlspecialchars($_POST['texto2']) : ''; ?>">
                                <!-- Este div mostrará un mensaje de error si el campo de texto está vacío. Inicialmente está oculto. -->
                                <div id="error-texto2" class="form-text text-danger" style="visibility: hidden;">El campo de texto no puede estar vacío.</div>
                            </div>

                            <!-- Grupo de Radio Buttons -->
                            <div class="mb-3">
                                <label class="form-label">Opción de conversión:<span class="text-danger"> *</span></label>
                                <div class="form-check">
                                    <!-- Ambos radio buttons tienen el mismo 'name' ("opcion2"). Esto es lo que hace que solo se pueda seleccionar uno de ellos. -->
                                    <!-- El código PHP en 'checked' sirve para que la opción seleccionada permanezca marcada después de enviar el formulario. -->
                                    <input class="form-check-input" type="radio" name="opcion2" value="mayusculas" id="radio-mayus" <?php if(isset($_POST['opcion2']) && $_POST['opcion2'] == 'mayusculas') echo 'checked'; ?>>
                                    <label class="form-check-label" for="radio-mayus">Mostrar en mayúsculas</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opcion2" value="minusculas" id="radio-minus" <?php if(isset($_POST['opcion2']) && $_POST['opcion2'] == 'minusculas') echo 'checked'; ?>>
                                    <label class="form-check-label" for="radio-minus">Mostrar en minúsculas</label>
                                </div>
                                <!-- Este div mostrará un mensaje de error si no se selecciona ninguna opción. Inicialmente está oculto. -->
                                <div id="error-opcion2" class="form-text text-danger" style="visibility: hidden;">Debes seleccionar una opción.</div>
                            </div>

                            <!-- Botón para enviar el formulario -->
                            <div class="d-grid mt-3">
                                <!-- El 'name' en el botón de submit nos permite saber en PHP qué formulario se ha enviado. -->
                                <button type="submit" name="submit2" class="btn btn-dark">Convertir (Versión 2)</button>
                            </div>
                        </form>
                    </div>
                    <?php
                        // Este bloque PHP solo se ejecuta si el formulario ha sido enviado.
                        // Se comprueba si existe la variable $_POST['submit2'], que corresponde al 'name' del botón de envío.
                        if (isset($_POST['submit2'])) {
                            // 1. RECOGER Y LIMPIAR DATOS
                            // Se recoge el valor del campo 'texto2'. trim() elimina espacios en blanco al principio y al final.
                            // El operador '??' (null coalescing) es un atajo para isset(). Si $_POST['texto2'] no existe, asigna una cadena vacía '' para evitar errores.
                            $texto2 = trim($_POST['texto2'] ?? '');
                            $opcion2 = $_POST['opcion2'] ?? '';

                            // 2. VALIDAR DATOS EN EL SERVIDOR
                            // Se comprueba que tanto el texto como la opción no estén vacíos.
                            // Esta es una validación del lado del servidor, un complemento a la validación de JavaScript.
                            if (!empty($texto2) && !empty($opcion2)) {
                                // 3. PROCESAR Y MOSTRAR RESULTADO
                                // Si los datos son válidos, se crea el pie de la tarjeta para mostrar el resultado.
                                echo '<div class="card-footer text-center">';
                                echo '<h5>Resultados:</h5>';

                                // Se comprueba qué opción se eligió.
                                if ($opcion2 == 'mayusculas') {
                                    echo '<p class="mb-1"><strong>Mayúsculas:</strong> <span class="text-success">' , strtoupper($texto2) , '</span></p>';
                                } else {
                                    echo '<p class="mb-1"><strong>Minúsculas:</strong> <span class="text-success">' , strtolower($texto2) , '</span></p>';
                                }
                                echo '</div>';
                            }
                        }
                    ?>
                </div> 
            </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="GonzalezIsmael38(1).php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio9/GonzalezIsmael29.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script src="./validacionForm.js"></script>
</body>
</html>