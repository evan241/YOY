<?php

class Mmanager extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //products
    function get_all_valid_products() {
        try {
            $this->db->select("*");
            $this->db->from('PRODUCTO AS P');
            $this->db->join('CATEGORIA AS C',"P.ID_CATEGORIA=C.ID_CATEGORIA");
            $this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->order_by('P.NOMBRE_PRODUCTO', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    function get_product_by_id($product_id){
        try {
            $this->db->select("*");
            $this->db->from('PRODUCTO AS P');
            $this->db->join('CATEGORIA AS C',"P.ID_CATEGORIA=C.ID_CATEGORIA");
            $this->db->where('P.ID_PRODUCTO',$product_id);
            $this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->order_by('P.NOMBRE_PRODUCTO', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
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
    
    function get_all_valid_ships(){
        try {
            $this->db->select("*");
            $this->db->from('TIPO_ENVIO');
            $this->db->where('VIGENTE_TIPO_ENVIO',VIGENTE);
            $this->db->order_by('ID_TIPO_ENVIO', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }
    
    //sales
    function get_all_sales() {
        try {
            $this->db->select("*");
            $this->db->from('VENTA AS V');
            $this->db->join('USUARIO AS U',"U.ID_USUARIO=V.ID_USUARIO");
            $this->db->join('PRODUCTO AS P',"P.ID_PRODUCTO=V.ID_PRODUCTO");
            $this->db->join('MEDIO_PAGO AS MP',"MP.ID_MEDIO_PAGO=V.ID_MEDIO_PAGO");
            $this->db->join('TIPO_ENVIO AS TE',"TE.ID_TIPO_ENVIO=V.ID_TIPO_ENVIO");
            //$this->db->where('P.VIGENCIA_PRODUCTO',VIGENTE);
            $this->db->order_by('V.ID_VENTA', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function get_all_valid_autoridades() {
        try {
            $this->db->select("*");
            $this->db->from('ROL');
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function get_autoridad_by_id($id_autoridad) {
        try {
            $this->db->select("*");
            $this->db->from('ROL');
            $this->db->where('ID_ROL', $id_autoridad);
            $query = $this->db->get();
            return $query->result_array();
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

}
