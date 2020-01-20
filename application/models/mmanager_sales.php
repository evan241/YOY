<?php

class Mmanager_sales extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_sale($data) {
        try {
            $this->db->insert('VENTA', $data);
            return $this->db->insert_id();
        }
        catch (Exception $exception) {
            return true;
        }
    }

    function get_all_sales() {
        try {
            $this->db->select("*");
            $this->db->from('VENTA AS V');

            $this->db->join('USUARIO AS U',"U.ID_USUARIO = V.ID_USUARIO");
            $this->db->join('PRODUCTO AS P',"P.ID_PRODUCTO = V.ID_PRODUCTO");
            $this->db->join('MEDIO_PAGO AS MP',"MP.ID_MEDIO_PAGO = V.ID_MEDIO_PAGO");
            $this->db->join('TIPO_ENVIO AS TE',"TE.ID_TIPO_ENVIO = V.ID_TIPO_ENVIO");

            $this->db->where('V.ACTIVA_VENTA',VIGENTE);
            $this->db->order_by('V.ID_VENTA', 'DESC');

            return $this->db->get()->result_array();
        } 
        catch (Exception $exception) {
            return array();
        }
    }

    function disable_sale_on_db($id) {
        try {
            $this->db->set('ACTIVA_VENTA', 0);
            $this->db->where('ID_VENTA', $id);
            $this->db->update('VENTA');
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}