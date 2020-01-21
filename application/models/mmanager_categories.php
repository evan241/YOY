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
            return $e->getMessage();
        }
    }
}
