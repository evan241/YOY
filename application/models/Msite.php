<?php

class Msite extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login($data) {
        try {
            $this->db->select("*");
            $this->db->from("usuario");
            $this->db->where("USERNAME_USUARIO", $data['username'])->where("PASSWD_USUARIO", $data['password'])->where("VIGENCIA_USUARIO", VIGENTE);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function update_last_login($ID_USUARIO) {
        try {

            $data = array(
                'ULTIMO_LOGIN_USUARIO' => date('Y-m-d H:i:s')
            );

            $this->db->where('ID_USUARIO', $ID_USUARIO);
            $this->db->update('usuario', $data);
            return $this->db->affected_rows();
        } catch (Exception $ex) {

            return $e->getMessage();
        }
    }

}
