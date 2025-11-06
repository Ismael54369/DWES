<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19 - Carta de Platos 2</title>
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

                            // Array asociativo con las URLs de las imágenes para los primeros platos
                            $imagenes_primeros = [
                                'Gazpachuelo' => '../img/gazpachuelo.jpg',
                                'Salmorejo' => '../img/salmorejo.jpg',
                                'Ajo Blanco' => '../img/ajoblanco.jpg'
                            ];

                            echo '<div class="card-footer">';

                            // Bucle para generar cada menú sugerido
                            for ($i = 1; $i <= $num_menus; $i++) {
                                $imagen_menu = null; // Variable para guardar la URL de la imagen del primer plato
                                $menu_generado = []; // Array para guardar los platos del menú

                                // Primero, generamos todos los platos del menú
                                foreach ($menu as $categoria => $platos) {
                                    // Creamos un array ponderado para la selección
                                    $platos_ponderados = $platos;
                                    // Si existe una tercera opción (índice 2), la añadimos de nuevo para duplicar su probabilidad
                                    if (isset($platos[2])) {
                                        $platos_ponderados[] = $platos[2];
                                    }
                                    
                                    // Seleccionamos un plato aleatorio del array ponderado
                                    $plato_seleccionado = $platos_ponderados[array_rand($platos_ponderados)];
                                    $menu_generado[$categoria] = $plato_seleccionado;

                                    // Si la categoría es 'Primero', guardamos su imagen si existe
                                    if ($categoria === 'Primero' && isset($imagenes_primeros[$plato_seleccionado])) {
                                        $imagen_menu = $imagenes_primeros[$plato_seleccionado];
                                    }
                                }

                                // Ahora, mostramos la tarjeta del menú
                                echo '<div class="card my-3 shadow-sm">';
                                // Si hay una imagen para el primer plato, la mostramos
                                if ($imagen_menu) {
                                    echo "<img src='{$imagen_menu}' class='card-img-top' alt='Imagen de {$menu_generado['Primero']}' style='height: 250px; object-fit: cover;'>";
                                }
                                echo '<div class="card-header bg-success text-white">';
                                echo "<h5 class='mb-0'>Menú Sugerencia #$i</h5>";
                                echo '</div>';
                                echo '<ul class="list-group list-group-flush">';
                                // Mostramos los platos que hemos generado
                                foreach ($menu_generado as $categoria => $plato) {
                                    echo "<li class='list-group-item'><strong>$categoria:</strong> $plato</li>";
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
            <a href="../Ejercicio18/GonzalezIsmael318.php" class="btn btn-secondary">&laquo; Ejercicio Anterior</a>
            <a href="../index.htm" class="btn btn-primary">Volver al Index</a>
            <a href="#" class="btn btn-secondary disabled">Siguiente Ejercicio &raquo;</a>
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