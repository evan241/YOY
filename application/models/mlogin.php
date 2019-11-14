<?php

class Mlogin extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    
    function login($data) {
        try {
            $this->db->select("*");
            $this->db->from("USUARIO");
            $this->db->where("EMAIL_USUARIO", $data['USERNAME_USUARIO'])->where("PASSWORD_USUARIO", $data['PASSWD_USUARIO'])->where("ACTIVADO_USUARIO",VIGENTE)->where("CONFIRMADO_USUARIO",VIGENTE);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } 
    
    function update_last_login($ID_USUARIO) {
        try {
            
             $data = array(
                'ULTIMO_LOGIN_USUARIO'=>date('Y-m-d H:i:s')   
            );
            
            $this->db->where('ID_USUARIO',$ID_USUARIO);
            $this->db->update('USUARIO',$data);
            return $this->db->affected_rows();
            
        } catch (Exception $ex) {

            return $e->getMessage();
        }
    }

}