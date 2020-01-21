<?php

class Mmanager_products extends CI_Model {

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
            return $query->result_array()[0];
        } catch (Exception $ex) {
            return $e->getMessage();
        }
    }

    function saveProduct($product) {
        try {
            $this->db->insert('producto', $product);
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
}
