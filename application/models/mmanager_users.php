<?php

class Mmanager_users extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_valid_users() {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO AS U');
            $this->db->join('ROL AS R', 'U.ID_ROL=R.ID_ROL');
            $this->db->where('VIGENCIA_USUARIO', VIGENTE);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function add_new_user_on_db($row) {
        try {
            
            $this->db->insert('USUARIO', $row);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            //return $e->getMessage();
            return 0;
        }
    }

    function get_user_by_id($id_usuario) {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO');
            $this->db->where('ID_USUARIO', $id_usuario);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function edit_user_on_db($row,$id) {
        try {
            $this->db->where('ID_USUARIO', $id);
            $this->db->update('USUARIO',$row);
            return $this->db->affected_rows();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function disable_user_on_db($ID_USUARIO) {
        try {
            $data = array(
                'VIGENCIA_USUARIO' => NULO
            );

            $this->db->where('ID_USUARIO', $ID_USUARIO);
            $this->db->update('USUARIO', $data);
            return $this->db->affected_rows();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
}
