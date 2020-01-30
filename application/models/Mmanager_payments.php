<?php

class Mmanager_payments extends CI_Model {

    function __construct() {
        parent::__construct();
        define('ACTIVO', 1);
        define("DESACTIVADO", 0);
        define("TABLE_PAYPAL_ERROR", "paypal_error");
    }
    
    function getAll(){
        try {
            $this->db->select("*");
            $this->db->from('medio_pago');
            return $this->db->get()->result_array();
        } catch (Exception $ex) {
            return array();
        }
    }

    function get($id) {
        try {
            $this->db->select("*");
            $this->db->from('medio_pago');
            $this->db->where('ID_MEDIO_PAGO', $id);
            return $this->db->get()->result_array()[0];
        } 
        catch (Exception $exception) {
            return array();
        }
    }

    function toggle($id) {
        try {
            $payment = $this->get($id);

            if (!empty($payment)) {
                $value = ($payment['ACTIVO_MEDIO_PAGO'] == DESACTIVADO) ? ACTIVO : DESACTIVADO;

                $this->db->set('ACTIVO_MEDIO_PAGO', $value);
                $this->db->where('ID_MEDIO_PAGO', $id);
                $this->db->update('medio_pago');

                return ($this->db->affected_rows() > 0) ? 1 : 0;
            }
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
