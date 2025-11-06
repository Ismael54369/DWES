<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 mb-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0 text-center">Palabra mas larga</h1>
                    </div>
                
                    <div class="card-body">
                        <form action="" method="post" onsubmit="return validarForm1()">
                            <div class="mb-3">
                                <label for="texto1" class="form-label">Introduce un texto: <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Escribe algo aqui..." class="form-control" name="texto1" id="texto1" value="<?php echo isset($_POST['texto1']) ? htmlspecialchars($_POST['texto1']) : ''; ?>">
                                <div id="error-texto1" class="form-text text-danger" style="visibility: hidden;">El campo de texto no puede estar vacío</div>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Ejecutar</button>
                            </div>
                        </form>
                    </div>

                    <?php
                        //Procesamiento del formulario
                        if(isset($_POST['submit'])) {
                            $texto = trim($_POST['texto1'] ?? '');

                            $palabraLarga = '';
                            $palabras = explode(' ', $texto);
                            
                            foreach ($palabras as $palabra) {
                                if (strlen($palabra) > strlen($palabraLarga)) {
                                    $palabraLarga = $palabra;
                                }
                            }

                            echo '<div class="card-footer text-center">';
                            echo '<h5>La palabra mas larga de la cadena es:</h5>';
                            echo '<p class="mb-1"><strong><span class="text-success">' , $palabraLarga , '</span></strong></p>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio8/GonzalezIsmael38(2).php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio10/GonzalezIsmael310.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        function validarForm1() {
            let textoInput = document.getElementById('texto1');
            let errorDiv = document.getElementById('error-texto1');
            let esValido = true;

            if (textoInput.value.trim() === '') {
                errorDiv.style.visibility = 'visible';
                textoInput.classList.add('is-invalid');
                esValido = false;
            } else {
                errorDiv.style.visibility = 'hidden';
                textoInput.classList.remove('is-invalid');
            }

            return esValido;
        }
    </script>
</body>
</html>