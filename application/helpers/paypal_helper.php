<?php

    function fixDateTime($date){
        $create_date = substr($date['paypal_order']['create_date'], 0, 10);
        $update_date = substr($date['paypal_info']['update_date'], 0, 10);
        $create_time = substr($date['paypal_order']['create_date'], 11, 8);
        $update_time = substr($date['paypal_info']['update_date'], 11, 8);

        $date['paypal_order']['create_date'] = $create_date;
        $date['paypal_info']['update_date'] = $update_date;
        $date['paypal_order']['create_time'] = $create_time;
        $date['paypal_info']['update_time'] = $update_time;

        return $date;
    }