<?php

class Mmanager_sales extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_sale($data) {
        try {
            $this->db->insert('venta', $data);
            return $this->db->insert_id();
        }
        catch (Exception $exception) {
            return true;
        }
    }

    function get_all_sales() {
        try {
            $this->db->select("*");
            $this->db->from('venta AS V');

            $this->db->join('usuario AS U',"U.ID_USUARIO = V.ID_USUARIO");
            $this->db->join('producto AS P',"P.ID_PRODUCTO = V.ID_PRODUCTO");
            $this->db->join('medio_pago AS MP',"MP.ID_MEDIO_PAGO = V.ID_MEDIO_PAGO");
            $this->db->join('tipo_envio AS TE',"TE.ID_TIPO_ENVIO = V.ID_TIPO_ENVIO");
            $this->db->join('status AS S', "S.status_id = V.STATUS_VENTA");

            $this->db->where('V.ACTIVA_VENTA',VIGENTE);

            return $this->db->get()->result_array();
        } 
        catch (Exception $exception) {
            return array();
        }
    }

    function changeStatus($saleID, $statusID) {
        try {
            $this->db->set('STATUS_VENTA', $statusID);
            $this->db->where('ID_VENTA', $saleID);
            $this->db->update('venta');
            return ($this->db->affected_rows() > 0);
        }
        catch (Exception $exception) {
            return false;
        }
    }

    function disable_sale_on_db($id) {
        try {
            $this->db->set('ACTIVA_VENTA', 0);
            $this->db->where('ID_VENTA', $id);
            $this->db->update('venta');
            return $this->db->affected_rows();
        }
        catch (Exception $exception) {
            return 0;
        }
    }
}
