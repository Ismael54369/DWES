/*****************************************************
 * 
 * Validaciones para el formulario del ejercicio 12
 * creado por Pilar González el día ----
 * Versión 1
 * 
 */

function validarFormularioNotas(){

  var notaIni = parseFloat(document.getElementById('notaIni').value);
  var nota1 = parseFloat(document.getElementById('nota1').value);
  var nota2 = parseFloat(document.getElementById('nota2').value);
  var nota3 = parseFloat(document.getElementById('nota3').value);
  // deben ser enteros, numéricos, entre 1 y 10 y tener algo
  var faltas = parseFloat(document.getElementById('faltas').value);
  // igual salvo que puede ser 0
  var nombre = document.getElementById('nombre').value;
  // no debe estar vacío
  var email = document.getElementById('email').value;
  // debe tener el formato de un email

  var correcto = true; // hipótesis inicial

  if ((!Number.isInteger(notaIni))||(notaIni<1)||(notaIni>10)){
    marcaError('notaIni');
    correcto = false;
  }

  if ((!Number.isInteger(nota1))||(nota1<1)||(nota1>10)){
    marcaError('nota1');
    correcto = false;
  }

  if ((!Number.isInteger(nota2))||(nota2<1)||(nota2>10)){
    marcaError('nota2');
    correcto = false;
  }

  if ((!Number.isInteger(nota3))||(nota3<1)||(nota3>10)){
    marcaError('nota3');
    correcto = false;
  }

  if ((!Number.isInteger(faltas))||(nota1<0)){
    marcaError('faltas');
    correcto = false;
  }
   
  // y para nota2 y faltas y ...
  if (nombre.trim()==""){
    marcaError('nombre');
    correcto = false;
  }


  return correcto;
  // si han ido bien todas las comprobaciones,
  // se devuelve al punto de llamada TRUE
  // sino, se devuelve FALSE

}

function marcaError(identificador) {
  document.getElementById(identificador + 'Help').style.visibility = 'visible';
  document.getElementById(identificador).style.border = '1px solid red';
}

function limpiarError(identificador) {
  document.getElementById(identificador + 'Help').style.visibility = 'hidden';
  document.getElementById(identificador).style.border = '1px solid white';
}