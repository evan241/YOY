<?php

/** 
 *      Aqui podemos crear funciones para validar el input del usuario, 
 *      utilizamos el nombre de la funcion dentro de set_rule:
 * 
 *      $this->form_validation->set_rule('nombre', 'Nombre', 'noDigits');
*/
function noAlpha($text) {
    return !preg_match("/.*?[a-zA-Z]/", $text);
}

function noDigits($text) {
    return !preg_match("/.*?[0-9]/", $text);
}