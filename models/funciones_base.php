<?php 

function formatRutChile($rut) {
    // Elimina cualquier carácter que no sea número o el guion
    $rut = preg_replace('/[^0-9Kk]/', '', $rut);
    
    if (strlen($rut) == 0) {
        return ''; // Si el RUT es inválido, retorna una cadena vacía
    }
    
    // Divide el RUT en número y dígito verificador
    $rut = strtoupper($rut); // Convierte el dígito verificador a mayúscula
    $rut = str_split($rut);
    
    $num = array_slice($rut, 0, -1);
    $dv = end($rut);
    
    // Formatea el número con puntos como separadores de miles
    $num = number_format(implode('', $num), 0, '', '.');
    
    // Une el número con el dígito verificador y el guion
    $rut = $num . '-' . $dv;
    
    return $rut;
}

function limpiar_rut($rut) {
    // Elimina los puntos y el guion del RUT
    $rut_limpio = str_replace(['.', '-', ' '], '', $rut);
    
    // Extrae solo los números, descartando el dígito verificador
    $rut_limpio = substr($rut_limpio, 0, -1); // Elimina el último carácter (dígito verificador)
    
    return $rut_limpio;
}

function show_var($variable) {
    if (is_null($variable)) $m = 'null';
    else $m = ($variable === false) ? 'false' : print_r($variable, true);
    echo '<pre>'.$m.'</pre>';
}

//pone en mayuscula la primera letra de una plabra
function primeraLetra($cadena) {
    // Palabras que no deben ser capitalizadas
    $excepciones = ['de', 'del', 'la', 'las', 'el', 'los', 'y', 'o', 'en'];

    // Convierte a título, asegurando que la primera letra de cada palabra esté en mayúscula.
    $cadena = mb_convert_case($cadena, MB_CASE_TITLE, "UTF-8");

    // Divide la cadena en palabras
    $palabras = explode(' ', $cadena);

    // Recorre cada palabra
    foreach ($palabras as $key => $palabra) {
        // Si la palabra es una excepción y no es la primera palabra
        if (in_array(mb_strtolower($palabra, 'UTF-8'), $excepciones) && $key != 0) {
            // Convierte la palabra a minúsculas
            $palabras[$key] = mb_strtolower($palabra, 'UTF-8');
        }
    }

    // Reconstruye la cadena
    $cadena = implode(' ', $palabras);

    // Devuelve la cadena con la primera letra de cada palabra en mayúscula
    return $cadena;
}