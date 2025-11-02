<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 12</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light"> <!-- 'bg-light' aplica un color de fondo gris claro a toda la página -->
    
    <!-- ================================================================= -->
    <!-- CONTENIDO PRINCIPAL DEL FORMULARIO                              -->
    <!-- ================================================================= -->
    <!-- 'container' centra y limita el ancho del contenido. 'my-5' añade margen vertical. -->
    <main class="container my-5">
        <!-- 'row' es una fila del sistema de rejilla de Bootstrap. 'justify-content-center' centra la columna horizontalmente. -->
        <div class="row justify-content-center">
            <!-- 'col-md-8' y 'col-lg-6' definen el ancho de la columna en diferentes tamaños de pantalla (8 de 12 en medianas, 6 de 12 en grandes) -->
            <div class="col-md-8 col-lg-6">
                
                <!-- 'card' es un contenedor con bordes y relleno. 'shadow-sm' añade una sombra sutil. -->
                <div class="card shadow-sm">
                    <!-- 'card-header' es la cabecera de la tarjeta. 'bg-primary' y 'text-white' le dan fondo azul y texto blanco. -->
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0 text-center">Cálculo de Notas</h1>
                    </div>
                    <!-- 'card-body' es el cuerpo principal de la tarjeta, donde va el formulario. -->
                    <div class="card-body">
                        
                        <!-- INICIO DEL FORMULARIO -->
                        <!-- action: A qué archivo se envían los datos. -->
                        <!-- method: Cómo se envían los datos (GET los muestra en la URL). -->
                        <!-- 'needs-validation' y 'novalidate' activan los estilos de validación de Bootstrap y desactivan los mensajes por defecto del navegador. -->
                        <form action="12calculo-notas.php" method="get" class="needs-validation" novalidate>
                            
                            <!-- Campo para la Nota Inicial -->
                            <!-- 'mb-3' añade un margen inferior para separar los campos. -->
                            <div class="mb-3">
                                <!-- 'form-label' da estilo a la etiqueta. El 'for' debe coincidir con el 'id' del input. -->
                                <label for="notaIni" class="form-label">Introduce evaluación inicial:<span class="text-danger"> *</span></label>
                                <!-- Atributos de validación HTML5: -->
                                <!-- type="number": Solo permite números. -->
                                <!-- required: El campo es obligatorio. -->
                                <!-- min/max: Define el rango de valores permitidos. -->
                                <input type="number" placeholder="Un número entero entre 1 y 10" class="form-control" name="notaIni" id="notaIni" required min="1" max="10">
                                <!-- 'invalid-feedback' es un mensaje de Bootstrap que solo aparece si la validación falla. -->
                                <div class="invalid-feedback">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>

                            <!-- Campo para la Nota 1 -->
                            <div class="mb-3">
                                <label for="nota1" class="form-label">Introduce primera evaluación:<span class="text-danger"> *</span></label>
                                <input type="number" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota1" id="nota1" required min="1" max="10">
                                <div class="invalid-feedback">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>
                            
                            <!-- Campo para la Nota 2 -->
                            <div class="mb-3">
                                <label for="nota2" class="form-label">Introduce segunda evaluación:<span class="text-danger"> *</span></label>
                                <input type="number" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota2" id="nota2" required min="1" max="10">
                                <div class="invalid-feedback">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>

                            <!-- Campo para la Nota 3 -->
                            <div class="mb-3">
                                <label for="nota3" class="form-label">Introduce tercera evaluación:<span class="text-danger"> *</span></label>
                                <input type="number" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota3" id="nota3" required min="1" max="10">
                                <div class="invalid-feedback">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>
                            
                            <!-- Campo para las Faltas -->
                            <div class="mb-3">
                                <label for="faltas" class="form-label">Introduce faltas:<span class="text-danger"> *</span></label>
                                <input type="number" placeholder="Un número entero de 0 en adelante" class="form-control" name="faltas" id="faltas" required min="0">
                                <div class="invalid-feedback">
                                    Las faltas deben ser un número entero igual o mayor que 0.
                                </div>
                            </div>
                            
                            <!-- Campo para el Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Introduce nombre:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Requerido" class="form-control" name="nombre" id="nombre" required>
                                <div class="invalid-feedback">
                                    El nombre es obligatorio.
                                </div>
                            </div>
                            
                            <!-- Campo para el Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Introduce email:</label>
                                <!-- type="email" valida que el texto tenga formato de email. No es 'required', por lo que es opcional. -->
                                <input type="email" placeholder="ejemplo@correo.com" class="form-control" name="email" id="email">
                                <div class="invalid-feedback">
                                    Por favor, introduce un formato de email válido (ej: usuario@dominio.com).
                                </div>
                            </div>
                            
                            <!-- Botón de envío del formulario -->
                            <input type="submit" class="btn btn-primary w-100" value="Calcular Nota">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================================================================= -->
        <!-- NAVEGACIÓN ENTRE EJERCICIOS                                     -->
        <!-- ================================================================= -->
        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio11/GonzalezIsmael211.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.html" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio 13/GonzalezIsmael213.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
    <!-- Este script es el código estándar de Bootstrap para activar los estilos de validación -->
    <script>
        // IIFE (Immediately Invoked Function Expression) para no contaminar el scope global
        (() => {
            'use strict'

            // Seleccionamos todos los formularios con la clase 'needs-validation'
            const forms = document.querySelectorAll('.needs-validation')

            // Iteramos sobre ellos y prevenimos el envío si no son válidos
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>