<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probando cookies y variables de sesión</title>
    <link rel="shortcut icon" href="../../logo.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0 text-center">Inicio de Sesión</h1>
                    </div>
                    <div class="card-body">
                        <form action="GonzalezIsmael41.php" method="POST">
                            <div class="mb-3">
                                <label for="idUsuario" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" id="idUsuario" name="idUsuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<div class="card-footer text-center">';
                        echo '<div class="alert alert-danger">Usuario o contraseña incorrectos.</div>';
                        echo '</div>';
                        unset($_SESSION['error']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>