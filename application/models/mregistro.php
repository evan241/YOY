<?php

Class Mregistro extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function registroUsuario($info) {
    	try {
    		$this->db->insert("usuario", $info);
    		return 1;
    	}
    	catch (Exception $e) {
    		return null;
    	}
    }
}