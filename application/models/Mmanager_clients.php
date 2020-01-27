<?php

class Mmanager_clients extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_valid_clients() {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO AS U');
            $this->db->join('ROL AS R', 'U.ID_ROL=R.ID_ROL');
            $this->db->where('VIGENCIA_USUARIO', VIGENTE);
            $this->db->where_in('U.ID_ROL', CLIENTE);
            return $this->db->get()->result_array();
        }
        catch (Exception $exception) {
            return array();
        }
    }

    function add_new_client_on_db($client) {
        try {
            $this->db->insert('USUARIO', $client);
            return $this->db->insert_id();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function get_client_by_id($id) {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO');
            $this->db->where('ID_USUARIO', $id);
            $this->db->where('ID_ROL', CLIENTE);
            $array = $this->db->get()->result_array()[0];
            $array["PASSWD_USUARIO"] = $this->encryption->decrypt($array["PASSWD_USUARIO"]);
            return $array;
        } 
        catch (Exception $exception) {
            return array();
        }
    }

    function edit_client_on_db($client,$id) {
        try {
            $this->db->where('ID_USUARIO', $id);
            $this->db->update('USUARIO',$client);
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function disable_client_on_db($id) {
        try {
            $this->db->set('VIGENCIA_USUARIO', 0);
            $this->db->where('ID_USUARIO', $id);
            $this->db->update('USUARIO');
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
