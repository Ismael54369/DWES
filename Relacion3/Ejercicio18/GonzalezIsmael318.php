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
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <h1 class="h4 mb-0">Generador de Menús Sugerencia</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="get" onsubmit="return validarForm()">
                            <div class="mb-3">
                                <label for="num_menus" class="form-label">¿Cuántos menús quieres generar?<span class="text-danger"> *</span></label>
                                <input type="number" placeholder="Introduce un número positivo" class="form-control" id="num_menus" name="num_menus" min="1" oninput="limpiarError('num_menus')" value="<?php echo isset($_GET['num_menus']) ? htmlspecialchars($_GET['num_menus']) : ''; ?>">
                                <div id="num_menusHelp" class="form-text text-danger" style="visibility: hidden;">Debes introducir un número entero y positivo.</div>
                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Generar Sugerencias</button>
                            </div>
                        </form>
                    </div>

                    <?php
                    // Verificar que se ha enviado el formulario y el número es válido
                    if (isset($_GET['num_menus'])) {
                        // Validar que la entrada es un número entero y positivo
                        $num_menus = filter_input(INPUT_GET, 'num_menus', FILTER_VALIDATE_INT);

                        if ($num_menus !== false && $num_menus > 0) {
                            // Definición de la carta de platos
                            $menu = [
                                'Entrante' => ['Ensalada César', 'Hummus', 'Boquerones al natural'],
                                'Primero' => ['Gazpachuelo', 'Salmorejo', 'Ajo Blanco'],
                                'Segundo' => ['Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'],
                                'Postre' => ['Helado 3 sabores', 'Flan', 'Tarta de Queso']
                            ];

                            echo '<div class="card-footer">';

                            // Bucle para generar cada menú sugerido
                            for ($i = 1; $i <= $num_menus; $i++) {
                                echo '<div class="card my-3 shadow-sm">';
                                echo '<div class="card-header bg-success text-white">';
                                echo "<h5 class='mb-0'>Menú Sugerencia #$i</h5>";
                                echo '</div>';
                                echo '<ul class="list-group list-group-flush">';

                                // Seleccionar un plato aleatorio de cada categoría
                                foreach ($menu as $categoria => $platos) {
                                    // array_rand devuelve una clave aleatoria del array de platos
                                    $plato_seleccionado = $platos[array_rand($platos)];
                                    echo "<li class='list-group-item'><strong>$categoria:</strong> $plato_seleccionado</li>";
                                }

                                echo '</ul>';
                                echo '</div>';
                            }

                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div> <!-- Cierre del div.row -->

        <!-- Navegación -->
        <div class="mt-4 d-flex justify-content-between mb-5">
            <a href="../Ejercicio17/GonzalezIsmael317.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="../Ejercicio19/GonzalezIsmael319.php" class="btn btn-secondary">Siguiente Ejercicio &raquo;</a>
        </div>
    </main>

    <script>
        function validarForm() {
            const numInput = document.getElementById('num_menus');
            const numValue = parseInt(numInput.value, 10);

            if (isNaN(numValue) || numValue <= 0) {
                document.getElementById('num_menusHelp').style.visibility = 'visible';
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