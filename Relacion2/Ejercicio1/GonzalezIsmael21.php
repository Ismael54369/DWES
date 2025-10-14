<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Calculadora Básica</h2>
            </div>
            <div class="card-body">
                <form onsubmit="event.preventDefault(); operacion();">
                <form id="calculadoraForm">
                    <div class="mb-3">
                        <label for="num1" class="form-label">Número 1</label>
                        <input type="text" class="form-control" name="num1" id="num1" placeholder="Introduce el primer número">
                    </div>
                    <div class="mb-3">
                        <label for="op" class="form-label">Operación</label>
                        <select name="op" id="op" class="form-select">
                            <option value="suma">+</option>
                            <option value="resta">-</option>
                            <option value="division">/</option>
                            <option value="multiplicacion">*</option>
                            <option value="resto">%</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="num2" class="form-label">Número 2</label>
                        <input type="text" class="form-control" name="num2" id="num2" placeholder="Introduce el segundo número">
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </form>
            </div>
            <div id="resultadoDiv" class="card-footer bg-light">
                <!-- El resultado se mostrará aquí -->
            </div>
        </div>
    </div>

    <script src="resultados.js"></script>
</body>
</html>