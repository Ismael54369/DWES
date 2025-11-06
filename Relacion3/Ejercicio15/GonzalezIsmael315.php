<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-dark text-white text-center">
                        <h1 class="h4 mb-0">Funciones arrow</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="get" onsubmit="return validarForm()">
                            <div class="mb-3">
                                <label for="radio" class="form-label">Radio:<span class="text-danger"> *</span></label>
                                <input type="number" class="form-control" id="radio" name="radio" min=1 oninput="limpiarError('radio')">
                                <div id="radioHelp" class="form-text text-danger" style="visibility: hidden;">Debes introducir un número entero positivo</div>

                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_GET['radio'])) {
                        $radio = (int)htmlspecialchars($_GET['radio']);

                        $circunferencia = fn($radio) => 2 * pi() * $radio;

                        $area = fn($radio) => pi() * pow($radio, 2);

                        $volumen = fn($radio) => (4/3) * pi() * pow($radio, 3);

                            // Se llama a las funciones y se muestra el resultado formateado con number_format
                            echo '<div class="card-footer">';
                            echo "<div class='alert alert-primary'><strong>Circunferencia:</strong> " , number_format($circunferencia($radio), 2) , "</div>";
                            echo "<div class='alert alert-warning'><strong>Área:</strong> " , number_format($area($radio), 2) , "</div>";
                            echo "<div class='alert alert-success'><strong>Volumen:</strong> " , number_format($volumen($radio), 2) , "</div>";
                            echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="../Ejercicio14/GonzalezIsmael314.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio16/GonzalezIsmael316.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        //Función para validar el formulario
        function validarForm() {
            let esValido = true;
            const radioInput = parseInt(document.getElementById('radio').value);

            // Validar radio
            if (!Number.isInteger(radioInput) || radioInput <= 0) {
                document.getElementById('radioHelp').style.visibility = 'visible';
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