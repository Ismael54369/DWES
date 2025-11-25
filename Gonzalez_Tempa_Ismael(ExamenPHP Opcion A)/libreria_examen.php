<?php
function distanciaHamming($stringA, $stringB, $caseSensitive = true) {
    $distancia = 0;
    //Validar si las cadenas tienen la misma longitud.
    if (strlen($stringA) !== strlen($stringB)) {
        $distancia =  -1;
    } else {
        //Si la comparación es case-insensitive, convertir ambas cadenas a minúsculas.
        if (!$caseSensitive) {
            $stringA = strtolower($stringA);
            $stringB = strtolower($stringB);
        }

        //Recorrer las cadenas y comparar caracter por caracter.
        for ($i = 0; $i < strlen($stringA); $i++) {
            if (substr($stringA, $i, 1) !== substr($stringB, $i, 1)) {
                $distancia++;
            }
        }
    }

    return $distancia;
}
?>