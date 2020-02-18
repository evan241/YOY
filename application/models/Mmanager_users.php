<?php

class Mmanager_users extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_valid_users() {
        try {
            $this->db->select("*");
            $this->db->from('usuario AS U');
            $this->db->join('rol AS R', 'U.ID_ROL=R.ID_ROL');
            $this->db->where('VIGENCIA_USUARIO', VIGENTE);
            $this->db->where_in('U.ID_ROL', array(ADMINISTRADOR, VENDEDOR));
            return $this->db->get()->result_array();
        }
        catch (Exception $exception) {
            return array();
        }
    }

    function add_new_user_on_db($user) {
        try {
            $this->db->insert('usuario', $user);
            return $this->db->insert_id();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function get_user_by_id($id) {
        try {
            $this->db->select("*");
            $this->db->from('usuario');
            $this->db->where('ID_USUARIO', $id);
            $this->db->where_in('ID_ROL', array(ADMINISTRADOR, VENDEDOR));
            $array = $this->db->get()->result_array()[0];
            $array["PASSWD_USUARIO"] = $this->encryption->decrypt($array["PASSWD_USUARIO"]);
            return $array;
        } 
        catch (Exception $exception) {
            return array();
        }
    }

    function edit_user_on_db($user,$id) {
        try {
            $this->db->where('ID_USUARIO', $id);
            $this->db->update('usuario',$user);
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function disable_user_on_db($id) {
        try {
            $this->db->set('VIGENCIA_USUARIO', 0);
            $this->db->where('ID_USUARIO', $id);
            $this->db->update('usuario');
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
