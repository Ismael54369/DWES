<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h1 class="h4 mb-0">Funciones String</h1>
                    </div>

                    <div class="card-body">
                        <form action="" method="get" onsubmit="return validarCadena()">
                            <!-- Campo para la cadena -->
                            <div class="mb-3">
                                <label for="cadena" class="form-label">Introduce una cadena de caracteres:<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Escribe algo aquí..." class="form-control" name="cadena" id="cadena" oninput="limpiarError('cadena')" value="<?php echo isset($_GET['cadena']) ? htmlspecialchars($_GET['cadena']) : ''; ?>">
                                <div id="cadenaHelp" class="form-text text-danger" style="visibility: hidden;">El campo no puede estar vacío.</div>
                            </div>

                            
                            <!-- Botón para enviar el formulario -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Procesar Cadena</button>
                            </div>
                        </form>
                    </div>

                    <?php
                    // Verificar que se ha enviado el formulario y la cadena no está vacía
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty(trim($_GET['cadena'] ?? ''))) {
                        // 1. Recoger y sanear la cadena
                        $cadena = htmlspecialchars(trim($_GET['cadena']));

                        echo '<div class="card-footer">';

                        // 2. Cadena al revés y palíndromo
                        $cadenaReves = strrev($cadena);
                        // Para comprobar si es palíndromo, quitamos espacios y pasamos a minúsculas
                        $cadenaNormalizada = strtolower(str_replace(' ', '', $cadena));
                        $esPalindromo = ($cadenaNormalizada == strrev($cadenaNormalizada));
                        $textoPalindromo = $esPalindromo ? '<span class="badge bg-success">Es palíndroma</span>' : '<span class="badge bg-danger">No es palíndroma</span>';
                        echo "<div class='alert alert-info'><strong>Cadena del revés:</strong> \"$cadenaReves\". $textoPalindromo</div>";

                        // 3. Palabras al revés
                        $palabras = explode(' ', $cadena);
                        $palabrasReves = implode(' ', array_reverse($palabras));
                        echo "<div class='alert alert-info'><strong>Palabras del revés:</strong> \"$palabrasReves\"</div>";

                        // 4. Mayúsculas y minúsculas
                        echo "<div class='alert alert-secondary'><strong>Mayúsculas:</strong> " , strtoupper($cadena) , "<br><strong>Minúsculas:</strong> " , strtolower($cadena) , "</div>";

                        // 5. Recuento de caracteres y palabras
                        $numCaracteres = strlen($cadena);
                        $numPalabras = str_word_count($cadena);
                        echo "<div class='alert alert-warning'>La cadena tiene <strong>$numCaracteres</strong> caracteres y <strong>$numPalabras</strong> palabras.</div>";

                        // 6. Cifrado (como curiosidad)
                        // Para crypt, se necesita un "salt". Usaremos uno simple para el ejemplo.
                        $salt = 'dw';
                        echo "<div class='alert alert-dark'>
                                <strong>Cifrados (curiosidad):</strong>
                                <ul class='list-unstyled mb-0 mt-2'>
                                    <li><small><strong>crypt:</strong> " . crypt($cadena, $salt) . "</small></li>
                                    <li><small><strong>md5:</strong> " . md5($cadena) . "</small></li>
                                    <li><small><strong>sha1:</strong> " . sha1($cadena) . "</small></li>
                                </ul>
                              </div>";

                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio12/GonzalezIsmael312.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio14/GonzalezIsmael314.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>
    <script>
        function validarCadena() {
            const cadenaInput = document.getElementById('cadena').value;
            if (cadenaInput.trim() === '') {
                document.getElementById('cadenaHelp').style.visibility = 'visible';
                return false;
            }
            return true;
        }

        function limpiarError(idCampo) {
            document.getElementById(idCampo + 'Help').style.visibility = 'hidden';
        }
    </script>
</body>
</html>