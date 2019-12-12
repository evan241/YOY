<?php

class Msite extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function update_last_login($ID_USUARIO) {
        try {

            $data = array(
                'ULTIMO_LOGIN_USUARIO' => date('Y-m-d H:i:s')
            );

            $this->db->where('ID_USUARIO', $ID_USUARIO);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $ex) {

            return $e->getMessage();
        }
    }

}
