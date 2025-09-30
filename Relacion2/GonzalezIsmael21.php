<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h2>Calculador basica con 2 numeros y un operador</h2>
    <form action="" method="get">
        <div>
            <label for="num1">Introduce un numero 1</label>
            <input type="text" name="num1" id="num1">
            <p>bada esta malito</p>
        </div>
        <div>
            <select name="op" id="op">
                <option value="suma">+</option>
                <option value="resta">-</option>
                <option value="division">/</option>
                <option value="multiplicacion">*</option>
                <option value="resto">%</option>
            </select>
        </div>
        <div>
            <label for="num2">Introduce un numero 2</label>
            <input type="text" name="num2" id="num2" >
            <p>tonto el que lo lea</p>
        </div>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>