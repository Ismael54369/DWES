<?php
function divisionEuclides($dividendo, $divisor) {
    // Caso base: si el divisor es mayor que el dividendo,
    // el cociente es 0 y el resto es el propio dividendo.
    if ($dividendo < $divisor) {
        return [0, $dividendo];
    }
    // Llamada recursiva: restamos el divisor al dividendo
    // y llamamos a la función de nuevo.
    list($cociente, $resto) = divisionEuclides($dividendo - $divisor, $divisor);
    return [$cociente + 1, $resto];
}

function mcdEuclides($num1, $num2) {
    if ($num2 == 0) {
        return $num1;
    }
return mcdEuclides($num2, $num1 % $num2);
}

function factorial($num) { 
    if ($num == 0 || $num == 1) {
        return 1;
    }

    return $num * factorial($num - 1);
}

//Función para comprobar si un número es primo
   function esPrimo($num) {
    $primo = true;
    if ($num == 1) {
        $primo = false;
    } else {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $primo = false;
                break;
            }
        }
    }
    return $primo;
   }

   //Funcion para comprobar si un número es par
    function esPar($num) {
          return $num % 2 == 0;
    }

    //Funcion para comprobar si un número es impar
    function esImpar($num) {
          return $num % 2 != 0;
    }

    //Funcion para comprobar si un número es multiplo de 3
    function esMultiploDe3($num) {
          return $num % 3 == 0;
    }

    //Multiplo de 5
    function esMultiploDe5($num) {
          return $num % 5 == 0;
    }

    //Cuadrado de un número
    function cuadrado($num) {
          return pow($num, 2);
    }

   //Función para obtener todos los números primos hasta un número dado
   function obtenerPrimosHasta($limite) {   
        $primos = [];
        for ($i = 2; $i <= $limite; $i++) {
            if (esPrimo($i)) {
                $primos[] = $i;
            }
        }
        return implode(', ', $primos); //Devuelve los primos como una cadena separada por comas
   }

   //Funcion swap para intercambiar valores de dos variables
   function swap($a, $b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
    return [$a, $b];
   }

   //Funcion para invertir orden de los componentes de un array
   function invertirArray($array) {
    $longitud = count($array);
    for ($i = 0; $i < floor($longitud / 2); $i++) {
        list($array[$i], $array[$longitud - $i - 1]) = swap($array[$i], $array[$longitud - $i - 1]);
    }
    return $array;
   }
?>