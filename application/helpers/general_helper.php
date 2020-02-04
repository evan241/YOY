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

function getDateRange($month) {
    if (($month >= 1) && ($month <= 9)) $month = '0' . $month;  

    $start = date("Y") . '-' . $month . '-01';
    $end = date('Y-m-d', strtotime("+1 months", strtotime($start)));

    $dates = array(
        'start' => $start,
        'end' => $end);

    return $dates;
}

?>
