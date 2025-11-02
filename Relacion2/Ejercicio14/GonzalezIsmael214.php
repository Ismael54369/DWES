<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 14</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
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
                        <!-- onsubmit: Ejecuta una función JavaScript antes de enviar. Si la función devuelve 'false', el envío se cancela. -->
                        <form action="14calculo-notas.php" method="get" onsubmit="return validarFormularioNotas()">
                            
                            <!-- Campo para la Nota Inicial -->
                            <!-- 'mb-3' añade un margen inferior para separar los campos. -->
                            <div class="mb-3">
                                <!-- 'form-label' da estilo a la etiqueta. El 'for' debe coincidir con el 'id' del input. -->
                                <label for="notaIni" class="form-label">Introduce evaluación inicial:<span class="text-danger"> *</span></label>
                                <!-- 'form-control' da el estilo de Bootstrap al input. -->
                                <!-- 'onchange' ejecuta una función JS cuando el valor del campo cambia. -->
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="notaIni" id="notaIni" onchange="limpiarError('notaIni')">
                                <!-- Este 'div' mostrará el mensaje de error. El JS lo hará visible o invisible. -->
                                <div id="notaIniHelp" class="form-text text-danger" style="visibility: hidden;">La nota debe ser entera entre 1 y 10</div>
                            </div>

                            <!-- Campo para la Nota 1 -->
                            <div class="mb-3">
                                <label for="nota1" class="form-label">Introduce primera evaluación:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota1" id="nota1" onchange="limpiarError('nota1')">
                                <div id="nota1Help" class="form-text text-danger" style="visibility: hidden;">La nota debe ser entera entre 1 y 10</div>
                            </div>
                            
                            <!-- Campo para la Nota 2 -->
                            <div class="mb-3">
                                <label for="nota2" class="form-label">Introduce segunda evaluación:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota2" id="nota2" onchange="limpiarError('nota2')">
                                <div id="nota2Help" class="form-text text-danger" style="visibility: hidden;">La nota debe ser entera entre 1 y 10</div>
                            </div>

                            <!-- Campo para la Nota 3 -->
                            <div class="mb-3">
                                <label for="nota3" class="form-label">Introduce tercera evaluación:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota3" id="nota3" onchange="limpiarError('nota3')">
                                <div id="nota3Help" class="form-text text-danger" style="visibility: hidden;">La nota debe ser entera entre 1 y 10</div>
                            </div>
                            
                            <!-- Campo para las Faltas -->
                            <div class="mb-3">
                                <label for="faltas" class="form-label">Introduce faltas:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero de 0 en adelante" class="form-control" name="faltas" id="faltas" onchange="limpiarError('faltas')">
                                <div id="faltasHelp" class="form-text text-danger" style="visibility: hidden;">Las faltas deben ser un número entero igual o mayor que 0.</div>
                            </div>
                            
                            <!-- Campo para el Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Introduce nombre:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Requerido" class="form-control" name="nombre" id="nombre" onchange="limpiarError('nombre')">
                                <div id="nombreHelp" class="form-text text-danger" style="visibility: hidden;">El nombre es obligatorio</div>
                            </div>
                            
                            <!-- Campo para el Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Introduce email:</label>
                                <input type="text" placeholder="ejemplo@correo.com" class="form-control" name="email" id="email" onchange="limpiarError(this.id)">
                                <div id="emailHelp" class="form-text text-danger" style="visibility: hidden;">El email no tiene un formato correcto</div>
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
            <a href="../Ejercicio13/GonzalezIsmael213.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.html" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio15/GonzalezIsmael215.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
    <!-- Enlace al archivo JavaScript que contiene las funciones de validación. Se suele poner al final del body. -->
    <script src="../Ejercicio14/validaciones2.js"></script>
</body>
</html>