<?php

    function fixDateTime($date){

        // Saca solamente la fecha del string
        $create_date = substr($date['paypal_order']['create_date'], 0, 10);
        $update_date = substr($date['paypal_order']['update_date'], 0, 10);

        // Saca solamente el tiempo del string
        $create_time = substr($date['paypal_order']['create_date'], 11, 8);
        $update_time = substr($date['paypal_order']['update_date'], 11, 8);

        // Remplaza los valores
        $date['paypal_order']['create_date'] = $create_date;
        $date['paypal_order']['update_date'] = $update_date;
        $date['paypal_order']['create_time'] = $create_time;
        $date['paypal_order']['update_time'] = $update_time;

        return $date;
    }