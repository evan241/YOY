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
            return $this->db->get()->result_array();
        } catch (Exception $ex) {
            return array();
        }
    }

    function getCategory($id) {
        try {
            $this->db->select("*");
            $this->db->from('categoria');
            $this->db->where('ID_CATEGORIA', $id);
            return $this->db->get()->result_array()[0];
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

    function disableCategory($id) {
        try {
            $this->db->set('VIGENCIA_CATEGORIA', 0);
            $this->db->where('ID_CATEGORIA', $id);
            $this->db->update('categoria');
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function updateCategory($category, $id) {
        try {
            $this->db->where('ID_CATEGORIA', $id);
            $this->db->update('categoria',$category);
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
