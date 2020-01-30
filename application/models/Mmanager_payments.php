<?php

class Mmanager_payments extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        try {
            $this->db->select("*");
            $this->db->from('medio_pago');
            $this->db->where('VIGENTE_MEDIO_PAGO',VIGENTE);
            return $this->db->get()->result_array();
        } catch (Exception $ex) {
            return array();
        }
    }

    function disable($id) {
        try {
            $this->db->set('VIGENTE_MEDIO_PAGO', 0);
            $this->db->where('ID_MEDIO_PAGO', $id);
            $this->db->update('medio_pago');
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
