<?php

function getActive($menu) {

    $menuArray = array(
        "classIni" => '',
        "classPro" => '',
        "classSal" => '',
        "classEnt" => '',
        "classUser" => '',
        "classCustom" => '',
        "classCnf" => '');
    
    foreach ($menuArray as $key => $value) {
        if ($key == $menu) $menuArray[$key] = 'class="dropdown active"';
    }
    return $menuArray;
}

function hasInfo($data) {
    $value = false;

    foreach ($data as $info) {
        if ($info != '') {
            $value = true;
            break;
        }
    }
    return $value;
}



?>
