<?php

Class Mregistro extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function test($username) {
        return $username == "test";
    }
}