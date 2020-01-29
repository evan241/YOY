<?php

class Mmanager_shipments extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        try {
            $this->db->select("*");
            $this->db->from('tipo_envio');
            $this->db->where('VIGENTE_TIPO_ENVIO',VIGENTE);
            return $this->db->get()->result_array();
        } catch (Exception $ex) {
            return array();
        }
    }

    function getShipment($id) {
        try {
            $this->db->select("*");
            $this->db->from('tipo_envio');
            $this->db->where('ID_TIPO_ENVIO', $id);
            return $this->db->get()->result_array()[0];
        } 
        catch (Exception $exception) {
            return array();
        }
    }

    function addShipment($shipment) {
        try {
            $this->db->insert('tipo_envio', $shipment);
            return $this->db->insert_id();
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function disableShipment($id) {
        try {
            $this->db->set('VIGENTE_TIPO_ENVIO', 0);
            $this->db->where('ID_TIPO_ENVIO', $id);
            $this->db->update('tipo_envio');
            return ($this->db->affected_rows() > 0) ? 1 : 0;
        }
        catch (Exception $exception) {
            return 0;
        }
    }

    function updateShipment($shipment, $id) {
        try {
            $this->db->where('ID_TIPO_ENVIO', $id);
            $this->db->update('tipo_envio',$shipment);
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
