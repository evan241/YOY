<?php

class Mmanager_categories extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all_valid_categories(){
        try {
            $this->db->select("*");
            $this->db->from('CATEGORIA');
            $this->db->where('VIGENCIA_CATEGORIA',VIGENTE);
            $this->db->order_by('ID_CATEGORIA', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return array();
        }
    }

    function getCategory($id) {
        try {
            $this->db->select("*");
            $this->db->from('USUARIO');
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

    function addCategory($category) {
        try {
            $this->db->insert('categoria', $category);
            return $this->db->insert_id();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function disableProduct($id) {
        try {
            $this->db->set('VIGENCIA_PRODUCTO', 0);
            $this->db->where('ID_PRODUCTO', $id);
            $this->db->update('producto');
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function updateProduct($product, $id) {
        try {
            $this->db->where('ID_PRODUCTO', $id);
            $this->db->update('producto',$product);
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
