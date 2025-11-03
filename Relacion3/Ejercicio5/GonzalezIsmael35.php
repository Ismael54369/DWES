<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
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
                        <!-- 'needs-validation' y 'novalidate' activan los estilos de validación de Bootstrap y desactivan los mensajes por defecto del navegador. -->
                        <form action="5calculo-notas.php" method="get" onsubmit="return validarForm()">
                            
                            <!-- Campo para la Nota Inicial -->
                            <!-- 'mb-3' añade un margen inferior para separar los campos. -->
                            <div class="mb-3">
                                <!-- 'form-label' da estilo a la etiqueta. El 'for' debe coincidir con el 'id' del input. -->
                                <label for="notaIni" class="form-label">Introduce evaluación inicial:<span class="text-danger"> *</span></label>
                                <!-- oninput llama a JS para limpiar el error al escribir. -->
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="notaIni" id="notaIni" oninput="limpiarError('notaIni')">
                                <!-- Mensaje de error oculto que se mostrará con JS. -->
                                <div id="notaIniHelp" class="form-text text-danger" style="visibility: hidden;">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>

                            <!-- Campo para la Nota 1 -->
                            <div class="mb-3">
                                <label for="nota1" class="form-label">Introduce primera evaluación:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota1" id="nota1" oninput="limpiarError('nota1')">
                                <div id="nota1Help" class="form-text text-danger" style="visibility: hidden;">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>
                            
                            <!-- Campo para la Nota 2 -->
                            <div class="mb-3">
                                <label for="nota2" class="form-label">Introduce segunda evaluación:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota2" id="nota2" oninput="limpiarError('nota2')">
                                <div id="nota2Help" class="form-text text-danger" style="visibility: hidden;">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>

                            <!-- Campo para la Nota 3 -->
                            <div class="mb-3">
                                <label for="nota3" class="form-label">Introduce tercera evaluación:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero entre 1 y 10" class="form-control" name="nota3" id="nota3" oninput="limpiarError('nota3')">
                                <div id="nota3Help" class="form-text text-danger" style="visibility: hidden;">
                                    La nota debe ser un número entero entre 1 y 10.
                                </div>
                            </div>
                            
                            <!-- Campo para las Faltas -->
                            <div class="mb-3">
                                <label for="faltas" class="form-label">Introduce faltas:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Un número entero de 0 en adelante" class="form-control" name="faltas" id="faltas" oninput="limpiarError('faltas')">
                                <div id="faltasHelp" class="form-text text-danger" style="visibility: hidden;">
                                    Las faltas deben ser un número entero igual o mayor que 0.
                                </div>
                            </div>
                            
                            <!-- Campo para el Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Introduce nombre:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Requerido" class="form-control" name="nombre" id="nombre" oninput="limpiarError('nombre')">
                                <div id="nombreHelp" class="form-text text-danger" style="visibility: hidden;">
                                    El nombre es obligatorio.
                                </div>
                            </div>
                            
                            <!-- Campo para el Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Introduce email:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="ejemplo@correo.com" class="form-control" name="email" id="email" oninput="limpiarError('email')">
                                <div id="emailHelp" class="form-text text-danger" style="visibility: hidden;">
                                    Por favor, introduce un formato de email válido (ej: usuario@dominio.com).
                                </div>
                            </div>

                            <!-- Campo para el Documento de Identidad (DNI, NIE, Pasaporte) -->
                            <div class="mb-3">
                                <label class="form-label">Documento de Identidad:<span class="text-danger"> *</span></label>
                                <div class="input-group">
                                    <select class="form-select" name="tipo_doc" id="tipo_doc" style="max-width: 120px;" required>
                                        <option value="DNI" selected>DNI</option>
                                        <option value="NIE">NIE</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                    <!-- El atributo 'pattern' usa una expresión regular para validar el formato del DNI/NIE. -->
                                    <!-- \d{8}[A-Z] valida 8 dígitos seguidos de una letra mayúscula (DNI). -->
                                    <!-- [XYZ]\d{7}[A-Z] valida una letra (X, Y, Z), 7 dígitos y una letra (NIE). -->
                                    <input type="text" class="form-control" name="num_doc" id="num_doc" placeholder="12345678A" oninput="limpiarError('num_doc')">
                                </div>
                                <div id="num_docHelp" class="form-text text-danger" style="visibility: hidden;">
                                    Introduce un DNI, NIE o Pasaporte con un formato válido.
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
            <a href="../Ejercicio4/GonzalezIsmael34.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio6/GonzalezIsmael36.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
    <!-- Este script es el código estándar de Bootstrap para activar los estilos de validación -->
    <script>
        // --- INICIO: Script para cambiar el placeholder del documento ---
        
        // 1. Seleccionamos los elementos del DOM que vamos a necesitar.
        const tipoDocSelect = document.getElementById('tipo_doc');
        const numDocInput = document.getElementById('num_doc');

        // 2. Creamos un objeto para guardar los placeholders y patrones de cada tipo.
        const docInfo = {
            'DNI': { placeholder: '12345678A', pattern: /^(\d{8}[A-Z])$/i },
            'NIE': { placeholder: 'X1234567A', pattern: /^([XYZ]\d{7}[A-Z])$/i },
            'Pasaporte': { placeholder: 'PA1234567', pattern: /^[A-Za-z0-9]{6,9}$/ }
        };

        // 3. Creamos una función para actualizar el input.
        const actualizarInputDocumento = () => {
            const tipoSeleccionado = tipoDocSelect.value;
            const info = docInfo[tipoSeleccionado];

            if (info) {
                numDocInput.placeholder = info.placeholder;
            }
            limpiarError('num_doc'); // Limpiamos el error al cambiar de tipo
        };

        // 4. Añadimos un 'event listener' que llame a la función cuando el usuario cambie la opción.
        tipoDocSelect.addEventListener('change', actualizarInputDocumento);
        // --- FIN: Script para cambiar el placeholder del documento ---

        // Función para validar el formulario completo
        function validarForm() {
            let esValido = true;

            // Función auxiliar para validar campos numéricos
            const validarCampoNumerico = (id, min, max) => {
                const valor = parseInt(document.getElementById(id).value);
                if (isNaN(valor) || valor < min || valor > max) {
                    document.getElementById(id + 'Help').style.visibility = 'visible';
                    return false;
                }
                return true;
            };

            // Validar notas
            esValido &= validarCampoNumerico('notaIni', 1, 10);
            esValido &= validarCampoNumerico('nota1', 1, 10);
            esValido &= validarCampoNumerico('nota2', 1, 10);
            esValido &= validarCampoNumerico('nota3', 1, 10);
            esValido &= validarCampoNumerico('faltas', 0, Infinity); // Sin límite superior

            // Validar nombre
            if (document.getElementById('nombre').value.trim() === '') {
                document.getElementById('nombreHelp').style.visibility = 'visible';
                esValido = false;
            }

            // Validar email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(document.getElementById('email').value)) {
                document.getElementById('emailHelp').style.visibility = 'visible';
                esValido = false;
            }

            // Validar documento
            const tipoDoc = tipoDocSelect.value;
            const numDoc = numDocInput.value;
            const pattern = docInfo[tipoDoc].pattern;

            if (!pattern.test(numDoc)) {
                document.getElementById('num_docHelp').style.visibility = 'visible';
                esValido = false;
            }

            return !!esValido; // Convierte el resultado a un booleano estricto (true/false)
        }

        function limpiarError(idCampo) {
            document.getElementById(idCampo + 'Help').style.visibility = 'hidden';
        }
    </script>
</body>
</html>