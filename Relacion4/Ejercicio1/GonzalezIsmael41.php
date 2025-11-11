<?php
    // Solo procesamos si se ha enviado el formulario (método POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        function compruebaAcceso($id, $pass)
    {
        define("USUARIO_CORRECTO", "Ali Baba");
        define("PASS_CORRECTA", "1234");
        return ($id == USUARIO_CORRECTO && $pass == PASS_CORRECTA);
    }

    // Usamos el operador de fusión de null para evitar errores si no existen
    $idUsuario = $_POST['idUsuario'] ?? '';
    $contrasenia = $_POST['contraseña'] ?? '';

                        
    if (compruebaAcceso($idUsuario, $contrasenia)) {
        // La cookie se enviará al navegador, pero no estará disponible en $_COOKIE hasta la próxima petición.
        setcookie("usuario", $idUsuario); // Se activa una cookie para siempre
        if (isset($_COOKIE['usuario'])) {
            echo '¡Bienvenido, ' . $_COOKIE['usuario'] . '! Has iniciado sesión correctamente.';
        }
        $_SESSION['usuario'] = $idUsuario; // Se crea la variable de sesion
        echo "Tu eres " . $_SESSION['usuario'] . " según tu variable de sesión";
        } else {
        $_SESSION['error'] = true;
        header("Location: index.php");
    }                    
}
?>
