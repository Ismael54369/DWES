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

function validarForm2() {
    let textoInput = document.getElementById('texto2');
    let errorTextoDiv = document.getElementById('error-texto2');
    let radioMayus = document.getElementById('radio-mayus');
    let radioMinus = document.getElementById('radio-minus');
    let errorOpcionDiv = document.getElementById('error-opcion2');
    let esValido = true;

    // Validar campo de texto
    if (textoInput.value.trim() === '') {
        errorTextoDiv.style.visibility = 'visible';
        textoInput.classList.add('is-invalid');
        esValido = false;
    } else {
        errorTextoDiv.style.visibility = 'hidden';
        textoInput.classList.remove('is-invalid');
    }

    // Validar radio buttons
    if (!radioMayus.checked && !radioMinus.checked) {
        errorOpcionDiv.style.visibility = 'visible';
        esValido = false;
        } else {
        errorOpcionDiv.style.visibility = 'hidden';
    }

    return esValido;
}