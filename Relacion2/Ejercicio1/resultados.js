function operacion() {
    var num1 = parseFloat(document.getElementById('num1').value);
    var num2 = parseFloat(document.getElementById('num2').value);
    var op = document.getElementById('op').value;
    var resultado;
    var resultadoDiv = document.getElementById('resultadoDiv');

    // Limpiar resultado anterior
    resultadoDiv.innerHTML = '';

    if (isNaN(num1) || isNaN(num2)) {
        resultadoDiv.innerHTML = '<div class="alert alert-danger">Por favor, introduce números válidos.</div>';
        return;
    }

    switch (op) {
        case 'suma':
            resultado = num1 + num2;
            break;

        case 'resta':
            resultado = num1 - num2;
            break;

        case 'division':
            if (num2 === 0) {
                resultadoDiv.innerHTML = '<div class="alert alert-danger">No se puede dividir por cero.</div>';
                return;
            }
            resultado = num1 / num2;
            break;

        case 'multiplicacion':
            resultado = num1 * num2;
            break;

        case 'resto':
            resultado = num1 % num2;
            break;

        default:
            break;
    }

    resultadoDiv.innerHTML = '<h4>Resultado: <span class="badge bg-success">' + resultado.toFixed(2) + '</span></h4>';
}