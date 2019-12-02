<?php

/** 
 *      Aqui podemos crear funciones para validar el input del usuario,
 *      la libreria tiene default rules pero no abarca todos los casos,
 *      utilizamos el nombre de la funcion dentro de set_rule:
 * 
 *      $this->form_validation->set_rule('nombre', 'Nombre', 'noDigits');
 * 
 *      Pero la mejor manera es agregarlos a el archivo: application/config/form_valdidation.php
 * 
 *      https://codeigniter.com/user_guide/libraries/form_validation.html
*/
function noAlpha($text) {
    return !preg_match("/.*?[a-zA-Z].*?/", $text);
}

function noDigits($text) {
    return !preg_match("/.*?[0-9].*?/", $text);
}

function noSpecial($text) {
    $invalid = "#$%^&*()+_=-[]';,./{}|:@<>?~¿\"!·¿¡ºª";
    return (strpbrk($text, $invalid) === FALSE) ? true : false;
}

function hasSpecial($text) {
    $invalid = "#$%^&*()+=_-[]';,./{}|:@<>?~¿\"!·¿¡ºª";
    return (strpbrk($text, $invalid) === FALSE) ? false : true;
}

function isPhoneNumber($text) {
    $invalid = "#$%^&*_=[]';,./{}|:<>?~¿\"!·¿¡ºª";
    return (strpbrk($text, $invalid) === FALSE) ? true : false;
}

// No funciona por el momento
function onlyAlphaSpaces($text) {
    foreach($text as $character) {
        if ((!ctype_alpha($character)) && (!ctype_space($character))) {
            return false;
        }
    }
    return true;
}

