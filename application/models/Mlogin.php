<?php

class Mlogin extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function login($data) {
        try {
            if ($this->getPassword($data['email']) == $data['password']) {
                $this->db->select("*");
                $this->db->from("usuario");
                $this->db->where("EMAIL_USUARIO", $data['email']);
                $this->db->where("VIGENCIA_USUARIO",VIGENTE);
                $this->db->where("CONFIRMADO_USUARIO",VIGENTE);
                return $this->db->get()->result_array();
            }
        } 
        catch (Exception $e) {
            return $e->getMessage();
        }
        return array();
    }

    function getPassword($email) {
        try {
            $this->db->select('PASSWD_USUARIO');
            $this->db->from("usuario");
            $this->db->where("EMAIL_USUARIO", $email);
            $result = $this->db->get()->row('PASSWD_USUARIO');
            if ($result) return $this->encryption->decrypt($result);
        }
        catch (Exception $e) {
        }
        return false;
    }

    function registroUsuario($info) {
        try {
            if (!$this->emailExists($info['EMAIL_USUARIO'])) {
                $this->db->insert("usuario", $info);
                return true;
            }
        }
        catch (Exception $e) {
            $e->getMessage();
        }
        return false;
    }

    function authUser($email, $code) {
        try {
            if (!$this->emailExists($email)) return 1;
            if ($this->isVerified($email)) return 2;

            $this->db->set("CONFIRMADO_USUARIO", 1);
            $this->db->where("EMAIL_USUARIO", $email);
            $this->db->where("CODIGO_USUARIO", $code);
            $this->db->update("usuario");

            return ($this->db->affected_rows() > 0) ? 3 : 4;
        }
        catch (Exception $exception) {
            $exception->getMessage();
        }
        return 0;
    }

    function emailExists($email) { 
        try {
            $this->db->select('*');
            $this->db->from("usuario");
            $this->db->where("EMAIL_USUARIO", $email);

            return (count($this->db->get()->result_array()) > 0);
        }
        catch (Exception $e) {
            $e->getMessage();
        }
        return false;
    }

    function isVerified($email) {
        try {
            $this->db->select('*');
            $this->db->from("usuario");
            $this->db->where("EMAIL_USUARIO", $email);
            $this->db->where("CONFIRMADO_USUARIO", 1);

            return (count($this->db->get()->result_array()) > 0);
        }
        catch (Exception $exception) {
            $exception->getMessage();
        }
        return false;        
    }
    
    function update_last_login($ID_USUARIO) {
        try {
            $data = array('ULTIMO_LOGIN_USUARIO' => date('Y-m-d H:i:s'));
            $this->db->where('ID_USUARIO',$ID_USUARIO);
            $this->db->update('usuario',$data);

            return $this->db->affected_rows();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}