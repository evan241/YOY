<?php

    // print_r($RESPONSE);
    
    foreach ($RESPONSE as $innerArray) {
        foreach ($innerArray as $values) {
            echo $values . "<br>";
        }
        echo "<br>";
    }